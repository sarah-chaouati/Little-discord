<?php 
	include ('../include/config.php');

	$id = $_POST['id'];

	$select ="UPDATE user SET rank='admin' WHERE id =  '$id' ";
	$query=mysqli_query($base, $select) or die ($select);
?>