<?php 
include 'conect/conect.php';
$user = (isset($_SESSION['user'])) ? $_SESSION['user']: [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIDIHAT</title>
    <link rel="stylesheet" href="../views/css/header.css">
    <link rel="stylesheet" href="../views/css/home.css">
    <link rel="stylesheet" href="../views/css/footer.css">
    <!-- <link rel="stylesheet" href="../views/css/sanPham.css"> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <!-- <script src="./abc.js"></script> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i"
        rel="stylesheet" type="text/css" media="all">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <div class="content_head">
            <div class="logo">
                <p>
                    <strong>
                        <span>T</span>
                        <span>I</span>
                        <span>D</span>
                        <span>I</span>
                        <span>H</span>
                        <span>A</span>
                        <span>T</span> 
                    </strong>
                </p>
            </div>
            <!-- end logo -->
            <div class="menu_head">
                <nav>
                    <ul class="container">
                        <li><a href='index.php'> <i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                        <li class='dropdown'>
                            <a href='index.php?act=sanpham'>Sản phẩm <i class="fa fa-angle-down"></i></a>
                            <div class='mega-menu'>
                                <div class="container">
                                    <div class="item">
                                        <h3>Danh mục</h3>
                                        <!-- <ul> -->
                                            <?php 
                                            $dsdm=loadall_danhmuc();
                                            foreach ($dsdm as $dm) {
                                                extract($dm);
                                                $linkdm="index.php?act=sanpham&iddm=".$id;
                                                echo ' <ul><li><a href="'.$linkdm.'">'.$name.'</a></li> </ul>';
                                            }  ?>
                                            <!-- <li><a href='#'>Danh mục 1</a></li>
                                            <li><a href='#'>Danh mục 2</a></li>
                                            <li><a href='#'>Danh mục 3</a></li>
                                            <li><a href='#'>Danh mục 4</a></li> -->
                                        <!-- </ul> -->
                                    </div> <!-- /.item -->
                                    <div class="item">
                                        <h3>Top sản phẩm</h3>
                                        <ul>
                                            <li><a href='index.php'>Sản phẩm mới nhất</a></li>
                                            <li><a href='index.php'>Sản phẩm nổi bật</a></li>
                                            <!-- <li><a href='#'>Sản phẩm xịn</a></li> -->
                                        </ul>
                                    </div> <!-- /.item -->
                                </div><!-- /.container -->
                            </div><!-- /.mega-menu -->
                        </li><!-- /.dropdown -->


                        <li><a href='index.php?act=lienhe'>Liên hệ</a></li>
                        <li><a href='index.php?act=gioithieu'>Giới thiệu</a></li>
                        <li><a href='index.php?act=tintuc'>Tin tức</a></li>
                    </ul>
                    <!-- .container -->
                </nav>

            </div>
            <!-- end menu -->

            <div class="right_head">
                <!-- <div class="abc search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> -->
                <div class="abc search">
                <!-- <form action="index.php?act=sanpham" method="post">  -->
                    <!-- <input type="submit" name="timkiem"> -->
                    <!-- <i class='bx bx-search' name="timkiem"> </i>
                    <input type="text" class="hide" placeholder="Tìm kiếm ..." name="kyw">
                    </form>-->
                    <div class="search-box">
                        
                        <form action="index.php?act=sanpham" method="post">
                        <input type="text" placeholder="Search" class="input" name="kyw">
                        <div class="xyz">
                            <i class="fa fa-search" aria-hidden="true" name="timkiem" ></i>
                        </div>
                        </form>
                        <?php
                        if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                            $kyw=$_POST['kyw'];
                        }else{
                            $kyw="";
                        }
                        if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                            $iddm=$_GET['iddm'];
                        }else{
                            $iddm=0;
                        }
                        $dssp=loadall_sanpham($kyw,$iddm);
                                    $tendm=load_ten_dm($iddm);
                        ?>
                    </div>
                </div>
                <script>
                    $(".xyz").click(function () {
                        $(".input").toggleClass("active").focus;
                        $(this).toggleClass("animate");
                        $(".input").val("");
                    });
                </script>   
                <?php if(isset($user['email'])){?> 
                <div class="abc profile">
                    <ul>
                        <li><a href="index.php?act=profile"> <i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
                <div class="abc shop_cart">
                    <ul>
                        <li><a href="index.php?act=viewcart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
                    </ul>
                </div>
                <div class="abc login">
                    <ul>
                        <li>
                            <a href="logOut.php">
                            <ion-icon name="log-out-outline"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>  
                <?php }else{?>  
                    <div class="abc shop_cart">
                    <ul>
                        <li><a href="index.php?act=viewcart"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
                    </ul>
                </div>
                <div class="abc login">
                    <ul>
                        <li>
                            <a href="loginUser.php">
                                <ion-icon name="log-in-outline"></ion-icon>
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }?>
            </div>
            <!-- end right_head -->
        </div>
        <!-- end content_head -->
    </header>
    <!-- end header -->
</body>
</html>