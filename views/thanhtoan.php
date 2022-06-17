<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="stylesheet" href="../views/css/thanhToan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<style>
   
</style>
<body>
    <form action="index.php?act=hoadon" method="post">
        <?php
            if(isset($_SESSION['user'])){
                $name=$_SESSION['user']['hoten'];
                $tell=$_SESSION['user']['tell'];
                $email=$_SESSION['user']['email'];
                $dress=$_SESSION['user']['dress'];

            }else{
                $name='';
                $tell='';
                $email='';
                $dress='';
            }
        ?>
    <div class="main">
        <div class="content_left">
            <h2>Thông tin</h2>
            <div class="item">
                <div class="form">
                    <input type="text" name="name" value="<?=$name?>" required />
                    <label for="text2" class="label-name">
                        <span class="content-name">
                            Họ tên
                        </span>
                    </label> <br>
                </div>
            </div>
            <div class="item">
                <div class="form">
                    <input type="text" name="tell" value="<?=$tell?>" required />
                    <label for="text2" class="label-name">
                        <span class="content-name">
                            Số điện thoại
                        </span>
                    </label> <br>
                </div>
            </div>
            <div class="item">
                <div class="form">
                    <input type="text" name="email" value="<?=$email?>" required />
                    <label for="text2" class="label-name">
                        <span class="content-name">
                            Email
                        </span>
                    </label> <br>
                </div>
            </div>
            <div class="item">
                <div class="form">
                    <input type="text" name="dress" value="<?=$dress?>" required />
                    <label for="text2" class="label-name">
                        <span class="content-name">
                            Địa chỉ nhận hàng
                        </span>
                    </label> <br>
                </div>
            </div>
        </div>
        <!-- end content_left -->

        <div class="content_right">
            <div class="right1">
                <h2>Đơn hàng</h2>
                <table class="content-table">
                    
                    <tbody>
                        <?php
                                viewcart(0);
                        
                        ?>
                        
                    </tbody>
                    <tfoot>
                
            </tfoot>
                </table>
                <!-- end table -->
            </div>
            <!-- end right1 -->
            <div class="right2">
                <!-- <h2>Hình thức thanh toán</h2> -->
                <div class="click">
                        <h2>Hình thức thanh toán:</h2>
                        <div class="thanhToan">
                            <div class="money">
                                  <input type="radio" id="tien" name="pttt" value="1">
                                  <label for="html">Thanh toán khi nhận hàng</label><br>
                            </div>
                            <div class="atm">
                                  <input type="radio" id="atm" name="pttt" value="2">
                                  <label for="css">Thanh toán bằng thẻ tín dụng</label><br>
                            </div>
                        </div>
                        <!-- end thanhToan -->
                        <div class="submit">
                            <button type="submit" name="mua">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Đặt mua
                            </button>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- end main -->
</body>

</html>