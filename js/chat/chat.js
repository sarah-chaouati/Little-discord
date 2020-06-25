affichage_channel()
setTimeout(affichage_message, 100);

 


function affichage_channel(){

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {},

	    success:function(data)
		{
			var nbr_channel=0
			$(".channel").remove()
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_channel++;
				}
			}
			for(i=0; i < nbr_channel; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++ )
				{
					var id =  Object.keys(result)[0];
					var nom = Object.keys(result)[1];

					if(nom != "message")
					{
						if(j==0)
						{
							if($(".active").text().trim() == "")
							{
								$("#liste_channel").append('<li id="'+result[id]+'" class="channel active"></li>')
								$("#nom_canal").text(result[nom])
							}
							else
							{
								$("#liste_channel").append('<li id="'+result[id]+'" class="channel"></li>')
							}
								$("#"+result[id]).append('<div id="wrap_chan'+result[id]+'" class="wrap"></div>')	
								$("#wrap_chan"+result[id]).append('<div id="meta_chan'+result[id]+'" class="meta"></div>')	
								$("#meta_chan"+result[id]).append('<p id="name_chan'+result[id]+'" class="name">'+result[nom]+'</p>')	
								$("#name_chan"+result[id]).after('<p id="preview_'+result[id]+'" class="preview"></p>')
								
								if($(".chat").attr('id') == "admin")
								{
									$("#name_chan"+result[id]).after('<svg id="svg_'+result[id]+'" class="trash_channel bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/></svg>')
								}
						}
					}
					else
					{
						var message = Object.keys(result)[1];
						var login = Object.keys(result)[2];

						if($("#name_user").text() == result[login])
						{
							$("#preview_"+result[id]).html('<span>Toi: </span>' + result[message]);
						}
						else
						{	
							$("#preview_"+result[id]).html('<span>'+result[login]+': </span>' + result[message]);
						}
					}
				}
	   		}  
		}
	});
}
function affichage_message(){
	
	var channel = $(".active").attr('id')

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {channel: channel},

	    success:function(data)
		{

			$(".sent").remove()
			$('.trash').remove()
			var nbr_messages=0
			for(i=0; i<Object.keys(data).length;i++)
			{
				if(data[i] =="{")
				{
					nbr_messages++;
				}
			}
			for(i=0; i < nbr_messages; i++)
		   	{
			    var result = JSON.parse(data)[i];  
				for(j=0;j <Object.keys(result).length; j++  )
				{
					var id = Object.keys(result)[j-2];
				   	var login = Object.keys(result)[j-1];
				   	var message = Object.keys(result)[j];
				   	var date = Object.keys(result)[j+1];
				   	var id_chan = Object.keys(result)[j+2];

				   	if(j == 2)
				   	{
				   		if(result[login] == $("#name_user").text())
				   		{	
				   			$('<li id="'+result[id]+'" class="sent">'+ result[login] +'<br><div id="contenue_'+result[id]+'" class="contenue"><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$("#preview_"+result[id_chan]).html('<span>Toi : </span>' + result[message]);
							$("#contenue_"+result[id]).after('<svg id="svg_'+result[id]+'" class="trash bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/></svg>')
				   		}
				   		else
				   		{

						   	$('<li id="sent_'+result[id]+'"  class="sent">'+ result[login] +'<br><div id="'+result[id]+'"><p>' + result[message] + '</p><p id="heure">'+result[date]+'</p></div></li>').appendTo($('.messages ul'));
							$("#sent_"+result[id]).css({"display" : "flex", "flex-direction": "column", "align-items": "flex-end"})
							$("#"+result[id]).css({"background-color" : "#F5F5F5", "color": "black"})
						}

					}
				  	
				}
	   		}  
				$(".messages").animate({ scrollTop: $(document).height() }, "fast");
		}
	});
	setTimeout(affichage_message,1000);
}


function insert_message(){

	var id_channel = $(".active").attr('id')
	var message = $(".message-input input").val();
	
	var now = new Date();
	var annee   = now.getFullYear();
	var mois    = now.getMonth() + 1;
	var jour    = now.getDate();
	var heure   = now.getHours();
	var minute  = now.getMinutes();
	var seconde = now.getSeconds();
	
	if(mois < 10)
	{
		mois = "0"+mois
	}
	if(jour < 10)
	{
		jour = "0"+jour
	}
	if(heure < 10)
	{
		heure = "0"+heure
	}
	if(minute < 10)
	{
		minute = "0"+minute
	}
	if(seconde < 10)
	{
		seconde = "0"+seconde 
	}
	date = annee+"-"+mois+"-"+jour+" "+heure+":"+minute+":"+seconde

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {message: message, id_channel: id_channel, date: date},

	    success:function(data){
		}
	});
	$('#message_send').val("");
}

function delete_message(){

	$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {id_svg: id_svg},

	    success:function(data){
			setTimeout(affichage_channel, 300);
		}
	});
}

function delete_channel(){

	if(confirm("Tu veux vraiment supprimer ce channel ?")){

		$.ajax({
		url : 'fonction_chat.php',
		type: 'POST',
		data: {id_chan: id_chan},

	    success:function(data){
			setTimeout(affichage_channel, 300);
		}
	});
	}
}


$('.submit').click(function() {

	if($(".message-input input").val() != ""){
  		insert_message()
		setTimeout(affichage_message, 100);
	}
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
  	insert_message()
	setTimeout(affichage_message, 100);
    return false;
  }
});



$( document ).ready(function() {
	$("body").on("click", ".channel", function () {

		var id_chan=$(this).attr('id')
		var nom_canal = $("#name_chan"+id_chan).text()
		$("#nom_canal").text(nom_canal)
		$(".channel").removeClass("active")
		$("#"+id_chan).addClass("active")
		affichage_message()

	});

	$("body").on("click", ".trash", function () {

		id= $(this).attr('id')
		id_svg=id.substr(4)
		$("#"+id_svg).remove()
		delete_message()
		setTimeout(affichage_message, 100)
	});

	$("body").on("click", ".trash_channel", function () {

		id= $(this).attr('id')
		id_chan=id.substr(4)
		delete_channel()

	});

	$("body").on("click", "#ajout_channel", function () {

		if($("#nom_channel").val() != "")
		{
			nom_channel = $("#nom_channel").val()
			$.ajax({
				url : 'fonction_chat.php',
				type: 'POST',
				data: {nom_channel: nom_channel},

			    success:function(data){

			    	$(".modal-backdrop").remove()
			    	setTimeout(affichage_channel, 300);
			    	
				}
			});
		}
	});
});

