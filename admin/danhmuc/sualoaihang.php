<?php
if(is_array($dm)){
    extract($dm);
}
?>
                <div class="container-fluid">

                   
                    <h1>Sửa danh mục</h1>
                  
                <div>
    <form action="index.php?act=updatedm" method="post" >
      <div class="form2">   
           <input type="text" name="maloai" >
           <label for="text2" class="label-name">
                                <span class="content-name">
                                    Mã danh mục
                                </span>
                            </label> <br>
          </div>
      <div class="form2">
      <label for="text2" class="label-name">
                                <span class="content-name">
                                    Tên danh mục 
                                </span>
                            </label> <br> <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name;?>">
      </div>
      <input type="hidden" name="id" value="<?php if(isset($id)&&($id>0)) echo $id;?>">
      <div class="submit">
      <input type="submit" value="Cập nhật" name="capnhat">
      </div>
      <div >
      <a href="index.php?act=qldm"><input type="button" value="Danh sách"></a>
      </div>
      
    </form>
    <?php
    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
    ?>
</div>
</div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

</body>

</html>