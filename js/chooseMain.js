$(document).ready(function(){
	$( "#listBlock" ).dialog({
		autoOpen: false,
    	modal: true,
    	closeOnEscape: true
	});
});

function openChoose(listType, filterType, filterValue){
	if ($("#listBlock").dialog( "isOpen" )===true) {
		$( "#listBlock" ).dialog( "close" );
	}
	
	$.ajax({
		url: './?module='+modulename+'&page=chooseMain',
		type: 'POST',
		data: {
			'listType': listType,
			'filterType': filterType,
			'filterValue': filterValue
		},
	 
		success: function(data)
		{
			$( "#listBlock" ).html(data);
			$( "#listBlock" ).dialog( "open" );
		}
	});	
}