function dropdownClick(page, order, search){

		var redirect = 'list_all.php?page=' + page;

		redirect += '&order='+order;
		
		if(search)
			redirect += '&search=' + search;

		window.location.href = redirect;
}

jQuery(function ($) {
        $("a").tooltip();
    });