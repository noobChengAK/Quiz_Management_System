<?php include 'connectdb.php';?>
<?php 
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$query = "INSERT INTO `quiz_question`(`quiz_id`, `content`, `right_answer`) VALUES ('".$_POST['quiz_id']."', '".$_POST['content']."', '".$_POST['right_answer']."');";
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
	<h1>New Question</h1>
	<form role="form" method="POST">
		<input hidden="hidden" name="quiz_id" value="<?= $_GET['quiz_id']?>">
	  <div class="form-group">
	    <label for="content">content</label>
	    <textarea name="content" rows="5" class="form-control"></textarea> 
	  </div>
	  <div class="form-group">
	    <label for="answer">answer</label>
	    <input type="text" class="form-control" name="right_answer">
	  </div>	  	  
	  <button type="submit" class="btn btn-default">Create</button>
	</form>
</div>
</body>
</html>