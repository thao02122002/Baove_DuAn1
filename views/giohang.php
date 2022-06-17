<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../views/css/gioHang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>
<style>
    .h1{
        text-align: center;
        margin: 100px 0px;
    }
</style>
<body>
    <div class="center">
        <div></div>
    <div class="content">
        <form action="index.php?act=giohang" method="post">
<table class="content-table">
        <?php if(isset($_SESSION['user'])){
            viewcart(1);
            ?> 
                
            <?php }else{?>  
                    <h1 class="h1">Vui lòng <a href="loginUser.php">đăng nhập</a> để mua hàng</h1>
                <?php }?>


         <!-- <table class="content-table"> -->
                <?php
                //    viewcart(1);
                ?>     
        </table> 
        </form>
        <!-- end table -->
        <?php
        if(isset($_SESSION['user'])){
            echo '<div class="submit">
            <a href="index.php?act=thanhtoan"><button type="submit" name="muahang"> 
                <span></span>
                Mua hàng
            </button></a>
        </div>';
        }
        ?>
        <!-- <div class="submit">
                            <a href="index.php?act=thanhtoan"><button type="submit" name="muahang"> 
                                <span></span>
                                Mua hàng
                            </button></a>
        </div> -->
    </div>
    <div></div>
    </div>
    <!-- end content -->
</body>

</html>