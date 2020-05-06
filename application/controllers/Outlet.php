<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outlet extends MY_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('home_model');
    }
    private $response = array(
        'success' => '',
        'message' => '',
        'errorCode' => '',
        'data' => array()
    );
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
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('outlet/index', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
