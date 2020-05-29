<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css?<?php echo time(); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css?<?php echo time(); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css?<?php echo time(); ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css?<?php echo time(); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/sweetalert2.min.css?<?php echo time(); ?>">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css?<?php echo time(); ?>">
  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js?<?php echo time(); ?>"></script>
  <!-- <?php
        // $user = $this->session->userdata('username');
        //$login_time = $this->session->userdata('last_login_timestamp');
        //if (isset($user)) {
        //  if ((time() - $login_time) > 900) // 900 = 15 * 60  
        {
          // $this->session->unset_userdata('user_id');
          // $this->session->unset_userdata('username');
          // $this->session->unset_userdata('last_login_timestamp');
          // $this->session->sess_destroy();
          // redirect('adminlogin', 'refresh');
        }
        // }
        ?> -->