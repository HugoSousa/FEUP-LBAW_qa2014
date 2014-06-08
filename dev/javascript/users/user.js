$(document).ready(function() {
  
	var lastRealName;
	var lastLocation;
	var lastBiography;

  $(document).on('click', 'a.edit', function(event){

  	var actualContent = $(event.target).prev().text();
  	var parentId = $(event.target).parent().attr('id');

  	if(parentId == 'realname')
  		lastRealName = actualContent;
  	else if(parentId == 'location')
  		lastLocation = actualContent;

  	if(actualContent == '---------------')
  		actualContent = '';

  	$(event.target).parent().replaceWith("<div class='col-md-8' id='" + parentId + "'><div class='col-xs-8' style='padding-left:0'><input type='text' class='form-control' value='"+actualContent+"'></input></div><button type='button' class='btn btn-default btn-sm pull-right edit' style='margin-left:5px'>Cancel</button><button type='button' class='btn btn-info btn-sm pull-right edit'>Ok</button></div>");
  })

  $(document).on('click', 'button.edit', function(event){

  	if($(event.target).text() == 'Cancel'){

  		var parentId = $(event.target).parent().attr('id');

  		if(parentId == 'realname')
  			$(event.target).parent().replaceWith("<div class='col-md-8' id='realname'><span>"+lastRealName+"</span><a class='pull-right edit' href='javascript:undefined'>Edit</a>");
  		else if(parentId == 'location')
  			$(event.target).parent().replaceWith("<div class='col-md-8' id='location'><span>"+lastLocation+"</span><a class='pull-right edit' href='javascript:undefined'>Edit</a>");
  	}

  	else if($(event.target).text() == 'Ok'){
  		//update do campo respetivo 
  		var parentId = $(event.target).parent().attr('id');
  		var field = parentId;
  		var actualContent = $(event.target).siblings('div').children('input').val();
  		var username = $("#username").text();
  		
  		$.ajax({
		  type: "GET",
		  dataType: "json",
		  url: "../../api/users/user_edit.php",
		  data: { username: username, field: field, value: actualContent },
		  success: function(data){
			//alert(data);

		  }
		})

  		$(event.target).parent().replaceWith("<div class='col-md-8' id='realname'><span>"+actualContent+"</span><a class='pull-right edit' href='javascript:undefined'>Edit</a>");
 

  	}

  });


	
	$(document).on('click', '#edit_biography', function(event){

		lastBiography = $(this).parent().siblings('div.well').text().trim();

		$(this).parent().siblings('div.well').replaceWith("<div class='container' style='width:70%; margin-left:auto; margin-right:auto;'><textarea class='form-control' rows='5' style='margin-bottom:5px'>"+lastBiography+"</textarea><button type='button' class='btn btn-default btn-sm pull-right edit_biography' style='margin-left:5px'>Cancel</button><button type='button' class='btn btn-info btn-sm pull-right edit_biography' >Ok</button></div><br>");

	});


	$(document).on('click', 'button.edit_biography', function(event){
		if($(event.target).text() == 'Cancel'){

			$(event.target).parent().replaceWith("<div class='well' style='width:70%; margin-left:auto; margin-right:auto;'>"+lastBiography+"</div>");
		}
		else if($(event.target).text() == 'Ok'){
			var biography = $(event.target).siblings('textarea').val();
			var username = $("#username").text();

			$.ajax({
			  type: "GET",
			  dataType: "json",
			  url: "../../api/users/user_edit.php",
			  data: { username: username, field: 'biography', value: biography },
			  success: function(data){
				//alert(data);

			  }
			});

			$(event.target).parent().replaceWith("<div class='well' style='width:70%; margin-left:auto; margin-right:auto;'>"+biography+"</div>");
		}
	});

  $(document).on('click', '#ban-user', function(event){

    var username = $("#username").text();
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "../../api/users/user_ban.php",
      data: { username: username },
      success: function(data){
        $('body').scrollTop(0);

        $('.page-header').prepend(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    '<strong>Warning!</strong> '+ "User succesfully banned." +
                '</div>'
              );
      }
    });
    
  });  
});