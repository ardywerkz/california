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
    <div class="carousel-wrap">
      <div class="owl-carousel owl-theme" id="selling">
        <?php foreach ($selling as $item) : ?>
          <div class="item cs-style-3">
            <figure>
              <img src="<?php echo base_url() . 'assets/upload/' . $item->product_image ?>" alt="">
              <figcaption>
                <h3><?= $item->product_name ?></h3>
                <span><?= $item->price ?></span>
                <?php echo form_open_multipart('add-to-cart'); ?>
                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                <?php if (!isset($this->session->userdata['username'])) { ?>
                  <a href="javascript:void(0)" class="btn-addcart" style="padding: 3px 7px; font-size: 14px;" id="requiredLogin" onclick="required(this)">Add To Cart</a>
                <?php } else { ?>
                  <button type="submit" class="btn-addcart" style="padding: 3px 7px; font-size: 14px;">Add To Cart</button>
                <?php } ?>

              </figcaption>
            </figure>
          </div>
        <?php endforeach; ?>
      </div>
    </div>


  </div>
</div>
<div class="products selling">
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


<div class="products selling">
  <div class="container">
    <div class="title"><img src="<?php echo base_url(); ?>front/vendor/img/snaks-btn.png" class="img-title"></div>
    <?php $this->load->view('component/message'); ?>

    <div class="carousel-wrap">
      <div class="owl-carousel owl-theme" id="snacks-carousel">
        <?php foreach ($snacks as $item) : ?>
          <div class="item cs-style-3">
            <figure>
              <img src="<?php echo base_url() . 'assets/upload/' . $item->product_image ?>" alt="">
              <figcaption>
                <h3><?= $item->product_name ?></h3>
                <span><?= $item->price ?></span>
                <?php echo form_open_multipart('add-to-cart'); ?>
                <input type="hidden" name="id" value="<?php echo $item->id ?>">
                <?php if (!isset($this->session->userdata['username'])) { ?>
                  <a href="javascript:void(0)" class="btn-addcart" id="requiredLogin" onclick="required(this)">Add To Cart</a>
                <?php } else { ?>
                  <button type="submit" class="btn-addcart">Add To Cart</button>
                <?php } ?>

              </figcaption>
            </figure>
          </div>
        <?php endforeach; ?>
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