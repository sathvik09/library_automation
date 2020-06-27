<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/setings.css">
    <title>Account settings</title>
</head>
<body style = "overflow:visible;">
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
    <h3 class="heading">Security<i class="fas fa-shield-alt"></i></h3>
    <div class="card security" style="width: 38rem;margin-left:200px;margin-top:5%;">
  <div class="card-body settings">
    <h5 class="card-title">Update Password</h5>
    <p>Old Password :<input type="text" class="text" style="margin-left:20px;" /></p><br>
    <p>New Password :<input type="password" class="text" style="margin-left:20px;" /></p><br>
    <p>Confirm Password :<input type="password" class="text" /><input style="margin-left:50px;" type="button" class="submit btn3" value="submit" /></p><br>
  </div>
</div>
<!-- Side panal -->
   </div>
   <div class='side_bar'>
    <i class="fas fa-book-reader" style='margin-top:38%;margin-left:28%;color:whitesmoke'></i>
    <h5 style='margin-top:-13%;margin-left:45%;color:whitesmoke;'><?php if($_SESSION["teacher"]){echo "Faculty";} else{echo "Student";} ?></h5>
     <hr class='bg-light' style='margin-top:11%;width:11em;'>
     <p style='color:white;font-weight:100;'><i class="fas fa-tachometer-alt" style='color:white;margin-left:35px;'></i>&nbsp&nbsp&nbsp Dashboard</p>
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
   
    <script src="https://kit.fontawesome.com/fbe06f22f8.js" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script>
     let text = document.querySelectorAll('.text');
     let submit = document.querySelector('.btn3');
  
     function update_pass(data){
    $.ajax({
       url: 'settings_server.php',
       data:data,
       success: function(data){
           console.log(data);
           
       }
   })
}
  submit.addEventListener('click',()=>{    
    if(text[2].value==text[1].value){
          data = {
              "old_pass":text[0].value,
              "new_pass":text[1].value
          }
          update_pass(data);
          for(let x=0;x<text.length;x++){
            text[x].value='';
          }
    }
    else{
      alert("password doe not match")
    }
  })
   </script>
</body>
</html>