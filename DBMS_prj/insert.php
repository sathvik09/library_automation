<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_library";

$name=$_POST["name1"];
$usn=$_POST["usn1"];
$email=$_POST["email1"];
$dept=$_POST["dept1"];
$sem=$_POST["sem1"];
$pass=$_POST["pass1"];
$phno=$_POST["phno1"];
$secamt=$_POST["secamt1"];


// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

die("Connection failed: " . $conn->connect_error);

}

$sql = "INSERT INTO register (name1,usn1,email1,dept1,sem1,pass1,phno1,secamt1)
	VALUES ('$name','$usn','$email','$dept','$sem','$pass','$phno','$secamt')";

if ($conn->query($sql) === TRUE) {

echo "New record created successfully";

} else {															

echo "Error: " . $sql . "<br>" . $conn->error;

}

header("location:studentlogin.php");
$conn->close();

?>