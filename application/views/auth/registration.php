<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>Registration</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?= base_url('Auth/registration'); ?>/index.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Type your ID Card here" value="<?= set_value('nik'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-id-card"></span>
                            </div>
                        </div>
                        <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Type your Full name" value="<?= set_value('fullname') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Type your Nick name" value="<?= set_value('nickname'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <?= form_error('nickname', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- 
                <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div> -->

                <p class="mt-2"><a href="" class="text-center">Forgot Password</a></p>
                <p><a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a></p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>