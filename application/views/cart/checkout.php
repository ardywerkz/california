<div class="container mb-4 viewCart">
    <?php $this->load->view('component/message'); ?>
    <div class="row">
        <div class="col-8" data-scrollreveal="enter right after 0.5s">
            <div class="table-responsive">
                <?php echo form_open_multipart('cart/update'); ?>
                <div class="row">
                    <?php $i = 0;
                    foreach ($cart as $items) : ?>
                        <div class="col-md-4">
                            <img class="view-cart-img" src="<?= base_url() . 'assets/upload/' . $items['product_image'] ?>" />
                        </div>
                        <div class="col-md-8">
                            <div class="v-cart-d">
                                <div class="title">
                                    <h2><?= $items['name'] ?></h2>
                                    <h2 class="price">₱ <?= $items['price'] ?></h2>
                                </div>
                                <div class="gty">

                                    <div class="input-group">
                                        <input class="" type="hidden" name="<?php echo "cart[$i][rowid]" ?>" value="<?php echo $items['rowid']; ?>">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-number" data-type="minus" data-field="<?php echo "cart[$i][qty]" ?>">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control input-number" name="<?php echo "cart[$i][qty]" ?>" value="<?= $items['qty'] ?>" min="1" max="100">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-number" data-type="plus" data-field="<?php echo "cart[$i][qty]" ?>">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach; ?>
                </div>
                </form>
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
                        <?php echo "₱ " . number_format($this->cart->total()) . ""; ?> </span>
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open_multipart('place-order'); ?>
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Total:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm">
                        <?php echo "₱ " . number_format($this->cart->total()) . " "; ?> </span>
                </div>
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Delivery Address:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm w-size9">
                        <textarea type="text" name="delivery_address" cols="5" rows="3" required="required" class="form-control" placeholder="Complete Address"></textarea>
                    </span>
                    <span class="m-text22 w-size19 w-full-sm">
                        Nearest Landmark:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm w-size9">
                        <input type="text" name="land_mark" class="form-control" required="required" placeholder="Easy tracking of location">
                    </span>
                    <span class="m-text22 w-size19 w-full-sm">
                        Complete Name:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm w-size9">
                        <input type="text" name="full_name" class="form-control" required="required" placeholder="Complete Name">
                    </span>
                    <span class="m-text22 w-size19 w-full-sm">
                        Contact Information:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm w-size9">
                        <input type="text" name="mobile_number" class="form-control" required="required" placeholder="Mobile Phone Number">
                    </span>
                    <span class="m-text22 w-size19 w-full-sm">
                        City:
                    </span>
                    <span class="m-text21 w-size20 w-full-sm w-size9">
                        <input type="text" name="city" class="form-control" required="required" placeholder="City">
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