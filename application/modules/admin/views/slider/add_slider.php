<div class="row">
    <div class="col-sm-7">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Add slider</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($error)) {
                        print $error;
                    } ?>
                </div>
                <?php echo form_open_multipart('setting'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title ..." autocomplete="off" value="<?= set_value('title'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Slider image</label>
                            <input type="file" class="form-control" name="slider_image" placeholder="Price ..." autocomplete="off" style="padding: 2px 16px;">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
    </div>