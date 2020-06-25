window.onload=function(){
    document.forms["connexion"].addEventListener("input", function(evenement) {
        var erreur= document.getElementById("erreur");
        var yeah=document.getElementById("yeah");
        //var psw=document.getElementById("psw");
        //var pswconf=document.getElementById("pswconf");
        
        if (document.getElementById("login").value == "") {
            evenement.preventDefault();
            yeah.innerHTML="";
            erreur.innerHTML="<i class='material-icons cyan-text text-darken-4'>clear</i>Champ Login Obligatoire !<i class='material-icons cyan-text text-darken-4'>clear</i>";
            
        }
        else if (document.getElementById("psw").value == ""){
            evenement.preventDefault();
            yeah.innerHTML="";
            erreur.innerHTML="<i class='material-icons cyan-text text-darken-4'>clear</i>Password Obligatoire !<i class='material-icons cyan-text text-darken-4'>clear</i>";
            
        }
        else{

            erreur.innerHTML="";
            yeah.innerHTML="<i class='material-icons'>done</i>Formulaire prêt<i class='material-icons'>done</i>";

        }
    
});
}