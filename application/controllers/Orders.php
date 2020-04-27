<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Orders extends MY_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('order_model');
    }

    public function index()
    {
        $data['product'] = $this->order_model->getList();
        $data['category'] = $this->order_model->getCategory();
        // echo 'print';
        // print_r($data['product']);
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('order/list', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
