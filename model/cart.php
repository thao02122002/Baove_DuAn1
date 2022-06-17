<?php
function viewcart($del){
    global $img_path;
    $tong=0;
    $i=0;
    if($del==1){
        $xoasp_th='<th><i class="fas fa-cog"></i></th>';
    }else{
        $xoasp_th='';
    }
    echo'<thead>
    <tr>
        <th></th>
        <th>
            <i class="fas fa-images"></i>
            Hình ảnh
        </th>
        <th>
            <i class="fas fa-tshirt"></i>
            Sản phẩm
        </th>
        <th>
            <i class="fas fa-sort-numeric-up"></i>
            Số lượng
        </th>
        <th>
            <i class="fas fa-palette"></i>
            Màu sắc
        </th>
        <th>
            <i class="fas fa-expand-alt"></i>
            Size
        </th>
        <th>
            <i class="fas fa-comment-dollar"></i>
            Giá tiền
        </th>
        '.$xoasp_th.'
    </tr>
</thead>';
    
    foreach($_SESSION['mycart'] as $cart){
        $hinh=$img_path.$cart[2];
        $thanhtien=$cart[3]*$cart[4]; 
        $tong+=$thanhtien;
        if($del==1){
            $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><i class="fas fa-trash-alt"></i></a></td>';
        }else{
            $xoasp_td='';
        }
        echo '
            <tbody> 
                <tr>
                    <td><input type="checkbox"></td>
                    <td><img src="'.$hinh.'" height="120px" alt=""></td>
                    <td>'.$cart[1].'</td>
                    <td>'.$cart[4].'</td>
                    <td>Xanh</td>
                    <td> 36</td>
                    <td>'.$cart[3].' VNĐ</td>
                    '.$xoasp_td.'
                </tr>
            </tbody>';
    $i+=1;
    } 
    echo '<tfoot>
    <tr>
        <td colspan="6" align="center"> <i class="fas fa-hand-holding-usd"></i> Tổng tiền</td>
        <td colspan="2">'.$tong.' VNĐ</td>
    </tr>
</tfoot>';
            
}
function bill_chi_tiet($listbill){
    global $img_path;
    $tong=0;
    $i=0;
    echo'
    <tr><thead>
        <th></th>
        <th>
            <i class="fas fa-images"></i>
            Hình ảnh
        </th>
        <th>
            <i class="fas fa-tshirt"></i>
            Sản phẩm
        </th>
        <th>
            <i class="fas fa-sort-numeric-up"></i>
            Số lượng
        </th>
        <th>
            <i class="fas fa-palette"></i>
            Màu sắc
        </th>
        <th>
            <i class="fas fa-expand-alt"></i>
            Size
        </th>
        <th>
            <i class="fas fa-comment-dollar"></i>
            Giá tiền
        </th>
    </tr>
    </thead>';
    
    foreach($listbill as $cart){
        $hinh=$img_path.$cart['img'];
        $tong+=$cart['thanhtien'];
        echo '
            <tbody> 
                <tr>
                    <td><input type="checkbox"></td>
                    <td><img src="'.$hinh.'" height="120px" alt=""></td>
                    <td>'.$cart['name'].'</td>
                    <td>'.$cart['soluong'].'</td>
                    <td>Xanh</td>
                    <td> 36</td>
                    <td>'.$cart['price'].' VNĐ</td>
                </tr>
            </tbody>';
    $i+=1;
    } 
    echo '<tfoot>
    <tr>
        <td colspan="6" align="center"> <i class="fas fa-hand-holding-usd"></i> Tổng tiền</td>
        <td colspan="2">'.$tong.' VNĐ</td>
    </tr>
</tfoot>';
            
}
function tongdh(){   
    $tong=0;
    foreach($_SESSION['mycart'] as $cart){
        $thanhtien=$cart[3]*$cart[4]; 
        $tong+=$thanhtien;     
    } 
    return $tong;
            
}
function insert_bill($iduser,$name,$dress,$tel,$email,$pttt,$ngaydathang,$tongdh){
    $sql="insert into hoadon(iduser,bill_name,bill_dress,bill_tel,bill_email,bill_pttt,ngaydathang,tongdh) values('$iduser','$name','$dress','$tel','$email','$pttt','$ngaydathang','$tongdh')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql = "select * from hoadon where id=".$id;
    $bill= pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql = "select * from cart where idbill=".$idbill;
    $bill= pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill){
    $sql = "select * from cart where idbill=".$idbill;
    $bill= pdo_query($sql);
    return sizeof($bill);
}
function loadall_mybill($iduser){
    $sql = "select * from hoadon where iduser=".$iduser;
    $listbill= pdo_query($sql);
    return $listbill;
}
function loadall_bill($key="",$iduser=0){

    $sql = "select * from hoadon where 1";
    if($iduser>0) $sql.=" AND iduser=".$iduser;
    if($key!="") $sql.=" AND id like '%".$key."%'";
    $sql.=" order by id desc";
    $listbill= pdo_query($sql);
    return $listbill;
}
function delete_dh($id){
    $sql="delete from hoadon where id=".$id;
    pdo_execute($sql);
}
function get_pttt($n){
    switch ($n) {
        case '1':
            echo "Thanh toán trực tiếp khi nhận hàng";
            break;
        case '2':
            echo "Thanh toán bằng thẻ tín dụng";
            break;
        default:
            # code...
            break;
    }
}
function get_ttdh($m){
    switch ($m) {
        case '0':
            $tt="Đang chờ xử lý";
            break;
        case '1':
            $tt="Đang xử lý";
            break;
        case '2':
            $tt="Đang giao hàng";
            break;
        case '3':
            $tt="Đã giao hàng";
            break;
        default:
            # code...
            break;
    }
    return $tt;
}

?>