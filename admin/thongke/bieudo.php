<!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div class="bieudo"style="width:100%; max-width:600px; height:600px;">
<div
id="myChart" style="width:100%; max-width:600px; height:500px;">

</div>

<a href="index.php?act=thongke"><input type="button" value="Danh sách"></a>
</div>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số lượng sản phẩm'],
  <?php
  $tongdm=count($listthongke);
  $i=1;

  foreach ($listthongke as $thongke) {
      extract($thongke);
      if($i==$tongdm) $dauphay=""; else $dauphay=",";
      echo "['".$thongke['tendm']."',".$thongke['countsp']."]".$dauphay;
      $i+=1;
  }
  ?>
]);

var options = {
  title:'Thống kê sản phẩm theo danh mục sản phẩm',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>
<!-- <div class="add"> -->
<!-- <a href="index.php?act=thongke"><input type="button" value="Danh sách"></a> -->
<!-- </div> -->
</body>


                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>
</html>



