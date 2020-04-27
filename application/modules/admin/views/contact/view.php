<div class="row">
    <div class="col-sm-12">
        <div class="card card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Message info</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?= base_url() ?>dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                            <a href="#"><?= $view['name'] ?></a>
                        </span>
                        <span class="description">Date - <?= date("D, d M g:i:A", strtotime($view['date_added'])) ?></span>
                        <span class="description">Phone - <?= $view['phone'] ?></span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                        <?= $view['message'] ?>
                    </p>

                </div>
                <a href="<?php echo base_url('contact/') ?>" class="btn btn-sm btn-primary">Back</a>
            </div>
        </div>
    </div>
</div>