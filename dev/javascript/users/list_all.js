function dropdownClick(page, order, search){

		var redirect = 'list_all.php?page=' + page;

		if(order == 'username')
			redirect += '&order=username';
		else if(order == 'registry')
			redirect += '&order=registry';
		else if(order == 'reputation')
			redirect += '&order=reputation';
		if(search)
			redirect += '&search=' + search;

		window.location.href = redirect;
}