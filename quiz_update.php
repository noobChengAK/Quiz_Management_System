<?php include 'connectdb.php';?>
<?php 
	$query = "SELECT * FROM quiz WHERE id = ".$_GET['id'].";";
	// var_dump($query);die;
	$result=$connection->query($query);
	if ($result->num_rows > 0) {
		while($row =$result->fetch_array() ){ 
			$quiz = $row;
			break;
    	}
	}
	// var_dump($quiz);die;	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "UPDATE `staff`.`quiz` SET `name` = '".$_POST['name']."', `author` = '".$_POST['author']."', `available` = '".$_POST['available']."', `duration` = '".$_POST['duration']."', `score` = ".$_POST['score']." WHERE `id` = ".$_GET['id'].";";
	// var_dump($query);die;
	$result=$connection->query($query);
	header('Location: quiz.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 
	<title>Update Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h1>Update Quiz</h1>
	<form role="form" method="POST">

	  <div class="form-group">
	    <label for="name">name</label>
	    <input type="text" class="form-control" name="name" value="<?= $quiz['name']?>">
	  </div>
	  <div class="form-group">
	    <label for="author">author</label>
	    <input type="text" class="form-control" name="author" value="<?= $quiz['author']?>">
	  </div>
	  <div class="form-group">
	    <label for="score">score</label>
	      <input type="number" class="form-control" name="score" value="<?= $quiz['score']?>">
	  </div>
	  <div class="form-group">
	    <label for="available">available</label>
	     <select class="form-control" name="available">
	      <option value="Yes" <?= $quiz['available'] == "Yes" ? "selected" : "" ?>>Yes</option>
	      <option value="No" <?= $quiz['available'] == "No" ? "selected" : "" ?>>No</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="duration">duration</label>
	    <input type="text" class="form-control" name="duration" value="<?= $quiz['duration']?>">
	  </div>	  	  
	  <button type="submit" class="btn btn-default">Update</button>
	</form>
</div>
</body>
</html>