                <div class="container-fluid">

                    <!-- Viết code ở đây -->

                    <?php
                    
                    ?>
                    <h1>Thêm sản phẩm</h1>
                   

                    <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
       <div class="form5">
                    Danh mục:<select name="iddm">
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
            }
            ?>
            
        </select>
        </div>
        <div class="form1">
             <input type="text" name="tensp">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Tên sản phẩm
                                </span>
                            </label> <br>
        </div>
        <div class="form2">
             <input type="text" name="giacu">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Giá cũ
                                </span>
                            </label> <br>
        </div>
        <div class="form2">
             <input type="text" name="giamoi">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Giá mới
                                </span>
                            </label> <br>
        </div>
        <div class="upload-box">
             <input type="file" name="hinh">
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    Hình
                                </span>
                            </label> <br>
        </div>
        <div class="form9 ">
             <textarea name="mota"  cols="40" rows="5"></textarea>
             <label for="text2" class="label-name">
                                <span class="content-name">
                                    
                                </span>
                            </label> <br>
        </div>
        <div class="ac">
            <input class="add" type="submit" name="themmoi" value="Thêm mới">
            <a href="index.php?act=qlsp"><input type="button"  class="list" value="Danh sách"></a>
        </div>
</form>
<?php
if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
?>
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