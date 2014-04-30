var clicked;

$( document ).ready(function() {

	$(document).on('click', '.accept-button', function(){
		console.log("click no accept");

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
				console.log('sucesso');

				$('button.accepted').css('opacity', '0.2');
				$('button.accepted').removeClass('accepted');

				clicked.addClass('accepted');
				clicked.css('opacity', '1');
			}
			else
				alert(JSON.stringify(data));
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(textStatus.reponseText);
		
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
			else
				alert(JSON.stringify(data));
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(textStatus.reponseText);
		
		}
	});
}