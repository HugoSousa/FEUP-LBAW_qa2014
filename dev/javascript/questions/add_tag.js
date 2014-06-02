$( document ).ready(function() {

	$(".tag").bind("focus change keyup", function() {
		
		var value = $(this).val();

  		//console.log("Change tag.");
  		//console.log(value);
  		
  		//verificar tags com aquele nome
  		$.ajax({
			url: '../../api/questions/get_tags.php',
			type: 'POST',
			data: $.param({'value': value}),
			dataType : 'json',
			success: function(data, textStatus, xhr) {	
				//console.log(data);
				$(".tags-menu>li").remove();
				for(var i=0; i < data.length; i++){
					var tag_name = data[i]["name"];
					//console.log(tag_name);
					$(".tags-menu").append('<li><a class="result" data-id="' + tag_name + '">' + tag_name + '</a></li>')
				}
			},
			error: function(xhr, textStatus, errorThrown) {
				console.log(xhr.responseText);
			}
		});	  		
	});

	$(document).on('click', '.tags-menu>li', function(){
		var clicked = $(this).text();
		var input = $(this).parent().siblings('input');

		//console.log("clickei numa tag");
		//console.log(clicked);

		$(input).val(clicked);
	}); 
});