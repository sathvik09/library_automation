<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "online_library";

$conn = new mysqli($servername, $username, $password,$database);
 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

$conn ->select_db($database) or die( "Unable to select database");

$query = "SELECT books.genere,COUNT(books.genere) as bk FROM books INNER JOIN borrow_return ON books.isbn = borrow_return.isbn AND borrow_return.issued=1 GROUP BY books.genere";
   $result_sub = mysqli_query($conn,$query);
   while($row = mysqli_fetch_assoc($result_sub)){
     $entries[] = array("x" => $row["genere"],"value" => $row["bk"]);
  }
   //$entriea_send[] = array("genere"=>"copies")+$entries;
 
  //echo $entries;
  echo json_encode($entries);

?>
