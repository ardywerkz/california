 <div class="header">
   <div class="container">
     <div class="row">
       <div class="col-lg-6 col-md-6 col-sm-6">
         <a href="<?= base_url('home/') ?>"><img src="<?php echo base_url(); ?>front/vendor/img/logo.png" class="img-logo"></a>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6">
         <?php if (!isset($this->session->userdata['username'])) { ?>
           <div class="account">
             <div class="div1">
               <div class="sub">
                 <h3><strong>ADDRESS</strong></h3>
                 <p>Katipunan av. California Village Novaliches Quezon City <br> ( Beside California Garder Resort )</p>
               </div>
               <div class="sub">
                 <ul>
                   <li><a href="#"><img src="<?= base_url(); ?>front/vendor/img/fb.png" alt=""></a></li>
                   <li><a href="#"><img src="<?= base_url(); ?>front/vendor/img/ins.png" alt=""></a></li>
                   <li><a href="#"><img src="<?= base_url(); ?>front/vendor/img/tw.png" alt=""></a></li>
                 </ul>
               </div>
             </div>
             <div class="div2">
               <ul>
                 <li><a href="<?= site_url('account/register/') ?>"><img src="<?= base_url(); ?>front/vendor/img/account.png"><span>Create account</span></a></li>
                 <li><a href="<?= site_url('login') ?>"><img src="<?= base_url(); ?>front/vendor/img/login.png"><span>Login</span></a></li>
               </ul>
             </div>
           </div>

         <?php } else { ?>
           <div class="cart">
             <ul class="top-menu">
               <li><a href="<?= base_url('profile/') ?>">my account</a></li>
               <li><a href="<?= base_url('cart/history/') ?>">checkout history</a></li>
               <li><a href="<?= site_url('account/logout/') ?>">Logout</a></li>
             </ul>
             <ul class="welcome">
               <li> Welcome to our online store !</li>
               <li id="cart"><i class="fas fa-cart-plus fa-cart">
                   <span class="badge-cart"><?php echo $this->cart->total_items() ?></span></i>
                 <div id="carRes" class="carRes" style="display: none">
                   <ul class="header-cart-wrapitem">
                     <?php foreach ($this->cart->contents() as $header_cart) : ?>
                       <li class="header-cart-item">
                         <div class="header-cart-item-img"><img src="<?= base_url() . 'assets/upload/' . $header_cart['product_image'] ?>" alt=""></div>
                         <div class="header-cart-item-txt">
                           <a href="#" class="header-cart-item-name"> <?php echo $header_cart['name'] ?></a>
                           <span class="header-cart-item-info">
                             <?php echo $header_cart['qty'] . " x " . $header_cart['price'] ?></span>
                         </div>
                       </li>
                     <?php endforeach; ?>
                   </ul>
                   <div class="header-cart-total">
                     Total: Rs. <?php echo number_format($this->cart->total()); ?> </div>
                   <div class="header-cart-buttons">
                     <div class="header-cart-wrapbtn">
                       <!-- Button -->
                       <a href="<?= base_url('view-cart') ?>" class="btn btn-cart">
                         View Cart
                       </a>
                     </div>
                     <div class="header-cart-wrapbtn">
                       <!-- Button -->
                       <a href="<?= base_url('checkout') ?>" class="btn btn-cart">
                         Checkout
                       </a>
                     </div>
                   </div>
                 </div>
               </li>
             </ul>
           </div>

         <?php } ?>
       </div>
     </div>
   </div>
 </div>

 <nav class="navbar navbar-dark bg-pink navbar-expand-sm">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="container">
     <div class="collapse navbar-collapse" id="navbar-list-2">
       <ul class="navbar-nav">
         <li class="nav-item <?php echo ($this->router->fetch_class() == 'home' ? 'active' : ''); ?>">
           <a class="nav-link" href="<?= site_url('home/') ?>">Home</a>
         </li>
         <li class="nav-item <?php echo ($this->router->fetch_class() == 'orders' ? 'active' : ''); ?>">
           <a class="nav-link" href="<?= site_url('orders/') ?>">Shop Now</a>
         </li>
         <li class="nav-item <?php echo ($this->router->fetch_class() == 'contact' ? 'active' : ''); ?>">
           <a class="nav-link" href="<?= base_url('contact-us/') ?>">Contact Us</a>
         </li>
       </ul>
     </div>
   </div>
 </nav>