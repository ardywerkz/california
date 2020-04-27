<div class="container viewCart">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4>Checkout History</h4>
            <ul class="timeline" data-scrollreveal="enter left after 0.5s">
                <?php foreach ($history as $item) : ?>
                    <?php
                    $id = $this->session->userdata('user_id');
                    $order = $this->db->get_where('orders', array('user_id' => $id))->row_array();
                    ?>

                    <li>
                        <a href="javascript:void(0)"><?= $item->product_name ?></a>
                        <a href="javascript:void(0)" class="float-right"><?= date("D, d M Y", strtotime($order['date_added'])) ?></a>
                        <div class="h-res">
                            <div class="div">
                                <img src="<?= base_url() . 'assets/upload/' . $item->product_image ?>" width="100">
                            </div>
                            <div class="div">
                                <strong>Delivery address : <span><?= $order['delivery_address'] ?></span></strong>
                                <strong>Total amount : <span><?= $order['total_amt'] ?></span></strong>
                                <strong>Date order : <span><?= date("D, d M Y", strtotime($order['date_added'])) ?></span></strong>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>