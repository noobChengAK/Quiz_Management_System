<?php include 'connectdb.php';?>
<?php 
$query="select * from quiz";
$result=$connection->query($query);
$index = 0;
$quiz = [];
if ($result) {
	if($result->num_rows>0){ 
		while($row =$result->fetch_array() ){ 
			$quiz[$index++] = $row;
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
	<title>Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
	<h1><a href="quiz_new.php" class="btn btn-success">New Quiz</a></h1>
	<table class="table">
	   <thead>
	      <tr>
	      	 <th>#</th>
			 <th>Name</th>
			 <th>Author</th>
			 <th>Available</th>
			 <th>Score</th>
			 <th>Duration</th>
			 <th>Operations</th>
	      </tr>
	   </thead>
	   <tbody>
	   	<?php foreach ($quiz as $key => $value) { ?>
	   		<tr>
	   		 <td><input type="checkbox"></td>		
			 <td><?= $value['name']?></td>
			 <td><?= $value['author']?></td>
			 <td><?= $value['available']?></td>
			 <td><?= $value['score']?></td>
			 <td><?= $value['duration']?></td>
			 <td>
			 	<a href="quiz_question.php?quiz_id=<?= $value['id']?>" class="btn btn-warning">Questions</a>
			 	<a href="quiz_delete.php?id=<?= $value['id']?>" class="btn btn-danger">Delete</a>
			 	<a href="quiz_update.php?id=<?= $value['id']?>" class="btn btn-success">Update</a>
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