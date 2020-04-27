<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
    private $response = array(
        'success' => '',
        'message' => '',
        'errorCode' => '',
        'data' => array(),
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

    public function __construct()
    {
        Parent::__construct();
        $this->load->model('users_model');
        $this->load->model('seeder_model');
        $isLoggedIn = $this->session->userdata('islogin');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('adminlogin');
        }
    }

    public function index()
    {
        $config['base_url'] = base_url('users');

        $config['per_page'] = ($this->input->get('limitRows')) ? $this->input->get('limitRows') : 10;
        $config['enable_query_strings'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['reuse_query_string'] = TRUE;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination ">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link"><a href="' . $config['base_url'] . '?per_page=0">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></a></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $data['page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        $data['searchFor'] = ($this->input->get('query')) ? $this->input->get('query') : NULL;
        $data['orderField'] = ($this->input->get('orderField')) ? $this->input->get('orderField') : '';
        $data['orderDirection'] = ($this->input->get('orderDirection')) ? $this->input->get('orderDirection') : '';

        $data['user'] = $this->users_model->userList($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
        $config['total_rows'] = $this->users_model->count_users($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'User list';
        $data['subview'] = $this->load->view('users/user_list', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function adminList()
    {
        $data['title'] = 'Admin list';
        $data['list'] = $this->users_model->list_admin();
        $data['subview'] = $this->load->view('users/admin_list', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    //add user admin
    public function add_admin()
    {
        $uname = $this->input->post('username');
        $pass = hash('sha256', md5($this->input->post('password')));
        $fname = $this->input->post('full_name');
        if (empty($uname) || empty($pass) || empty($fname)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $data = array(
                'username' => $uname,
                'password' => $pass,
                'full_name' => $fname,
                'date_added' => date('Y-m-d H:i:s'),
            );
            $this->users_model->addAdmin($data);
            $this->response['message'] = 'Successfully added user !';
            $this->response['success'] = true;
        }

        $this->sendResponse();
    }

    //update password
    public function updatePassword()
    {
        $id = $this->input->post('id');
        $newPassword = hash('sha256', md5($this->input->post('password')));
        if (empty($newPassword)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $this->db->query('UPDATE `admin` SET `password` = "' . $newPassword . '" WHERE id ="' . $id . '"');
        }
        $this->sendResponse();
    }

    //delete admin
    public function deleteAdmin()
    {
        $id = $this->input->post('id');
        $this->db->query('DELETE `admin` FROM `admin` WHERE id = "' . $id . '"');
    }

    public function viewInfo($id)
    {
        if ($id) {
            $data['view'] = $this->db->get_where('users', array('id' => $id))->row_array();
            // echo '<pre>';
            // print_r($data['view']);
            $data['subview'] = $this->load->view('users/info', $data, TRUE);
            $this->load->view('layouts', $data);
        }
    }

    //delete product
    public function deleteUsers()
    {
        $id = $this->input->post('id');
        $this->db->query('DELETE `users` FROM `users` WHERE id = "' . $id . '"');
    }


    public function seed_account()
    {
        $nameArr = array();
        for ($d = 100; count($nameArr) < $d;) {
            $randomString = $this->random_char(2, 5);
            if (!in_array($randomString, $nameArr, true)) {
                array_push($nameArr,  $randomString);
                $data = array(
                    'username' => $randomString,
                    'password' => hash('sha256', md5($randomString)),
                    'fname' => $randomString,
                    'lname' => $randomString,
                    'address' => $randomString,
                    'contact_no' => rand(90111222, 88992200),
                    'email' => $randomString . '@gmail.com',
                    'register_ip' => rand(1000, 9000),
                    'last_login' => date('Y-m-d H:i:s'),
                    'register_date' => date('Y-m-d H:i:s'),
                );
                $this->seeder_model->seed_account($data);
            }
        }
        echo '<h1>100 user records added to database </h1></br>';
        print_r($nameArr);
    }

    private function random_char($minlen = 0, $maxlen = 6)
    {
        $characters = explode(" ", 'a b c d e f g h i j k l m n o p q r s t u ');
        $charactersLength = count($characters);
        $randloop = rand($minlen, $maxlen);
        $charc = array();
        for ($i = 0; $i < $randloop; $i++) {
            $charc[] = $characters[rand(0, $charactersLength - 1)];
        }
        return join('', $charc);
    }
}
