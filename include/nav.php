<?php

$url = $_SERVER['PHP_SELF']; 
$reg = '#^(.+[\\\/])*([^\\\/]+)$#';
define('ma_courante', preg_replace($reg, '$2', $url));

if (isset($_SESSION['login']))
{
    
?>

<nav class="sidenav-trigger">
    <div class="nav-wrapper">
    <?php if(ma_courante == "index.php")
    {
    ?>
        <a href="" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>
    <?php
    }
    else
    {
    ?>
        <a href="../" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>

    <?php
    }
    ?>
    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>        
            <ul class="right hide-on-med-and-down">
                <?php if(ma_courante == "index.php")
                {
                ?>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="sources/profil.php">Mon profil</a></li>
                    <li><a href="sources/chat.php">Chat</a></li>
                <?php
                }
                else
                {
                ?>
                    <li><a href="../">Accueil</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <li><a href="chat.php">Chat</a></li>
                <?php
                }
                ?>
                
                <?php 
                if(isset($_SESSION['perm'])){
                ?>
                    <?php if(ma_courante == "index.php")
                    {
                    ?>
                        <li><a href="sources/admin.php">Admin</a>
                    <?php
                    }
                    else
                    {
                    ?>
                        <li><a href="admin.php">Admin</a>
                    <?php
                    }
                }
                if(ma_courante == "index.php")
                {
                ?>
                    <li><a href="sources/deconnexion.php">Déconnexion</a></li>
                <?php
                }
                else
                {
                ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php    
                }
                ?>
            </ul>
    </div>
 </nav>
 
 <ul class="sidenav" id="mobile-demo">

    <?php if(ma_courante == "index.php")
    {
    ?>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="sources/inscription.php">Inscription</a></li>
        <li><a href="sources/connexion.php">Connexion</a></li>
    <?php
    }
    else
    {
    ?>
        <li><a href="../">Accueil</a></li>
        <li><a href="inscription.php">Inscription</a></li>
        <li><a href="connexion.php">Connexion</a></li>
    <?php
    }
    ?> 
  </ul>
<?php				
}
else
{
?>
<nav class="sidenav-trigger">
    <div >
        <?php if(ma_courante == "index.php")
        {
        ?>
            <a href="" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>
        <?php
        }
        else
        {
        ?>
            <a href="../" class="brand-logo center"><i class="material-icons">polymer</i>Pouik</a>

        <?php
        }
        ?>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>            
        <ul class="right hide-on-med-and-down">

            <?php if(ma_courante == "index.php")
            {
            ?>
                <li><a href="index.php"> Accueil</a></li>
                <li><a href="sources/inscription.php"> Inscription</a></li>
                <li><a href="sources/connexion.php"> Connexion</a></li> 
            <?php
            }
            else
            {
            ?>
                <li><a href="../"> Accueil</a></li>
                <li><a href="inscription.php"> Inscription</a></li>
                <li><a href="connexion.php"> Connexion</a></li> 
            <?php
            }
            ?>
        </ul>
    </div>
</nav>
<ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>
<?php
 }
?>