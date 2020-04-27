<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seeder extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model('seeder_model');
        // $isLoggedIn = $this->session->userdata('islogin');
        // if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
        //     redirect('auth');
        // }
       
    }


    public function index(){
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
                    'contact_no' => $randomString,
                    'ip' => rand(1000,9000),
                    'last_login' => date('Y-m-d H:i:s'),
                    'register_date' => date('Y-m-d H:i:s'),
                );
                $this->seeder_model->seed_account($data);
            }
        }
        echo '<h1>100 user records added to database </h1></br>';
        print_r($nameArr);
       
    }

    // public function providerAccount(){
    //     $nameArr = array();
    //     for ($d = 100; count($nameArr) < $d;) {
    //         $randomString = $this->random_char(2, 5);
    //         if (!in_array($randomString, $nameArr, true)) {
    //             array_push($nameArr,  $randomString);
    //             $data = array(
    //                 'company' => rand(1, 5),
    //                 'provider' => rand(1, 5),
    //                 'balance' =>  rand(50600, 82340),
    //                 'account_name' => $randomString,
    //                 'account_number' => rand(300, 800),
    //                 'date_added' => date('Y-m-d H:i:s'),
    //                 'status' => 0,
    //             );
    //             $this->seeder_model->seed_providerAccount($data);
    //         }
    //     }
    //     echo '<h1>100 user records added to database </h1></br>';
    //     print_r($nameArr);
    // }

    // public function seed_ip(){
    //     $nameArr = array();
    //     for ($d = 500; count($nameArr) < $d;) {
    //         $randomString = $this->random_char(2, 5);
    //         if (!in_array($randomString, $nameArr, true)) {
    //             array_push($nameArr,  $randomString);
    //             $data = array(
    //                 'ip_address' => rand(1000,9000),
    //                 'date_added' => date('Y-m-d H:i:s')
    //             );
    //             $this->seeder_model->seed_ip($data);
    //         }
    //     }
    //     echo '<h1>100 user records added to database </h1></br>';
    //     print_r($nameArr);
    // }

    // public function depoHistory(){
    //     $nameArr = array();
    //     for ($d = 10; count($nameArr) < $d;) {
    //         $randomString = $this->random_char(2, 5);
    //         if (!in_array($randomString, $nameArr, true)) {
    //             array_push($nameArr,  $randomString);
    //             $data = array(
    //                 'status' => rand(0,2),
    //                 'serial' => $randomString,
    //                 'user_id' => 1,
    //                 'amount' => rand(1992, 2020),
    //                 'amount_rate' => rand(1992, 2020),
    //                 'acc_number' => rand(12399033, 22309922),
    //                 'provider' => 'Three',
    //                 'company' => 'QQBola',
    //                 'date' => date('Y-m-d H:i:s')
    //             );
    //             $this->seeder_model->seed_depo_history($data);
    //         }
    //     }
    //     echo '<h1>100 user records added to database </h1></br>';
    //     print_r($nameArr);
    // }
    // public function deposit(){
    //     $nameArr = array();
    //     for ($d = 10; count($nameArr) < $d;) {
    //         $randomString = $this->random_char(2, 5);
    //         if (!in_array($randomString, $nameArr, true)) {
    //             array_push($nameArr,  $randomString);
    //             $data = array(
    //                 'status' => 1,
    //                 'serial' => $randomString,
    //                 'user_id' => 1,
    //                 'amount' => rand(10000, 100000),
    //                 'amount_rate' => rand(100000, 1110000),
    //                 'acc_number' => rand(12399033, 22309922),
    //                 'provider' => 'Three',
    //                 'company' => 'QQBola',
    //                 'date' => date('Y-m-d')
    //             );
    //             $this->seeder_model->seed_deposit($data);
    //             $this->seeder_model->seed_depo_history($data);
    //         }
    //     }
    //     echo '<h1>100 user records added to database </h1></br>';
    //     print_r($nameArr);
    // }

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