window.onload=function(){
    document.forms["inscription"].addEventListener("input", function(evenement) {
        var erreur= document.getElementById("erreur");
        var yeah=document.getElementById("yeah");
        //var psw=document.getElementById("psw");
        //var pswconf=document.getElementById("pswconf");
        
        if (document.getElementById("login").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Login Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("login").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>25 Caracteres Max<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("name").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Prénom Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("name").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>25 Caracteres Max<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("surname").value == "") {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Nom Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("surname").value.length > 25) {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>25 Caracteres Max<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
       
        else if (document.getElementById("mail").value == "") {
           evenement.preventDefault();
           erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Mail Obligatoire<i class='material-icons red-text text-darken-1'>clear</i>";
           
        }
        else if (document.getElementById("mail").value.indexOf("@")===-1) {
           evenement.preventDefault();
           erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Adresse invalide<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        
        else if (document.getElementById("psw").value == ""){
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Password Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        
        else if (document.getElementById("psw").value.length < 5) {
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Password 5 Caracteres Minimum  !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("pswconf").value == ""){
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Confirmation Password Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("psw").value != document.getElementById("pswconf").value){
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Le Password et la confirmation doivent etre identiques<i class='material-icons red-text text-darken-1'>clear</i>  !";
        }
        
        else {
            
            var input = document.getElementById("b");
            erreur.innerHTML="";
            input.innerHTML='<input class="btn btn-lg btn-success" type="submit" name="submit" id="submit"  value="Envoyer"/>';
            yeah.innerHTML="<i class='material-icons'>done</i>Formulaire prêt<i class='material-icons'>done</i>";
            
        }
    });

   
}
