<?php 
	include ('../include/config.php');

	$id = $_POST['id'];

	$select="DELETE user, message  FROM user INNER JOIN message ON
    		  user.id= message.id_user WHERE user.id=  $id";
	$query=mysqli_query($base, $select) or die ($select);
?>