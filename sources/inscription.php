<?php
require '../class/bdd.php';
require '../class/user.php';

session_start();

if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}
if($_SESSION['user']->isConnected() != false){
    header('Location: ../');
}

?>
<!DOCTYPE html>
<html>
<head>
        <title>Inscription</title> 
        
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/inscription.js"></script>
        <link rel="stylesheet" href="../css/style.css">
</head>
<header>
<?php require '../include/nav.php'?>
</header>
<body>


<main>
    <section class="container center">
    <h1>Inscription</h1>

        <section class="bloc"> 
        <form name="inscription" action="inscription.php" method="post">
        
            <label for="login">Identifiant :</label>
            <input type="text" name="login" id="login" required>
            <!-- à faire pop en js-->
            <span name="login_ok"></span>
</br>
            <label for="firstName">Prénom :</label>
            <input type="text" name="name" id="name" required >
            <!-- à faire pop en js-->
            <span id="title"></span>
</br>
            <label for="surname">Nom :</label>
            <input type="text" name="surname" id="surname" required>
             <!-- à faire pop en js-->
             <span id="surname_empty"></span>
            <br>
            <label for="mail">Mail :</label>
            <input type="mail" name="mail" id="mail"  class="validate" required>
             <!-- à faire pop en js-->
             <span id="mail_empty"></span>
            <br>
            <label for="psw">Mot de passe :</label>
            <input type="password" name="psw" id="psw"  minlength="5" autocomplete="on" required>
             <!-- à faire pop en js-->
             <span id="psw_empty"></span>
            <br>
            <label for="pswconf">Confirmation du mot de passe :</label>
            <input type="password" name="pswconf" id="pswconf"  minlength="5" autocomplete="on" required >
             <!-- à faire pop en js-->
             <span id="pswconf_empty"></span>
            <br>
            
            <div id="b"></div>
            <input  class="btn btn-lg btn-success"TYPE="button" VALUE="Reset le formulaire" onClick="this.form.reset();"/>
            
        </form>
<p id="erreur"></p>
<p id="yeah"></p>
    </section>

<?php

if(isset($_POST['submit'])){
    
if ($_SESSION["user"]->inscription($_POST['login'],$_POST['name'],$_POST['surname'],$_POST['mail'],$_POST['psw'],$_POST['pswconf'])=="ok"){
header ('location: connexion.php');
}
elseif($_SESSION["user"]->inscription($_POST['login'],$_POST['name'],$_POST['surname'],$_POST["psw"],$_POST['pswconf'],$_POST['mail']) == "log"){
    ?>
        <p>L'identifiant ou l'email est déjà pris.</p>
    <?php
}
elseif($_SESSION["user"]->inscription($_POST['login'],$_POST['name'],$_POST['surname'],$_POST["psw"],$_POST['pswconf'],$_POST['mail']) == "empty"){
    ?>
        <p>Veuillez remplir tous les champs.</p>
    <?php
}
elseif($_SESSION["user"]->inscription($_POST['login'],$_POST['name'],$_POST['surname'],$_POST["psw"],$_POST['psw'],$_POST['mail']) == "psw"){
    ?>
        <p>Les mots de passes ne sont pas identiques.</p>
    <?php
}
}

?>
</section>


</main>



</body>
<footer>
<?php require '../include/footer.php'?>
</footer>

</html>