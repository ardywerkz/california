<div class="row">
    <div class="col-sm-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Add Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="">Category name</label>
                    <input type="text" class="form-control" id="category" placeholder="Enter category">
                </div>
                <button type="submit" class="btn btn-primary" onclick="methods.addCategory();">Submit</button>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-md-8">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category List</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Category name</th>
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($list as $items) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $items->name ?></td>
                                <td><?= date("D, d M g:i:A", strtotime($items->date_added)) ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a onclick="list_methods.edit(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" data-name="<?= $items->name ?>" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a onclick="list_methods.delete(this);" href="javascript:void(0)" data-id="<?= $items->id; ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Account"></i></a>
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
                    <label>Category</label>
                    <input type="text" class="form-control" id="newCat" placeholder="category">
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
            $('.modal-title').text('Edit Category'); // set title
            var $modal = $('#edit').modal(); //call modal
            //display data in field
            $modal.find($('#newCat').val($data.name));

            $modal.find('#btnUpdate').on('click', function() {
                $category = $.trim($modal.find('#newCat').val());
                if ($category == "") {
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
                    url: '<?php echo base_url() ?>update_category',
                    data: {
                        //insert new update
                        id: $data.id,
                        name: $.trim($('#newCat').val()),
                    }
                }).then(function(data, res, xhr) {
                    if (xhr.status == 200) { //ok
                        $modal.modal('hide');
                        Swal.fire({
                            icon: "success",
                            text: "Successfully change category ",
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
        delete: function(e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete category ?",
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
                    apis.deleteCategory(data).then(function(res) {
                        Swal.fire({
                            icon: "success",
                            text: "Successfully delete category ",
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