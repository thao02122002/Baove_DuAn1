<!DOCTYPE html>
<html lang="en">
<style>
    .h1 {
        color: red;
        font-size: 20px;
    }
</style>
<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
include "../../model/taikhoan.php";
// if(isset($_SESSION['user'])){
//     extract($_SESSION['user']);
// }
$idsp = $_REQUEST['idsp'];
$dsbl = loadall_binhluan($idsp);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../views/css/xyz.css">
    <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
    <title>Chi tiết sản phẩm</title>
</head>
<section id="testimonials">
    <!--heading--->
    <div class="testimonial-heading">
        <h2>Bình luận</h2>
        <h3>Đánh giá của khách hàng</h3>
    </div>
    <!--testimonials-box-container------>

    <div class="card-content" style="display: none">
        <div class="testimonial-box-container">
            <?php
            foreach ($dsbl as $bl) {
                extract($bl);
                echo '<!--BOX-1-------------->
        <div class="testimonial-box">
            <!--top------------------------->
            <div class="box-top">
                <!--profile----->
                <div class="profile">
                    <!--name-and-username-->
                    <div class="name-user">
                        <strong>' . $hotenuser . '</strong>
                        <span>' . $mailuser . '</span>
                    </div>
                </div>
                <!--reviews------>
                <div class="reviews">
                    <p>' . $ngaybl . '</p>
                </div>
            </div>
            <!--Comments---------------------------------------->
            <div class="client-comment">
                <p>' . $noidung . '</p>
            </div>
        </div>
  ';
            }
            ?>

        </div>
        <div class="pagination">

        </div>
    </div>
    <!-- end card-content -->
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
                    var numberOfItems = $(".card-content .testimonial-box").length;
                    var limitPerPage = 4; //How many card items visible per a page
                    var totalPages = Math.ceil(numberOfItems / limitPerPage);
                    var paginationSize = 7; //How many page elements visible in the pagination
                    var currentPage;

                    function showPage(whichPage) {
                        if (whichPage < 1 || whichPage > totalPages) return false;

                        currentPage = whichPage;

                        $(".card-content .testimonial-box").hide().slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage).show();

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

</section>


<div class="write_comment">
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" name="idsp" value="<?= $idsp ?>">
        <?php
        if (isset($_SESSION['user'])) {
            echo '<input type="text" name="noidung" class="question" id="nme" required autocomplete="off" />
        <label for="msg"><span>Bình luận về sản phẩm</span></label>
        <input type="submit" name="guibinhluan" value="Gửi" />';
        } else {
            echo '<h1 class="h1">Bạn hãy đăng nhập để bình luận</h1>';
        }
        ?>
    </form>
</div>
<?php
if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
    $noidung = $_POST['noidung'];
    $idsp = $_POST['idsp'];
    $iduser = $_SESSION['user']['id'];
    $mailuser = $_SESSION['user']['email'];
    $hotenuser = $_SESSION['user']['hoten'];
    $ngaybl = date('d/m/Y H:i:s:a');
    insert_binhluan($noidung, $iduser, $idsp, $ngaybl, $mailuser, $hotenuser);
    // header("Location: ".$_SERVER['HTTP_REFERER']);
}


?>

</body>

</html>