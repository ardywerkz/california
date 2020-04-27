<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Setting_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function add_slider($data)
    {
        $insert_data['title'] = $data['title'];
        $insert_data['slider_image'] = $data['slider_image'];

        $query = $this->db->insert('slider', $insert_data);
    }
    public function add_selling($data)
    {
        $insert_data['title'] = $data['title'];
        $insert_data['image'] = $data['image'];

        $query = $this->db->insert('selling', $insert_data);
    }
    public function getSlider()
    {
        return $this->db->query('SELECT * FROM slider ORDER BY created_at DESC')->result();
    }
    public function getSelling()
    {
        return $this->db->query('SELECT * FROM selling ORDER BY created_at DESC')->result();
    }

    public function update_selling($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('selling', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //get product list
    public function getMessage($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->or_like('name', $st);
        $this->db->or_like('email', $st);
        $this->db->or_like('phone', $st);
        $this->db->limit($limit, $start);
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();
        return $query->result();
    }

    //count product
    public function count_message($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->or_like('name', $st);
        $this->db->or_like('email', $st);
        $this->db->or_like('phone', $st);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();

        return $query->num_rows();
    }
}
