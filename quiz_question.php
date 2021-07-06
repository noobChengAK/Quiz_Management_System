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
// var_dump($westerncourse);die;
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
	<h1><a href="question_new.php?quiz_id=<?= $_GET['quiz_id']?>" class="btn btn-success">New Question</a></h1>
	<table class="table">
	   <thead>
	      <tr>
	      	 <th>#</th>
			 <th>Quiz Id</th>
			 <th>Content</th>
			 <th>Right Answer</th>
			 <th>Operations</th>
	      </tr>
	   </thead>
	   <tbody>
	   	<?php foreach ($question as $key => $value) { ?>
	   		<tr>
	   		 <td><input type="checkbox"></td>		
			 <td><?= $value['quiz_id']?></td>
			 <td><?= $value['content']?></td>
			 <td><?= $value['right_answer']?></td>
			 <td>
			 	<a href="question_delete.php?id=<?= $value['id']?>" class="btn btn-warning">Delete</a>
			 </td>
	      	</tr>
	   	<?php	
	   	}
	   	?>
	   </tbody>
	</table>
</div>
</body>
</html>