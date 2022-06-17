
                <div class="container-fluid">

                    <!-- Viết code ở đây -->
                    <?php
                    
                    ?>


                    <h1>Quản lý danh mục</h1>
                    
                    <div>
    <table class="content-table">
        <thead>
        <tr>
            
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Xử lý</th>
        </tr>
        </thead>
        <?php
        foreach ($listdanhmuc as $danhmuc) {
            extract($danhmuc);
            $suadm="index.php?act=suadm&id=".$id;
            $xoadm="index.php?act=xoadm&id=".$id;
            echo '<tbody>
            <tr>
            
            <td>'.$id.'</td>
            <td>'.$name.'</td>
            <td><a href="'.$suadm.'"><input id="edit" type="button" value="Sửa"></a> <a href="'.$xoadm.'"><input id="del" type="button" value="Xóa" ></a></td>
        </tr>
        </tbody>';
        }
        ?>
        
    </table>
</div>
<!-- <div class="add"> -->
    <a href="index.php?act=adddm"><input type="button" value="Nhập thêm"></a>
<!-- </div> -->
                    <!-- Bootstrap core JavaScript-->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>