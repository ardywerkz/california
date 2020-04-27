 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark navbar-pink">

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">

     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         Hi, <?= $this->session->userdata('username');?>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <div class="dropdown-divider"></div>
         <a href="<?= site_url('logout')?>" class="dropdown-item">
           <i class="fas fa-sign-out-alt"></i> Logout
         </a>

     </li>

   </ul>
 </nav>
 <!-- /.navbar -->