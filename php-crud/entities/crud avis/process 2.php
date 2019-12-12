<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php

session_start(); 

$mysqli=new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$id= 0;
$Update=false;
$name='';
$email='';
$feedback='';
$saveerr='';
$nameErr='';
$emailErr='';

if(isset ($_POST['save'])){
	$name=$_POST['Name'];
	if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["Name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
	
	$email=$_POST['Email'];
	if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$email)) {
      $emailErr = "Only letters and white space allowed";
    }
  }
	 
	$feedback=$_POST['feedback'];
	if (empty($_POST["feedback"])) {
    $feedback = "Feedback is required";
  } else {
    $feedback= test_input($_POST["feedback"]);
    
/*	 if (empty($_POST["feedback"])) {
    $feedback = "";
  } else {
    $feedback = test_input($_POST["feedback"]);
  }*/
  }
  
	
	$mysqli->query("INSERT INTO avis(Name, Email,Feedback) VALUES('$name', '$email','$feedback') ") or
	die($mysqli->error);
	
	$_SESSION['message'] ="record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	header("location: index 2.php");
	
}


if(isset($_POST['Update'])){
	$id=$_POST['Id'];
	$name= $_POST['Name'];
	$email =$_POST['Email'];
	$feedback=$_POST['Feedback'];
	
	$mysqli->query("Update avis SET Name='$name', Location='$email' ,Date_event='$feedback' WHERE Id='$id'") or die ($mysqli->error());
	$_SESSION['message']="record has been updated!";
	$_SESSION['msg_type']="warning";
	
	header('Location:index.php');
}

function test_input($avis) {
  $avis = trim($avis);
  $avis = stripslashes($avis);
  $avis = htmlspecialchars($avis);
  return $avis;
}
?>
</body>
</html>
