function dropdownClick(page, order){

		var redirect = 'list_all.php?page=' + page;

		redirect += '&order=' + order;

		window.location.href = redirect;
}