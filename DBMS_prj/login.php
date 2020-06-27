<!DOCTYPE html>
<html>
<head>
	<title>Student login page</title>
	<link rel="stylesheet" type="text/css" href="css/studentlogin.css">
</head>
<body>
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
	<div class="student"><img src="images/student.png"></div>
	<div class="hi"><img id="hi" src="images/hi.png"></div>
	<div class="wave1"></div>
	<div class="main">
		<div id="login"><img src="images/bmslogo.png" alt="BMSCE"/><p>login<p></div>
		<form action="login.php" method="POST">
			<p><i class="fa fa-user" aria-hidden="true"></i> ID</p>
			<input id="user" type="text" name="ID" placeholder="Please Enter ID" autocomplete="off"/><br><br>
			<p><i class="fa fa-lock" aria-hidden="true"></i> Password</p>
			<input id="pass" type="Password" name="pass1" placeholder="Please Enter Password" autocomplete="off"/><br><br>
			<input class="sub" type="submit" value="SIGN IN"><br>
			<a class="a" href="index3.html">Create an Account</a>
			<a class="b" href="#">Forgot Password?</a>
		</form>
        <?php
		   $id=$password="";
		   if(isset($_POST['ID'])){
		   $id = (isset($_POST['ID']) ? $_POST['ID'] : '');
		   $password = (isset($_POST['pass1']) ? $_POST['pass1'] : '');
		   $sql_student = "SELECT * FROM student WHERE id = $id"; 
		   $sql_teacher = "SELECT * FROm teacher WHERE id = $id";
		   $update_a = "SELECT student FROM library_attendence WHERE id=1";
		   $update_b = "SELECT teacher FROM library_attendence WHERE id=1";
		   $result = mysqli_query($conn, $sql_student);
		   $result_teacher = mysqli_query($conn,$sql_teacher);
		   $attendence = mysqli_query($conn, $update_a);
		   $attendence_teacher = mysqli_query($conn, $update_b);
		   $row = '';
		   $row = mysqli_num_rows($result);
		   $row_t = mysqli_num_rows($result_teacher);
		   //echo $row;
		   if($row == 1){
			while($row = mysqli_fetch_assoc($result)) {
				if($row['pass']==$password){
					while($a = mysqli_fetch_assoc($attendence)) {
						$val = $a["student"]+1;
						$a_query = "UPDATE library_attendence SET student='$val' WHERE id=1";
						mysqli_query($conn, $a_query);
					}
					$get_name = "SELECT `name` FROM student WHERE `id`=$id";
			        $sq_name = mysqli_query($conn, $get_name);
			        foreach($sq_name as $name_user){
					  $user_name_acc = $name_user['name'];
					  $_SESSION['pass'] = $user_name_acc;
			         }
					$_SESSION['id'] = $id;
					$_SESSION['teacher'] = false;
				    header('location:dashboard.php');
				}
			}
		}
				if($row_t == 1){
					while($row_t = mysqli_fetch_assoc($result_teacher)){
                          if($row_t["password"]==$password){
							while($a1 = mysqli_fetch_assoc($attendence_teacher)){
								$val1 = $a1["teacher"]+1;
								$a_query_teacher = "UPDATE library_attendence SET teacher='$val1' WHERE id=1";
								mysqli_query($conn, $a_query_teacher);
							  }
							  $_SESSION['id'] = $id;
							  $_SESSION['pass'] = $password;
							  $_SESSION['teacher'] = true;
					          header('location:dashboard.php');
						  }
					}
				}
				else
				echo "<h5 style=color:red>Please enter a valid password</h5>";
		 
}
		?>
		
	</div>
	<div class="wave2"></div>
</body>
</html>