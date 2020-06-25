<?php 
	include ('../include/config.php');

	$id = $_POST['id'];

	$select ="UPDATE user SET rank='membre' WHERE id =  '$id' ";
	$query=mysqli_query($base, $select) or die ($select);
?>