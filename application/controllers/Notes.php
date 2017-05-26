<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends SC_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
    $this->build('notes');
	}

	public function Savenote()
	{
		$this->load->helper('file');

		$data = 'Some file data';

		if ( ! write_file('css/Text', $data))
		{
		        echo 'Unable to write the file';
		}
		else
		{
		        echo 'File written!';
		}
	}

	public function Readanote()
	{
		$string = read_file('css/Text');
	}

	public function Deletenote()
	{
		delete_files('css/Text', TRUE);
	}

}
