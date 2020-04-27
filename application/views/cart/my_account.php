<div class="container viewCart">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h4>My Account</h4>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url() ?>front/vendor/img/img-profile.png" class="img-circle" alt="">
                        </div>
                        <div class="col-md-8" data-scrollreveal="enter left after 0.5s">
                            <h3><?= $profile['fname'] ?><?= $profile['lname'] ?></h3>
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Username : </td>
                                        <td><?= $profile['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email Address :</td>
                                        <td><?= $profile['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td><?= $profile['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number:</td>
                                        <td><?= $profile['contact_no'] ?></td>
                                    </tr>

                                    <tr>
                                        <td>Register Date</td>
                                        <td><?= $profile['register_date'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted text-right">
                    <a onclick="list_methods.edit(this)" href="javascript:void(0)" class="btn btn-outline-success" data-id="<?= $profile['id'] ?>" data-username="<?= $profile['username'] ?>" data-email="<?= $profile['email'] ?>" data-address="<?= $profile['address'] ?>" data-number="<?= $profile['contact_no'] ?>">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Modal update -->
<div class="modal fade" id="edit">
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
                    <label>Username</label>
                    <input type="text" class="form-control" id="username" placeholder="username">
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="address" placeholder="address">
                </div>
                <div class="form-group">
                    <label>Contact Number</label>
                    <input type="text" class="form-control" id="number" placeholder="contact number">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
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
    var list_methods = {
        edit: function(e) {
            var $data = $(e).data();

            $('.modal-title').text('Edit Profile'); // set title
            var $modal = $('#edit').modal(); //call modal
            //display data in field
            $modal.find($('#username').val($data.username));
            $modal.find($('#email').val($data.email));
            $modal.find($('#address').val($data.address));
            $modal.find($('#number').val($data.number));

            $modal.find('#btnUpdate').on('click', function() {
                $username = $.trim($modal.find('#username').val());
                $email = $.trim($modal.find('#email').val());
                $address = $.trim($modal.find('#address').val());
                $number = $.trim($modal.find('#number').val());

                if ($username == "" || $email == "" || $address == "" || $number == "") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Required field',
                    })
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '<?php echo base_url() ?>profile/update',
                    data: {
                        //insert new update
                        id: $data.id,
                        username: $.trim($('#username').val()),
                        email: $.trim($('#email').val()),
                        address: $.trim($('#address').val()),
                        contact_no: $.trim($('#number').val()),
                    }
                }).then(function(data, res, xhr) {
                    if (xhr.status == 200) { //ok
                        $modal.modal('hide');
                        Swal.fire({
                            icon: "success",
                            text: "Successfully update profile ",
                        });
                        setTimeout(function() {
                            location.reload(); // then reload the page
                        }, 1000);
                    }
                }, function(data) {
                    toastr.error(data.responseJSON.message);
                })
            });
        },
    }
</script>