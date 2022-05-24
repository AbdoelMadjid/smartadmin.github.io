<div class="flash-data" data-flashdata="<?= $this->session->flashdata('myflash'); ?>"></div>
<div class="flash-data-failed" data-flashdatafailed="<?= $this->session->flashdata('myflashfailed'); ?>"></div>
<div class="flash-data-login-failed" data-flashdataloginfailed="<?= $this->session->flashdata('myflashloginfailed'); ?>"></div>

<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1 "><b style="color:firebrick;">Smart</b> Admin</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Login with your Email and Password</p>

            <form action="<?= base_url('Auth'); ?>" method="post">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Type your Email..." , value="<?= set_value('email'); ?>">
                </div>

                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Type your Password...">
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block mb-2">Sign In</button>
                    </div>
                </div>
                <!-- <div class="row"> -->
                <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->
                <!-- /.col -->
            </form>
            <!-- 
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register new member</a>
                </p> -->
        </div>

    </div>

</div>