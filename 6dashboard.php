<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: 5login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>! Welcome to Cap Moments.</h1>
    </div>
    <p>
        Your email is <b><?php echo ($_SESSION["email"]); ?></b><br>
		Your address is <b><?php echo ($_SESSION["address"]); ?></b><br>
		Your phone number is <b><?php echo ($_SESSION["phoneno"]); ?></b><br><br>
		You have <b><?php echo ($_SESSION["storage"]); ?> GB of storage</b><br><br>
		<a href="resetPassword.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a><br><br>
		<a href="updateEmail.php" class=" btn btn-info">Update Email</a><br><br>
		<a href="updateAddress.php" class="btn btn-default">Update Address</a><br><br>
		<a href="updatePhone.php" class="btn btn-primary">Update Phone Number</a><br><br>
		<a href="changeStorage.php" class="btn btn-block">Change Allocated Storage</a>
		
    </p>
</body>
</html>