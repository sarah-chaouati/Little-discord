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
        <title>Connexion</title> 
        
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/connexion.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        

</head>

<header>
<?php require '../include/nav.php'?>
</header>
<body>


<main>


<section class="container center">

<h1> Connexion </h1>
        <form name="connexion" method="post">
        
            <label>Identifiant : </label>
            <input type="text" name="login" id="login" required>
            
            <br>
            <label>Mot de passe :</label>
            <input type="password" name="psw" id="psw" minlength="5" autocomplete="on" required ><br>

            <input  class="btn btn-lg btn-success" TYPE="button" VALUE="Reset le formulaire" onClick="this.form.reset();"/>
            <input  class="btn btn-lg btn-success" type="submit" name="submit" id="submit"  value="Envoyer"/>
        </form>
        <p id="erreur"></p>
        <p id="yeah"></p>

<?php
if(isset($_POST["submit"])){
    if($_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]) == false){
        ?>
            <p>Un problème est survenue lors de la connexion veuillez vérifer vos informations de connexion</p>
        <?php
    }
    else{
        $_SESSION["user"]->connexion($_POST["login"],$_POST["psw"]);
        $_SESSION["login"] = $_POST['login'];
        $_SESSION['psw'] = $_POST['psw'];
        if($_SESSION['user']->getrank() == "admin"){
            $_SESSION["perm"] = true;
        }
        header('location: chat.php');
    }
    
}

?>
</div>
</section>



</main>

<footer>
<?php require '../include/footer.php'?>
</footer>

</body>

</html>