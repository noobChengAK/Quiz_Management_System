<?php include 'connectdb.php';?>
<?php 
$query = "DELETE FROM `quiz` WHERE `id` = '".$_GET['id']."'";
$result=$connection->query($query);
header('Location: quiz.php');
?>