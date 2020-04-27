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