<?php
function insert_sanpham($tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua,$iddm){
    $sql = "insert into sanpham(name,giacu,giamoi,img,mota,ngaytao,ngaysua,iddm) values('$tensp','$giacu','$giamoi','$hinh','$mota','$ngaytao','$ngaysua','$iddm')";
    pdo_execute($sql);

}
function update_sanpham($id,$iddm,$tensp,$giacu,$giamoi,$hinh,$mota,$ngaytao,$ngaysua){
   if($hinh!=="")
   $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',giacu='".$giacu."',giamoi='".$giamoi."',img='".$hinh."',mota='".$mota."',ngaytao='".$ngaytao."',ngaysua='".$ngaysua."' where id=".$id;
   else 
   $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',giacu='".$giacu."',giamoi='".$giamoi."',mota='".$mota."',ngaytao='".$ngaytao."',ngaysua='".$ngaysua."' where id=".$id;
   pdo_execute($sql);
}
function up_luot_xem($luotxem,$id){
    $sql ="update sanpham set luotxem='".$luotxem."' where id=".$id;
    pdo_execute($sql);
}
function delete_sanpham($id){
    $sql="delete from sanpham where id=".$id;
    pdo_execute($sql);
}
//sp moi nhat
function loadall_sanpham_home(){
    $sql = "select * from sanpham where 1 order by id desc limit 0,8";
   $listsanpham= pdo_query($sql);
   return $listsanpham;
}
//sp noi bat
function loadall_sanpham_top(){
    $sql= "select * from sanpham where 1 order by luotxem desc limit 0,8";
    $listsanpham= pdo_query($sql);
   return $listsanpham;
}
//load sp theo danh mục 
function loadall_sanpham($kyw="",$iddm=0){
    $sql = "select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }if($iddm>0){
        $sql.=" and iddm='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $sp= pdo_query_one($sql);
    return $sp;
}
function load_ten_dm($iddm){
    if ($iddm>0) {
        $sql = "select * from danhmuc where id=".$iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
}
//sp cung loai
function load_sanpham_cungloai($id,$iddm){
    $sql = "select * from sanpham where iddm=".$iddm." AND id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
?>