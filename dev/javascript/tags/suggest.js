$( document ).ready(function() {
	$(document).on('click', '#suggest-tag', function(e){

		$name = $("#tag-name").val();
		$description = $("#tag-description").val();
		if($name)
			suggestTag($name, $description);
		else
			showWarning('Missing Name!');
		
	});
});

function suggestTag(name, description){

	$.ajax({
		url: '../../api/tags/suggest.php',
		type: 'POST',
		data: $.param({'name': name, 'description':description}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {	
			if(data == 'ok'){
				$('#page-header').prepend(
		            '<div class="alert alert-success alert-dismissable">'+
		                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
		                'Tag successfully suggested. Waiting Admin\'s approval!' +
		            '</div>'
		        );
		        $("#tag-name").val('');
		        $("#tag-description").val('');
			}else{
				$('body').scrollTop(0);
				showWarning(data['error']);

			}
		},
		error: function(xhr, textStatus, errorThrown) {
		}
	});	
}

function showWarning(text){
	$('#page-header').prepend(
		            '<div class="alert alert-warning alert-dismissable">'+
		                '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
		                '<strong>Warning!</strong> '+ text +
		            '</div>'
		        );
}