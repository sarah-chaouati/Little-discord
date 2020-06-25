<?php session_start();

require '../class/bdd.php';
require '../class/user.php';

// MEMBRE OU ADMIN
$test = new user();
$log=$test->connexion($_SESSION['login'],$_SESSION['psw']);


if(!isset($_SESSION['login']))
{
  header('Location: ../');
}
?>

<!DOCTYPE html><html class=''>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'><link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link href="../css/chat.css" rel="stylesheet">

</head>

<body id="<?php echo $log[5];?>" class="chat">

<header>
  <?php require '../include/nav.php'?>
</header>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nom du channel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input id="nom_channel" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button id="ajout_channel" type="button" class="btn btn-primary">Ajouter</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<main>
  <div id="frame">
  	<div id="sidepanel">
  		<div id="profile">
  			<div class="wrap">
  				<p id="name_user"><?php echo $_SESSION['login'];?></p>
  			</div>
  		</div>
  		<div id="channels">
  		<!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
        <ul id="liste_channel">	
  			</ul>
      <!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
  		</div>
      <div>
      <!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
        <ul id="liste_channel"> 
          <?php if($log[5] == "admin")
          {
          ?>
          <li class="ajout_channel">
            <svg data-toggle="modal" data-target="#exampleModal" class="add_channel bi bi-plus-circle" width="2.5em" height="2.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 3.5a.5.5 0 01.5.5v4a.5.5 0 01-.5.5H4a.5.5 0 010-1h3.5V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M7.5 8a.5.5 0 01.5-.5h4a.5.5 0 010 1H8.5V12a.5.5 0 01-1 0V8z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
            </svg>
          </li>
          <?php
          }
          ?>
        </ul>
      <!-- AFFICHAGE DES CANAUX DE DISCUSSION -->
      </div>
  	</div>
  	<div class="content">
  		<div class="nom_canal">
  			<p id="nom_canal"></p>
  		</div>
  		<div class="messages">
  			<ul>
  			</ul>
  		</div>
  		<div class="message-input">
  			<div class="wrap">
  			<input id="message_send" type="text" placeholder="Écrivez votre message..." />
  			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
  			</div>
  		</div>
  	</div>
  </div>
</main>

<footer>
  <?php require '../include/footer.php'?>
</footer>

<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src="../js/chat/chat.js"></script>

</body>
</html>