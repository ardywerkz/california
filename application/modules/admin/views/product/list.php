<div class="row">
    <div class="col-sm-12">
        <div class="card card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">List Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="<?= base_url('admin/product/addProduct/') ?>" class="btn btn-warning" style="margin-bottom: 10px">Add product</a>
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Success !</strong> <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } else if ($this->session->flashdata('error')) {  ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Error !</strong> <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="sort">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search..." id="searchKey" onchange="sendRequest();">
                                <span class="input-group-append">
                                    <a href="<?= base_url('product/'); ?>" class="btn btn-info btn-flat">Reset</a>
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
                            <th>Category name</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Added By</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($product as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->name ?></td>
                                <td><?= $items->product_name ?></td>
                                <td><?= $items->price ?></td>
                                <td><a href="javascript:void(0)" id="imgLarge"><img class="img-product" id="imageresource" src="<?= base_url() . 'assets/upload/' . $items->product_image; ?>"></a></td>
                                <td><?= $items->username ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->date_added)) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a onclick="list_methods.edit(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" data-product="<?= $items->product_name ?>" data-category="<?= $items->category_id ?>" data-price="<?= $items->price ?>" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('admin/product/updateImage/' . $items->id) ?>" class="btn btn-success btn-flat" data-toggle="tooltip" data-placement="top" title="Edit image"><i class="fas fa-image"></i></a>
                                        <a onclick="list_methods.deleteProduct(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete product"></i></a>
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
<!--  Modal image -->
<div class="modal fade" id="imagemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" id="imagepreview" class="img-thumbnail">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--  Modal edit -->
<div class="modal fade" id="update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Product name </label>
                    <input type="text" class="form-control" id="product" placeholder="product title">
                </div>
                <div class="form-group">
                    <label for="name">Product Price </label>
                    <input type="text" class="form-control" id="price" placeholder="product price">
                </div>
                <div class="form-group">
                    <label for="name">Product category </label>
                    <select id="category" class="form-control">
                        <option value="">Select category</option>
                        <?php foreach ($category as $items) : ?>
                            <option value="<?= $items->id ?>"><?= $items->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    $("img").click(function() {
        var img = $(this).attr('src');
        $('#imagepreview').attr('src', img);
        $('#imagemodal').modal('show');
    });

    var list_methods = {
        edit: function(e) {
            var $data = $(e).data();
            $('.modal-title').text('Edit Product Details'); // set title
            var $modal = $('#update').modal(); //call modal
            //display data in field
            $modal.find($('#product').val($data.product));
            $modal.find($('#price').val($data.price));
            $modal.find($('#category option[value=' + $data.category + ']').attr('selected', 'selected'));
            $modal.find('#btnUpdate').on('click', function() {
                $productName = $.trim($modal.find('#product').val());
                $price = $.trim($modal.find('#price').val());
                $category = $.trim($modal.find('#category').val());
                if ($productName == "") {
                    Swal.fire({
                        icon: "warning",
                        text: "Product name required !",
                    });
                    return false;
                }
                if ($category == "") {
                    Swal.fire({
                        icon: "warning",
                        text: "Category name required !",
                    });
                    return false;
                }
                if ($price == "") {
                    Swal.fire({
                        icon: "warning",
                        text: "Price required !",
                    });
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '<?php echo base_url() ?>product/update/details',
                    data: {
                        //insert new update
                        id: $data.id,
                        product_name: $.trim($('#product').val()),
                        price: $.trim($('#price').val()),
                        category_id: $.trim($('#category').val()),
                    }
                }).then(function(data, res, xhr) {
                    if (xhr.status == 200) { //ok
                        $modal.modal('hide');
                        Swal.fire({
                            icon: "success",
                            text: "Successfully update product details ",
                        });
                        setTimeout(function() {
                            location.reload(); // then reload the page
                        }, 1500);
                    }
                }, function(data) {
                    toastr.error(data.responseJSON.message);
                })
            });
        },
        deleteProduct: function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete product ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(result) {
                if (result.value) {
                    var $data = $(e).data();
                    var data = {
                        id: $data.id,
                    }
                    apis.deleteProduct(data).then(function(res) {
                        Swal.fire({
                            icon: "success",
                            text: "Successfully delete product ",
                        });
                        //list_provider.ajax.reload();
                        setTimeout(function() {
                            location.reload(); // then reload the page
                        }, 1300);
                    });

                }
            })
        }
    }
    var sendRequest = function() {
        var searchKey = $('#searchKey').val();
        var limitRows = $('#limitRows').val();
        window.location.href = '<?= base_url('product') ?>?query=' + searchKey + '&limitRows=' + limitRows + '&orderField=' + curOrderField + '&orderDirection=' + curOrderDirection;
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