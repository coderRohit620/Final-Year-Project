<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup1.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
    rel="stylesheet"/>
    <title>Sign Up</title>
    
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>

<div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="#" method="POST" class="sign-up-form">
              
              <h2 class="title">Sign up</h2>
              <div class="input-field">
                <i class="ri-user-3-fill"></i>
                <input type="text" name="fname" placeholder="First rname" />
              </div>
              <div class="input-field">
                <i class="ri-user-3-fill"></i>
                <input type="text" name="lname" placeholder="Second name" />
              </div>
        
              <div class="input-field">
                <i class="ri-home-4-fill"></i>
                <input type="text" name="address" placeholder="Address" />
              </div>
              
              <div class="input-field">
                <i class="ri-calendar-fill"></i>
                <input type="date" name="dob" />
              </div>
        
            <div class="btn-inline">
              <button type="reset" value="Reset" name="sub">Reset</button>
              <button type="submit" value="next" >Next</button>
            </div>
            </form>
        </div>
      </div>
      
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            
            <h1>New here ?</h1>
            <p>
              Don't Worry if you don't have any account.. Create its
            </p>

            <div class="btn-inline">
              <a href="login.php">
                <button class="btn transparent" id="login-up-btn">Log In</button>
              </a>
              <a href="index.html">
                <button class="btn transparent" >Home</button>
              </a>
            </div>
          </div>

          <div>
            <img src="img/register.svg" class="image" alt="" />
          </div>

    </div>

</body>
</html>