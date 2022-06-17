<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="../views/css/editPass.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i"
        rel="stylesheet" type="text/css" media="all">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
    ?>
    <div class="wrapper">
        <div class="wrapper_inner">
            <div class="vertical_wrap">
                <div class="backdrop"></div>
                <div class="vertical_bar">
                    <div class="profile_info">
                        
                        <p class="title">Xin chào <?=$hoten?></p>
                        <p class="sub_title"><?=$email?></p>
                    </div>
                    <ul class="menu">
                        <li><a href="index.php?act=profile" >
                                <span class="icon"><i class="fas fa-address-card"></i></span>
                                <span class="text">Thông tin</span>
                            </a></li>
                        <li><a href="index.php?act=editPass" class="active">
                                <span class="icon"><i class="fas fa-exchange-alt"></i></span>
                                <span class="text">Đổi mật khẩu</span>
                            </a></li>
                        <li><a href="../admin/index.php">
                                <span class="icon"><i class="fas fa-sign-in-alt"></i></span>
                                <span class="text">Đăng nhập admin</span>
                            </a></li>
                        <li><a href="../views/logOut.php">
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
                        <span> Đổi mật khẩu</span>
                    </div>
                </div>

                <div class="container">
                    <div class="content">
                        <div class="item">
                            <div class="form">
                                <input type="text" name="maSP" required />
                                <label for="text2" class="label-name">
<span class="content-name">
                                       Mật khẩu cũ
                                    </span>
                                </label> <br>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form">
                                <input type="text" name="maSP" required />
                                <label for="text2" class="label-name">
                                    <span class="content-name">
                                        Mật khẩu mới
                                    </span>
                                </label> <br>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form">
                                <input type="text" name="maSP" required />
                                <label for="text2" class="label-name">
                                    <span class="content-name">
                                        Nhập lại mật khẩu mới
                                    </span>
                                </label> <br>
                            </div>
                        </div>
                        <div class="submit">
                            <button type="submit" name="them">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Thay đổi
                            </button>
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