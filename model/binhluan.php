<?php
function insert_binhluan($noidung,$iduser,$idsp,$ngaybl,$mailuser,$hotenuser){
$sql="insert into binhluan(noidung,iduser,idsp,ngaybl,mailuser,hotenuser) values('$noidung','$iduser','$idsp','$ngaybl','$mailuser','$hotenuser')";
pdo_execute($sql);
}
function loadall_binhluan($idsp){
    $sql="select * from binhluan where 1";
    if($idsp>0) $sql.=" AND idsp='".$idsp."'";
    $sql.=" order by id desc";
    $listbinhluan= pdo_query($sql);
    return $listbinhluan;
}
function delete_binhluan($id){
    $sql="delete from binhluan where id=".$id;
    pdo_execute($sql);
}
?>