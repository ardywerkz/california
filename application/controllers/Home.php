<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
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
        $config['base_url'] = site_url('home/index'); //site url
        $config['total_rows'] = $this->db->count_all('product'); //total row
        $config['per_page'] = 15;  //show record per row
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['slider'] = $this->home_model->getSlider();
        $data['selling'] = $this->home_model->getSelling();

        $data['snacks'] = $this->home_model->get_snacks();
        $data['products'] = $this->home_model->getProduct($config["per_page"], $data['page']);
        // echo '<pre>';
        // print_r($data['products']);
        $data['pagination'] = $this->pagination->create_links();
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('home/index', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function snacks()
    {
        $data['snacks'] = $this->home_model->get_snacks();
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('home/index', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
