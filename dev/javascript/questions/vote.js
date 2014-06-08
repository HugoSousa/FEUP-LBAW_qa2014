$( document ).ready(function() {

	$(document).on('click', 'button.answerVote, button.questionVote', function(){

		var clicked = $(this);
		var userID = $('#userID').text();
		var answerID = $(this).closest('div.container').attr('id');
		var isUp = true;
		var type = 'answer';

		if($(this).hasClass('questionVote'))
			type = 'question';

		if($(this).hasClass('voteDown'))
			isUp = false;

		if($(this).siblings('button').hasClass('btn-warning')){
			updateVoteCall(answerID, userID, type, isUp, clicked);
			return;
		}

		//se ja esta votada
		if($(this).hasClass('btn-warning')){
			//remover o voto
			removeVoteCall(answerID, userID, type, isUp, clicked);
		}
		else{
			//inserir o voto
			insertVoteCall(answerID, userID, type, isUp, clicked);
		}
	});
});

function removeVoteCall(contentID, userID, type, isup, clicked){

	$.ajax({
		url: '../../api/questions/remove_vote.php',
		type: 'POST',
		data: $.param({'id': contentID, 'user': userID, 'type': type}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	

			if(data == 'ok'){
				clicked.removeClass('btn-warning');

				var actualVotes = parseInt(clicked.siblings('span').text().trim());

				if(actualVotes == 0){
					if(isup){
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-danger');
					}
					else{
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-success');
					}
				}
				else if(actualVotes == 1 && isup){
					clicked.siblings('span').removeClass('label-success');
					clicked.siblings('span').addClass('label-default');
				}
				else if(actualVotes == -1 && !isup){
					clicked.siblings('span').removeClass('label-danger');
					clicked.siblings('span').addClass('label-default');
				}

				if(isup)
					clicked.siblings('span').text(actualVotes-1);
				else
					clicked.siblings('span').text(actualVotes+1);
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
                    '<strong>Warning!</strong> '+ "Error removing vote." +
                '</div>'
            	);
		
		}
	});
}

function insertVoteCall(contentID, userID, type, isup, clicked){

	$.ajax({
		url: '../../api/questions/vote.php',
		type: 'POST',
		data: $.param({'id': contentID, 'user': userID, 'isup': isup, 'type': type, 'update': false}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {
			//alert(data);	

			if(data == 'ok'){

				clicked.addClass('btn-warning');

				var actualVotes = parseInt(clicked.siblings('span').text().trim());

				if(actualVotes == 0){
					if(isup){
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-success');
					}
					else{
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-danger');
					}
				}
				else if(actualVotes == -1 && isup){
					clicked.siblings('span').removeClass('label-danger');
					clicked.siblings('span').addClass('label-default');
				}
				else if(actualVotes == 1 && ! isup){
					clicked.siblings('span').removeClass('label-success');
					clicked.siblings('span').addClass('label-default');
				}


				if(isup)
					clicked.siblings('span').text(actualVotes+1);
				else
					clicked.siblings('span').text(actualVotes-1);
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
                    '<strong>Warning!</strong> '+ "Error inserting vote." +
                '</div>'
            	);
		}
	});
}


function updateVoteCall(contentID, userID, type, isup, clicked){

	$.ajax({
		url: '../../api/questions/vote.php',
		type: 'POST',
		data: $.param({'id': contentID, 'user': userID, 'isup': isup, 'type': type, 'update': true}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {
			//alert(data);	

			if(data == 'ok'){
				clicked.addClass('btn-warning');

				var actualVotes = parseInt(clicked.siblings('span').text().trim());

				if(actualVotes == 0){
					if(isup){
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-success');
					}
					else{
						clicked.siblings('span').removeClass('label-default');
						clicked.siblings('span').addClass('label-danger');
					}
				}
				else if(actualVotes == -1 && isup){
					clicked.siblings('span').removeClass('label-danger');
					clicked.siblings('span').addClass('label-success');
				}
				else if(actualVotes == 1 && ! isup){
					clicked.siblings('span').removeClass('label-success');
					clicked.siblings('span').addClass('label-danger');
				}
				else if(actualVotes == -2 && isup){
					clicked.siblings('span').removeClass('label-danger');
					clicked.siblings('span').addClass('label-default');
				}
				else if(actualVotes == 2 && ! isup){
					clicked.siblings('span').removeClass('label-success');
					clicked.siblings('span').addClass('label-default');
				}


				clicked.siblings('button').removeClass('btn-warning');


				if(isup)
					clicked.siblings('span').text(actualVotes+2);
				else
					clicked.siblings('span').text(actualVotes-2);
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
                    '<strong>Warning!</strong> '+ "Error updating vote." +
                '</div>'
            	);
		
		}
	});	
}