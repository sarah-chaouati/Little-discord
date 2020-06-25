<?php
if (isset($_SESSION['login']))
 {
    
?>
<div class=" display center">
      

                <p ><a href="deconnexion.php" class="btn btn-lg btn-success">Déconnexion</a></p>
                <div class="grid-example col s6"><p>By Adrien & Sarah </p></div>
</div>
   
<?php				
}
else
 {
?>



  <div class=" display center">
      <div class="grid-example col s6"><p>By Adrien & Sarah </p></div>
</div>
<?php
 }
?>
