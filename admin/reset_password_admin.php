<?php
session_start();
include("../connection.php");

if ($_POST) {
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    $result = $database->query("SELECT * FROM admin WHERE aemail='$email'");
    if ($result->num_rows == 1) {
        $update = $database->query("UPDATE admin SET apassword='$hashedPassword' WHERE aemail='$email'");
        if ($update) {
            echo "Password reset successfully!";
        } else {
            echo "Error resetting password!";
        }
    } else {
        echo "No account found with that email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="../css/reset_password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.css">
    <title>Reset Password - Admin</title>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in-container"> 
            <form action="#" method="post">
                <h1>Reset Password </h1>
                <span>Admin</span>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="newPassword" placeholder="Password">
                </div>

                <div class="inline-btn">
                    <button type="submit">Reset Password</button>
                </div>    
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right"> 
                    <h1>You Want Login Again</h1>
                    <p>Click to this login button</p> 

                    <div class="inline-btn">
                        <a href="../login.php"><button type="submit">Login</button></a>
                        <a href="../index.html"><button type="submit">Home</button></a>
                    </div>
                </div>
            </div> 
        </div>

    </div>
    
</body>
</html>
