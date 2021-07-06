<?php include 'connectdb.php';?>
<?php 
$message = '';	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "SELECT * FROM `user` WHERE username = '".$_POST['username']."'";
	$result=$connection->query($query);
	if ($result->num_rows > 0) { 
	    $message = 'username alread exists!';
	} else {
		$query = "INSERT INTO `user`(`username`, `password`, `role`) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['role']."');";
		// var_dump($query);die;
		$result=$connection->query($query);
		header('Location: login.php?message=success');
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>	
	<h1>Online Quiz Register</h1>
	<p><?= $message ?></p>
	<form role="form" method="POST">
	  <div class="form-group">
	    <label for="username">username</label>
	    <input type="text" class="form-control" name="username" id="username" placeholder="">
	  </div>		
	  <div class="form-group">
	    <label for="password">password</label>
	    <input type="password" class="form-control" id="password" name="password" placeholder="">
	  </div>
	  <div class="form-group">
	    <label for="role">role</label>
	    <select class="form-control" name="role">
	      <option value="0">staff</option>
	      <option value="1">student</option>
	    </select>
  	  </div>  	  
	  <button type="submit" class="btn btn-default">register</button>
	</form>
</div>

</body>
</html>