<!DOCTYPE html>
<html lang="en">
<?php

if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = 1;
}else{
    $_SESSION['name'] += 1;
}
// echo "Lượt truy cập:".$_SESSION['name'];
$luotxem= $_SESSION['name'];
$up_luot_xem=up_luot_xem($luotxem,$id);
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../views/css/xyz.css">
  <link href="//fonts.googleapis.com/css?family=Poppins:400,200,300,400,400i,500,600,600i,700,700i,800,900,900i">
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700&display=swap" rel="stylesheet">
  <title>Chi tiết sản phẩm</title>
</head>

<body>
  <?php
      extract($onesp);
      $img=$img_path.$img;
      echo '<div class="containerct">
      <div class="card">
        <div class="shoeBackground">
          <div class="gradients">
            <div class="gradient second" color="blue"></div>
            <div class="gradient" color="red"></div>
            <div class="gradient" color="green"></div>
            <div class="gradient" color="orange"></div>
            <div class="gradient" color="black"></div>
          </div>
  
            <img src="'.$img.'" alt="" class="logo">
           
          
  
          <img src="img/blue.png" alt="" class="shoe show" color="blue">
          <img src="img/red.png" alt="" class="shoe" color="red">
          <img src="img/green.png" alt="" class="shoe" color="green">
          <img src="img/orange.png" alt="" class="shoe" color="orange">
          <img src="img/black.png" alt="" class="shoe" color="black">
  
        </div>
        <div class="info">
          <div class="shoeName">
            <div>
              <h1 class="big">'.$name.'</h1>
              <span class="new">new</span>
            </div>
            <div class="small"><del class="small">'.$giacu.' VNĐ</del><span class="small">'.$giamoi.' VNĐ</span></div>
            <!-- <h3 class="small">120.000 VNĐ</h3> -->
          </div>
          <div class="description">
            <h3 class="title">Mô tả</h3>
        
           <p class="text">'.$mota.'</p>
      
          </div>
          <div class="color-container">
            <h3 class="title">Color</h3>
            <div class="colors">
              <span class="color active" primary="#2175f5" color="blue"></span>
              <span class="color" primary="#f84848" color="red"></span>
              <span class="color" primary="#fff" color="white"></span>
              <span class="color" primary="#29b864" color="green"></span>
              <span class="color" primary="#ff5521" color="orange"></span>
              <span class="color" primary="#444" color="black"></span>
              <span class="color" primary="rgb(247, 158, 173)" color="pink"></span>
            </div>
          </div>
          <div class="size-container">
            <h3 class="title">size</h3>
            <div class="sizes">
              <span class="size active">36</span>
              <span class="size">37</span>
              <span class="size">38</span>
              <span class="size">39</span>
              <span class="size">40</span>
              <span class="size">41</span>
              <span class="size">42</span>
              <span class="size">43</span>
            </div>
          </div>
  
          <div class="quantity">
            <h3 class="title">Số lượng</h3>
            <input type="number" name="soluong" min="1" placeholder="1">
          </div>
  
          <form action="index.php?act=addtocart" method="post">
              <input type="hidden" name="id" value="'.$id.'">
              <input type="hidden" name="name" value="'.$name.'">
              <input type="hidden" name="img" value="'.$img.'">
              <input type="hidden" name="giamoi" value="'.$giamoi.'">
              <div class="buy-price">
              <button type="submit" class="buy" name="addtocart" value="Add to card"><i class="fas fa-shopping-cart"></i>Add to card</button>
              </div>
          </form>
        </div>
      </div>
    </div>';

  ?>
  <script src="../views/js/chiTiet.js"></script>
  <div class="row" >
    
     <iframe src="binhluan/binhluanform.php?idsp=<?=$id?>" frameborder="0" width="100%" height="500px"></iframe>
 </div>

<div class="lienQuan">
  <h2>Sản phẩm cùng loại</h2>

  <div class="img_product">
      <?php
      foreach ($sp_cung_loai as $sp_cung_loai) {
          extract($sp_cung_loai);
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

</div>
</body>

</html>