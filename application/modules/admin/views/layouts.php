<?php $this->load->view('component/htmlheader'); ?>
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <?php $this->load->view('component/header'); ?>
        <?php $this->load->view('component/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <br>
            <!-- Main content -->
            <section class="content">
                <?php echo $subview; ?>
            </section>
        </div>
    </div>
    <?php $this->load->view('component/htmlfooter'); ?>