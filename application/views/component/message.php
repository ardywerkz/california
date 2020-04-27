<?php if ($this->session->flashdata('success_add_cart')) : ?>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Product added to cart successfully',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('success_order')) : ?>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Your order placed successfully',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('empty_cart')) : ?>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Empty cart....',
            text: 'Add order to continue checkout!',
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('delete_cart')) : ?>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success....',
            text: 'Successfully deleted cart !',
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('success_update')) : ?>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/sweetalert2.min.js"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'success....',
            text: 'Successfully update cart !',
        })
    </script>
<?php endif; ?>