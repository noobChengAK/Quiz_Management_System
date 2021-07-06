<?php include 'connectdb.php';?>
<?php 

if (isset($_SESSION['uid']) == false) {
	header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "SELECT * FROM `user` WHERE id = '".$_SESSION['uid']."'";
	$result = $connection->query($query);
	if ($result->num_rows > 0) { 
		$query = "UPDATE `kangmeiyuanchao`.`user` SET `password` = '".$_POST['password']."' WHERE `id` = '".$_SESSION['uid']."'";
	    $result = $connection->query($query);
	    $message = '修改成功！';
	    header('Location: changepassword.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title>Change Password</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
	<h1>Change Password</h1>
	<p><?= $message ?></p>
	<form role="form" method="POST">
	  <div class="form-group">
	    <label for="password">password</label>
	    <input type="password" class="form-control" name="password" >
	  </div>  	  
	  <button type="submit" class="btn btn-default">Update</button>
	</form>
</div>
</body>
</html>