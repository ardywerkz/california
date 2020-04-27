<div class="container mb-4 viewCart">
    <?php $this->load->view('component/message'); ?>
    <div class="row">
        <div class="col-8" data-scrollreveal="enter right after 0.5s">
            <div class="table-responsive">
                <?php echo form_open_multipart('add-to-cart'); ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product name</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
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
                                    <input class="form-control" type="text" value="<?= $items['qty'] ?>" />
                                </td>

                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- total -->
        <div class="col-4" data-scrollreveal="enter left after 0.5s">
            <div class="box-total">
                <h5 class="m-text20 p-b-24">
                    Order
                </h5>
                <div class="flex-w flex-sb-m p-b-12">
                    <span class="s-text18 w-size19 w-full-sm">
                        Subtotal:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                        <?php echo "SRP. " . number_format($this->cart->total()) . ""; ?> </span>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('place-order'); ?>
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Total:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                        <?php echo "SRP. " . number_format($this->cart->total()) . " "; ?> </span>
                </div>
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Delivery Address:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm effect1 w-size9">
                        <textarea type="text" name="delivery_address" cols="5" rows="5" required="required" class="form-control"></textarea>
                    </span>
                </div>
                <div class="cartBtn">
                    <div class="div"><button type="submit" class="btn btn-pink">Place Order</button></div>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>