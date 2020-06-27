<?php
  session_start();
  $servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";
$id = $_SESSION["id"];

$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn ->select_db($database) or die( "Unable to select database");
if(isset($_GET["itm_no"]))
{
    $it_no = $_GET["itm_no"];
    $qty = $_GET["quantity"];
    $balance = "SELECT bal FROM student WHERE id=$id";
    $amount_query = "SELECT price FROM cafeteria WHERE it_no=$it_no";
    $amount_val = mysqli_query($conn, $amount_query);
    foreach($amount_val as $row){
      $amount_value = $row["price"]*$qty;
    }

    $result1 = mysqli_query($conn, $balance);
    foreach($result1 as $row){
      $bal = $row["bal"];
    }
    if($bal>$amount_value){
      $sql = "UPDATE buys SET `it_no`=$it_no,quantity=$qty where id = $id";
      mysqli_query($conn, $sql);
      $bal = $bal-$amount_value;
      $update_cash = "UPDATE student SET bal=$bal WHERE id = $id";

      $get_cash = "SELECT amount FROM collections WHERE id=1";
      $result2 = mysqli_query($conn, $get_cash);
      foreach($result2 as $row1){
        $available = $row1["amount"];
      }
      $available = $available+$amount_value;
      $cash_update_query = "UPDATE collections SET `amount` = $available WHERE `id`=1";
      mysqli_query($conn, $cash_update_query);

      mysqli_query($conn, $update_cash);
      $str = "order placed";
      $results[] = array("message"=>$str);
    }
   else{
     $str = "no funds";
    $results[] = array("message"=>$str);
   }
    echo json_encode($results);
    
}
?>