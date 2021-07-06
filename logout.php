<?php include 'connectdb.php';?>
<?php 
if (isset($_SESSION['uid'])) {
	unset($_SESSION['uid']);
}
header('Location: index.php');
?>
