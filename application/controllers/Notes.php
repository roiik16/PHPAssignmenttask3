<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends SC_Controller {


	 function __construct () {

		 # Inherit the parent class' properties
		 parent::__construct ();

		 $this->load->model ('save_model');
	 }

	public function index()
	{
    $this->add_notes ();
	}

	public function add_notes()
	{
		$this->load->helper('form');

		$data = array (
			'notes' => $this->save_model->get_notes(),
			'form' => array (
				'n_title' => array(
					'type' => 'text',
					'name' => 'input-notetitle',
					'placeholder' => 'Write your title here',
					'required' => TRUE
				),

				'n_content' 	=> array (
					'type'			=> 'text',
					'name'			=> 'input-content',
					'placeholder'	=> 'Write your text here',
					'required'		=> TRUE
				)
			)
		);

		$this->build ('notes', $data);
	}

	public function do_add_notes()
    {
        $this->load->library ('form_validation');

        $rules = array (
            array(
                'field' => 'input-title',
				'label' => 'Note title',
				'rules' => 'required'
            ),
			array(
                'field' => 'input-title',
				'label' => 'Note title',
				'rules' => 'required'
            )
        );

        $this->form_validation->set_rules ($rules);

		if ($this->form_validation->run () === FALSE)
		{
			echo validation_errors();
			return;
		}

		$n_title = $this->input->post ('input-notetitle');
		$n_content = $this->input->post('input-content');

		if ($this->notes_model->add_notes ($n_title, $n_content))
		{
			echo "Note saved";
		}
		else
		{
			echo "Note was not saved";
		}

    }


}
