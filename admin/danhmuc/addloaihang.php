               <div class="container-fluid">

                    <!-- Viết code ở đây -->

                    <?php
                    
                    ?>
                    <h1>Thêm danh mục</h1>
                    <form action="index.php?act=adddm" method="post">
                    
    <div class="form2">
     <input type="text" name="tenloai" autocomplete="off" required >
     <label for="text2" class="label-name">
                                <span class="content-name">
                                    Tên danh mục
                                </span>
                            </label> <br>
    </div>
    <div class="submit">
    <input type="submit" value="Thêm mới" name="themmoi">
    </div>
    <a href="index.php?act=qldm"><input type="button" value="Danh sách"></a>
                        
                    </form>

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