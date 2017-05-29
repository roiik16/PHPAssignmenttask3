<?php
  class Save_model extends CI_Model{

    public function __construct()
    {
      $this->load->database();
    }

    public function get_notes()
    {
        $query = $this->db->get('tbl_notes');
        return $query->result_array();

    }

    public function add_notes($notetitle, $notecontent)
    {

      $data = array
      (
        'note_title' => $notetitle,
        'note_content' => $notecontent,
        'note_date'    => time(),
        'tbl_users_user_ID' => $this->session->userdata('user_id')
      );

      $this->db->insert ('tbl_notes', $data);

      return $this->db->insert_id ();
    }
}
