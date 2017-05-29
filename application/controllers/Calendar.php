<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends SC_Controller {

	 public function index ($year = null, $month = null)
	 {
		 $this->load->model('Mycal_model');

		 $data['calendar'] = $this->Mycal_model->generate($year, $month);

		 $this->load->view('calendar', $data);
	 }

}
