<?php

session_start();
include("../include/config.php");


if(isset($_POST['message']) && isset($_POST['id_channel']) && isset($_POST['date']))
{
	// REQUETE ID UTILISATEUR
	$message = $_POST['message'];
	$id_channel = $_POST['id_channel'];
	$login = $_SESSION['login'];
	$date = $_POST['date'];
	
	$req_id= "SELECT id FROM user WHERE login='$login'";
	$execute_req_id = mysqli_query($base, $req_id);
	$resultat_req_id = mysqli_fetch_array($execute_req_id);
	$id = $resultat_req_id['id'];
	

	$insert_message = "INSERT INTO message VALUES (NULL, '$id', '$id_channel', '$message', '$date')";
	mysqli_query($base, $insert_message);

}
else if(isset($_POST['channel']))
{
	// REQUETE MESSAGE
	$channel = $_POST['channel'];
	$req_message = "SELECT message.id, login, message, date_hour, id_chan FROM message, user WHERE id_chan = '$channel' and user.id = id_user ORDER BY message.id ASC";
	$execute_req_message = mysqli_query($base, $req_message);
	$ifexist=mysqli_num_rows($execute_req_message);

	if($ifexist != 0)
	{
		while($row = mysqli_fetch_assoc($execute_req_message)){
		    $json[] = $row;
		}
		echo json_encode($json);
	}	
}
else if(isset($_POST['id_svg']))
{
	$id_svg = $_POST['id_svg'];
	$delete_message = "DELETE FROM message WHERE id = '$id_svg'";
	mysqli_query($base, $delete_message);


}

else if (isset($_POST['nom_channel'])){
	
	$nom_channel = $_POST['nom_channel'];
	$insert_channel = "INSERT INTO chan values (NULL, '$nom_channel')";
	mysqli_query($base, $insert_channel);
}
else if(isset($_POST['id_chan']))
{
	
	$delete_mess = "DELETE FROM message WHERE id_chan = '$id_chan'";
	mysqli_query($base, $delete_mess);
	$id_chan = $_POST['id_chan'];
	$delete_chan = "DELETE FROM chan WHERE id ='$id_chan'";
	mysqli_query($base, $delete_chan);
}
else
{
	$req_channel = "SELECT * FROM chan";
	$execute_req_channel = mysqli_query($base, $req_channel);
	$ifexist=mysqli_num_rows($execute_req_channel);

	if($ifexist != 0)
	{


		while($row = mysqli_fetch_assoc($execute_req_channel)){
		    $json[] = $row;
		}

		$req_last_message = "SELECT chan.id, message, login FROM message, chan, user WHERE id_chan = chan.id and id_user = user.id GROUP by id_chan, date_hour ORDER BY date_hour ASC";
		$execute_req_last_message = mysqli_query($base, $req_last_message);
		$ifexist2=mysqli_num_rows($execute_req_last_message);



		if($ifexist2 != 0)
		{	
			while($row2 = mysqli_fetch_assoc($execute_req_last_message)){
			    $json[] = $row2;
			}
		}
		echo json_encode($json);
	}
}

?>


