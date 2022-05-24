<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>

<body class="hold-transition register-page">
    <!-- <div class="register-box"> -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1 text-primary"><i class="fas fa-user-tie pr-2"></i><b>User Registration</b></a>
        </div>
        <div class="card-body">
            <!-- <p class="login-box-msg">Register a new user</p> -->

            <form action="<?= base_url('AddUser/registration_save'); ?>" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-id-card"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Type your ID Card here" value="<?= set_value('nik'); ?>">
                    <!-- <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    <?php if (form_error('nik')) : ?>
                        <div class="col text-danger"><?= form_error('nik'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Type your Full name" value="<?= set_value('fullname') ?>">
                    <!-- <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    <?php if (form_error('fullname')) : ?>
                        <div class="col text-danger"><?= form_error('fullname'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Type your Nick name" value="<?= set_value('nickname'); ?>">
                    <!-- <?= form_error('nickname', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    <?php if (form_error('nickname')) : ?>
                        <div class="col text-danger"><?= form_error('nickname'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                    <!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    <?php if (form_error('email')) : ?>
                        <div class="col text-danger"><?= form_error('email'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <!-- <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    <?php if (form_error('password')) : ?>
                        <div class="col text-danger"><?= form_error('password'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Retype password">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <label class="input-group-text" for="validatedInputGroupSelect"><i class="fas fa-user-lock"></i></label>
                    </div>

                    <select class="custom-select" id="validatedInputGroupSelect" name="validatedInputGroupSelect">
                        <option value="">Choose User Role...</option>
                        <?php
                        $queryUserRole = "SELECT id_role, role from user_role";
                        $getUserRole = $this->db->query($queryUserRole)->result_array();
                        ?>
                        <?php foreach ($getUserRole as $userRoleOpt) : ?>
                            <option value="<?= $userRoleOpt['id_role']; ?>">
                                <?= $userRoleOpt['role']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <!-- <?= form_error('validatedInputGroupSelect', '<small class="text-danger">', '</small>', '<br>'); ?> -->
                    <?php if (form_error('validatedInputGroupSelect')) : ?>
                        <div class="col text-danger"><?= form_error('validatedInputGroupSelect'); ?></div>
                    <?php endif; ?>
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
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-pencil-alt pr-2"></i>Register</button>
                    </div>
                    <div class="col-2">
                        <a href="<?= base_url(); ?>AddUser" class="btn btn-primary"><i class="fas fa-arrow-circle-left pr-1"></i>Back</a>
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
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- </div> -->