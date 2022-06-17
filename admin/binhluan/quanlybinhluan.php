               <div class="container-fluid">

                    <!-- Viết code ở đây -->
                    <?php
                    ?>
                    <h1>Quản lý bình luận</h1>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th class="id_sp">ID</th>
                                <th class="maSP">Nội dung</th>
                                <th class="tenSP">ID user</th>
                                <th class="price">ID Sản phẩm</th>
                                <th class="img">Ngày bình luận</th>
                                <th class="xl">Chức năng</th>
                            </tr>
                        </thead>
                        <?php
                       foreach ($listbinhluan as $binhluan) {
                           extract($binhluan);
                           $xoabl="index.php?act=xoabl&id=".$id;
                           echo '<tbody>
                           <tr>
                               <td>'.$id.'</td>
                               <td>'.$noidung.'</td>
                               <td>'.$iduser.'</td>
                               <td>'.$idsp.'</td>
                               <td>'.$ngaybl.'</td>
                               <td>
                               <a href="'.$xoabl.'"><input id="del" type="button" value="Xóa" ></a>
                               </td>
                           </tr>
                           <!-- <tr class="active-row"> -->
                       </tbody>';
                       }
                        ?>
                     
                    </table>
            <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

</body>

</html>