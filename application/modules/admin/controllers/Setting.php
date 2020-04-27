<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('setting_model');
        $isLoggedIn = $this->session->userdata('islogin');
        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            redirect('adminlogin');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('title', 'Title slider', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['slider'] = $this->setting_model->getSlider();
            $data['subview'] =  $this->load->view('slider/add_slider', $data, TRUE);
            $data['subview'] = $this->load->view('slider/slider_list', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {
            //get the form values
            $data['title'] = $this->input->post('title', TRUE);
            $data['slider_image'] = $this->input->post('slider_image', TRUE);

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload/slider';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1920;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('slider_image')) {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                $data['title'] = 'Add';
                $data['subview'] =  $this->load->view('slider/add_slider', $error, TRUE);
                $data['subview'] = $this->load->view('slider/slider_list', $data, TRUE);
                $this->load->view('layouts', $data);
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['slider_image'] = $upload_data['file_name'];

                //store pic data to the db
                $query = $this->setting_model->add_slider($data);
                if ($query = TRUE) {
                    $this->session->set_flashdata('success', 'Successfully added slider !');
                    redirect('setting');
                }
            }
        }
    }

    public function editSLider($id = null)
    {
        if ($id) {
            $data['edit'] = $this->db->get_where('slider', array('id' => $id))->row_array();
            $data['subview'] = $this->load->view('slider/edit_slider', $data, TRUE);
            $this->load->view('layouts', $data);
        }
    }

    public function save_edit($id = null)
    {
        $this->form_validation->set_rules('title', 'Title image', 'trim|required');
        if ($this->form_validation->run() == TRUE) {

            $data['title'] = $this->input->post('title', TRUE);
            $data['slider_image'] = $this->input->post('slider_image', TRUE);
            $id = $this->input->post('id');
            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload/slider';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1920;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('slider_image')) {

                if ($id != '') {
                    $this->db->where('id', $id);
                    $data['edit'] = $this->db->get('slider')->row_array();
                    $error = array('error' => $this->upload->display_errors());
                    $data['subview'] = $this->load->view('slider/edit_slider', $data, $error, TRUE);
                    $this->load->view('layouts', $data);
                }
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['slider_image'] = $upload_data['file_name'];

                //store pic data to the db
                $this->db->where('id', $id);
                $this->db->update('slider', $data);
                $this->session->set_flashdata('success', 'Successfully update slider !');
                redirect('setting');
            }
        }
    }

    //delete slider
    public function deleteSlider($id)
    {
        if (!empty($id)) {
            $query = $this->db->delete('slider', array('id' => $id));
            if ($query) {
                $this->session->set_flashdata('success', 'Successfully delete slider !');
                redirect('setting');
            }
        }
    }

    public function selling()
    {
        $data['title'] = 'title';
        $data['selling'] = $this->setting_model->getSelling();
        $data['subview'] = $this->load->view('selling/list', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function addSelling()
    {
        $this->form_validation->set_rules('title', 'Title selling', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['selling'] = $this->setting_model->getSelling();
            $data['subview'] =  $this->load->view('selling/add_selling', $data, TRUE);
            $data['subview'] = $this->load->view('selling/list', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {
            //get the form values
            $data['title'] = $this->input->post('title', TRUE);
            $data['image'] = $this->input->post('image', TRUE);

            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload/selling';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 262;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // $this->load->view('upload_form', $error);
                $data['title'] = 'Add';
                $data['subview'] =  $this->load->view('selling/add_selling', $error, TRUE);
                $data['subview'] = $this->load->view('selling/list', $data, TRUE);
                $this->load->view('layouts', $data);
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $data['image'] = $upload_data['file_name'];

                //store pic data to the db
                $query = $this->setting_model->add_selling($data);
                if ($query = TRUE) {
                    $this->session->set_flashdata('success', 'Successfully added best selling product !');
                    redirect('admin/setting/selling');
                }
            }
        }
    }
    //update
    public function editSelling($id = null)
    {
        if ($id) {
            $data['edit'] = $this->db->get_where('selling', array('id' => $id))->row_array();
            $data['subview'] = $this->load->view('selling/edit_selling', $data, TRUE);
            $this->load->view('layouts', $data);
        }
    }

    //save update selling
    public function save_edit_selling($id = null)
    {
        $this->form_validation->set_rules('title', 'Title image', 'trim|required');
        if ($this->form_validation->run() == FALSE) {

            $data['edit'] = $this->db->get_where('selling', array('id' => $id))->row_array();
            $data['subview'] = $this->load->view('selling/edit_selling', $data, TRUE);
            $this->load->view('layouts', $data);
        } else {
            //file upload code 
            //set file upload settings 
            $config['upload_path']          = APPPATH . '../assets/upload/selling';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 262;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {

                if ($id != '') {
                    $this->db->where('id', $id);
                    $data['edit'] = $this->db->get('selling')->row_array();
                    $error = array('error' => $this->upload->display_errors());
                    $data['subview'] = $this->load->view('selling/edit_selling', $data, $error, TRUE);
                    $this->load->view('layouts', $data);
                }
            } else {
                //file is uploaded successfully
                //now get the file uploaded data 
                $upload_data = $this->upload->data();

                //get the uploaded file name
                $title = $this->input->post('title', TRUE);
                $id = $this->input->post('id');
                $image = $upload_data['file_name'];
                $data = array(
                    'title' => $title,
                    'image' => $image,
                );
                //store pic data to the db
                $query = $this->setting_model->update_selling($id, $data);
                $this->session->set_flashdata('success', 'Successfully update best selling products !');
                redirect('setting/selling');
            }
        }

        $config['upload_path']          = APPPATH . '../assets/upload/selling';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 262;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $title = $this->input->post('title', TRUE);
            $id = $this->input->post('id');
            $image = $upload_data['file_name'];
            $data = array(
                'title' => $title,
                'image' => $image,
            );
            //store pic data to the db
            $query = $this->setting_model->update_selling($id, $data);
            $this->session->set_flashdata('success', 'Successfully update best selling products !');
            redirect('setting/selling');
        }
    }

    //delete selling
    public function deleteSelling($id)
    {
        if (!empty($id)) {
            $query = $this->db->delete('selling', array('id' => $id));
            if ($query) {
                $this->session->set_flashdata('success', 'Successfully delete sellig products !');
                redirect('setting/selling');
            }
        }
    }
}
