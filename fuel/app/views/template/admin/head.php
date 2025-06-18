<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex, nofollow">
	<link rel="stylesheet" href="/assets/css/root.css">
	<link href="/assets/bs5/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
	<link rel="stylesheet" href="/assets/admin/css/sidebar.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="/assets/js/ckeditor.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<link href="/assets/vendor/jquery.datetimepicker.min.css" rel="stylesheet" />
	<script src="/assets/vendor/jquery.datetimepicker.full.min.js"></script>
	<link href="/assets/vendor/fancybox.css" rel="stylesheet" />
	<script src="/assets/vendor/fancybox.umd.js"></script>
	<title>Nội thất Gia Thế</title>
	<style>
		table {
			table-layout: fixed;
			border-color: #718ba5 !important;
		}
		html {
			font-size: 14px;
		}
	</style>
	<style>
		.image-card {
			position: relative;
			width: 150px;
			height: 150px;
			overflow: hidden;
		}
		.image-card img {
			object-fit: cover;
		}
		.buttons {
			position: absolute;
			bottom: 0;
			left: 0;
			width: 100%;
			height: 30px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.btn-edit {
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color:rgba(0, 123, 255, 0.52);
			color: #fff;
			cursor: pointer;
			margin: 0;
			height: 100%;
		}
		.delete-image {
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color:rgba(220, 53, 70, 0.45);
			color: #fff;
			border: none;
			cursor: pointer;
			padding: 0;
			margin: 0;
			outline: none;
			height: 100%;
		}
		#addImage ~ .buttons {
			height: 100%;
		}
		#addImage ~ .buttons .btn-edit {
			background-color: rgba(0, 123, 255);
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>
	<script>
		// Hàm thay thế link Shorts thành iframe
		function convertShortsToEmbed(content) {
			return content.replace(
				/https?:\/\/(www\.)?youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/g,
				'<iframe width="100%" height="315" src="https://www.youtube.com/embed/$2" frameborder="0" allowfullscreen></iframe>'
			);
		}

		function initTinyMCE(selector = "#description") {
			tinymce.init({
				selector: selector,
				content_css: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
				plugins: "image code table autoresize media autolink lists link preview",
				toolbar: "undo redo | styles fontsize fontfamily | bold italic underline | alignleft aligncenter alignright | table | numlist bullist | image | media | link | preview | code",
				images_upload_url: "/api/upload/editor",
				automatic_uploads: true,
				elementpath: false,
				menubar: false,
				autoresize_bottom_margin: 20,
				autoresize_min_height: 200,
				font_size_formats: '8px 10px 12px 14px 16px 18px 24px 36px 48px',
				setup: function(editor) {
					editor.on('init', function() {
						editor.getBody().classList.add('container', 'mt-3');
						$(editor.getDoc()).find("html").css({
							fontSize: '14px'
						});
					});
					editor.on('PastePostProcess', function (e) {
						// Convert pasted content to embed codes
						e.node.innerHTML = convertShortsToEmbed(e.node.innerHTML);
					});
				}
			});

			// Ensure content from TinyMCE is submitted with the form
			$("form").off("submit.tinymce").on("submit.tinymce", function (e) {
				tinymce.triggerSave();
			});
		}
	</script>
</head>