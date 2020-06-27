<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
<!-- Header -->

<?php

  session_start();
  $user = $_SESSION['pass'];
?>
   <section>
   <div class='header'>
     <form action="">
       <input class='bg-light search' type="text" placeholder='search for a book :)'>
       <i class="fas fa-search" style='background-color:#286fd7;color:white;padding:8px;margin-left:-4px;border-radius:5%;'></i>
     </form>
     <h6 style='margin-left:85%;margin-top:-2%;'>hi &nbsp <?php echo $user?> </h6>
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
    
<!-- Side panal -->
   </div>
    <div class='side_bar'>
    <i class="fas fa-book-reader" style='margin-top:38%;margin-left:28%;color:whitesmoke'></i>
    <h5 style='margin-top:-13%;margin-left:45%;color:whitesmoke;'><?php if($_SESSION["teacher"]){echo "Faculty";} else{echo "Student";} ?></h5>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
     <p style='color:white;font-weight:100;'><i class="fas fa-tachometer-alt" style='color:white;margin-left:35px;'></i><a style="color:white" href="dashboard.php">&nbsp&nbsp&nbsp Dashboard</a></p>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>Interface</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-cogs" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp <a style="text-decoration:none;color:white" href="./settings.php">Settings</a> </p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>view</p>
    <p style='color:white;font-weight:100;'><i class="fas fa-book-open" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp <a style="text-decoration:none;color:white" href="./cafeteria.php">Cafeteria</a> </p>
    <p style='color:white;font-weight:100;'><i class="fas fa-book" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp upcomming</p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    <p style='margin-top:-10px;margin-left:2px;font-size:10;color:#dadada;'>Statistics</p>
    <p style='color:white;font-weight:100;'><i class="far fa-chart-bar" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp <a style="text-decoration:none;color:white" href="./charts.php">Charts</a> </p>
    <hr class='bg-light' style='margin-top:11%;width:11em;'>
    </div>
   </section>

   <!-- Content -->
    <section>
    <h5 style='margin-top:-580px;margin-left:18%;color:#5b5b5b'>Dashboard</h5>
    <div class="card" style="width: 14rem;height:8em;margin-left:17%;margin-top:25px;box-shadow: 1px 5px 1px 3px #ddd9dd;">
   <div class="card-body">
    <h5 class="card-title">My Books</h5>
    <a href="./mybooks.php" class="btn btn-primary">go to books</a>
  </div>
</div>
<div class="card" style="width: 14rem;height:8em;margin-left:45%;margin-top:-128px;box-shadow: 1px 5px 1px 3px #ddd9dd;">
   <div class="card-body">
    <h5 class="card-title">Borrow a book</h5>
    <a href="./borrow.php" class="btn btn-primary">go inside?</a>
  </div>
</div>

<div class="card" style="width: 14rem;height:8em;margin-left:75%;margin-top:-128px;box-shadow: 1px 5px 1px 3px #ddd9dd;">
   <div class="card-body">
    <h5 class="card-title">Donate a Book</h5>
    <a href="./addbooks.php" class="btn btn-primary">inside?</a>
  </div>
</div>
<img class="mySlides" src="images/shtheory.jpg">
<img class="mySlides" src="images/got.jpg" >
<img class="mySlides" src="images/elonmusk.jpg">
<img class="mySlides" src="images/harrypotter.png">
<img class="mySlides" src="images/got2.jpg">
<h5 style='margin-top:-300px;margin-left:53%;color:grey'>New Collections</h5>
  </section>
   
    
    <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>