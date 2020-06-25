
   window.onload=function(){
    document.forms["profil"].addEventListener("input", function(evenement) {
        var erreur= document.getElementById("erreur");
        var yeah= document.getElementById("yeah");
        //var psw=document.getElementById("psw");
        //var pswconf=document.getElementById("pswconf");
    
        if (document.getElementById("login").value.length > 25) {
            evenement.preventDefault();
            yeah.innerHTML="";
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>25 Caracteres Max<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("psw").value.length < 5) {
            evenement.preventDefault();
            yeah.innerHTML="";
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Password 5 Caracteres Minimum  !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
        else if (document.getElementById("pswconf").value == ""){
            evenement.preventDefault();
            erreur.innerHTML="<i class='material-icons red-text text-darken-1'>clear</i>Confirmation Password Obligatoire !<i class='material-icons red-text text-darken-1'>clear</i>";
            
        }
    else{
        erreur.innerHTML="";
        yeah.innerHTML="<i class='material-icons'>done</i>Formulaire prêt<i class='material-icons'>done</i>";
    }
});
}