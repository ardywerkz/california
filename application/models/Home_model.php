<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getSlider()
    {
        return $this->db->query('SELECT * FROM slider ORDER BY created_at DESC')->result();
    }
    public function getSelling()
    {
        return $this->db->query('SELECT * FROM product WHERE store_id = 1 AND selling = 1 ORDER BY created_at DESC')->result();
    }
    public function getProduct($limit, $start)
    {
        $this->db->select('id,category_id, store_id, user_id, product_name, price, product_image');
        $this->db->from('product');
        $this->db->where('store_id', 1);
        $this->db->where('selling', 0);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_snacks()
    {
        $this->db->select();
        $this->db->from('product');
        $this->db->where('category_id', 1);
        $this->db->where('store_id', 1);
        $query = $this->db->get();
        return $query->result();
    }
}
