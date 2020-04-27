<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_category()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_category($data)
    {
        $this->db->insert('category', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_category($id, $name){
       $this->db->query('UPDATE category SET `name` = "'.$name.'" WHERE id = "'.$id.'"');
    }
    public function delete_category($id){
        $this->db->query('DELETE category FROM category where id="'.$id.'"');
    }



}
