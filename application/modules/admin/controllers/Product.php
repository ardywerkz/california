<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends MY_Controller
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
        $this->load->model('product_model');
        $isLoggedIn = $this->session->userdata('islogin');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('adminlogin');
        }
    }

    public function index()
    {
        $config['base_url'] = base_url('product');

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

        $data['product'] = $this->product_model->getProduct($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
        $config['total_rows'] = $this->product_model->count_product($config["per_page"], $data['page'], $data['searchFor'], $data['orderField'], $data['orderDirection']);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['title'] = 'Add';
        $data['category'] = $this->product_model->getCategory();
        $data['subview'] = $this->load->view('product/list', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function addProduct()
    {
        $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
        $this->form_validation->set_rules('category_id', 'Category name', 'trim|required');
        $this->form_validation->set_rules('store_id', 'Store name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Add';
            $data['category'] = $this->product_model->getCategory();
            $data['store'] = $this->db->query('SELECT * FROM store_category ORDER BY `store_name` ASC')->result();
            $data['subview'] =  $this->load->view('product/add_product', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {
            //get the form values
            $data['product_name'] = $this->input->post('product_name', TRUE);
            $data['category_id'] = $this->input->post('category_id', TRUE);
            $data['store_id'] = $this->input->post('store_id', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['product_image'] = $this->input->post('product_image', TRUE);
            $data['user_id'] = $this->session->userdata('user_id');
            $data['selling'] = $this->input->post('selling');

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 4000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('product_image')) {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                $data['title'] = 'Add';
                $data['category'] = $this->product_model->getCategory();
                $data['store'] = $this->db->query('SELECT * FROM store_category ORDER BY `store_name` ASC')->result();
                $data['subview'] =  $this->load->view('product/add_product', $data, $error, TRUE);
                $this->load->view('layouts', $data);
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['product_image'] = $upload_data['file_name'];
                $data['user_id'] = $this->session->userdata('user_id');

                //store pic data to the db
                $query = $this->product_model->add_product($data);
                if ($query = TRUE) {
                    $this->session->set_flashdata('success', 'Successfully added product !');
                    redirect('product');
                }
            }
        }
    }


    //delete product
    public function deleteProduct()
    {
        $id = $this->input->post('id');
        $this->product_model->delete_product($id);
    }

    //update details
    public function updateDetails()
    {
        $id = $this->input->post('id');
        $product = $this->input->post('product_name');
        $price = $this->input->post('price');
        $category = $this->input->post('category_id');
        if (empty($product) || empty($category)) {
            $this->response['message'] = 'Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $data = array(
                'id' => $id,
                'product_name' => $product,
                'price' => $price,
                'category_id' => $category,
            );
            $this->db->where('id', $id);
            $this->db->update('product', $data);
        }
    }

    //update imag product
    public function updateImage($id)
    {
        if ($id) {
            $data['edit'] = $this->db->get_where('product', array('id' => $id))->row_array();
            $data['subview'] = $this->load->view('product/edit_image', $data, TRUE);
            $this->load->view('layouts', $data);
        }
    }

    //save update product image
    public function save_productImage($id = null)
    {
        $this->form_validation->set_rules('title', 'Title image', 'trim|required');
        if ($this->form_validation->run() == false) {

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 4000;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {

                if ($id != '') {
                    $this->db->where('id', $id);
                    $data['edit'] = $this->db->get('product')->row_array();
                    $error = array('error' => $this->upload->display_errors());
                    $data['subview'] = $this->load->view('product/edit_image', $data, $error, TRUE);
                    $this->load->view('layouts', $data);
                }
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $id = $this->input->post('id');
                $image = $upload_data['file_name'];
                $data = array(
                    'product_image' => $image,
                );
                //store pic data to the db
                $query = $this->product_model->update_image($id, $data);
                $this->session->set_flashdata('success', 'Successfully update product image !');
                redirect('product/');
            }
        }
        $config['upload_path']          = APPPATH . '../assets/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 4000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $id = $this->input->post('id');
            $image = $upload_data['file_name'];
            $data = array(
                'product_image' => $image,
            );
            //store pic data to the db
            $query = $this->product_model->update_image($id, $data);
            $this->session->set_flashdata('success', 'Successfully update product image !');
            redirect('product/');
        }
    }
}
