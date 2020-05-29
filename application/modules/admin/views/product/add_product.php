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
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name ..." autocomplete="off" value="<?= set_value('product_name'); ?>">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Product Category</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="">Select category</option>
                                <?php foreach ($category as $items) : ?>
                                    <option value="<?= $items->id ?>"><?= $items->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Store Category</label>
                            <select id="store_id" name="store_id" class="form-control">
                                <option value="">Select category</option>
                                <?php foreach ($store as $items) : ?>
                                    <option value="<?= $items->id ?>"><?= $items->store_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Best selling product (optional)</label>
                            <select id="selling" name="selling" class="form-control">
                                <option value="">Select category</option>
                                <option value="1">Publish</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price ..." autocomplete="off" value="<?= set_value('price'); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Product image</label>
                            <input type="file" class="form-control" id="file" name="product_image" placeholder="Price ..." autocomplete="off" style="padding: 2px 16px;">
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