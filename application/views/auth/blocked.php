<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Access Blocked</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper mt-5 ml-5">

        <!-- Content Wrapper. Contains page content -->
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="error-page">
                    <!-- <h2 class="headline text-warning"> 404</h2> -->
                    <h2 class="headline text-warning"> 403</h2>

                    <div class="error-content">
                        <h2><i class="fas fa-exclamation-triangle text-warning"></i> Access Forbidden.</h2>
                        <p>
                            Sorry, You can't access this page,
                            <a href="<?= base_url('Dashboard'); ?>"><br>Return to Dashboard</a>
                        </p>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <footer class="main-footer mt-5">
            <strong class="ml-5">Copyright &copy; 2022 <a href="https://infomedia.co.id"> PT. Infomedia</a>.</strong> All rights reserved.
        </footer> -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/template'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/template'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/template'); ?>/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url('assets/template'); ?>/dist/js/demo.js"></script> -->
</body>

</html>