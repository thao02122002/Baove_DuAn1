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
    .top{
        text-align: center;
        margin: 50px 0px;
    }
</style>
<body>
    <div class="top">
    <div>
    <h1>Cảm ơn quý khách đã đặt hàng</h1>
    </div>
    <?php
       if(isset($bill)&&(is_array($bill))){
           extract($bill);
           
       }
    ?>
    <div class="row">
    <div class="boxtitle">Mã đơn hàng</div>
    <div class="boxcontent">
        <p>TIDIHAT: <?=$bill['id'];?></p>
        <p>Ngày đặt hàng: <?=$bill['ngaydathang'];?></p>
        <p>Tổng đơn hàng: <?=$bill['tongdh'];?> VNĐ</p>
        <p>Phương thức thanh toán: <?php $pttt=get_pttt($bill['bill_pttt']); ?></p>
    </div>
    </div>
    </div>
    <div class="main">
        <div class="content_left">
            <h2>Thông tin</h2>
            <table>
                <tr>
                    <td>Người đặt hàng</td>
                    <td><?=$bill['bill_name'];?></td>
                </tr>
                <tr>
                    <td>Số điện thoại</td>
                    <td><?=$bill['bill_tel'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$bill['bill_email'];?></td>
                </tr>
                <tr>
                    <td>Địa chỉ nhận hàng</td>
                    <td><?=$bill['bill_dress'];?></td>
                </tr>
            </table>
        </div>
        <!-- end content_left -->

        <div class="content_right">
            <div class="right1">
                <h2>Đơn hàng</h2>
                <table class="content-table">

                    <?php
                    bill_chi_tiet($billct);
                    ?>
                    <tfoot>
            </tfoot>
                </table>
                <!-- end table -->
            </div>
            <!-- end right1 -->
        </div>
    </div>
    <!-- end main -->
</body>

</html>