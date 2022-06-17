<?php
session_start();
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/binhluan.php";
include "../model/thongke.php";
include "../model/taikhoan.php";
include "../model/cart.php";
include "header.php";
$listthongke= loadall_thongke();
 if (isset($_GET['act'])) {
    $act=$_GET['act'];
    switch ($act) {
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tenloai=$_POST['tenloai'];
               insert_danhmuc($tenloai);
                
                $thongbao="Thêm thành công";

            }
            include "../admin/danhmuc/addloaihang.php";
            break;
        case 'qldm':
            $listdanhmuc= loadall_danhmuc();
            include "../admin/danhmuc/quanlyloaihang.php";
            break;
        case 'suadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                $dm =loadone_danhmuc($_GET['id']);
            }
            include "../admin/danhmuc/sualoaihang.php";
            break;
        case 'updatedm':
            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                
                $tenloai=$_POST['tenloai'];
                $id=$_POST['id'];
                update_danhmuc($id,$tenloai);
                $thongbao="cập nhật thành công";

            }
            $listdanhmuc= loadall_danhmuc();
            include "../admin/danhmuc/quanlyloaihang.php";
            break;
        case 'xoadm':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete($_GET['id']);
            }
            $listdanhmuc= loadall_danhmuc();
            include "../admin/danhmuc/quanlyloaihang.php";
            break;
    //qltk
    case 'qltk':
        include "taikhoan/quanlykhachhang.php";
        break;
    case 'xoatk':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            function deletetk($id){
                $sql = "delete from taikhoan where id=".$id;
                pdo_execute($sql);
              }
            deletetk($_GET['id']);
        }
        function loadall_taikhoan(){
            $sql="select * from taikhoan order by id desc";
            $listtaikhoan=pdo_query($sql);
            return $listtaikhoan;
        }
        $listtaikhoan= loadall_taikhoan();
        include "taikhoan/quanlykhachhang.php";
        break;
    //sp
    case 'addsp':
        if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
            $iddm=$_POST['iddm'];
            $tensp=$_POST['tensp'];
            $giacu=$_POST['giacu'];
            $giamoi=$_POST['giamoi'];
            $mota=$_POST['mota'];
            $hinh=$_FILES['hinh']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
            if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){

            }else {
            
            }
            $timetao = time();
            $ngaytao = date('Y-m-d H:i:s',$timetao);
            $timesua = time();
            $ngaysua = date('Y-m-d H:i:s',$timesua);
            insert_sanpham($tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua,$iddm);
           $thongbao="Thêm thành công";
    }
    $listdanhmuc= loadall_danhmuc();
        include "../admin/sanpham/addhanghoa.php";
        break;
    case 'qlsp':
        if(isset($_POST['listok'])&&($_POST['listok'])){
            $kyw=$_POST['kyw'];
            $iddm=$_POST['iddm'];
        }else {
            $kyw='';
            $iddm=0;
        }
        $listdanhmuc= loadall_danhmuc();
        $listsanpham= loadall_sanpham($kyw,$iddm);
        include "../admin/sanpham/quanlyhanghoa.php";
        break;
    case 'suasp':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            $sanpham=loadone_sanpham($_GET['id']);
        }
        $listdanhmuc= loadall_danhmuc();
        include "../admin/sanpham/suahanghoa.php";
        break;
    case 'updatesp':
        if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
            $id=$_POST['id'];
            $iddm=$_POST['iddm'];
            $tensp=$_POST['tensp'];
            $giacu=$_POST['giacu'];
            $giamoi=$_POST['giamoi'];
            $mota=$_POST['mota'];
            $hinh=$_FILES['hinh']['name'];
            $target_dir = "../upload/";
            $target_file = $target_dir.basename($_FILES["hinh"]["name"]);
            if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){

            }else {
            
            }
            $timetao = time();
            $ngaytao = date('Y-m-d H:i:s',$timetao);
            $timesua = time();
            $ngaysua = date('Y-m-d H:i:s',$timesua);
            update_sanpham($id,$iddm,$tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua);
            $thongbao="cập nhật thành công";

        }
        $listdanhmuc= loadall_danhmuc();
        $listsanpham= loadall_sanpham();
        include "../admin/sanpham/quanlyhanghoa.php";
        break;
    case 'xoasp':
        if(isset($_GET['id'])&&($_GET['id']>0)){
            delete_sanpham($_GET['id']);
        }
        $listsanpham= loadall_sanpham("",0);
        include "../admin/sanpham/quanlyhanghoa.php";
        break;
        case 'qlbl':
            $listbinhluan= loadall_binhluan(0);
            include "../admin/binhluan/quanlybinhluan.php";
            break;
            case 'xoabl':
                if (isset($_GET['id'])&&($_GET['id']>0)) {
                    delete_binhluan($_GET['id']);
                }
                $listbinhluan=loadall_binhluan(0);
                include "../admin/binhluan/quanlybinhluan.php";
                break;
    case 'thongke':
        $listthongke= loadall_thongke();
        include "../admin/thongke/quanlythongke.php";
        break;
     case 'bieudo':
        $listthongke= loadall_thongke();
        include "../admin/thongke/bieudo.php";
            break;
    //Đơn hàng
    case 'dsdh':
        if(isset($_POST['key'])&&($_POST['key']!="")){
            $key=$_POST['key'];
        }else{
            $key="";
        }
        $listbill=loadall_bill($key,0);
        include "../admin/bill/listbill.php";
            break;
    case 'xoadh':
        if (isset($_GET['id'])&&($_GET['id']>0)) {
            delete_dh($_GET['id']);
        }
        $listbill=loadall_bill($key="",$iduser=0);
        include "../admin/bill/listbill.php";
        break;

        default:
            break;
    }

 }else {
    include "home.php";
 }
 include "footer.php";
?>