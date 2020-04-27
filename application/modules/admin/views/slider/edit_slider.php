<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Edit slider</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($error)) {
                        print $error;
                    } ?>
                </div>
                <?php echo form_open_multipart('saveSlider'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Title ..." autocomplete="off" readonly value="<?php if (!empty($edit)) echo $edit['title'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Slider image</label>
                            <input type="file" class="form-control" name="slider_image" value="<?php if (!empty($edit)) echo $edit['slider_image'] ?>" placeholder="Price ..." autocomplete="off" style="padding: 2px 16px;">
                        </div>
                    </div>
                </div>
                <input type="hidden" value="<?php if (!empty($edit['id'])) echo $edit['id'] ?>" name="id">
                <button type="submit" class="btn btn-primary">update</button>
                </form>
            </div>
            <!-- /.card-body -->

        </div>
    </div>