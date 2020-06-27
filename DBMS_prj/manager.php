<?php
  session_start();
  $servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn ->select_db($database) or die( "Unable to select database");
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/tables.css">
    <title>manager_admin</title>
</head>
<body>



        <section>
   <div class='header'>
     <form action="">
       <input class='bg-light search' type="text" placeholder='search for a book :)'>
       <i class="fas fa-search" style='background-color:#286fd7;color:white;padding:8px;margin-left:-4px;border-radius:5%;'></i>
     </form>
     <h6 style='margin-left:85%;margin-top:-2%;'>Hi &nbsp manager</h6>
     <div class='dropdown'>
     <div class='dropbtn' style='margin-left:1075px;margin-top:-50px;'><i class="fas fa-user-circle"></i></div>
     <div class="dropdown-content">
    <a href="#">Account</a>
    <a href="#">page 1</a>
    <a href="#">page 2</a>
    <a href="#">page 3</a>
    <a href="#">Information</a>
    <a href="#">Signout</a>
  </div>
    </div>

<table style="color:blue;border-spacing: 15px;text-align:center;border:5px solid black; width:1000px; margin-left:200px; margin-top:100px">
<tr>
<th>ID</th>
<th>Item Name</th>
<th>Quantity</th>
<th>Status</th>
</tr>


    <!-- data display-->
<div>
<?php
        $usn=$_SESSION['id'];
        $name = $_SESSION['pass'];
        $sql = "SELECT * FROM buys WHERE it_no>0";
        $result = mysqli_query($conn,$sql);
        if($result){
        $row = mysqli_num_rows($result);
        if ($row > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr> <td>" . $row["id"]. "</td><td>" . $row["name"]."</td><td>" . $row["quantity"]."</td><td><input class='orders' id =".$row['it_no']." value='done' type='submit'></td></tr>";
                }
        } 
        }
        else {
                echo "<h2 style='text-align:center'>no orders</h2>";
                echo "<tr> <td>NULL</td><td>NULL</td><td>NULL</td><td></td></tr>";
        }
        $conn->close();
?></div>

</table>


<!-- Side panal -->
   </div>
    <div class='side_bar'>
    <i class="fas fa-book-reader" style='margin-top:38%;margin-left:28%;color:whitesmoke'></i>
    <h5 style='margin-top:-13%;margin-left:45%;color:whitesmoke;'>Admin</h5>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
     <p style='color:white;font-weight:100;'><i class="fas fa-tachometer-alt" style='color:white;margin-left:35px;'></i><a style="text-decoration:none;color:white"href="dashboard.php">&nbsp&nbsp&nbsp Dashboard</a></p>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>Interface</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-cogs" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp <a style="text-decoration:none;color:white" href="./additems.php">add items</a> </p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
  
    </div>
   </section>
  </section>
   
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
    <script src="js/manager.js" type="text/javascript"></script>
</body>
</html>