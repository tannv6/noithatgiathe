<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * The Main Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */

class Controller_Api_Upload extends Controller
{

	public function before() {
		parent::before();
		error_reporting(0);
	}

    public function action_editor() {

        \Upload::process([
            'path' => DOCROOT . 'uploads/editor/',
            'randomize' => true,
            'ext_whitelist' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
        ]);

        if (\Upload::is_valid()) {
            \Upload::save();
            $files = \Upload::get_files();

            $image = $files[0]['saved_as'];
            $name = $files[0]['name'];
            $type = $files[0]['type'];
        }


        return Response::forge(json_encode([
            "success" => true,
            "url" => "/uploads/editor/$image",
            "name" => $name,
            "type" => $type,
        ]));
    }

}