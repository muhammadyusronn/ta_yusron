<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <img src="https://www.bootstrapdash.com/demo/justdo/template/images/logo.svg" alt="logo">
                                </div>
                                <h4>Hello!</h4>
                                <h6 class="font-weight-light">Sign in to continue.</h6>
                                <?php echo $this->session->flashdata('msg'); ?>
                                <form class="pt-3" action="<?= base_url('login-auth') ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control form-control-lg" placeholder="NIP" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                    </div>
                                    <div class="my-2 d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                        </div>
                                        <a href="#" class="auth-link text-black">Forgot password?</a>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Don't have an account? <a href="<?= base_url('register') ?>" class="text-primary">Create</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->