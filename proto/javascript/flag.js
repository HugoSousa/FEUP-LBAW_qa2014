$(function() {
	$("#flagContent")
	.button()
	.click(function() {
		var userID = $(this).parent().parent().find("userID")
		var contentID = $(this).contentID;
		var reason = $(this).parent().parent().find(".container > .wmd-panel > textarea");

		if (reason.val().trim()){
		    jQuery.ajax({ type: "GET", 
				data: 'contentID='+contentID+'&userID='+userID+'&reason='+reason,
		    cache: false,
		    dataType: "jQuery", 
		    success: function(smth)
		    {
		      alert("Content flagged");
		    }

		    });

		}
	})
});