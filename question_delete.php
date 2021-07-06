<?php include 'connectdb.php';?>
<?php 
$query = "DELETE FROM `quiz_question` WHERE `id` = '".$_GET['id']."'";
// var_dump($query);die;
$result=$connection->query($query);
header('Location: quiz.php');
?>