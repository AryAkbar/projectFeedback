<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="icon" type="image/png" href="assets/img/icon.png" />
    <title>Sistem Manajemen Keluhan</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./views/client/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <!-- THEME STYLES-->
    <link href="./views/client/assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body {
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('./views/client/assets/img/blog/3.jpg');
        }

        .cover {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(117, 54, 230, .1);
        }

        .login-content {
            max-width: 400px;
            margin: 100px auto 50px;
        }

        .auth-head-icon {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #5c6bc0;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
        .iboxCust{
            padding-top: 0
            px !important;
            padding-bottom: 25px !important;
            padding-left:  25px !important;
            padding-right:  25px !important;
        }
    </style>
</head>

<body>
    <div class="cover"></div>
    <div class="ibox login-content">
        <div class="text-center">
            <span class="auth-head-icon">👤</span>
            <?php if(isset($_GET['username'])){ echo "<div style='color:red;'> Username atau Password Salah!!! </div>"; }
                if(isset($_GET['check'])){ echo "<div style='color:red;'> Anda Harus Login!!! </div>"; }
             ?>
        </div>
        <form class="ibox-body iboxCust" id="login-form" action="index.php?url=checklogin" method="POST">

            <div class="ibox-body" id="login-form">
            <h4 class="font-strong text-center mb-5">SELAMAT DATANG </h4>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="text" name="username" placeholder="Username">
            </div>
            <div class="form-group mb-4">
                <input class="form-control form-control-line" type="password" name="password" placeholder="Password">
            </div>
            <div class="text-center mb-4">
                <input class="btn btn-primary btn-rounded btn-block" name="login" type="submit" value="LOGIN">
            </div>
        </div>
       <!-- </form> -->
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- CORE PLUGINS-->
    <script src="./views/client/assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="./views/client/assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="./views/client/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./views/client/assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="./views/client/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="./views/client/assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="./views/client/assets/vendors/toastr/toastr.min.js"></script>
    <script src="./views/client/assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="./views/client/assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="./views/client/assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>
</html>