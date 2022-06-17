<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../views/css/profile.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i"
        rel="stylesheet" type="text/css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="wrapper">
        <div class="wrapper_inner">
            <div class="vertical_wrap">
                <div class="backdrop"></div>
                <?php
                if(isset($_SESSION['user'])){
                    extract($_SESSION['user']);
                    $user=$_SESSION['user']['user'];
                    $hoten=$_SESSION['user']['hoten'];
                    $email=$_SESSION['user']['email'];
                    $dress=$_SESSION['user']['dress'];
                    $tell=$_SESSION['user']['tell'];
                }else{
                    
                }
                ?>
                <div class="vertical_bar">
                    <div class="profile_info">
                        <!-- <div class="img_holder">
                            <img src="../views/imgTaiNguyen/thaoCho.jpg" alt="Picture user">
                        </div> -->
                        <p class="title">Xin chào <br><?=$hoten?></p>
                        <p class="sub_title"><?=$email?></p>
                    </div>
                    <ul class="menu">
                        <li><a href="#" class="active">
                                <span class="icon"><i class="fas fa-address-card"></i></span>
                                <span class="text">Thông tin</span>
                            </a></li>
                        <li><a href="index.php?act=editPass">
                                <span class="icon"><i class="fas fa-exchange-alt"></i></span>
                                <span class="text">Đổi mật khẩu</span>
                            </a></li>
                            <?php if ($vaitro==1){ ?>
                        <li><a href="../admin/index.php">
                                <span class="icon"><i class="fas fa-user-lock"></i></span>
                                <span class="text">Đăng nhập admin</span>
                            </a></li>
                            <?php }?>
                        <li><a href="index.php?act=mybill">
                            <span class="icon"><i class="far fa-list-alt"></i></span>
                            <span class="text">Hóa đơn của tôi</span>
                        </a></li>
                        <li><a href="logOut.php">
                                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                                <span class="text">Đăng xuất</span>
                            </a></li>
                        
                    </ul>
                </div>
                <!-- end vertical_bar -->
            </div>
            <!-- end vertical_wrap -->
            <div class="main_container">
                <div class="top_bar">
                    <div class="hamburger">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="logo">
                        <span> Thông tin Tài khoản</span>
                    </div>
                </div>

                <div class="container">
                    <div class="content">
                        <div class="item">
                            <h3>Tên tài khoản</h3> 
                            <br><?=$user?><br>
                            <a href="index.php?act=edit_name">Thay đổi</a>
                        </div>
                        <div class="item">
                            <h3>Họ Tên</h3>
                            <br><?=$hoten?>
                        </div>
                        <div class="item">
                            <h3>Email</h3>
                            <br><?=$email?>
                        </div>
                        <div class="item">
                            <h3>Địa chỉ</h3>
                            <br><?=$dress?><br>
                            <a href="index.php?act=edit_dress">Thay đổi</a>
                        </div>
                        <div class="item">
                            <h3>Số điện thoại</h3>
                            <br><?=$tell?><br>
                            <a href="index.php?act=edit_phone">Thay đổi</a>
                        </div>
                    </div>
                </div>
                <!-- end container -->
            </div>
            <!-- end main_container -->
        </div>
        <!-- end wrapper_inner -->
    </div>
    <!-- end wrapper -->

    <script>
        var hamburger = document.querySelector(".hamburger");
        var wrapper = document.querySelector(".wrapper");
        var backdrop = document.querySelector(".backdrop");

        hamburger.addEventListener("click", function () {
            wrapper.classList.add("active");
        })

        backdrop.addEventListener("click", function () {
            wrapper.classList.remove("active");
        })
    </script>
</body>

</html>