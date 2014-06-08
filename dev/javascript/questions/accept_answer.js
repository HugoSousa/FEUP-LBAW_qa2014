var clicked;

$( document ).ready(function() {

	$(document).on('click', '.accept-button', function(){
		clicked = $(this);

		if(clicked.hasClass('accepted')){
			removeAcceptedAnswer();
		}
		else{
			acceptAnswer();
		}	
	});
});


function acceptAnswer(){

	$.ajax({
		url: '../../api/questions/accept_answer.php',
		type: 'POST',
		data: $.param({'id': clicked.val(), 'accept': 'y'}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	

			if(data == 'ok'){
				$('button.accepted').css('opacity', '0.2');
				$('button.accepted').removeClass('accepted');

				clicked.addClass('accepted');
				clicked.css('opacity', '1');
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
                    '<strong>Warning!</strong> '+ "Error acception answer." +
                '</div>'
            	);
		
		}
	});
}

function removeAcceptedAnswer(){
	$.ajax({
		url: '../../api/questions/accept_answer.php',
		type: 'POST',
		data: $.param({'id': clicked.val(), 'accept': 'n'}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	

			if(data == 'ok'){
				clicked.css('opacity', '0.2');
				clicked.removeClass('accepted');
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
                    '<strong>Warning!</strong> '+ "Error removing accepted answer." +
                '</div>'
            	);
		
		}
	});
}