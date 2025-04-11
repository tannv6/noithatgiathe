<?php
use Detection\MobileDetect as Mobile_Detect;
$detect = new Mobile_Detect();

if ($detect->isMobile() && !$detect->isTablet()) {
    $device_type = 'M';
} elseif ($detect->isTablet()) {
    $device_type = 'P';
} else {
    $device_type = 'P';
}

$today = date('Y-m-d');
$popups = Model_Popup_Index::query()
->where_open()
    ->where('always_show', 'Y')
    ->or_where_open()
            ->where('always_hide', 'N')
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
        ->or_where_close()
->where_close()
->where('device', $device_type)
->get();;

foreach ($popups as $key => $popup) {
    $popups[$key] = $popup->to_array();
    $popups[$key]['images'] = array_values(array_map(function ($image) {
        return $image->to_array();
    }, Model_Popup_Image::find('all', ['where' => ['popup_id' => $popup->id], 'order_by' => ['sort_order' => 'DESC']])));
}

$popups = array_values($popups);

?>

<script>
    const popups = JSON.parse('<?= addslashes(json_encode($popups, JSON_UNESCAPED_UNICODE)); ?>');
    console.log(popups);
</script>

<script>
    function hideToday(id) {
        const now = new Date();
        const expire = new Date();
        expire.setHours(23, 59, 59, 999);
        document.cookie = "popup_hidden_" + id + "=1; expires=" + expire.toUTCString() + "; path=/";
    }

    function getCookie(name) {
        let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
        return match ? match[2] : null;
    }
    document.addEventListener("DOMContentLoaded", function () {
        popups.forEach(popup => {
            if (getCookie("popup_hidden_" + popup.id) === "1") return;

            let div = document.createElement("div");
            div.classList.add("custom-popup");
            div.style.position = "fixed";
            div.style.width = popup.width + "px";
            div.style.height = popup.height + "px";
            div.style.zIndex = 9999;
            div.id = "popup_" + popup.id;

            // Vị trí
            div.style.left = getPositionValue(popup.position_x, popup.width, 'x');
            div.style.top = getPositionValue(popup.position_y, popup.height, 'y');

            const images = popup.images.map(image => {
                return `
                    <div style="width: ${popup.width}px;height: ${popup.height}px">
                        <img style="width: 100%;height: 100%;object-fit: cover" src="/storages/popups/${image.image_url}" alt="Image">
                    </div>
                `;
            }).join('');

            div.innerHTML = `
            <div style="height: 100%;width: 100%;position:relative;">
                <a target="_blank" href="${popup.content || '#!'}" style="width:100%;height:100%;" class="popup_images owl-carousel owl-theme">${images}</a>
                <div style="display: flex;position: absolute;top: 100%;left: 0;width: 100%;">
                    <button style="flex: 1;background-color:#795353;border: none;color: #fff;padding: 7px 0;" onclick="$('#popup_${popup.id}').remove()">Tắt</button>
                    <button style="flex: 1;background-color: #333;border: none;color: #fff;padding: 7px 0;" onclick="hideToday(${popup.id}); $('#popup_${popup.id}').remove()">Không hiện lại</button>
                </div>
            </div>
        `;
            document.body.appendChild(div);
            const carousel = $(".popup_images").owlCarousel({
				loop: true,
				margin: 10,
				autoplay: true,
				autoplayTimeout: 4000,
				smartSpeed: 1500,
				autoplayHoverPause: true,
				nav: false,
				items: 1,
                dots: false,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                mouseDrag: false,
                touchDrag: false,
                pullDrag: false,
                freeDrag: false,
			});
        });

        function getPositionValue(pos, size, axis) {
            if (!isNaN(pos)) return pos + 'px';
            if (pos === 'center') return `calc(50% - ${size / 2}px)`;
            if (axis === 'x') return (pos === 'left' ? '0px' : (pos === 'right' ? `calc(100% - ${size}px)` : '0px'));
            if (axis === 'y') return (pos === 'top' ? '0px' : (pos === 'bottom' ? `calc(100% - ${size}px)` : '0px'));
            return '0px';
        }
    });
</script>