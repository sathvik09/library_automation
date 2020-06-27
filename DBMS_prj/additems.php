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

if(isset($_POST["upload"]))
{
 if($_FILES['product_file']['name'])
 {
  $filename = explode(".", $_FILES['product_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['product_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
     $i =6;
    $name = mysqli_real_escape_string($conn, $data[1]);  
    $quantity = mysqli_real_escape_string($conn, $data[2]);
    $price = mysqli_real_escape_string($conn, $data[3]);
    
    $query = "insert into books values('$i','$name','$quantity','$price')";
    mysqli_query($conn, $query);
    $i++;
   }
   fclose($handle);
   header("location: dashboard.php");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mybooks.css">
    <link rel="stylesheet" href="css/borrow.css">
</head>
<body>
<section>
   <div class='header'>
    <h5>Bangalore public library</h5>
     <h6 style='margin-left:85%;margin-top:-2%;'>hi </h6>
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

    <form method="post" enctype='multipart/form-data'>
    <p style="margin-top:10%;margin-left:10%"><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input style="margin-left:10%" type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
</section>
</body>
</html>