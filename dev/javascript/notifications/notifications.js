var click;

$(document).ready(function() {
	$(document).on('click', 'a.notification', function(e){
			//remover elemento do dropdown menu
			click = $(e.target);
			click.remove();

			//decrementar contador da badge
			var count = $('#notification-counter').text();
			$('#notification-counter').text(count-1);

			//update de isSeen na BD
			$.ajax({
				url: '../../api/notifications/notifications.php',
				type: 'POST',
				data: $.param({'id': click.attr('id')}),
				dataType : 'json',
				success: function(data, textStatus, xhr) {	
					console.log("data:" + data);

					if(data == 'ok'){
						//console.log("retornar true");

						console.log('update da notificação');
					}
					else{
						//alert(JSON.stringify(data));

						$('.page-header').prepend(
				            '<div class="alert alert-warning alert-dismissable">'+
				                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
				                '<strong>Warning!</strong> '+ data['error'] +
				            '</div>'
				        );
					}
				},
				error: function(xhr, textStatus, errorThrown) {
					console.log(xhr.responseText);
				}
			});	
	});
});