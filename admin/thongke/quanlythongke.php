<div class="container-fluid">
<h1>Danh sách thống kê</h1>
<div>
    <table class="content-table">
        <thead>
        <tr>
            <th>Mã danh mục</th>
            <th>Tên danh mục</th>
            <th>Số lượng</th>
            <th>Giá cao nhất</th>
            <th>Giá thấp nhất</th>
            <th>Giá trung bình</th>
        </tr>
        </thead>
        <?php
        foreach ($listthongke as $thongke) {
            extract($thongke);
            echo '<tbody>
            <tr>
            <td>'.$madm.'</td>
            <td>'.$tendm.'</td>
            <td>'.$countsp.'</td>
            <td>'.$maxgiacu.'</td>
            <td>'.$mingiacu.'</td>
            <td>'.$avggiacu.'</td>
        </tr>
        </tbody>';
        }

        ?>
        
    </table>
    <!-- <div class="add"> -->
    <a href="index.php?act=bieudo"><input type="button" value="Biểu đồ"></a>
<!-- </div> -->
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>