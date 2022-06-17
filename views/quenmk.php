<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "../model/pdo.php";
include "../model/taikhoan.php";
if (isset($_POST['guiemail'])&&($_POST['guiemail'])) {
                   function checkemail($email){
                      $sql="select * from taikhoan where email='".$email."'";
                      $sp=pdo_query_one($sql);
                      return $sp;
                   }
                   $email=$_POST['email'];
                   $checkemail=checkemail($email);
                   if (is_array($checkemail)) {
                      $thongbao="Mật khẩu của bạn là: ".$checkemail['pass'];
                      }else {
                      $thongbao="Email không tồn tại";
                      }
             }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .thongbao{
        color: red;
        padding-top: 10px;
        padding-left: 10px;
        font-size: 20px;
    }
</style>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" name="guiemail">
                                        <h1 class="thongbao">
                                        <?php
                                            if (isset($thongbao)&&($thongbao!="")) {
                                                echo $thongbao;
                                            }
                                        ?>
                                        </h1>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="dangky.php">Đăng ký tài khoản</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="loginUser.php">Đăng nhập</a>
                                    </div>
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