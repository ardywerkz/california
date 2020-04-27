<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>plugins/toastr/toastr.min.js"></script>
<script>
    var base_url = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url(); ?>assets/js/apis.js"></script>
<script src="<?php echo base_url(); ?>assets/js/methods.js"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".alert")
                    .fadeTo(500, 0)
                    .slideUp(500, function() {
                        $(this).remove();
                    });
            }, 4000);
        });
        $(window).bind("load", function() {
            window.setTimeout(function() {
                $(".ci-error")
                    .fadeTo(500, 0)
                    .slideUp(500, function() {
                        $(this).remove();
                    });
            }, 4000);
        });
    });
</script>
</body>

</html>