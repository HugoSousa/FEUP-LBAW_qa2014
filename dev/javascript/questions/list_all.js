function dropdownClick(page, order, filter_ans, filter_acc, search){

		var redirect = 'list_all.php?page=' + page;

		if(order == 'old')
			redirect += '&order=old';
		else if (order == 'best') 
			redirect += '&order=best';
		else if (order == 'least') 
			redirect += '&order=least';

		if(filter_ans != 'all')
			redirect += '&filter_ans=' + filter_ans;

		if(filter_acc != 'all')
			redirect += '&filter_acc=' + filter_acc;

		if(search)
			redirect += '&search=' + search;


		window.location.href = redirect;
}