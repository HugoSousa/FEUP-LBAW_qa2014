var target;

$( document ).ready(function() {
	//ao clicar num delete, ativar evento
	$(document).on('click', '.delete', function(e){

		var x;
		var r = confirm("Are you sure?");
		if (r==true)
		{


			var contentID = $(this).attr('id');
			console.log(contentID);

			target = $(e.target);

			deleteContent(contentID, target);
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
			console.log("data:" + data);

			if(data == 'ok'){
				console.log("retornar true");

				updateHtml();
			}
			else{
				alert(JSON.stringify(data));
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(xhr.responseText);
		}
	});	

}

function updateHtml(){
	if(target.is('a')){
		console.log("apagar comentário");

		target.parent().remove();
	}
	else if(target.is('button')){

		if(target.closest('div.container').hasClass("question")){
			console.log("apagar questão");
			//apagar e redirecionar para o index
			window.location = "../..";
		}
		else{
			console.log("apagar resposta");

			target.closest('div.container').next('div').next('div').remove();
			target.closest('div.container').next('div').remove();
			target.closest('div.container').nextAll('hr').remove();
			target.closest('div.container').remove();
		}
	}
}