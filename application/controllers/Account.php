<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Account extends MY_Controller
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
        $this->load->model('account_model');
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
    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fname', 'Firstname', 'trim|required|xss_clean');
        $this->form_validation->set_rules('lname', 'Lastname', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['test'] = 'Test';
            $data['subview'] = $this->load->view('account/register', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {

            $data = array(
                'username' => $this->input->post('username'),
                'password' => hash('sha256', md5($this->input->post('password'))),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'contact_no' => $this->input->post('contact_no'),
                'status' => 1,
                'register_date' => date('Y-m-d H:i:s'),
                'register_ip' => $this->input->ip_address(),
            );
            $query = $this->account_model->register_user($data);
            if ($query == TRUE) {
                $this->session->set_flashdata('success', 'Successfully register your account, Please Login !');
                redirect('account/login');
            }
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['test'] = 'Test';
            $data['subview'] = $this->load->view('account/login', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => hash('sha256', md5($this->input->post('password'))),
                'islogin' => TRUE
            );
            $query = $this->account_model->userLogin($data);
            if ($query == TRUE) {
                $data['user_id'] = $query->id;
                $data['username'] = $query->username;
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password !');
                redirect('login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url() . 'home');
    }
}
