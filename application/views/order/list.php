<div class="container tab-order">
    <?php $this->load->view('component/message'); ?>
    <div class="row">
        <?php
        $tab_query  = $this->db->query('SELECT * FROM category ORDER BY id ASC')->result();

        $tab_menu = '';
        $tab_content = '';
        $i = 0;
        foreach ($tab_query as $row) :

            if ($i == 0) {
                $tab_menu .= '<a class="nav-link active" id="v-tab' . $row->id . '-tab" data-toggle="pill" href="#tab' . $row->id . '" role="tab" aria-controls="tab' . $row->id . '" aria-selected="true">' . $row->name . '</a>';
                $tab_content .= '<div class="tab-pane img-order fade show active" id="tab' . $row->id . '" role="tabpanel" aria-labelledby="v-tab' . $row->id . '-tab">  <ul class="list">';
            } else {
                $tab_menu .= '<a class="nav-link" id="v-tab' . $row->id . '-tab" data-toggle="pill" href="#tab' . $row->id . '" role="tab" aria-controls="tab' . $row->id . '" aria-selected="true">' . $row->name . '</a>';
                $tab_content .= '<div class="tab-pane fade img-order" id="tab' . $row->id . '" role="tabpanel" aria-labelledby="v-tab' . $row->id . '-tab"> <ul class="list">';
            }
            $product_query = $this->db->query('SELECT * FROM product WHERE category_id="' . $row->id . '" ORDER BY created_at DESC')->result();
            // echo '<pre>';
            // print_r($product_query);
            foreach ($product_query as $sub) :
                $tab_content .= '
                        <li data-scrollreveal="enter top over 3s after 0.5s">
                            <img src="' . base_url() . 'assets/upload/' . $sub->product_image . '" class="img-list">
                            <div class="link-order">
                                <div class="div">
                                    <div class="sub">
                                        <h5>' . $sub->product_name . '</h5>
                                        <span>PHP ' . $sub->price . '</span>
                                    </div>
                                    <form method="post" action="' . base_url('add-to-cart') . '">
                                    <input type="hidden" name="id" value="' . $sub->id . '" >
                                    <div class="sub">
                                         <button type="submit" class="tab_cart" data-uname=' . $this->session->userdata('username') . '><i class="fas fa-cart-plus fa-order"></i></button>
                                    </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </li>
                        
                ';
        ?>
        <?php
                $i++;
            endforeach;
            $tab_content .= '</ul></div>';
        endforeach; ?>
        <div class="col-md-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <?php echo $tab_menu; ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content" id="v-pills-tabContent">
                <?php echo $tab_content; ?>

            </div>
        </div>
    </div>
</div>

<script>
    $(".sub button").on("click", function() {
        var dataId = $(this).attr("data-uname");
        if (dataId == "") {
            $('.tab_cart').prop('disabled', true);
            Swal.fire({
                icon: 'error',
                title: 'Required...',
                text: 'Please login your account !',
            })
        } else {
            $('.tab_cart').prop('disabled', false);
        }
    });
</script>