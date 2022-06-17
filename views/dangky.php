<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    include "../model/pdo.php";
    include "../model/taikhoan.php";
    if (isset($_POST['dangky']) && ($_POST['dangky']) > 0) {
        $errorMessage = array();
        $loi = array();
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $hoten = $_POST['hoten'];
        $email = $_POST['email'];
        $dress = $_POST['dress'];
        $tell = $_POST['tell'];

        $errorMessage = array();
        $loi = array();
        $loi['user'] = isset($_POST['user']) ? $_POST['user'] : '';
        $loi['pass'] = isset($_POST['pass']) ? $_POST['pass'] : '';
        $loi['hoten'] = isset($_POST['hoten']) ? $_POST['hoten'] : '';
        $loi['email'] = isset($_POST['email']) ? $_POST['email'] : '';
        $loi['dress'] = isset($_POST['dress']) ? $_POST['dress'] : '';
        $loi['tell'] = isset($_POST['tell']) ? $_POST['tell'] : '';
        if ($loi['user'] == '') {
            $errorMessage['user'] = 'Vui lòng nhập tên tài khoản';
        } else if ($loi['pass'] == '') {
            $errorMessage['pass'] = 'Vui lòng nhập mật khẩu';
        } else if ($loi['hoten'] == '') {
            $errorMessage['hoten'] = 'Vui lòng nhập họ tên';
        } else if ($loi['email'] == '') {
            $errorMessage['email'] = 'Vui lòng nhập email';
        } else if ($loi['dress'] == '') {
            $errorMessage['dress'] = 'Vui lòng nhập địa chỉ';
        } else if ($loi['tell'] == '') {
            $errorMessage['tell'] = 'Vui lòng nhập số điện thoại';
        } else {
            $sql = "insert into taikhoan(user,pass,hoten,email,dress,tell) values('$user','$pass','$hoten','$email','$dress','$tell')";
            pdo_execute($sql);
            $thongbao = "Đăng kí tài khoản thành công. HBạn hãy vui lòng kiểm tra thư";




            $subject = 'Thông tin tài khoản';
            $headers = "From:minhdung25k@gmail.com \r\n";
            // $headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
            $headers .= "Cc:minhdung25k@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = '<p style="color: red;"<strong>Mật khẩu:'.$pass.'<a href="http://localhost:8080/duan1/views/loginUser.php">Đăng nhập</a></strong>.</p>';

            mail($email, $subject, $message, $headers);
        }
    }


    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> - Sign Up</title>

    <!-- Custom fonts for this template-->
    <link href="../admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style>
    .errorMessage {
        color: red;
        padding-top: 10px;
        padding-left: 10px;
    }

    .thongbao {
        color: #4ea3d8;;
        padding-top: 10px;
        padding-left: 10px;
        font-size: 20px;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="user" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Tên tài khoản">
                                        <p class="errorMessage">
                                            <?php echo isset($errorMessage['user']) ? $errorMessage['user'] : ''; ?>
                                        </p>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="pass" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                        <p class="errorMessage">
                                            <?php echo isset($errorMessage['pass']) ? $errorMessage['pass'] : ''; ?>
                                        </p>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input name="hoten" type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Họ và tên">
                                    <p class="errorMessage">
                                        <?php echo isset($errorMessage['hoten']) ? $errorMessage['hoten'] : ''; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                                    <p class="errorMessage">
                                        <?php echo isset($errorMessage['email']) ? $errorMessage['email'] : ''; ?>
                                    </p>
                                </div>
                                <div class="form-group">
                                    <input name="dress" type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Địa chỉ">
                                    <p class="errorMessage">
                                        <?php echo isset($errorMessage['dress']) ? $errorMessage['dress'] : ''; ?>
                                    </p>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input name="tell" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Số điện thoại">
                                        <p class="errorMessage">
                                            <?php echo isset($errorMessage['tell']) ? $errorMessage['tell'] : ''; ?>
                                        </p>
                                    </div>
                                </div>
                                <input name="dangky" type="submit" class="btn btn-primary btn-user btn-block"></input>
                                <h1 class="thongbao">
                                    <?php
                                    if (isset($thongbao) && ($thongbao != "")) {
                                        echo $thongbao;
                                    }
                                    ?>
                                </h1>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="quenmk.php">Quên mật khẩu</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>