var clicked;

$( document ).ready(function() {
	$(document).on('click', '.tag-accept', function(e){

		clicked = $(this).parent().parent();
		acceptTag($(this).val());
		
	});

	$(document).on('click', '.tag-reject', function(e){

		clicked = $(this).parent().parent();
		rejectTag($(this).val());
		
	});
});

function acceptTag(tagID){

	$.ajax({
		url: '../../api/tags/accept.php',
		type: 'POST',
		data: $.param({'id': tagID}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	
			if(data == 'ok'){
				clicked.siblings('.hidden').filter(":first").removeClass("hidden");
				clicked.remove();
			}else{
				$('body').scrollTop(0);

				$('#page-header').prepend(
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
                    '<strong>Warning!</strong> '+ "Error accepting tag." +
                '</div>'
            	);
		}
	});	
}

function rejectTag(tagID){
	$.ajax({
		url: '../../api/tags/reject.php',
		type: 'POST',
		data: $.param({'id': tagID}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	
			if(data == 'ok'){
				clicked.siblings('.hidden').filter(":first").removeClass("hidden");
				clicked.remove();
			}else{
				$('body').scrollTop(0);

				$('#page-header').prepend(
		            '<div class="alert alert-warning alert-dismissable">'+
		                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
		                '<strong>Warning!</strong> '+ data['error'] +
		            '</div>'
		        );
			}
		},
		error: function(xhr, textStatus, errorThrown) {
			$('.page-header').prepend(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    '<strong>Warning!</strong> '+ "Error rejecting tag." +
                '</div>'
            	);
		}
	});	
}