<?php
require_once("db.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	foreach($_POST as $key=>$value)
	{
	if(empty($_POST[$key]))
	{
		$error_message="All fields are required";
		break;
	}
	}
	
	$name=$_POST["name"];
	$email=$_POST["email"];
	$mob=$_POST["mob"];
	$course=$_POST["course"];
	
/*Name validation*/
if (!isset($error_message)) {
	if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
$error_message="Invalid name";
	}
}
	
/*Email  validation */
if (!isset($error_message)) {
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
$error_message="Invalid Email Address";
	}
}	

/*phone number  validation and length validation*/
if (!isset($error_message)){
if(!is_nan($mob) && strlen($mob)!=10){
	$error_message="Invalid phone number";
}
}

	if(!isset($error_message)) {
		
   $q1 = mysqli_query($con,"INSERT INTO `student` (`name`, `mob`, `email`, `course`) VALUES ('$name', '$mob', '$email', '$course');");
   if($q1){
	   unset($_POST);
	   $success_message="<strong>Success</strong>, You are successfully registred.<br>";
   }
   }
}	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>
  <div class="container">   
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!-- Sign Up form -->
        <form action="" class="Signup" method="POST">
          <h3>Registration Form</h3>
          <?php if(!empty($success_message)) {?>
            <div class="alert alert-success">
                <?php if (isset($success_message))echo $success_message;?>
              <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
              </div>	
          <?php } ?>
          <?php if(!empty($error_message)) {?>
            <div class="alert alert-danger">
              <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
                <?php if (isset($error_message))echo $error_message;?>
              </div>	
          <?php } ?>
          <div class="form-group">
              <label for="name">Full Name</label>
            <input type="text" class="form-control" placeholder="Full Name" name="name" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
            <input type="text" class="form-control" placeholder="Enter Email" name="email" required>
          </div>      
          <div class="form-group">
              <label for="mob">Mobile</label>
            <input type="text" class="form-control" placeholder="Enter Mobile" name="mob" required> 
          </div>  
          <div class="form-group">
              <label for="mob">Course</label>
            <input type="text" class="form-control" placeholder="Enter Course" name="course" required> 
          </div>  
          <button type="submit" class="btn btn-success">Signup</button> 
          <div class="form-group">
            <p class="not-yet">Already have an account? <a href="#">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>