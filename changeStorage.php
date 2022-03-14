<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: 5login.php");
    exit;
}
 
// Include config file
require_once "3config.php";
 
// Define variables and initialize with empty values
$new_storage = "";
$new_storage_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new storage
	if(empty(trim($_POST["new_storage"]))){
		$storage_err =  "Please enter a new storage value in GB.";
	} else{
	    $new_storage = trim($_POST["new_storage"]);	
	}
           
    // Check input errors before updating the database
    if(empty($new_storage_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET storage = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_storage, $param_id);
            
            // Set parameters
            $param_storage = $new_storage;
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Storage updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: 5login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Storage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1 style="color:red;font-family:verdana;font-size:300%;">Cap Moments</h1>
		<h2>Update Storage</h2>
        <p>Please fill out this form to update your storage.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_storage_err)) ? 'has-error' : ''; ?>">
                <label>Choose Required Storage between 3GB and 5GB </label>
				<input type="number" name="new_storage" class="form-control" min="3" max="5" value="<?php echo $new_storage; ?>">
                <span class="help-block"><?php echo $new_storage_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="6dashboard.php">Cancel</a>
            </div>
        </form>
    </div>    
</body>
</html>