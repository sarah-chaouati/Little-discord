<?php 
require '../class/bdd.php';
require '../class/user.php';
require '../class/admin.php';

session_start();


if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}

if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = new admin();
}
?>

<html>
<head>
        <title>Administration</title> 
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
    <?php require '../include/nav.php'?>
    </header>

  
<main>
    <section class="container center">
    <h1 class="center">Administration</h1>

        <div class="gestion_user"> 
           
    
    <section class="bloc">
                <article>
                <?php $_SESSION["admin"]->tableau_utilisateurs(); ?>
                </article>
    </section>


        </div>
        <div class="gestion_admin"> 
           
    
           <section class="bloc">
                       <article>
                       <?php $_SESSION["admin"]->tableau_admin(); ?>
                       </article>
           </section>
               </div>
     </section>
</main>

      
</body>
<script src="../js/script.js"></script>
<script src="../js/up.js"></script>
<script src="../js/down.js"></script>

<footer>
    <?php require '../include/footer.php'?>
</footer>
</html>