<div class="row">
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title; ?></h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="sort">
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Search..." id="searchKey" onchange="sendRequest();">
                                <span class="input-group-append">
                                    <a href="<?= base_url('users/'); ?>" class="btn btn-info btn-flat">Reset</a>
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
                            <th>#</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone No.</th>
                            <th>IP</th>
                            <th>Register Date</th>
                            <th>Last Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($user as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->username ?></td>
                                <td><?= $items->fname ?><?= $items->lname ?></td>
                                <td><?= $items->email ?></td>
                                <td><?php
                                    $text = $items->address;
                                    if (strlen($text) > 10) {
                                        $str = substr($text, 0, 9) . '...';
                                        echo $str;
                                    }
                                    ?></td>
                                <td><?= $items->contact_no ?></td>
                                <td><?= $items->register_ip ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->register_date)) ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->last_login)) ?></td>
                                <td>
                                    <div class="btn-group btn-sm">
                                        <a href="<?= base_url('admin/users/viewInfo/' . $items->id) ?>" data-id="<?= $items->id; ?>" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="View info"><i class="fas fa-eye"></i></a>
                                        <a onclick="list_methods.delete(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete user"></i></a>
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
            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    var list_methods = {
        delete: function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete user ?",
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
                    apis.deleteUser(data).then(function(res) {
                        Swal.fire({
                            icon: "success",
                            text: "Successfully delete user ",
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
        window.location.href = '<?= base_url('users') ?>?query=' + searchKey + '&limitRows=' + limitRows + '&orderField=' + curOrderField + '&orderDirection=' + curOrderDirection;
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