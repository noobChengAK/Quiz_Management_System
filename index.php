<?php include 'connectdb.php';?>
<?php
// $query="select * from westerncourse";
// if (isset($_GET['sort'])) {
// 	$query="select * from westerncourse ORDER BY ".$_GET['sort'] ." DESC";
// }
// $result=$connection->query($query);
// $index = 0;
// $westerncourse = [];
// if ($result) {
// 	if($result->num_rows>0){ 
// while($row =$result->fetch_array() ){ 
// 	$westerncourse[$index++] = $row;
//     	}
//     	// $index++;
// 	}
// // var_dump($westerncourse);die;
// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Online Quiz - Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">  
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php include('header.php');?>
<h1>Online Quiz - Home</h1>
<p>Start Quiz</p>
<div class="media">
  <div class="media-left">
    <!-- <img src="images/1.png" class="media-object" style="width:60px"> -->
  </div>
  <div class="media-body">
    <h4 class="media-heading">Structure query language</h4>
    <p>Structure query language great work</p>
  </div>
</div>
<p><a class="btn btn-primary btn-lg" href="changepassword.php" role="button">
	Change Password</a>
</p>
<!-- <image src="images/2.jpg"></image> -->
<p style="padding-top: 5%;">
    <a class="btn btn-success btn-lg" href="index.php" role="button">
    Home Page</a>
</p>
</div>
</body>
</html>