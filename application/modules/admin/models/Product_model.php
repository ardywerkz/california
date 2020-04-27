<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    //save picture data to db
    public function add_product($data)
    {
        $insert_data['category_id'] = $data['category_id'];
        $insert_data['product_name'] = $data['product_name'];
        $insert_data['price'] = $data['price'];
        $insert_data['product_image'] = $data['product_image'];
        $insert_data['user_id'] = $data['user_id'];
        $insert_data['date_added'] = date('Y-m-d H:i:s');

        $query = $this->db->insert('product', $insert_data);
    }


    //get product list
    public function getProduct($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select('product.*, category.name, admin.username');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category_id', 'left');
        $this->db->join('admin', 'admin.id = product.user_id', 'left');
        $this->db->or_like('category.name', $st);
        $this->db->or_like('product_name', $st);
        $this->db->limit($limit, $start);
        $this->db->order_by('created_at', 'DESC');
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();
        return $query->result();
    }

    //count product
    public function count_product($limit, $start, $st = "", $orderField, $orderDirection)
    {
        $this->db->select('product.*, category.name');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category_id', 'left');
        $this->db->or_like('category.name', $st);
        $this->db->or_like('product_name', $st);
        $this->db->order_by($orderField, $orderDirection);
        $query = $this->db->get();

        return $query->num_rows();
    }

    //delete product
    public function delete_product($id)
    {
        $this->db->query('DELETE product FROM product where id="' . $id . '"');
    }
    //update image product
    public function update_image($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('product', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
