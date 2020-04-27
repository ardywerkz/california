<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Edit Product Image</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($error)) {
                        print $error;
                    } ?>
                </div>
                <?php echo form_open_multipart('product/saveImage'); ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="img-thumbnail"><img width="200" src="<?php if (!empty($edit)) echo base_url() . 'assets/upload/' . $edit['product_image'] ?>" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Update image</label>
                            <input type="file" class="form-control" name="image" value="<?php if (!empty($edit)) echo base_url() . 'assets/upload/' . $edit['product_image'] ?>" placeholder="Price ..." autocomplete="off" style="padding: 2px 16px;">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?php if (!empty($edit['id'])) echo $edit['id'] ?>" name="id">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?= base_url('product') ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
    </div>