<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function userLogin($data){
        $condition = "username =" . "'" . $data['username'] . "' and password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    
}
