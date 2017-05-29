<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SC_Controller {

	public function index()
	{
        $this->build('profile');
	}

	public function user_form_update()
	{
		$this->load->helper ('form');


		$data = array (
			'form'		=> array (
				'full_name'		=> array (
					'type'			=> 'text',
					'name'			=> 'input-full-name',
					'placeholder'	=> 'Name',
					'required'		=> TRUE
				),
				'email'			=> array (
					'type'			=> 'email',
					'name'			=> 'input-email',
					'placeholder'	=> 'me@example.com',
					'required'		=> TRUE
				)
			)
		);
		# load the registration page
 		$this->load->view ('profile', $data);
	}

	public function update_users()
	{
		$this->load->library ('form_validation');


		$id = $this->session->userdata('user_id');

		$name = $this->input->post ('user_name');
		if ($name == '') $name = NULL;

		$surname = $this->input->post ('user_name');
		if ($name == '') $name = NULL;

		$email = $this->input->post ('user_email');
		if ($name == '') $name = NULL;

		$phone = $this->input->post ('user_phone');
		if ($name == '') $name = NULL;

		$this->user_model->update_users($id, $name, $surname, $email, $phone);
	}
}
