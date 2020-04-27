<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Seeder_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function seed_account($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
    public function seed_providerAccount($data)
    {
        $this->db->insert('accounts', $data);
        return $this->db->insert_id();
    }
    public function seed_ip($data)
    {
        $this->db->insert('ip_list', $data);
        return $this->db->insert_id();
    }
    public function seed_depo_history($data){
        $this->db->insert('deposit_log', $data);
        return $this->db->insert_id();
    }
    public function seed_deposit($data){
        $this->db->insert('deposit', $data);
        return $this->db->insert_id();
    }
}