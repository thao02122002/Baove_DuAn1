<div class="container-fluid">
                    <h1>Quản lý khách hàng</h1>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th class="id_sp">Mã tài khoản</th>
                                <th class="maSP">Tên đăng nhập</th>
                                <th class="tenSP">Mật khẩu</th>
                                <th class="tenSP">Họ tên</th>
                                <th class="price">Email</th>
                                <th class="img">Địa chỉ</th>
                                <th class="tenDM">Số điện thoại</th>
                                <!-- <th class="mota">Mô tả</th> -->
                                <th class="day">Vai trò</th>
                                <th class="xl">Chức năng</th>
                            </tr>
                        </thead>
                    <?php
                       $connection = new PDO("mysql:host=127.0.0.1;dbname=tidihat;charset=utf8","root","");
                       $query = "select * from taikhoan order by id desc";
                       $stmt = $connection->prepare($query);
                       $stmt->execute();
                       $listtaikhoan = $stmt->fetchAll();
                    ?>
                    <tbody>

                    <?php
                       foreach ($listtaikhoan as $taikhoan){
                        extract($taikhoan);
                        $suatk="index.php?act=suatk&id=".$id;
                        $xoatk="index.php?act=xoatk&id=".$id;
                        echo ' <tr>
                        <td>'.$id.'</td>
                        <td>'.$user.'</td>
                        <td>'.$pass.'</td>
                        <td>'.$hoten.'</td>
                        <td>'.$email.'</td>
                        <td>'.$dress.'</td>
                        <td>'.$tell.'</td>
                        <td>'.$vaitro.'</td>
                        <td>
                        
                        <a id="del" href="'.$xoatk.'" onclick="return confirm(Bạn có chắc chắn muốn xóa sản phẩm này hay không?);">Xóa</a>
                    </td>
                    </tr>';
                    }
                    ?>
                    
                                </tbody>
                     
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