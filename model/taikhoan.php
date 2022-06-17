<?
function loadall_taikhoan(){
  $sql="select * from taikhoan order by id desc";
  $listtaikhoan=pdo_query($sql);
  return $listtaikhoan;
 }
function insert_taikhoan($user,$pass,$hoten,$email,$dress,$tell){
  $sql="insert into taikhoan(user,pass,hoten,email,dress,tell) values('$user','$pass','$hoten','$email','$dress','$tell')";
  pdo_execute($sql);
 }
 function checkuser($user,$pass){
  $sql="select * from taikhoan where user='".$user."' AND pass='".$pass."'";
  $sp=pdo_query_one($sql);
  return $sp;
 }
 function checkemail($email){
  $sql="select * from taikhoan where email='".$email."'";
  $sp=pdo_query_one($sql);
  return $sp;
 }
function update_taikhoan($id,$user,$pass,$hoten,$email,$dress,$tell){
  $sql="update taikhoan set user='".$user."', pass='".$pass."', hoten='".$hoten."', email='".$email."',dress='".$dress."',tell='".$tell."' where id=".$id;   
    pdo_execute($sql);
}
function update_user($id,$user){
  $sql="update taikhoan set user='".$user."' where id=".$id;   
    pdo_execute($sql);
}
function update_dress($id,$dress){
  $sql="update taikhoan set dress='".$dress."' where id=".$id;   
    pdo_execute($sql);
}
function loadone_taikhoan($id){
  $sql = "select * from taikhoan where id=".$id;
  $sp= pdo_query_one($sql);
  return $sp;
}
?>