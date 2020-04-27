<div class="row">
    <div class="col-sm-7">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add Admin</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div role="form">
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Username:</label>
                                <input type="text" class="form-control" id="username" placeholder="username ...">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Complete name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="fullname ...">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="password ...">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" onclick="methods.add_admin();">Submit</button>
            </div>
            <!-- /.card-body -->

        </div>
    </div>
    <div class="col-md-12">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title; ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Username</th>
                            <th>Complete Name</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($list as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->username ?></td>
                                <td><?= $items->full_name ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->date_added)) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a onclick="list_methods.changePassword(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" class="btn btn-warning btn-flat" data-toggle="tooltip" data-placement="top" title="Change Password"><i class="fas fa-unlock"></i></a>
                                        <a onclick="list_methods.deleteAccount(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Account"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!--  Modal change password -->
<div class="modal fade" id="updatePassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>New password :</label>
                    <input type="password" class="form-control" id="newpass" placeholder="New password">
                </div>
                <div class="form-group">
                    <label>Confirm password :</label>
                    <input type="password" class="form-control" id="cpass" placeholder="Confirm password">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnPassword">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    var list_methods = {
        changePassword: function(e) {
            var $data = $(e).data();
            $('.modal-title').text('Change Password'); // set title
            var $modal = $('#updatePassword').modal(); //call modal

            $modal.find('#btnPassword').on('click', function() {
                $pass = $.trim($modal.find('#newpass').val());
                $cpass = $.trim($modal.find('#cpass').val());

                if ($pass == "" || $cpass == "") {
                    toastr.error('Required fields');
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                    return false;
                }
                if ($pass !== $cpass || !($pass + $cpass)) {
                    toastr.error('Password confirmation does not match with new password!');
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                    return false;
                }
                $modal.find('#btnPassword').html('saving...').addClass('disabled');
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>update_password',
                    data: {
                        id: $.trim($data.id),
                        password: $pass
                    }
                }).always(function(data, res, xhr) {
                    $modal.find('#btnPassword').html('save').removeClass('disabled');
                    if (xhr.status == 200) {
                        $modal.modal('hide');
                        $modal.find('#newPassowrd').val(' ');
                        $modal.find('#cPassword').val(' ');
                        Swal.fire({
                            icon: "success",
                            text: "Successfully change password ",
                        });
                        setTimeout(function() {
                            location.reload(); // then reload the page
                        }, 1500);
                    }

                });
            });
        },
        deleteAccount: function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete account ?",
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
                    apis.deleteAdmin(data).then(function(res) {
                        Swal.fire({
                            icon: "success",
                            text: "Successfully delete account ",
                        });
                        //list_provider.ajax.reload();
                        setTimeout(function() {
                            location.reload(); // then reload the page
                        }, 1300);
                    });

                }
            })
        },
    }
</script>