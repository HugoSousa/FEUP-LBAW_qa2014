var target;

$( document ).ready(function() {
	//ao clicar num delete, ativar evento
	$(document).on('click', '.delete', function(e){

		var x;
		var r = confirm("Are you sure?");
		if (r==true)
		{
			var contentID = $(this).attr('id');

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

			if(data == 'ok'){
				updateHtml();
			}
			else{
				$('.page-header').prepend(
		            '<div class="alert alert-warning alert-dismissable">'+
		                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
		                '<strong>Warning!</strong> '+ data['error'] +
		            '</div>'
		        );
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			$('body').scrollTop(0);

				$('.page-header').prepend(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    '<strong>Warning!</strong> '+ "Error deleting content." +
                '</div>'
            	);
		}
	});	

}

function updateHtml(){
	if(target.is('a')){
		target.parent().remove();
	}
	else if(target.is('button')){

		if(target.closest('div.container').hasClass("question")){
			window.location = "../..";

		}
		else{
			$('body').scrollTop(0);

			$('.page-header').prepend(
            '<div class="alert alert-success alert-dismissable">'+
                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                'Your answer was successfully deleted.' +
            '</div>'
            );

			target.closest('div.container').next('div').next('div').remove();
			target.closest('div.container').next('div').remove();
			target.closest('div.container').nextAll('hr').remove();
			target.closest('div.container').remove();
		}
	}
}