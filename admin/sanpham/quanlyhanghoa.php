                <div class="container-fluid">
                <style>
                    img{
                        width: 150px;
                    }
                </style>
                    <h1>Quản lý hàng hóa</h1>
                    
                    <div>
    <form action="index.php?act=qlsp" method="post" >
        <input type="text" name="kyw">
        <select name="iddm" >
            <option value="0" selected>Tất cả</option>
            <?php
            foreach ($listdanhmuc as $danhmuc) {
                extract($danhmuc);
                echo '<option value="'.$id.'">'.$name.'</option>';
            }
            ?>
            
        </select>
        <input type="submit" name="listok" value="Go">
    </form>

</div>
<div class="content">
    <table class="content-table">
        <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá cũ</th>
            <th>Giá mới</th>
            <th>Hình</th>
            <th>Lượt xem</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            
            <th>Xử lý</th>
        </tr>
        </thead>
        
        <?php
        foreach ($listsanpham as $sanpham) {
            extract($sanpham);
            $suasp="index.php?act=suasp&id=".$id;
            $xoasp="index.php?act=xoasp&id=".$id;
            $hinhpath="../upload/".$img;
            if(is_file($hinhpath)){
                $hinh="<img src='".$hinhpath."'>";
            }else{
                $hinh="no photo";
            }
            echo '<tbody>
            <tr class="thao">
                 <td>'.$id.'</td>
                 <td>'.$name.'</td>
                 <td>'.$giacu.'</td>
                 <td>'.$giamoi.'</td>
                 <td>'.$hinh.'</td>
                 
                 <td>'.$luotxem.'</td>
                 <td>'.$ngaytao.'</td>
                 <td>'.$ngaysua.'</td>
                
                 
                 
                
                
                
                 <td><a  href="'.$suasp.'"><input id="edit" type="button" value="Sửa"></a> <a  href="'.$xoasp.'" ><input id="del" type="button" value="Xóa"></a></td>
                 </tr>
                 </tbody> ';
             }
             
        ?>
        
        
    </table>


<div class="pagination">
                        <!-- <li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
                        <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
                        <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
                        <li class="page-item dots"><a class="page-link" href="#">...</a></li>
                        <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
                        <li class="page-item next-page"><a class="page-link" href="#">Next</a></li> -->
                    </div>
                    </div>
                    <script type="text/javascript">
                function getPageList(totalPages, page, maxLength) {
                    function range(start, end) {
                        return Array.from(Array(end - start + 1), (_, i) => i + start);
                    }

                    var sideWidth = maxLength < 9 ? 1 : 2;
                    var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
                    var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

                    if (totalPages <= maxLength) {
                        return range(1, totalPages);
                    }

                    if (page <= maxLength - sideWidth - 1 - rightWidth) {
                        return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
                    }

                    if (page >= totalPages - sideWidth - 1 - rightWidth) {
                        return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
                    }

                    return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));
                }

                $(function() {
                    var numberOfItems = $(".content .thao").length;
                    var limitPerPage = 5; //How many card items visible per a page
                    var totalPages = Math.ceil(numberOfItems / limitPerPage);
                    var paginationSize = 7; //How many page elements visible in the pagination
                    var currentPage;

                    function showPage(whichPage) {
                        if (whichPage < 1 || whichPage > totalPages) return false;

                        currentPage = whichPage;

                        $(".content .thao").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

                        $(".pagination li").slice(1, -1).remove();

                        getPageList(totalPages, currentPage, paginationSize).forEach(item => {
                            $("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
                                .toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
                                    .attr({
                                        href: "javascript:void(0)"
                                    }).text(item || "...")).insertBefore(".next-page");
                        });

                        $(".previous-page").toggleClass("disable", currentPage === 1);
                        $(".next-page").toggleClass("disable", currentPage === totalPages);
                        return true;
                    }

                    $(".pagination").append(
                        $("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({
                            href: "javascript:void(0)"
                        }).text("Trước")),
                        $("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({
                            href: "javascript:void(0)"
                        }).text("Sau"))
                    );

                    $(".content").show();
                    showPage(1);

                    $(document).on("click", ".pagination li.current-page:not(.active)", function() {
                        return showPage(+$(this).text());
                    });

                    $(".next-page").on("click", function() {
                        return showPage(currentPage + 1);
                    });

                    $(".previous-page").on("click", function() {
                        return showPage(currentPage - 1);
                    });
                });
            </script>
               
<!-- <div class="add"> -->
    <a href="index.php?act=addsp"><input type="button" value="Thêm mới sản phẩm"></a>
<!-- </div>    -->
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