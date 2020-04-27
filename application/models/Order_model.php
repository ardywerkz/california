<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getList()
    {
        $this->db->select('product.*, category.name');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category_id', 'left');
        $this->db->order_by('product.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCategory()
    {
        $query = $this->db->query('SELECT * FROM category');
        return $query->result();
    }
}
