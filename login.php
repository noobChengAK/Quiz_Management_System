<?php include 'connectdb.php';?>
<?php 
$message = isset($_GET['message']) ? $_GET['message'] : '';	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "SELECT * FROM `user` WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
	$result = $connection->query($query);
	if ($result->num_rows > 0) { 
		while($row = $result->fetch_array() ){ 
			$user = $row;
			// break;
    	}
	    $_SESSION['uid'] = $user['id'];
	    $_SESSION['username'] = $user['username'];
	    // var_dump($_SESSION['username']);die;
	    header('Location: index.php');
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
	<h1>Login</h1>
	
	<form role="form" method="POST">
	  <div class="form-group">
	    <label for="username">username</label>
	    <input type="text" class="form-control" name="username" placeholder="">
	  </div>		
	  <div class="form-group">
	    <label for="password">password</label>
	    <input type="password" class="form-control" name="password" placeholder="">
	  </div>  	  
	  <button type="submit" class="btn btn-default" onclick="return login();">Login</button>
	</form>
	<h2 style="padding-top: 2%;"><?= $message ?></h2>
</div>
<script type="text/javascript">
	// console.log(1);
	function login()
	{
		
		username = document.getElementById('username').value;
		password = document.getElementById('password').value;
		if (username == '' || password == '') {
			alert('请输入用户名和密码！');
			return false;
		}
		// console.log(username);
		
	}
</script>
</body>
</html>