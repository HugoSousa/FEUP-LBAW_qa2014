$(document).ready(function() {
	//ao clicar num delete, ativar evento
	$(document).on('click', '#solve', function(e){

		var contentID = $(".idContent").attr('id');

		var r = confirm("Are you sure?");
		if (r==true)
		{
			$.ajax({
				url: '../../api/flags/solve.php',
				type: 'POST',
				data: $.param({'id': contentID}),
				dataType : 'json',
				success: function(data, textStatus, xhr) {	

					if(data == 'ok'){

						window.location = "../../pages/flags/list_all.php";
					}
					else{
						$('body').scrollTop(0);

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
	                    '<strong>Warning!</strong> '+ "Error solving flag." +
	                '</div>'
	            	);
				}
			});	


		}
	});
});