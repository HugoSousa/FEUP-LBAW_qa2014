function dropdownClick(page, order, filter_ans, filter_acc){

		var redirect = 'list_all.php?page=' + page;

		if(order == 'old')
			redirect += '&order=old';

		if(filter_ans != 'all')
			redirect += '&filter_ans=' + filter_ans;

		if(filter_acc != 'all')
			redirect += '&filter_acc=' + filter_acc;


		window.location.href = redirect;
}