<?php

session_start(); 

$mysqli=new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
$id= 0;
$Update=false;
$name='';
$location='';
$date_event='';

if(isset ($_POST['save'])){
	$name=$_POST['Name'];
	$location=$_POST['Location'];
	$date_event=$_POST['Date_event'];
	
	$mysqli->query("INSERT INTO data(Name, Location,Date_event) VALUES('$name', '$location','$date_event') ") or
	die($mysqli->error);
	
	$_SESSION['message'] ="record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	header("location: index.php");
	
}

if (isset($_GET['delete'])){
	$id= $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE Id=$id") or die($mysqli->error()); 


$_SESSION['message'] ="record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
		header("location: index.php");

}

if(isset($_GET['edit'])){
	$id=$_GET['edit'];
	$Update=true;
	$result=$mysqli->query("select * FROM data WHERE Id=$id") or die ($mysqli->error());
	if(count($result)==1){
		$row = $result->fetch_array();
		$name=$row['Name'];
		$location=$row['Location'];
		$date_event=$row['Date_event'];
	}
}

if(isset($_POST['Update'])){
	$id=$_POST['Id'];
	$name= $_POST['Name'];
	$location =$_POST['Location'];
	$date_event=$_POST['Date_event'];
	
	$mysqli->query("Update data SET Name='$name', Location='$location' ,Date_event='$date_event' WHERE Id='$id'") or die ($mysqli->error());
	$_SESSION['message']="record has been updated!";
	$_SESSION['msg_type']="warning";
	
	header('Location:index.php');
}
?>
