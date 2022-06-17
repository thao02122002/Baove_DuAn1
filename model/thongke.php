<?php
function loadall_thongke(){
 
$sql="select danhmuc.id as madm, danhmuc.name as tendm,count(sanpham.id) as countsp, min(sanpham.giacu) as mingiacu, max(sanpham.giacu) as maxgiacu, avg(sanpham.giacu) as avggiacu";
$sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
$sql.=" group by danhmuc.id order by danhmuc.id desc";
$listthongke=pdo_query($sql);
return $listthongke;
   
}
?>