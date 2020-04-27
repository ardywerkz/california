<div class="signup-main flex">
    <div class="col-sm-6">
        <div class="card box-body">
            <h2 data-scrollreveal="enter top after 0.5s"> Login</h2>
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
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                </div>
                <?php echo form_open_multipart('account/login/'); ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group" data-scrollreveal="enter right after 0.5s">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" placeholder="Enter username" name="username">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group" data-scrollreveal="enter left after 0.5s">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" placeholder="Enter password" name="password">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-account">Login</button>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>