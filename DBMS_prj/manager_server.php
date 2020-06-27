<?php
  session_start();
  $servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";
$id = $_SESSION["id"];
echo $id;
$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn ->select_db($database) or die( "Unable to select database");
if(isset($_GET["itm_id"]))
{
    $book_id=$_GET["itm_id"];
    $sql = "UPDATE buys SET `it_no`=NULL,quantity=NULL where id = $id";
    $result = mysqli_query($conn, $sql);
    echo "Success";
    
}

?>