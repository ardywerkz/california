<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
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
        $this->load->model('auth_model');
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
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $uname =  $this->input->post('username');
            $pass =  hash('sha256', md5($this->input->post('password')));

            $data = array(
                'username' => $uname,
                'password' => $pass,
                'islogin' => TRUE
            );
            $query = $this->auth_model->userLogin($data);
            if ($query == true) {
                $data['user_id'] = $query->id;
                $data['username'] = $query->username;
                $data['last_login_timestamp'] = time();
                $this->session->set_userdata($data);

                $this->session->set_flashdata('success', 'Successful login');
                redirect(site_url() . 'dashboard/');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or Password');
                $this->load->view('auth/login', $data);
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        redirect('adminlogin', 'refresh');
    }
}
