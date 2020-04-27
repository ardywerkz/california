<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getId($product_id)
    {
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id', $product_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function place_order($order_data)
    {
        $this->db->insert('orders', $order_data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function add_orderProduct($order_product_data)
    {
        $this->db->insert('order_product', $order_product_data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getHistory($id)
    {
        $this->db->select('*');
        $this->db->from('order_product');
        $this->db->join('product', 'product.id = order_product.product_id', 'left');
        $this->db->join('users', 'users.id = order_product.user_id', 'left');
        $this->db->where('order_product.user_id', $id);
        $this->db->order_by('order_product.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
