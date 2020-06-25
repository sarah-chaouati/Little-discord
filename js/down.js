function downgrade_user(id){
    if(confirm("Tu veux vraiment downgrade ce pouik ?")){
	       	
	       	
		    $.ajax({
				url : 'downgrade.php',
				type: 'POST',
				data: {id: id},

			 success:function(data){
			 	document.location.reload(true);
			}
		});
    }
}