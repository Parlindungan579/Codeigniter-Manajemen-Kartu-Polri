<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Manajemen Kartu Polri</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo site_url('js/jquery.js'); ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- captcha refresh code -->
    <script>
        $(document).ready(function() {
            $('.refreshCaptcha').on('click', function() {
                $.get('<?php echo base_url() . '/welcome/refresh'; ?>',
                    function(data) {
                        $('#captImg').html(data);
                    });
            });
        });
    </script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="images2/login.png" class="img-fluid">
                                    </div><br>
                                    <?php echo $this->session->flashdata('pesan') ?>
                                    <form class="user" method="POST" action="<?php echo base_url('welcome/auth') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputUserId" placeholder="User ID" name="user_id">
                                            <?php echo form_error('user_id', '<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
                                            <?php echo form_error('password', '<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="captcha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Captcha" name="captcha">
                                            <?php echo form_error('captcha', '<div class="text-small text-danger"></div>') ?>
                                        </div>
                                        <div class="form-group">
                                            <?php if (isset($captchaImg)) {
                                                echo $captchaImg;
                                            }  ?>
                                        </div>

                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                    </form>
                                    <?php echo $this->session->flashdata("msg"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>