$( document ).ready(function() {
	//ao clicar num delete, ativar evento
	$(document).on('click', '.delete', function(e){

		var x;
		var r = confirm("Are you sure?");
		if (r==true)
		{


			var contentID = $(this).attr('id');
			console.log(contentID);

			var target = $(e.target);

			if(target.is('a')){
				console.log("apagar comentário");

				if(deleteContent(contentID))
					target.parent().remove();
			}
			else if(target.is('button')){

				if(target.closest('div.container').hasClass("question")){
					//console.log("apagar questão");
					//apagar e redirecionar para o index
					if(deleteContent(contentID))
						window.location = "../..";
				}
				else{
					console.log("apagar resposta");

					if(deleteContent(contentID)){
						target.closest('div.container').next('div').next('div').remove();
						target.closest('div.container').next('div').remove();
						target.closest('div.container').nextAll('hr').remove();
						target.closest('div.container').remove();
					}
				}
			}
		}
	});
});


function deleteContent(contentID){
	$.ajax({
		url: '../../api/questions/delete.php',
		type: 'POST',
		data: $.param({'id': contentID}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	

			if(data == 'ok'){
				return true;
			}
			else{
				alert(JSON.stringify(data));
				return false;
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(xhr.responseText);
			return false;
		}
	});	
}