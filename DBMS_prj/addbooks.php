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
    $isbn = mysqli_real_escape_string($conn, $data[0]);
    $name = mysqli_real_escape_string($conn, $data[1]);  
    $publication = mysqli_real_escape_string($conn, $data[2]);
    $edition = mysqli_real_escape_string($conn, $data[3]);
    $genre = mysqli_real_escape_string($conn, $data[4]);
    $permitions = mysqli_real_escape_string($conn, $data[5]);
    
    $query = "insert into books values('$isbn','$name','$publication','$edition',0,'$genre','$permitions',0)";
    mysqli_query($conn, $query);

    $query1 ="INSERT INTO borrow_return VALUES ($isbn,NULL,NULL,NULL,NULL,0)";
   mysqli_query($conn,$query1);

   $delete_zero_row = "DELETE from student WHERE `name`='name'";
   mysqli_query($conn,$delete_zero_row);
   }
   fclose($handle);

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
     <h6 style='margin-left:85%;margin-top:-2%;'>hi <?php echo $_SESSION['pass']?></h6>
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
    <a style="text:decoration:none;color:red" href="./dashboard.php"><input style="margin-left:70%;margin-top:5%;color:blue;width:140px;height:40px;" type="button" value="To dashboard"></a>

    <form method="post" enctype='multipart/form-data'>
    <p style="margin-top:10%;margin-left:10%"><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="product_file" /></p>
    <br />
    <input style="margin-left:10%" type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
</section>
</body>
</html>