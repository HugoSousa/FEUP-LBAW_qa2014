$function() {
	$("#voteAnswer")
	.button()
	.click(function()) {
		//id do user esta na variavel de sessao
		var userID = $(this).parent().parent().find("")
		// é preciso mudar no template
		var answerID = $(this).answerID;
		// é preciso mudar no template tb( (p.e. - seta para cima id = isUp, seta para baixo = isdown))
		var direction = $(this).direction;
		if (/*acabar condicional*/)
    jQuery.ajax({ type: "GET", 
		data: 'answerID='+answerID+'userID='+userID+'direction='+direction+,
    cache: false,
    dataType: "jQuery", 
    success: function(colorArrow)
    {
      if (direction == "isUp") {
        var property=document.getElementById(isUp);
        property.style.backgroundColor="#004000";
      }
      else {
        var property = document.getElementById(isDown);
        property.style.backgroundColor="#660000";
      }
    }
	}

}


$function() {
  $("#voteQuestion")
  .button()
  .click(function()) {
    //is do user esta na variavel de sessao
    var userID = $(this).parent().parent().find("")
    // é preciso mudar no template
    var question = $(this).questionID;
    // é preciso mudar no teplate tb( (p.e. - seta para cima id = isUp, seta para baixo = isdown))
    var direction = $(this).direction;
    if ()
    data: 'questionID='+questionID+'userID='+userID+'direction='+direction+,
    cache: false,
    dataType: "jQuery", 
    success: function(colorArrow)
    {
      if (direction == "isUp") {
        var property=document.getElementById(isUp);
        property.style.backgroundColor="#004000";
      }
      else {
        var property = document.getElementById(isDown);
        property.style.backgroundColor="#660000";
      }
    }
  }

}
