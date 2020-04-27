<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends MY_Controller
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
        $data['subview'] = $this->load->view('contact/index', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function contactUs()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $message = $this->input->post('message');
        if (empty($name) || empty($email) || empty($phone) || empty($message)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'message' => $message,
                'ip_address' => $this->input->ip_address(),
                'date_added' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('contact_us', $data);
        }
        $this->sendResponse();
    }
}
