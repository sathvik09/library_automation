<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";

$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn ->select_db($database) or die( "Unable to select database");

   $sql = "SELECT * FROM library_attendence";
   $result = mysqli_query($conn,$sql);
   foreach($result as $att){
     $student = $att["student"];
     $teacher = $att["teacher"];
   }
   //echo "el";
?>

<!DOCTYPE html>
<head>
<title>charts</title>
</head>
<html>
<body>

<h1 style="color:blue;font-weight:100;margin-left:50%">Charts</h1>
<a style="text:decoration:none;color:red" href="./dashboard.php"><input style="margin-left:90%;color:blue;width:100px;height:40px;" type="button" value="To dashboard"></a>

<div id="pie"></div>
<div id="container" style="margin-left:30%;width: 50%; height: 360px"></div>
<div style="margin-left:40%;" id="piechart"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Student', <?php echo $student ?>],
  ['Teacher', <?php echo $teacher ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Average ratio of logins ', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>
<script>
  let arr=[];
  function render_chart(){
   $.ajax({
     url: 'chart_server.php',
     success : function(data1){   
       let data = JSON.parse(data1);
       var chart = anychart.pie();
      chart.title("Issue percentage by genere");
      chart.data(data);
      chart.container('container');
      chart.draw();
     }
           
   });
  }
render_chart();

</script>

</body>
<html>
