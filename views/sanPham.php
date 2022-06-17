<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Sản phẩm</title>
    <link rel="stylesheet" href="../views/css/sanPham.css">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <!-- <script src="./abc.js"></script> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i" rel="stylesheet" type="text/css" media="all">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
</head>

<body>

     

    <div class="content_web">
        <div class="sidebar_product">
            <nav id="nav">
                <div class="sidebar-top">
                    <span class="shrink-btn">
                        <i class='bx bx-chevron-left'></i>
                    </span>
                    <img src="./img/logo.png" class="logo" alt="">
                    <h3 class="hide">DANH MỤC</h3>
                </div>
                <div class="sidebar-links">
                    <ul>
                                <?php
                                foreach ($dsdm as $dm) {
                                    extract($dm);
                                    $linkdm="index.php?act=sanpham&iddm=".$id;
                                    echo '<li class="tooltip-element" data-tooltip="0">
                                     <a href="#" class="active" data-active="0">
                                    <div class="icon">
                                        <i class="fas fa-caret-right"></i>
                                        <i class="fas fa-caret-right"></i>
                                    </div>
                                    <span class="link hide"><a href="'.$linkdm.'">'.$name.'</a><span>
                                    </a></li>';
                                
                                }
                                ?>
                        <div class="tooltip">
                        <?php
                             foreach ($dsdm as $dm) {
                                extract($dm);
                                $linkdm="index.php?act=sanpham&iddm=".$id;
                                echo '  <span class="show">'.$name.'</span>';
                             }
                            ?>
                            <!-- <span class="show">Danh mục 1</span>
                            <span>Danh mục 2</span>
                            <span>Danh mục 3</span>
                            <span>Danh mục 4</span> -->
                        </div>
                    </ul>


            </nav>
        </div>


        <main>
            <h1>Sản phẩm</h1>
           
            <div class="card-content" style="display: none">
            <div class="img_product">
            <?php
            foreach ($dssp as $sp) {
                extract($sp);
                $hinh=$img_path.$img;
                $linksp="index.php?act=sanphamct&idsp=".$id;
                echo '<div class="img_pro">
                <div class="img">
                    <a href="'.$linksp.'"><img src="'.$hinh.'" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>'.$name.'</p>
                    </div>'
            
            ?>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>

                <?php
                echo '</div>'
                ?>
                <?php
                echo '<div class="money">
                <p>'.$giacu.' VNĐ</p>
            </div>
            <div class="chiTiet">
                <a href="'.$linksp.'">Xem chi tiết</a>
            </div>'
                ?>
                <?php
                echo ' </div>';}
                ?>

        </div>
        <!-- end img_product -->
        <div class="pagination">
                       
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
                    var numberOfItems = $(".card-content .img_pro").length;
                    var limitPerPage = 8; //How many card items visible per a page
                    var totalPages = Math.ceil(numberOfItems / limitPerPage);
                    var paginationSize = 7; //How many page elements visible in the pagination
                    var currentPage;

                    function showPage(whichPage) {
                        if (whichPage < 1 || whichPage > totalPages) return false;

                        currentPage = whichPage;

                        $(".card-content .img_pro").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

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

                    $(".card-content").show();
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


 
            
         
       
        
        </main>
    </div>
        </div>
        
    
    <!-- end content_web -->
    <!-- <div class="catee">
        <div class="product_top3">
            <nav>
                <a href="#">Sản phẩm bán chạy</a>
               
                <div class="animation start-home"></div>
            </nav>
        </div> -->
        <!-- product_top3 -->

       
        <!-- <div class="img_product">
            <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->
<!-- 
            <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->

            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->

            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->
            <!-- <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->
<!-- 
            <div class="img_pro">
                <div class="img">
                    <a href=""><img src="./imgTaiNguyen/Quần áo nam/quần âu nâu.png" alt=""></a>
                </div>
                <div class="infor">
                    <div class="text">
                        <p>Quần âu nam</p>
                    </div>
                    <div class="start">
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                        <ion-icon name="star-outline"></ion-icon>
                    </div>
                </div>
                <div class="money">
                    <p>140.000 VNĐ</p>
                </div>
                <div class="chiTiet">
                    <a href="#">Xem chi tiết</a>
                </div>
            </div> -->
            <!-- end img_pro -->

        <!-- </div> -->
        <!-- end img_product -->
        <script src="../views/js/sanPham.js"></script>
    <!-- </div> -->
</body>

</html>