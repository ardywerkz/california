<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
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
        $this->load->model('category_model');
    }

    public function index()
    {
        $data['list'] = $this->category_model->get_category();
        $data['title'] = 'Category list';
        $data['subview'] = $this->load->view('category/list', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function addCategory()
    {
        $name = $this->input->post('name');
        if (empty($name)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $data = array(
                'name' => $name,
                'date_added' => date('Y-m-d H:i:s'),
            );
            $this->category_model->add_category($data);
        }
        $this->sendResponse();
    }

    public function updateCategory()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        if (empty($name)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $this->category_model->update_category($id, $name);
        }
        $this->sendResponse();
    }

    public function deleteCategory()
    {
        $id = $this->input->post('id');
        $this->category_model->delete_category($id);
    }

    //store category
    public function storeCategory()
    {
        $data['store'] = $this->db->query('SELECT * FROM store_category ORDER BY `store_name` ASC')->result();
        $data['subview'] = $this->load->view('category/store', $data, TRUE);
        $this->load->view('layouts', $data);
    }
}
