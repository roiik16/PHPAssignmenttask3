<?php
  class Posts_model extends CI_Model{
    public function __construct()
    {
      $this->load->database();
    }

    public function get_posts($slug = false)
    {
      if ($slug == FALSE)
      {
        $query = $this->db->get('tbl_comments');
        return $query->result_array();
      }

      $query = $this->db->get_where('tbl_comments', array('slug' => $slug));
      return $query->row_array();
    }


    public function add_posts($body)
    {

      $data = array
      (
        'c_content' => $body,
        'c_date'    => time (),
        'tbl_users_user_ID' => $this->session->userdata('user_id')
      );

      $this->db->insert ('tbl_comments', $data);

      return $this->db->insert_id ();
    }

    }
