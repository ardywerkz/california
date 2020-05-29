<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Store extends MY_Controller
{
    private $response = array(
        'success' => '',
        'message' => '',
        'errorCode' => '',
        'data' => array(),
        'token' => ''
    );
    public function __construct()
    {
        Parent::__construct();
        $this->load->library('user_agent');
        //$this->load->model('store_model');
    }
    private function sendResponse()
    {
        if (!$this->response['success']) {
            header('HTTP/1.1 500 Internal Server');
            header('Content-Type: application/json; charset=UTF-8');
        }
        echo json_encode($this->response);
    }

    public function index()
    {
        echo 'text';
    }

    public function cavite()
    {
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('store/cavite', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
