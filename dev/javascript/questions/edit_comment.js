var id;
var target;

$(document).on('click', 'a.edit-comment', function(){

	id = $(this).prev().attr('id');
	var text = $(this).parent().children('span:first').text();
	target = $(this).parent().children('span:first');

	$("#textarea-"+id).val(text);

});


$(document).on('click', '.edit', function(){

	var text = $("#textarea-"+id).val();
	updateComment(id, text);

	$(this).parent().parent().find(".modal-body > textarea").val('');
	$(this).closest('div.modal').modal('toggle');
});


function updateComment(id, text){

	$.ajax({
		url: '../../api/questions/edit_comment.php',
		type: 'POST',
		data: $.param({'id': id, 'text': text}),
		dataType : 'json',
		success: function(data, textStatus, xhr) {
			//alert(data);	

			if(data == 'ok'){
				target.text(text);
			}
			else{
				$('body').scrollTop(0);

				$('.page-header').prepend(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    '<strong>Warning!</strong> '+ data['error'] +
                '</div>');
				
            
			}
				
		},
		error: function(xhr, textStatus, errorThrown) {
			$('body').scrollTop(0);

				$('.page-header').prepend(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    '<strong>Warning!</strong> There was an error updating your comment.' +
                '</div>');
		}
	});
}