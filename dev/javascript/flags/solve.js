$(document).ready(function() {
	//ao clicar num delete, ativar evento
	$(document).on('click', '#solve', function(e){

		var contentID = $(".idContent").attr('id');

		var r = confirm("Are you sure?");
		if (r==true)
		{
			$.ajax({
				url: '../../api/flags/solve.php',
				type: 'POST',
				data: $.param({'id': contentID}),
				dataType : 'json',
				success: function(data, textStatus, xhr) {	
					console.log("data:" + data);

					if(data == 'ok'){
						console.log("retornar true");

						window.location = "../../pages/flags/list_all.php";
					}
					else{
						alert(JSON.stringify(data));
					}
				},
				error: function(xhr, textStatus, errorThrown) {
					console.log(xhr.responseText);
				}
			});	


		}
	});
});