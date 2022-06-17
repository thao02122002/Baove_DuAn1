<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi tên tài khoản</title>
    <link rel="stylesheet" href="../views/css/editName.css">
</head>
<body>
    <?php
    if(isset($_SESSION['user'])){
        extract($_SESSION['user']);
    }
    ?>
    <h1>Đổi tên tài khoản</h1>
<div class="container">
    <form action="index.php?act=edit_name" method="post">
                    <div class="content">
                        <div class="item">
                            <div class="form">
                                <input type="text" name="user" value="<?=$user?>" required />
                                 <br>
                            </div>
                        </div>
                       
                        <div class="submit">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <button type="submit" name="suatk" value="cập nhật">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Thay đổi
                            </button>
                        </div>
                       
                    </div>
                    </form>
                </div>
                <!-- end container -->
</body>
</html>