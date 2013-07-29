$(document).ready(function(){
	$( "#detailsBlock" ).dialog({
		autoOpen: false,
    	modal: true,
    	closeOnEscape: true
	});
});

function openDetails(modulename,compId){
	if ($("#detailsBlock").dialog( "isOpen" )===true) {
		$( "#detailsBlock" ).dialog( "close" );
	}
	
	$.ajax({
		url: './?module='+modulename+'&page=comDetails',
		type: 'POST',
		data: {
			'comId': compId
		},
	 
		success: function(data)
		{
			$( "#detailsBlock" ).html(data);
			$( "#detailsBlock" ).dialog( "open" );
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