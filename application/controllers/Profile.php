<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends SC_Controller {



	public function index()
	{
        $this->build('profile');
	}

	public function update_users()
	{
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
