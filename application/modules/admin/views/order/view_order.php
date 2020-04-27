<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <?php foreach ($view as $items) : ?>
                    <div class="col-12 col-sm-3">
                        <div class="col-12">
                            <img src="<?= base_url() . 'assets/upload/' . $items->product_image ?>" class="product-image" alt="Product Image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-9">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width:20%">Name :</th>
                                        <td><?= $items->full_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Address</th>
                                        <td><?= $items->delivery_address ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td><?= $items->mobile_number ?></td>
                                    </tr>
                                    <tr>
                                        <th>Neareast Landmark:</th>
                                        <td><?= $items->land_mark ?></td>
                                    </tr>
                                    <tr>
                                        <th>City:</th>
                                        <td><?= $items->city ?></td>
                                    </tr>
                                    <tr>
                                        <th>Order name:</th>
                                        <td><?= $items->product_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Product price:</th>
                                        <td><?= $items->price ?></td>
                                    </tr>
                                    <tr>
                                        <th>Quantity:</th>
                                        <td><?= $items->qty ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total amount:</th>
                                        <td class="text-danger"><i class="fas fa-ruble-sign"> <?= $items->total_amt ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4" style="margin-bottom: 20px">
                            <a href="<?= base_url('order/') ?>" class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-step-backward fa-lg mr-2"></i>
                                Back to order
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>