$( document ).ready(function() {

	$(".tag").bind("focus change keyup", function() {
		
		var value = $(this).val();

  		//verificar tags com aquele nome
  		$.ajax({
			url: '../../api/questions/get_tags.php',
			type: 'POST',
			data: $.param({'value': value}),
			dataType : 'json',
			success: function(data, textStatus, xhr) {	
				$(".tags-menu>li").remove();
				for(var i=0; i < data.length; i++){
					var tag_name = data[i]["name"];
					$(".tags-menu").append('<li><a class="result" data-id="' + tag_name + '">' + tag_name + '</a></li>')
				}
			},
			error: function(xhr, textStatus, errorThrown) {
			}
		});	  		
	});

	$(document).on('click', '.tags-menu>li', function(){
		var clicked = $(this).text();
		var input = $(this).parent().siblings('input');

		$(input).val(clicked);
	}); 
});