$(document).ready(function() {
	var picker = new CP(document.querySelector('#color-max'));

    picker.set('#000000');
    picker.on("change", function(color) {
        this.source.value = '#' + color;
        // console.log(color);
        $('.lightbulb').css('background-color',  '#' + color);

    });
    var picker2 = new CP(document.querySelector('#color-min'));

    picker2.set('#000000');
    picker2.on("change", function(color) {
        this.source.value = '#' + color;
        // console.log(color);
        $('.lightbulb').css('background-color',  '#' + color);

    });  
    var picker3 = new CP(document.querySelector('#color-mid'));

    picker3.set('#000000');
    picker3.on("change", function(color) {
        this.source.value = '#' + color;
        // console.log(color);
        $('.lightbulb').css('background-color',  '#' + color);

    });

loadlimits();


});
$(document).on('click', '.tab-button', function(event) {
	type 		= $(this).attr('id');
	typestript 	= (type.substr(1,3)).toLowerCase();
	 $.getJSON('api/select_api.php?cat=limits', function(json, textStatus) {
	 	// console.log(typestript);
    		$.each(json, function(index, val) {
    			
    			limittype = (val.Limit_type).toLowerCase();
    			if(typestript == val.Limit_type){
    				$('.solidlight').css('background-color', val.colorer	);
    			}
    	});
    });
	/* Act on the event */
});
function loadlimits(){
	    $.getJSON('api/select_api.php?cat=limits', function(json, textStatus) {
    		$.each(json, function(index, val) {
    			switch(val.Limit_type) {
				  case "min":
				    $('.limitsmall').text(val.limit_database);
				  break;
				  case "max":
				    $('.limitmaximale').text(val.limit_database);
				    $('.solidlight').css('background-color', val.colorer);
				  break;
				}
    	});
    		 max = parseInt($('.limitmaximale').text());
    		 min = parseInt($('.limitsmall').text());
    		 $('.limitmiddel').text(min + '-' + max);
    });
}
function updatelimit(type){
	// console.log(type);
	
	if(type != 'mid'){

	var limit = $('#' + type).val();
	}else{
		limit = '';
	}
	var color = $('#color-' + type).val();

	$.post('api/insert_api.php?cat=insert', {color: color,limit: limit,type}, function(data, textStatus, xhr) {
			loadlimits();
		});	
}
