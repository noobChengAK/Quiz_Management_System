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
	<title>Student Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
<h1><a href="index.php" class="btn btn-info">Back Home</a></h1>
	<table class="table">
	   <thead>
	      <tr>
	      	 <th>#</th>
			 <th>Name</th>
			 <th>Author</th>
			 <th>Available</th>
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
			 <td><?= $value['duration']?></td>
			 <td>
			 	
			 	<?php 
			 	$query2 = "SELECT SUM(score) AS total FROM student_answer WHERE user_id = '".$user['id']."' AND quiz_id = '".$value['id']."' GROUP BY user_id, quiz_id;";
			 	$result2 = $connection->query($query2);
			 	$total = 0;
			 	if ($result2) {
					if($result2->num_rows > 0) { 
						while($row2 =$result2->fetch_array() ){ 
							$total = $row2['total'];
				    	}
				    	// $index++;
					}
				}
			 	?>
			 	<?php if ($total == 0) { ?>
			 		<a href="quiz_answer.php?quiz_id=<?= $value['id']?>" class="btn btn-success">Answer</a>
			 	<?php } ?>
			 	<a href="#" class="btn btn-warning">Your last score: <?= $total?></a>
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