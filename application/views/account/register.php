<div class="signup-main flex">
    <div class="col-sm-6">
        <div class="card box-body">
            <h2 data-scrollreveal="enter top after 0.5s"> Sign up</h2>
            <div class="card-body ">
                <div class="ci-error">
                    <?php echo validation_errors(); ?>
                </div>
                <form action="<?= site_url('account/register') ?>" method="POST">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter right after 0.5s">
                                        <label>Username:</label>
                                        <input type="text" class="form-control" placeholder="Enter username" name="username">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter left after 0.5s">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter right after 0.5s">
                                        <label>Email:</label>
                                        <input type="text" class="form-control" placeholder="Enter email" name="email">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter left after 0.5s">
                                        <label>Firstname:</label>
                                        <input type="text" class="form-control" placeholder="Enter firstname" name="fname">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter right after 0.5s">
                                        <label>Lastname:</label>
                                        <input type="text" class="form-control" placeholder="Enter lastname" name="lname">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter left after 0.5s">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" placeholder="Enter address" name="address">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group" data-scrollreveal="enter right after 0.5s">
                                        <label>Contact Number:</label>
                                        <input type="text" class="form-control" placeholder="Enter contact number" name="contact_no">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-account">Register</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>