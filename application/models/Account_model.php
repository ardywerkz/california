<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Account_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //Query get single user
    public function getUser($id)
    {
        return $this->db->query("SELECT *FROM users WHERE id = $id")->row();
    }

    public function register_user($data)
    {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function userLogin($data)
    {
        $condition = "username =" . "'" . $data['username'] . "' and password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('users');
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
