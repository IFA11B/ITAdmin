$(document).ready(function(){
	$( "#listBlock" ).dialog({
		autoOpen: false,
    	modal: true,
    	width: '80%',
    	closeOnEscape: true
	});
});

function openChoose(listType, moduleName, filterType, filterValue){
    $.ajax({
		url: './?module=' + moduleName + '&page=chooseMain',
		type: 'POST',
		data: {
			'listType': listType,
			'filterType': filterType,
			'filterValue': filterValue
		},
	 
		success: function(data)
		{
			$( "#listBlock" ).html(data);
			$('#listBlock').find('#filterValue').attr('data-modulename', moduleName);
			
			$('#listBlock').find('#filterValue').keyup(updateFilter);
			
			$( "#listBlock" ).dialog("open");
		}
	});	
}

function submitChoice(id)
{
	$.ajax({
		url: './?module=' + modulename,
		type: 'POST'
	})
}

function updateFilter(event)
{
    if(event.which === 13)
    {
        var listType = $('#filterValue').attr('data-listtype');
        var moduleName = $('#filterValue').attr('data-modulename');
        
        openChoose(listType, moduleName, null, $('#filterValue').val());
    }
}