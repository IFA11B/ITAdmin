$(document).ready(function(){
	$( "#detailsBlock" ).dialog({
		autoOpen: false,
    	modal: true,
    	closeOnEscape: true
	});
});

function openDetails(modulename,comId){
	
	if ($("#detailsBlock").dialog( "isOpen" )===true) {
		$( "#detailsBlock" ).dialog( "close" );
	}
	
	$.ajax({
		url: './?module='+modulename+'&page=Detail',
		type: 'POST',
		data: {
			'comId': comId
		},
	 
		success: function(data)
		{
			$( "#detailsBlock" ).html(data);
			$( "#detailsBlock" ).dialog( "open" );
		}
	});
	
}