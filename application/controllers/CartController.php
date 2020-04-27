<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends MY_Controller
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
        $this->load->model('cart_model');
    }

    public function addCart()
    {
        $product_id = $this->input->post('id');
        $product = $this->cart_model->getId($product_id);

        $qty = 1;
        if ($this->input->post('qty')) {
            $qty = $this->input->post('qty');
        }
        $product_display_img = "";
        $image = $product->product_image;
        if ($image) {
            $product_display_img = $image->path;
        }
        $data = array(
            'id'      => $product->id,
            'qty'     => $qty,
            'price'   => $product->price,
            'name'    => $product->product_name,
            'product_image' => $product->product_image,
            'options' => array('product_image' => $product_display_img)
        );
        $status = $this->cart->insert($data);
        if ($status) {
            $this->session->set_flashdata('success_add_cart', 'Product added to cart successfully');
        } else {
            $this->session->set_flashdata('error', 'Failed to add product to cart');
        }
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    //view cart items
    public function viewCart()
    {
        $data['test'] = 'Test';
        $data['cart'] = $this->cart->contents();
        $data['subview'] = $this->load->view('cart/view_cart', $data, TRUE);
        $this->load->view('layouts', $data);
    }
    //checkout order
    public function checkOut()
    {
        //if cart is empty,
        if (empty($this->cart->contents())) {
            $this->session->set_flashdata('empty_cart', 'Please add items  to cart first');
            redirect('home');
            exit();
        }
        $data['cart'] = $this->cart->contents();
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('cart/checkout', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    //add order product
    public function addOrder()
    {
        $cart_contents = $this->cart->contents();
        $total_amt = $this->cart->total(); //Temperory set to cart total
        //echo 'add order';
        $order_data = array(
            'user_id' => $this->session->userdata('user_id'), //Logged in user id
            'delivery_address' => $this->input->post('delivery_address'),
            'land_mark' => $this->input->post('land_mark'),
            'full_name' => $this->input->post('full_name'),
            'mobile_number' => $this->input->post('mobile_number'),
            'city' => $this->input->post('city'),
            'order_status' => '1',
            'total_amt' => $total_amt,
            'date_added' => date('Y-m-d H:i:s'),
        );
        $order_id = $this->cart_model->place_order($order_data);
        foreach ($cart_contents as $product) {
            $order_product_data = array(
                'product_id' => $product['id'],
                'order_id' => $order_id,
                'qty' => $product['qty'],
                'user_id' =>  $this->session->userdata('user_id'),
                'date_order' =>  date('Y-m-d H:i:s'),
            );
            $this->cart_model->add_orderProduct($order_product_data);
        }
        if ($order_id == TRUE) {
            $this->cart->destroy();
            $this->session->set_flashdata('success_order', 'Order placed successfully');
            redirect('home');
            exit;
        } else {
            $this->session->set_flashdata('error', 'Oops! Something went wrong.');
            redirect('home');
            exit;
        }
    }
    /**
     * Update cart
     */
    public function updateCart()
    {
        $input_cart = $product_id = $this->input->post('cart');
        $status = $this->cart->update($input_cart);

        if ($status) {
            $this->session->set_flashdata('success_update', 'Cart updated successfully');
        }
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    /**
     * delete cart
     */

    public function deleteCart()
    {
        $result = $this->cart->contents();
        foreach ($result as $row) {
            $rowid = $row['rowid'];
        }
        $deleteItem = array(
            'rowid' => $rowid,
            'qty'   => 0
        );
        $query = $this->cart->update($deleteItem);
        if ($query) {
            $this->session->set_flashdata('delete_cart', 'Cart deleted successfully');
        }
        redirect($_SERVER['HTTP_REFERER']);
        exit;
    }

    public function checkOut_history()
    {
        $data['test'] = 'Test';
        $id = $this->session->userdata('user_id');
        $data['history'] = $this->cart_model->getHistory($id);
        // echo '<pre>';
        // print_r($data['history']);
        $data['subview'] = $this->load->view('cart/history', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function myAccount()
    {
        $user_id = $this->session->userdata('user_id');
        $data['profile'] = $this->db->get_where('users', array('id' => $user_id))->row_array();
        $data['test'] = 'Test';
        $data['subview'] = $this->load->view('cart/my_account', $data, TRUE);
        $this->load->view('layouts', $data);
    }

    public function updateProfile()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $number = $this->input->post('contact_no');
        if (empty($username) || empty($email) || empty($address) || empty($number)) {
            $this->response['message'] = ' Required Fields !';
            $this->response['errorCode'] = 406;
            $this->response['success'] = false;
        } else {
            $data = array(
                'username' => $username,
                'email' => $email,
                'address' => $address,
                'contact_no' => $number,
            );
            $this->db->where('id', $id);
            $this->db->update('users', $data);
        }
        $this->sendResponse();
    }
}
