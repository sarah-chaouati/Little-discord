function delete_user(id){
    if(confirm("Tu veux vraiment delete ?")){
	       	
	       	
		    $.ajax({
				url : 'delete.php',
				type: 'POST',
				data: {id: id},

			 success:function(data){
			 	document.location.reload(true);
			}
		});
    }
}

