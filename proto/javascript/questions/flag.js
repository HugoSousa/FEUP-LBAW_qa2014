$( document ).ready(function() {

	$(document).on('click', '.flag', function(){
		var contentID = $(this).val();
		var userID = $('#userID').text();
		var reason = $(this).parent().parent().find(".modal-body > textarea").val();

		console.log("CLICK");
		console.log(contentID);
		console.log(userID);
		console.log(reason);

		insertFlag(contentID, userID, reason);

		$(this).parent().parent().find(".modal-body > textarea").val('');
		$(this).closest('div.modal').modal('toggle');
	});
});


function insertFlag(contentID, userID, reason){

	$.ajax({
		url: '../../api/questions/flag.php',
		type: 'POST',
		data: $.param({'id': contentID, 'user': userID, 'reason': reason}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {
			//alert(data);	

			if(data == 'ok'){

			}
			else
				alert(JSON.stringify(data));
		},
		error: function(xhr, textStatus, errorThrown) {
			console.log(xhr.responseText);
		}
	});
}