<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Add Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($error)) {
                        print $error;
                    } ?>
                </div>
                <?php echo form_open_multipart('product/add'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name ..." autocomplete="off" value="<?= set_value('product_name'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="">Select category</option>
                                <?php foreach ($category as $items) : ?>
                                    <option value="<?= $items->id ?>"><?= $items->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price ..." autocomplete="off" value="<?= set_value('price'); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Product image</label>
                            <input type="file" class="form-control" id="file" name="product_image" placeholder="Price ..." autocomplete="off" style="padding: 2px 16px;">
                            <!-- <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="file" id="file">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= base_url('product') ?>" class="btn btn-warning">Back</a>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div> <!-- /.end row-->