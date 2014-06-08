$(function() {

  $( "button#commentAnswer" )
      .button()
      .click(function() {
        var parentID = $(this).parent().parent().parent().parent().attr('id');

        var text = $(this).parent().parent().find(".modal-body > textarea");

        if(text.val().length > 200){
          $('body').scrollTop(0);

          $('.page-header').prepend(
                '<div class="alert alert-danger alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    'Comments need to have less than 200 characters.' +
                '</div>'
                );

          text.val('');
          $('#'+parentID).modal('toggle');
        }
        else{
          var answerID = $(this).val();
          if(text.val().trim()){

           jQuery.ajax({ type: "GET", 
            url: "../../api/questions/insert_comment.php", 
            data: 'answerID='+answerID+'&text='+text.val()+'&type=Answer',
            cache: false, 
            dataType: "json",
            success: function(response) 
            {
              
                $('#CommentDiv'+response["answerID"]).append('<div class="well well-sm" style=" margin-left:25%; margin-right:32.5%; text-align:justify; word-wrap: break-word;">'+
              response["text"]+
              '<a class="close pull-right" style="color:red">&times;</a>'+
              '<a class="pull-right" href="#">edit&nbsp;</a>'+
              '<span class="pull-right"><a href="../../pages/users/user.php?username='+ response["username"] +'">'+ response["username"]+
              ' </a> <small>at now &nbsp;&nbsp;&nbsp;</small></span>'+
              '</div>');

            }
            });


          }
          text.val('');
          $('#'+parentID).modal('toggle');
        }
      });

    $( "button#commentQuestion" )
      .button()
      .click(function() {
        var parentID = $(this).parent().parent().parent().parent().attr('id');

        var text = $(this).parent().parent().find(".modal-body > textarea");

        if(text.val().length > 200){
          $('body').scrollTop(0);

          $('.page-header').prepend(
                '<div class="alert alert-danger alert-dismissable">'+
                    '<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>'+
                    'Comments need to have less than 200 characters.' +
                '</div>'
                );

          $('#'+parentID).modal('toggle');
        }
        else{

          var questionID = $(this).val();
          if(text.val().trim()){

            jQuery.ajax({ type: "GET", 
            url: "../../api/questions/insert_comment.php", 
            data: 'questionID='+questionID+'&text='+text.val()+'&type=Question',
            cache: false, 
            dataType: "json",
            success: function(response) 
            {
              $('#QuestionDiv'+response["questionID"]).append('<div class="well well-sm" style="margin-bottom:2px; margin-left:25%; margin-right:32.5%; text-align:justify; word-wrap: break-word;">'+ 
              response["text"] +
              '<a class="close pull-right" style="color:red">&times;</a>'+
              '<a class="pull-right" href="#">edit&nbsp;</a>'+
              '<span class="pull-right"><a href="../../pages/users/user.php?username='+response["username"]+'">'+ response["username"] +' </a>'+
              '<small>at now &nbsp;&nbsp;&nbsp;</small></span>'+
              '</div>');
            }
            });

          

          }
          $('#'+parentID).modal('toggle');
        }
      });
      

 });