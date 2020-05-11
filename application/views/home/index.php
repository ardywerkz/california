<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
    $count = 0;
    $indicators = '';
    foreach ($slider as $row) :
      $count++;
      if ($count === 1) {
        $class = 'active';
      } else {
        $class = '';
      }
    ?>
      <div class="carousel-item <?php echo $class; ?>">
        <img src="<?= base_url() . 'assets/upload/slider/' . $row->slider_image ?>" class="slider-img">
      </div>
      <?php $indicators .= '<li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '" class="' . $class . '"></li>' ?>
    <?php endforeach; ?>
    <ol class="carousel-indicators">
      <?= $indicators; ?>
    </ol>
  </div>
  <a class=" carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="selling" data-scrollreveal="enter right after 0.5s">
  <div class="container">
    <div class="title"><img src="<?php echo base_url(); ?>front/vendor/img/selling_title.png" class="img-title"></div>
    <div class="owl-carousel owl-theme">
      <?php foreach ($selling as $item) : ?>
        <div class="item">
          <figure>
            <img src="<?php echo base_url() . 'assets/upload/selling/' . $item->image ?>" alt="">
            <figcaption><span><?= $item->title ?></span></figcaption>
          </figure>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<div class="products">
  <div class="container">
    <div class="title"><img src="<?php echo base_url(); ?>front/vendor/img/products/title.jpg" class="img-title"></div>
    <?php $this->load->view('component/message'); ?>
    <div class="row">
      <ul class="v-inner-sell">
        <?php foreach ($products as $item) : ?>
          <li data-scrollreveal="enter top over 3s after 0.5s">
            <div class="v-bg">
              <img src="<?php echo base_url() . 'assets/upload/' . $item->product_image; ?>" class="img-list">
            </div>
            <div class="list-order">
              <ul class="orders">
                <li>
                  <p><?= $item->product_name; ?><span class="price">PHP <?= $item->price; ?></span></p>
                </li>
                <li>
                  <?php echo form_open_multipart('add-to-cart'); ?>
                  <input type="hidden" name="id" value="<?php echo $item->id ?>">
                  <?php if (!isset($this->session->userdata['username'])) { ?>
                    <a href="javascript:void(0)" class="addCart" id="requiredLogin" onclick="required(this)"><i class="fas fa-cart-plus fa-order"></i></a>
                  <?php } else { ?>
                    <button type="submit" class="addCart"><i class="fas fa-cart-plus fa-order"></i></button>
                  <?php } ?>

                  <?php echo form_close(); ?>
                </li>
              </ul>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
    <div class="row">
      <div class="col">
        <!--Tampilkan pagination-->
        <?php echo $pagination; ?>
      </div>
    </div>
  </div>
</div>


<div class="products">
  <div class="container">
    <div class="title"><img src="<?php echo base_url(); ?>front/vendor/img/snaks-btn.png" class="img-title"></div>
    <?php $this->load->view('component/message'); ?>
    <div class="row">
      <ul class="v-inner-sell">
        <?php foreach ($snacks as $item) : ?>
          <li data-scrollreveal="enter top over 3s after 0.5s">
            <div class="v-bg">
              <img src="<?php echo base_url() . 'assets/upload/' . $item->product_image; ?>" class="img-list">
            </div>
            <div class="list-order snacks">
              <ul class="orders">
                <li>
                  <p><?= $item->product_name; ?><span class="price">PHP <?= $item->price; ?></span></p>
                </li>
                <li>
                  <?php echo form_open_multipart('add-to-cart'); ?>
                  <input type="hidden" name="id" value="<?php echo $item->id ?>">
                  <?php if (!isset($this->session->userdata['username'])) { ?>
                    <a href="javascript:void(0)" class="addCart" id="requiredLogin" onclick="required(this)"><i class="fas fa-cart-plus fa-order-snacks"></i></a>
                  <?php } else { ?>
                    <button type="submit" class="addCart"><i class="fas fa-cart-plus fa-order-snacks"></i></button>
                  <?php } ?>

                  <?php echo form_close(); ?>
                </li>
              </ul>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
    <div class="row">
      <div class="col">
        <!--Tampilkan pagination-->
        <?php echo $pagination; ?>
      </div>
    </div>
  </div>
</div>





<!-- Modal Registers -->
<div class="modal fade" id="modal_form_register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form">
          <div class="row">
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" name="email">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Firstname:</label>
                    <input type="text" class="form-control" placeholder="Enter firstname" name="fname">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Lastname:</label>
                    <input type="text" class="form-control" placeholder="Enter lastname" name="lname">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" placeholder="Enter address" name="address">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>
              <div class="row justify-content-md-center">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Contact Number:</label>
                    <input type="text" class="form-control" placeholder="Enter contact number" name="contact_no">
                    <span class="invalid-feedback"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="methods.register()">Register</button>
      </div>
    </div>
  </div>
</div>

<!-- Moda/ logout -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Are you sure you want to logout ?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary" onclick="methods.logout()">Yes, Logout</button>
      </div>
    </div>
  </div>
</div>

<script>
  function required(e) {
    Swal.fire({
      icon: 'error',
      title: 'Required...',
      text: 'Please login your account !',
    })
  }
</script>