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

<body>
    <div class="content">
        <table class="content-table">
            <thead>
                <tr>
                    <th>
                        <i class="fas fa-images"></i>
                        Mã đơn hàng
                    </th>
                    <th>
                        <i class="fas fa-tshirt"></i>
                        Ngày đặt
                    </th>
                    <th>
                        <i class="fas fa-sort-numeric-up"></i>
                        Số lượng mặt hàng
                    </th>
                    <th>
                        <i class="fas fa-palette"></i>
                        Tổng giá trị đơn hàng
                    </th>
                    <th>
                        <i class="fas fa-expand-alt"></i>
                        Tình trạng đơn hàng
                    </th>
                    <!-- <th>
                        <i class="fas fa-comment-dollar"></i>
                        Giá tiền
                    </th>
                    <th><i class="fas fa-cog"></i></th> -->
                </tr>
            </thead>
            <?php
                if(is_array($listbill)){
                    foreach ($listbill as $bill) {
                        extract($bill);
                        $ttdh=get_ttdh($bill['bill_status']);
                        $countsp=loadall_cart_count($bill['id']);
                        echo '<tr>
                        <td>TIDIHAT-'.$bill['id'].'</td>
                        <td>'.$bill['ngaydathang'].'</td>
                        <td>'.$countsp.'</td>
                        <td>'.$bill['tongdh'].'</td>
                        <td>'.$ttdh.'</td>
                    </tr>';
                    }
                }
            ?>
            <tbody>
            </tbody>
            <tfoot>
                <!-- <tr>
                    <td colspan="6" align="center"> <i class="fas fa-hand-holding-usd"></i> Tổng tiền</td>
                    <td colspan="2">80.000 VNĐ</td>
                </tr> -->
            </tfoot>
        </table>
        <!-- end table -->
        
    </div>
    <!-- end content -->
</body>

</html>