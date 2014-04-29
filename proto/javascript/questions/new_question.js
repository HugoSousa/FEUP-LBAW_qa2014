$( document ).ready(function() {

	$(document).on('click', '#post-question', function(){

		//var clicked = $(this);
		//var userID = $('#userID').text();
		var title = $('#title').val();
		var body = $('#wmd-input-0').val();

		var tags = new Array();
		for(var i=1; i<=5; i++){
			var tag = 'tag'+i;

			tagVal = $('#'+tag).val();
			if(tagVal)
				tags.push(tagVal);
		}

		if(tags.length == 0 || tags.length > 5)
			console.log("ERRO. NUMERO DE TAGS INVALIDAS ");


		console.log(tags);

		//createQuestion(title, body, tag1);


		console.log(title);
		console.log(body);
		//console.log(tag1);
	});

});

function removeVoteCall(title, body, tags){

	$.ajax({
		url: '../../post/questions/new_question.php',
		type: 'POST',
		data: $.param({'title': title, 'body': body, 'tags': tags}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	

			if(data == 'ok'){
			}
			else
				alert(JSON.stringify(data));
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(textStatus.reponseText);
		
		}
	});
}