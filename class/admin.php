<?php

class admin extends user{


    private $id = NULL;
    private $login = NULL;
    private $name = NULL;
    private $surname = NULL;
    private $mail = NULL;
    private $rank = NULL;
    private $pp = NULL;
    private $message = NULL;
    private $chan = NULL;


    public function tableau_utilisateurs()
    {
        $i = 0;
        $this->connect();
        $request = "SELECT id,login,name,surname,mail FROM user where rank = 'membre'";
        $query = mysqli_query($this->connexion,$request);
        $fetch = mysqli_fetch_all($query);
        if ($fetch==true){
        ?>

        <h2>Les membres</h2>
            <table>
                <tbody>
                        <tr>
                        <th>ID</th>    
                        <th>Login</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Mail</th>
                        
                        </tr>
        <?php
       foreach($fetch as list($id,$login,$name,$surname,$mail))
       {
        
            ?>
             
          
                       <td><?php echo  $id; ?></td>
                       <td><?php echo  $login; ?></td> 
                       <td><?php echo  $name; ?></td>
                       <td><?php echo  $surname;  ?></td>
                       <td><?php echo  $mail; ?></td>
                       

                       
                       <td><input  class="btn btn-lg btn-success" type="button" onClick="delete_user(<?php echo $id; ?>)" name="delete"  value="Delete"></td>
                       <td><input  class="btn btn-lg btn-success" type="button" onClick="upgrade_user(<?php echo $id; ?>)" name="up"  value="Upgrade"></td>
                       
                       
       
                       <tr>
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       </tr> 
          
           
       <?php
       }
    
       $i++;
       ?>
           
           </tbody> 
            </table>
    
        <?php
        }else{
            
            echo "<h2>Les membres</h2><h4>Pas de membre encore inscrit</h4>";
        }
    }
    public function tableau_admin()
    {
        $i = 0;
        $this->connect();
        $request = "SELECT id,login,name,surname,mail FROM user where rank = 'admin'";
        $query = mysqli_query($this->connexion,$request);
        $fetch = mysqli_fetch_all($query);
        if ($fetch==true){
        ?>

        <h2>Les admins</h2>
            <table>
                <tbody>
                        <tr>
                        <th>ID</th>    
                        <th>Login</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Mail</th>
                        
                        </tr>
        <?php
       foreach($fetch as list($id,$login,$name,$surname,$mail))
       {
        
            ?>
             
          
                       <td><?php echo  $id; ?></td>
                       <td><?php echo  $login; ?></td> 
                       <td><?php echo  $name; ?></td>
                       <td><?php echo  $surname;  ?></td>
                       <td><?php echo  $mail; ?></td>
                       
                       <td><input  class="btn btn-lg btn-success" type="button" onClick="delete_user(<?php echo $id; ?>)" name="delete"  value="Delete"></td>
                       <td><input  class="btn btn-lg btn-success" type="button" onClick="downgrade_user(<?php echo $id; ?>)" name="down"  value="Downgrade"></td>

                       
                       
       
                       <tr>
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       <td></td> 
                       </tr> 
          
           
       <?php
       }
    
       $i++;
       ?>
           
           </tbody> 
            </table>
    
        <?php
        }else{
            
            echo "<h2>Les membres</h2><h5>Pas de membre encore inscrit</h5>";
        }
    }

}
?>