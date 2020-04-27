<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_order($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select();
        $this->db->from('order_product');
        $this->db->join('orders', 'orders.id = order_product.order_id', 'right');
        $this->db->join('product', 'product.id = order_product.product_id', 'right');
        $this->db->join('users', 'users.id = order_product.user_id');
        $this->db->or_like('users.fname', $st);
        $this->db->or_like('users.lname', $st);
        $this->db->or_like('users.contact_no', $st);
        $this->db->or_like('product.product_name', $st);
        $this->db->order_by('order_product.created_at', 'DESC');
        $this->db->order_by($orderField, $orderDirection);
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    //count product
    public function count_order($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select();
        $this->db->from('order_product');
        $this->db->join('orders', 'orders.id = order_product.order_id', 'right');
        $this->db->join('product', 'product.id = order_product.product_id', 'right');
        $this->db->join('users', 'users.id = order_product.user_id');
        $this->db->or_like('users.fname', $st);
        $this->db->or_like('users.lname', $st);
        $this->db->or_like('users.contact_no', $st);
        $this->db->or_like('product.product_name', $st);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function view_order($id)
    {
        $this->db->select();
        $this->db->from('order_product');
        $this->db->join('orders', 'orders.id = order_product.order_id', 'right');
        $this->db->join('product', 'product.id = order_product.product_id', 'right');
        $this->db->join('users', 'users.id = order_product.user_id');
        $this->db->where('order_product.user_id', $id);
        $this->db->order_by('order_product.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
