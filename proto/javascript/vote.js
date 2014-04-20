$(document).ready(function(){
$("span.voteUp").parent().on('click', function() {
//		var userID = document.cookie.substring(11, document.cookie.indexOf(';'));
    var userID = document.getElementById("userID").innerHTML;
    console.log(userID);
		//var questionID = $(this).parent().parent().parent().attr('id');
    var questionID = document.getElementById("questionID").innerHTML;
    console.log(questionID);
 
        console.log($(this).attr('type'));
        if($(this).is('button'))
          console.log("BUTTON");
        else
          console.log("NOT BUTTON");

        if($(this).hasClass("btn-warning"))  {
          $(this).removeClass("btn-warning");
          console.log("REMOVED CLASS");
          jQuery.ajax({ 
          type: "GET", 
          url: "../../database/removeVote.php", 
          data: '&userID='+userID+'&questionID='+questionID, 
          dataType: "jquery",
          success: function(response){
          } 
        });
        }
        else{
            $(this).addClass("btn-warning");
            jQuery.ajax({ 
             type: "GET", 
            url: "../../database/voteQuestion.php", 
            data: 'userID='+userID+'questionID='+questionID+'isUp='+'true',
            cache: false, 
            dataType: "jquery",
          success: function(response)     {}  

          });
        }
});
});


// Vote Down

$(document).ready(function(){
$("span.voteDown").parent().on('click', function() {
    var userID = document.cookie.substring(11, document.cookie.indexOf(';'));
    var answerID = $(this).answerID;
        console.log($(this).attr('type'));
        if($(this).hasClass("btn-warning"))  {
          $(this).removeClass("btn-warning");
          console.log("REMOVED CLASS");
          jQuery.ajax({ 
          type: "GET", 
          url: "../../database/voteQuestion.php", 
          data: 'userID='+userID+'answerID='+answerID+'isUp='+'false', 
          dataType: "jquery",
          success: function(response){
          } 
        });
        }
        else{
            $(this).addClass("btn-warning");
            jQuery.ajax({ 
             type: "GET", 
            url: "../../database/voteQuestion.php", 
            data: 'userID='+userID+'answerID='+answerID+'isUp='+'true',
            cache: false, 
            dataType: "jquery",
          success: function(response)     {}  

          });
        }
});
});




/**

DEBUG

        if($(this).is('button'))
          console.log("BUTTON");
        else
          console.log("NOT BUTTON");


          */
/*
// Vote DOwn

$(document).ready(function(){
  $("span.voteDown").parent().on('click', function() {
      var userID = document.cookie;
      var answerID = $(this).answerID;
      //var direction = $(this).next().attr('id');
    //    if (direction == "isUp") {
          console.log($(this).attr('type'));
          if($(this).is('button'))
            console.log("BUTTON");
          else
            console.log("NOT BUTTON");

          if($(this).hasClass("btn-warning")){
            $(this).removeClass("btn-warning");
            console.log("REMOVED CLASS");
          }
          else
            $(this).addClass("btn-warning");
      //  }
    /*    else {
          var property = document.getElementById(isDown);
          $(this).style.color="#660000";
        }
  });
});
*/
/*
$(function() {
  $("#voteDown")
  .button()
  .click(function() {
    console.log("Aqui");

    var userID = document.cookie;
    var question = $(this).questionID;
    var direction = $(this).next().attr('id');

    jQuery.ajax({ 
    type: "GET",
    data: 'questionID='+questionID+'userID='+userID,//'direction='+direction+,
    success: function()
    {
        $(this).style.color="#004000";


    }
  });

});
*/