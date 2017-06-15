<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newcalendar extends SC_Controller {

    function __construct ()
    {
        # Inherit the parent class' properties
        parent::__construct ();

        $this->load->model('newcalendar_model');
    }

    function index($year = null, $month = null) {

        if (!$year) {
            $year = date ('Y');
        }
        if (!$month) {
            $month = date ('m');
        }


        if ($day = $this->input->post('day')) {
            $this->Newcalendar_Model->add_calendar_data(
                "$year-$month-$day",
                $this->input->post('data')
            );
        }
        $data['calendar'] = $this->newcalendar_model->generate($year, $month);

        $this->load->view('newcalendar', $data);
    }
}
