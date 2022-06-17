<?php
include 'conect/conect.php';
 if(isset($_POST['email'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "select * from taikhoan where email='$email'";
    $query = mysqli_query($conn,$sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query);
    if($checkEmail ==1){
        $checkPass = $pass;
        if($checkPass==$data['pass']){
            $_SESSION['user'] = $data;
            header('location: index.php');
        }else{
         $tbao="Mật khẩu không tồn tại vui lòng kiểm tra lại";
        }

    }else{
        $thongbao="Email không tồn tại vui lòng kiểm tra lại";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login - User</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../admin/css/loginUser.css">

</head>
<style>
    .thongbao{
        color: red;
        padding-top: 10px;
        padding-left: 10px;
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
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                    <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email...">
                                            <p class="thongbao">
                                            <?php
                                            if (isset($thongbao)&&($thongbao!="")) {
                                                echo $thongbao;
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                            <p class="thongbao">
                                            <?php
                                            if (isset($tbao)&&($tbao!="")) {
                                                echo $tbao;
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input name="dangnhap" type="submit"class="btn btn-primary btn-user btn-block"></input>                                      
                                        <hr>
                                        <a href="#" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="quenmk.php">Quên mật khẩu</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="dangky.php">Đăng kí tài khoản</a>
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