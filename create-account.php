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
    <title>Create Account</title>
    <style>
        .container{
            animation: transitionIn-X 0.5s;
        }
    </style>
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


//import database
include("connection.php");





if($_POST){

    $result= $database->query("select * from webuser");

    $fname=$_SESSION['personal']['fname'];
    $lname=$_SESSION['personal']['lname'];
    $name=$fname." ".$lname;
    $address=$_SESSION['personal']['address'];
    $nic=$_SESSION['personal']['nic'];
    $dob=$_SESSION['personal']['dob'];
    $email=$_POST['newemail'];
    $tele=$_POST['tele'];
    $newpassword=$_POST['newpassword'];
    $cpassword=$_POST['cpassword'];
    
    if ($newpassword==$cpassword){
        $result= $database->query("select * from webuser where email='$email';");
        if($result->num_rows==1){
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        }else{
            
            $database->query("insert into patient(pemail,pname,ppassword, paddress, pnic,pdob,ptel) values('$email','$name','$newpassword','$address','$nic','$dob','$tele');");
            $database->query("insert into webuser values('$email','p')");

            //print_r("insert into patient values($pid,'$email','$fname','$lname','$newpassword','$address','$nic','$dob','$tele');");
            $_SESSION["user"]=$email;
            $_SESSION["usertype"]="p";
            $_SESSION["username"]=$fname;

            header('Location: patient/index.php');
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
        
    }else{
        $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>';
    }



    
}else{
    //header('location: signup.php');
    $error='<label for="promter" class="form-label"></label>';
}

?>

<div class="container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="#" method="POST" class="sign-up-form">
              
              <h2 class="title">Create Account</h2>
              <div class="input-field">
                <i class="ri-mail-fill"></i>
                <input type="email"  name="newemail" placeholder=" Enter Email" />
              </div>
              <div class="input-field">
                <i class="ri-smartphone-fill"></i>
                <input type="tel" name="tele" placeholder="ex: 0712345678"/>
              </div>
        
              <div class="input-field">
                <i class="ri-lock-2-fill"></i>
                <input type="password" name="newpassword" placeholder="New Password" />
              </div>
              
              <div class="input-field">
                <i class="ri-lock-2-fill"></i>
                <input type="password" name="cpassword" placeholder="Confirm Password" />
              </div>
        
            <div class="btn-inline">
              <button type="reset" value="Reset" name="sub">Reset</button>
              <button type="submit" value="next" >Sign Up</button>
            </div>
            </form>
        </div>
      </div>
      
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            
            <h1>New here ?</h1>
            <p>
              Last step, Enter your detail's for creating your Account
            </p>

            <div class="btn-inline">
              <a href="login.php">
                <button class="btn transparent" id="login-up-btn">Log In</button>
              </a>
              <a href="signup.php">
                <button class="btn transparent" >Go Back</button>
              </a>
            </div>
          </div>

          <div>
            <img src="img/register.svg" class="image" alt="" />
          </div>

    </div>

</body>
</html>