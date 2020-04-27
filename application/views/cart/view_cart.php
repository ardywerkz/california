<div class="container mb-4 viewCart">
    <?php $this->load->view('component/message'); ?>
    <div class="row">
        <div class="col-8" data-scrollreveal="enter right after 0.5s">
            <div class="table-responsive">
                <?php echo form_open_multipart('cart/update'); ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product name</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach ($cart as $items) : ?>
                            <tr>
                                <td><img class="size50" src="<?= base_url() . 'assets/upload/' . $items['product_image'] ?>" /> </td>
                                <td><?= $items['name'] ?></td>
                                <td><?= $items['price'] ?></td>
                                <td>
                                    <input class="" type="hidden" name="<?php echo "cart[$i][rowid]" ?>" value="<?php echo $items['rowid']; ?>">
                                    <input class="form-control" type="text" name="<?php echo "cart[$i][qty]" ?>" value="<?= $items['qty'] ?>" />
                                </td>
                                <td class="text-right"><a href="<?= base_url('cart/delete/') ?>" data-toggle="tooltip" data-placement="top" title="Delete Order" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </a> </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="col-sm-12 col-md-6 text-right">
                                    <button type="submit" class="btn btn-light-pink">Update</button>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- total -->
        <div class="col-4" data-scrollreveal="enter left after 0.5s">
            <div class="box-total">
                <h5 class="m-text20 p-b-24">
                    Cart Totals
                </h5>
                <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                        Subtotal:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                        <?php echo "SRP. " . number_format($this->cart->total()) . " /-"; ?> </span>
                </div>
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Total:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                        <?php echo "SRP. " . number_format($this->cart->total()) . " /-"; ?> </span>
                </div>
                <div class="cartBtn">
                    <div class="div"><a href="<?= base_url('orders') ?>" class="btn btn-primary">Continue Shopping</a></div>
                    <div class="div"><a href="<?= base_url('checkout') ?>" class="btn btn-pink">Proceed Checkout</a></div>
                </div>
            </div>
        </div>

    </div>
</div>