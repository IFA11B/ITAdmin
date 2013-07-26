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

function changeToInput(){
	$('#compDetailsForm').find('.inputValue').each(function(){
		  var newVal = this.val();
		  this.html('<input type="text" value="'+newVal+'"/>');
	});
	
	$('#compDetailsForm').find('a.changeComDetails').replaceWith('<input type="submit" value="speichern"/>');
	
	$('#compDetailsForm').submit(function () {
	    $.ajax({
	        type: frm.attr('method'),
	        url: frm.attr('action'),
	        data: frm.serialize(),
	        success: function (data) {
	            alert('ok');
	        }
	    });
	
	    return false;
	});
}