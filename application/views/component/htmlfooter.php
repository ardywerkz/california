<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-4" data-scrollreveal="enter right after 0.5s">
        <ul class="div1">
          <li>Customer Care</li>
          <li><a href="#">Help Center</a></li>
          <li><a href="#">How to Buy</a></li>
          <li><a href="#">Shipping & Delivery</a></li>
          <li><a href="#">How to Return</a></li>
          <li><a href="#">Question</a></li>
          <li><a href="<?= site_url('contact-us/') ?>">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-sm-4" data-scrollreveal="enter top over 3s after 0.5s">
        <ul class="div2">
          <li>California Food Gift</li>
          <li><a href="<?= site_url('about-us/') ?>">About California Food Gift</a></li>
          <li><a href="<?= site_url('careers/') ?>">Careers</a></li>
          <li><a href="<?= site_url('terms-use/') ?>">Terms & Use</a></li>
          <li><a href="<?= site_url('privacy-policy/') ?>">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-sm-4" data-scrollreveal="enter left after 0.5s">

        <ul class="div3">
          <h5>Follow us:</h5>
          <li><a href="#"><img src="<?php echo base_url(); ?>front/vendor/img/social/ins.png" alt=""></a></li>
          <li><a href="#"><img src="<?php echo base_url(); ?>front/vendor/img/social/fb.png" alt=""></a></li>
          <li><a href="#"><img src="<?php echo base_url(); ?>front/vendor/img/social/tw.png" alt=""></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div id="scroll-top">
  <i class="fa fa-chevron-up fa-2x"></i>
</div>
<script src="<?php echo base_url(); ?>front/vendor/bootstrap/js/bootstrap.bundle.min.js?<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.js?<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/script.js?<?php echo time(); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/nicescroll.js?<?php echo time(); ?>"></script>
<script>
  var base_url = '<?php echo base_url() ?>';
</script>
<script>
  $(document).ready(function() {
    window.setTimeout(function() {
      $(".alert").fadeTo(0, 0).slideUp(0, function() {
        $(this).remove();
        $('html, body').animate({
          scrollTop: $(".products").offset().top
        }, 2000);
      });

    }, 4000);

  })
</script>
</body>

</html>