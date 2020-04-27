 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?= site_url('dashboard/') ?>" class="brand-link navbar-pink">
     <img src="<?php echo base_url(); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">California Admin</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url(); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <a href="#" class="d-block">Admin</a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'dashboard' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link <?php echo ($this->router->fetch_class() == 'dashboard' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= site_url('dashboard') ?>" class="<?php if (in_array($this->uri->uri_string(), array('dashboard', 'dashboard'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Dashboard</p>
               </a>
             </li>
           </ul>
         </li>


         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'category' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link <?php echo ($this->router->fetch_class() == 'category' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-bars"></i>
             <p>
               Category Product
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= site_url('category') ?>" class="<?php if (in_array($this->uri->uri_string(), array('category', 'category'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Category list</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'product' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link <?php echo ($this->router->fetch_class() == 'product' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-briefcase"></i>
             <p>
               Product items
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= site_url('product') ?>" class="<?php if (in_array($this->uri->uri_string(), array('product', 'product'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Product list</p>
               </a>
             </li>
           </ul>
         </li>


         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'order' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link <?php echo ($this->router->fetch_class() == 'order' ? 'active' : ''); ?>">
             <i class="nav-icon fab fa-first-order"></i>
             <p>
               Orders
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= site_url('order/') ?>" class="<?php if (in_array($this->uri->uri_string(), array('order', 'order'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Order list</p>
               </a>
             </li>
           </ul>
         </li>




         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'users' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link  <?php echo ($this->router->fetch_class() == 'users' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-users"></i>
             <p>
               Users
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo site_url('users/admin/') ?>" class="<?php if (in_array($this->uri->uri_string(), array('users/admin', 'users/admin'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Admin List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo site_url('users/') ?>" class="<?php if (in_array($this->uri->uri_string(), array('users', 'users/'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>User List</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'setting' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link  <?php echo ($this->router->fetch_class() == 'setting' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-cog"></i>
             <p>
               Settings
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo site_url('setting/') ?>" class="<?php if (in_array($this->uri->uri_string(), array('setting', 'setting'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Slider</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo site_url('setting/selling/') ?>" class="<?php if (in_array($this->uri->uri_string(), array('setting/selling', 'setting/selling'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Best Selling</p>
               </a>
             </li>

           </ul>
         </li>

         <li class="nav-item has-treeview <?php echo ($this->router->fetch_class() == 'contact' ? 'menu-open' : ''); ?>">
           <a href="#" class="nav-link <?php echo ($this->router->fetch_class() == 'contact' ? 'active' : ''); ?>">
             <i class="nav-icon fas fa-envelope-open-text"></i>
             <p>
               Contuct Us
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?= site_url('contact') ?>" class="<?php if (in_array($this->uri->uri_string(), array('contact', 'contact'))) echo 'active'; ?> nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Message list</p>
               </a>
             </li>
           </ul>
         </li>


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>