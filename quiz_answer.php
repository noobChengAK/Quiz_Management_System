<?php include 'connectdb.php';?>
<?php 
$query="select * from quiz_question WHERE quiz_id = ".$_GET['quiz_id'];
$result=$connection->query($query);
$index = 0;
$question = [];
if ($result) {
	if($result->num_rows>0){ 
		while($row =$result->fetch_array() ){ 
			$question[$index++] = $row;
    	}
    	// $index++;
	}
// var_dump($question);die;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	foreach ($question as $key => $value) {
		if (isset($_POST[$value['id']])) {
			if ($_POST[$value['id']] == $_POST[$value['id']."_answer"]) {
				$score = $_POST[$value['id']."_score"];
			} else {
				$score = 0;
			}
			$query = "INSERT INTO `student_answer`(`user_id`, `quiz_id`, `question_id`, `answer`, `score`) VALUES ('".$user['id']."', '".$_GET['quiz_id']."', '".$value['id']."', '".$_POST[$value['id']]."', '".$score."');";
			// var_dump($query);die;
			$result=$connection->query($query);
		}
	}

	// var_dump($query);die;
	
	header('Location: student_quiz.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Questions of Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
	<h1>Answer Quiz</h1>
	<form role="form" method="POST">
	<?php foreach ($question as $key => $value) { ?>
	  <div class="form-group">
	    <label for="name">#<?= $key+1?></label>
	    <p><?= $value['content'] ?></p>
	    <input type="text" class="form-control" name="<?= $value['id']?>">
	    <input hidden name="<?= $value['id']?>_answer" value="<?= $value['right_answer']?>">
	    <input hidden name="<?= $value['id']?>_score" value="<?= round($value['score'] / count($question)) ?>">
	  </div>
	<?php } ?>	  	  
	  <button type="submit" class="btn btn-default">Answer</button>
	</form>
</div>
</body>
</html>