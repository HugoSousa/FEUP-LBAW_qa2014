$( document ).ready(function() {

	$(document).on('click', '.flag', function(){
		var contentID = $(this).val();
		var userID = $('#userID').text();
		var reason = $(this).parent().parent().find(".modal-body > textarea").val();

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

				$('body').scrollTop(0);

				$('.page-header').prepend(
                '<div class="alert alert-success alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    'Your flag was successfully submited and will be reviewed by an Admin. Thanks.' +
                '</div>'
                );
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
                    '<strong>Warning!</strong> There was an error submiting your flag.' +
                '</div>'
                );
		}
	});
}