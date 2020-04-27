<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    private $response = array(
        'success' => '',
        'message' => '',
        'errorCode' => '',
        'data' => array()
    );


    public function __construct()
    {
        Parent::__construct();
        $this->load->model('dashboard_model');
        $isLoggedIn = $this->session->userdata('islogin');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('adminlogin');
        }
    }
    private function sendResponse()
    {
        if ($this->response['errorCode']) {
            header('HTTP/1.1 ' . $this->response['errorCode'] . ' Internal Server');
            header('Content-Type: application/json; charset=UTF-8');
        } else {
            $this->response['success'] = true;
        }
        echo json_encode($this->response);
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['product'] = $this->db->get('product')->num_rows();
        $data['users'] = $this->db->get('users')->num_rows();
        $data['orders'] = $this->db->get('orders')->num_rows();
        $data['subview'] = $this->load->view('dashboard/list', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
