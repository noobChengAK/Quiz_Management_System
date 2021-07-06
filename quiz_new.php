<?php include 'connectdb.php';?>
<?php 
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "INSERT INTO `quiz`(`name`, `author`, `available`, `duration`, `score`) VALUES ('".$_POST['name']."', '".$_POST['author']."', '".$_POST['available']."', '".$_POST['duration']."', '".$_POST['score']."');";
	// var_dump($query);die;
	$result=$connection->query($query);
	header('Location: quiz.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title>New Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>New Quiz</h1>
	<form role="form" method="POST">
	  <div class="form-group">
	    <label for="name">name</label>
	    <input type="text" class="form-control" name="name">
	  </div>
	  <div class="form-group">
	    <label for="author">author</label>
	    <input type="text" class="form-control" name="author">
	  </div>
	  <div class="form-group">
	    <label for="available">available</label>
	     <select class="form-control" name="available">
	      <option value="Yes">Yes</option>
	      <option value="No">No</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="score">score</label>
	      <input type="number" class="form-control" name="score">
	  </div>
	  <div class="form-group">
	    <label for="duration">duration</label>
	    <input type="text" class="form-control" name="duration">
	  </div>	  	  
	  <button type="submit" class="btn btn-default">Create</button>
	</form>
</div>
</body>
</html>