<?php

namespace Helper;

class Uploader
{
	protected $path;
	protected $ext_whitelist;
	protected $saved_files = [];

	public function __construct($path, $ext_whitelist = ['jpg', 'jpeg', 'png', 'gif'])
	{
		$this->path = $path;
		$this->ext_whitelist = $ext_whitelist;
	}


	private function convert_vn2latin($str)
	{
		// Mảng các ký tự tiếng việt không dấu theo mã unicode tổ hợp
		$tv_unicode_tohop =
			[
				"à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ò", "ớ", "ợ", "ở", "õ", "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À", "À", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ"
			];
		// Mảng các ký tự tiếng việt không dấu theo mã unicode dựng sẵn
		$tv_unicode_dungsan =
			[
				"à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ"
			];
		// Mảng các ký không dấu sẽ thay thế cho ký tự có dấu
		$tv_khongdau =
			[
				"a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D"
			];

		$str = str_replace($tv_unicode_dungsan, $tv_khongdau, $str);
		$str = str_replace($tv_unicode_tohop, $tv_khongdau, $str);
		return $str;
	}

	public function convert_vn_to_str($str)
	{
		// Chuyển tiếng việt không dấu
		$str = $this->convert_vn2latin($str);
		// chuyển sang in thường
		$str = mb_strtolower($str);
		// Giữ lại các ký tự chữ a - z và số 0 - 9 còn lại thay bằng -
		$str = preg_replace('/[^a-z0-9]/', '_', ($str));
		$str = preg_replace('/_+/', '_', $str);
		$str = trim($str, '_');
		return $str;
	}

	public function upload()
	{
		\Upload::register('validate', function (&$file) {
			$original = pathinfo($file['name'], PATHINFO_FILENAME);

			$snake = $this->convert_vn_to_str($original);

			$file['basename'] = $snake;
			return true;
		});
		\Upload::process([
			'path' => $this->path,
			'ext_whitelist' => $this->ext_whitelist,
		]);

		if (\Upload::is_valid()) {
			\Upload::save();
			$files = \Upload::get_files();
			$this->saved_files = $files;
			return true;
		}

		return false;
	}

	public function get($field = null)
	{

		$fields = [];
		if ($field === null) {
			return array_values($this->saved_files);
		}

		foreach ($this->saved_files as $file) {
			if (strpos($file['field'], $field) !== false) {
				$fields[] = $file;
			}
		}

		return $fields;
	}

	public function getName($field)
	{
		$file = $this->get($field);
		return $file ? $file[0]['saved_as'] : null;
	}
}
