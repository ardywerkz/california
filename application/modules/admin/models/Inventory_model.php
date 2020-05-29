<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Inventory_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_product($data)
    {
        $this->db->insert('in_product', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //list product
    public function get_product()
    {
        $this->db->select('in_product.*, admin.username');
        $this->db->from('in_product');
        $this->db->join('admin', 'admin.id = in_product.user_id', 'left');
        $this->db->order_by('in_product.date_added', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    //edit product
    public function edit_product($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('in_product', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function delete_product($id)
    {
        $this->db->query('DELETE in_product FROM in_product where id="' . $id . '"');
    }
    public function delete_category($id)
    {
        $this->db->query('DELETE category FROM category where id="' . $id . '"');
    }
}
