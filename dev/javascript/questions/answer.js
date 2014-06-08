$(function() {

  $( "button#postAnswer" )
      .button()
      .click(function() {

        var text = $(this).parent().parent().find(".container > .wmd-panel > textarea");

        
        var questionID = $(this).val();
        if(text.val().trim()){

          jQuery.ajax({ type: "POST", 
          url: "../../api/questions/insert_answer.php", 
          data: $.param({'questionID': questionID, 'text': text.val()}),
          dataType: "json",
          success: function(response) 
          {
            $('#AllAnswers').append(
            '<div class="container" style="width:70%; margin-left:auto; margin-right:auto">'+
            '<div class="row">'+
            '<div class="col-md-1">'+
            '<br><br>'+
            '<span class="label label-default" style="font-size:170%; display: inline-block; width: 50px;"> 0 </span>'+
            '<br><br>'+
            '</div>'+
            '<div class="well well-lg col-md-8">'+
            response["text"]+
            '<br><br><br>'+
            '<span> Answered by <a href="../../pages/users/user.php?username='+response["username"]+'">'+response["username"]+'</a> Now</span>'+
            '<button type="button" class="btn btn-danger pull-right">Delete</button>'+
            '<button type="button" class="btn btn-default pull-right">Edit</button>'+
            '</div>'+
            '</div>'+
            '</div>'+
            //Add Comment Button
            '<div class="container" style="margin-right:31.4%">'+
            '<button id="comment" class="btn btn-default btn-xs btn-info pull-right" data-toggle="modal" data-target="#modal'+response["answerID"]+'">'+
            'Add Comment </button>'+
            '</div>'+
            '<div class="modal fade" id="modal'+response["answerID"]+'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">'+
            '<div class="modal-dialog">'+
            '<div class="modal-content">'+
            '<div class="modal-header">'+
            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
            '<h4 class="modal-title" id="myModalLabel">Comment Answer of '+response["username"]+'</h4>'+
            '</div>'+
            '<div class="modal-body">'+
            '<textarea class="form-control" rows="10" style="resize:none"></textarea>'+
            '</div>'+
            '<div class="modal-footer">'+
            '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>'+
            '<button id ="commentAnswer" type="button" value="'+response["answerID"]+'"  class="btn btn-primary">'+
            'Comment</button>'+
            '</div>'+
            '</div>'+
            '</div>'+
            '</div>' +
            '<hr>'
            );
          },
          error: function(xhr, textStatus, errorThrown){

            $('#AllAnswers').append(
                '<div class="alert alert-warning alert-dismissable">'+
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
                    '<strong>Warning!</strong> Better refresh the page!'+
                '</div>'
            );
          }
          });
        }
        text.val('');
       
      });


 });