function upgrade_user(id){
    if(confirm("Tu veux vraiment upgrade ce pouik ?")){
	       	
	       	
		    $.ajax({
				url : 'upgrade.php',
				type: 'POST',
				data: {id: id},

			 success:function(data){
			 	document.location.reload(true);
			}
		});
    }
}