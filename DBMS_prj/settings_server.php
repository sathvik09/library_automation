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
    if(isset($_GET["old_pass"])){
       $old_pass = $_GET["old_pass"];
       $new_pass = $_GET["new_pass"];
       $id = $_SESSION["id"];
       if($_SESSION["teacher"]){
         $admin = "teacher";
       }
       else
       $admin = "student";
       
       $sql = "SELECT `pass` FROM $admin WHERE `id`=$id";
       $result = mysqli_query($conn, $sql);
       foreach($result as $row){
         $acc_pass = $row["pass"];
       }
       if($acc_pass == $old_pass){
         $sql_update = "UPDATE $admin SET pass = '$new_pass' WHERE `id`= $id";
         mysqli_query($conn,$sql_update);
         echo "password updated";
       }
       else
         echo "old password is wrong";  
      }
?>