function updatelimit(type){
	// console.log(type);
	
	if(type != 'mid'){

	var limit = $('#' + type).val();
	}else{
		limit = '';
	}
	var color = $('#color-' + type).val();

	$.post('api/insert_api.php?cat=insert', {color: color,limit: limit,type}, function(data, textStatus, xhr) {
			console.log(data);
		});	
}
