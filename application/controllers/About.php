<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends MY_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('home_model');
    }

    public function index()
    {
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('about/index', $data, TRUE);
        $this->load->view('layouts', $data);
    }
    public function privacy()
    {
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('about/privacy', $data, TRUE);
        $this->load->view('layouts', $data);
    }
    public function termsUse()
    {
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('about/terms_use', $data, TRUE);
        $this->load->view('layouts', $data);
    }
    public function Careers()
    {
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('about/career', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
