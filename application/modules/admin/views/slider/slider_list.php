<?php $this->load->view('slider/add_slider') ?>
<div class="col-md-12">
    <!-- Default box -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Slider list</h3>
        </div>
        <div class="card-body">
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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Image slider</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($slider as $items) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $items->title ?></td>
                            <td><a href="javascript:void(0)" id="imgLarge"><img class="img-slider" id="imageresource" src="<?= base_url() . 'assets/upload/slider/' . $items->slider_image; ?>"></a></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?= base_url('admin/setting/editSLider/' . $items->id) ?>" class="btn btn-primary btn-flat" data-toggle="tooltip" data-placement="top" title="Edit slider"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('admin/setting/deleteSlider/' . $items->id) ?>" class="btn btn-danger btn-flat"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Delete slider"></i></a>
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
<script>
    $("img").click(function() {
        var img = $(this).attr('src');
        $('#imagepreview').attr('src', img); // here asign the image to the modal when the user click the enlarge link
        $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
    });
</script>