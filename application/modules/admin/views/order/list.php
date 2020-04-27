<div class="row">
    <div class="col-sm-12">
        <div class="card card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Order List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="sort">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search..." id="searchKey" onchange="sendRequest();">
                                <span class="input-group-append">
                                    <a href="<?= base_url('order/'); ?>" class="btn btn-info btn-flat">Reset</a>
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <select id="limitRows" onchange="sendRequest();" class="form-control">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Product order</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th style="background: #FF5722; color: #fff">Amount</th>
                            <th>Order date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($order as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->full_name ?></td>
                                <td><a href="javascript:void(0)" id="imgLarge"><img class="img-product" id="imageresource" src="<?= base_url() . 'assets/upload/' . $items->product_image; ?>"></a></td>
                                <td><?= $items->product_name ?></td>
                                <td><?= $items->price ?></td>
                                <td><?= $items->qty ?></td>
                                <td style="background: #FF5722; color: #fff"><i class="fas fa-ruble-sign"></i> <?= $items->total_amt ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->date_order)) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?= base_url('admin/order/viewOrder/' . $items->id) ?>" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="View Order"><i class="fas fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                    <div class="loading" style="display: none;">
                        <div class="content"><img src="<?php echo base_url() . 'assets/loading.gif'; ?>" /></div>
                    </div>
                </table>
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>
<script>
    var sendRequest = function() {
        var searchKey = $('#searchKey').val();
        var limitRows = $('#limitRows').val();
        window.location.href = '<?= base_url('order') ?>?query=' + searchKey + '&limitRows=' + limitRows + '&orderField=' + curOrderField + '&orderDirection=' + curOrderDirection;
        $('.loading').show();
    }
    var getNamedParameter = function(key) {
        if (key == undefined) return false;

        var url = window.location.href;
        //console.log(url);
        var path_arr = url.split('?');
        if (path_arr.length === 1) {
            return null;
        }
        path_arr = path_arr[1].split('&');
        path_arr = remove_value(path_arr, "");
        var value = undefined;
        for (var i = 0; i < path_arr.length; i++) {
            var keyValue = path_arr[i].split('=');
            if (keyValue[0] == key) {
                value = keyValue[1];
                break;
            }
        }

        return value;
    };


    var remove_value = function(value, remove) {
        if (value.indexOf(remove) > -1) {
            value.splice(value.indexOf(remove), 1);
            remove_value(value, remove);
        }
        return value;
    };


    var curOrderField, curOrderDirection;
    $('[data-action="sort"]').on('click', function(e) {
        curOrderField = $(this).data('title');
        curOrderDirection = $(this).data('direction');
        sendRequest();
    });


    $('#searchKey').val(decodeURIComponent(getNamedParameter('query') || ""));
    $('#limitRows option[value="' + getNamedParameter('limitRows') + '"]').attr('selected', true);

    var curOrderField = getNamedParameter('orderField') || "";
    var curOrderDirection = getNamedParameter('orderDirection') || "";
    var currentSort = $('[data-action="sort"][data-title="' + getNamedParameter('orderField') + '"]');
    if (curOrderDirection == "ASC") {
        currentSort.attr('data-direction', "DESC").find('i.fa').removeClass('fa-sort-amount-asc').addClass('fa-sort-amount-desc');
    } else {
        currentSort.attr('data-direction', "ASC").find('i.fa').removeClass('fa-sort-amount-desc').addClass('fa-sort-amount-asc');
    }
</script>