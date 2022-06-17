<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi địa chỉ</title>
    <link rel="stylesheet" href="../views/css/editName.css">
</head>
<body>
    <h1>Đổi địa chỉ</h1>

<div class="container">
<form action="index.php?act=edit_dress" method="POST">
                    <?php
                        if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                            extract($_SESSION['user']);

                        }
                    ?>
                    <div class="content">
                        <div class="item">
                            <div class="form">
                                <input type="text" name="dress" required value="<?=$dress?>">
                                <label for="text2" class="label-name">
                                    <span class="content-name">
                                       Địa chỉ mới
                                    </span>
                                </label> <br>
                            </div>
                        </div>
                       
                        <div class="submit">
                            <input type="hidden" name="" value="<?=$id?>">
                            <button type="submit" name="them">
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
</body>
</html>