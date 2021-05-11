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
                                <h4>New here?</h4>
                                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                                <?php echo $this->session->flashdata('msg'); ?>
                                <form class="pt-3" method="post" action="<?= base_url('register/proses_registrasi') ?>">
                                    <div class="form-group">
                                        <input type="text" name="nip" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="NIP">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="kontak" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Kontak">
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control form-control-lg" name="level">
                                            <option disabled>Level</option>
                                            <option>Pimpinan</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Already have an account? <a href="<?= base_url('login') ?>" class="text-primary">Login</a>
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