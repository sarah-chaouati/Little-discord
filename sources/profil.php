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
if($_SESSION['user']->isConnected() != true){
    header('Location: ../');
}?>
<!DOCTYPE html>
<html>

<head>
        <title>Profil</title> 
        
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/profil.js"></script>
        <link rel="stylesheet" href="../css/style.css">
        
</head>
<header>
<?php require '../include/nav.php'?>
</header>
<body>


<main>


<section class="container center">
<h1> Mon compte </h1>

    <section class="bloc">
        <h3>Mes Informations</h3>
          <article>
              <ul>
                  <li>Mon pseudo : <?php echo $_SESSION['user']->getlogin(); ?></li>
                  <li>Mon mail : <?php echo $_SESSION['user']->getmail() ?></li>
              </ul>
          </article>

    </section>
   
    <section class="bloc">
        <h3>Modifier mes informations</h3>
    
                <form action="profil.php" method="POST" name="profil">
                    
                    <label>Identifiant : </label>
                    <input type="text"  id="login" name="login" value="<?php echo $_SESSION['user']->getlogin(); ?>"><br>
                    <label>Mail :</label>
                    <input type="mail" id="mail" name="mail" value="<?php echo $_SESSION['user']->getmail() ?>"><br>
                    <label>Mot de passe : </label>
                    <input type="password" name="psw"  id="psw" autocomplete="off" required minlength="5"/><br>
                    <label>Confirmation Mot de passe:</label>
                    <input type="password" name="pswconf" id="pswconf" required autocomplete="off"><br>
                    
                    <input class="btn btn-lg btn-success" TYPE="button" VALUE="Reset le formulaire" onClick="this.form.reset();">
                    <input class="btn btn-lg btn-success" type="submit" name="submit" id="submit"  value="Envoyer"></button>
                    
                </form>
                <p id="erreur"></p>
                <p id="yeah"></p>

        <?php 
        if(isset($_POST["submit"]))
        {
                if(!empty($_POST["pswconf"])){
                    if(!empty($_POST["login"])){
                        $_SESSION['user']->profil($_POST["pswconf"],$_POST["login"],NULL,NULL,NULL);
                    }
                    if(!empty($_POST["mail"])){
                        $_SESSION['user']->profil($_POST["pswconf"],NULL,$_POST["mail"],NULL);
                    }
                    if(!empty($_POST["password"])){
                        $_SESSION['user']->profil($_POST["pswconf"],NULL,NULL,$_POST["psw"]);
                    }
                }
                else{
                    ?>
                    <p>Veuillez rentrer votre ancien mot de passe pour valider vos changements</p>
                <?php
            }
        }
          

        
        ?>
    </section>
     
    

    <section class="bloc">
        <h3>Me désinscrire</h3> 
        <form class="formulaire" method="post">
            <button  class="btn btn-lg btn-success" type="submit" name="desinscription">Se désinscrire</button>
        </form>

        <?php 
        if(isset($_POST["desinscription"]))
        {
            
            $_SESSION["user"]->desinscription('id');
        }
        ?>
    </section>

</section>


</main>



</body>
<footer>
<?php require '../include/footer.php'?>
</footer>
</html>