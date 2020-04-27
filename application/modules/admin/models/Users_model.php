<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function list_admin()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result();
    }

    public function addAdmin($data)
    {
        $this->db->insert('admin', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function userList($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->or_like('username', $st);
        $this->db->or_like('email', $st);
        $this->db->or_like('address', $st);
        $this->db->or_like('contact_no', $st);
        $this->db->limit($limit, $start);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();

        return $query->result();
    }

    public function count_users($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select();
        $this->db->from('users');
        $this->db->or_like('username', $st);
        $this->db->or_like('email', $st);
        $this->db->or_like('address', $st);
        $this->db->or_like('contact_no', $st);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();

        return $query->num_rows();
    }
}
