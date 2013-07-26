$(document).ready(function() {
	
	$('.editNotice').click(function(event){
		var oldText = $('.notice' + event.target.id).text();
		$('.notice' + event.target.id).html('<input id="save'+event.target.id+'" type="text" value="'+oldText+'"/>');
		event.target.removeClass('editNotice');
		event.target.html('speichern');
		event.target.addClass('saveNotice');
	});
	
	$('.saveNotice').click(function(event){
		 $.ajax({
             url: './?module=REPORTING&page=saveNotice',
             type: 'POST',
             data: {
                 'noticeId': event.target.id,
                 'noticeText': $('#save'+event.target.id).val()
             },
             
             success: function(data)
             {
            	 removeNoticeInput(event);
             }
         });
	});
	
	function removeNoticeInput(event){
		var oldText = $('#save'+event.target.id).val()
		$('.notice' + event.target.id).html(oldText);
		event.target.removeClass('saveNotice');
		event.target.html('&auml;ndern');
		event.target.addClass('editNotice');
	};

    $('#network .header,#software .header,#hardware .header').click(function() {
        var current = $(this).parent();
        
        if(current.hasClass('activeHeader'))
        {
            closePanel(current);
        }
        else
        {
            openPanel(current);
        }
    });
    
    $('#network .repContent, #software .repContent, #hardware .repContent')
        .hide();
});

function closePanel(element)
{
    $(element).removeClass('activeHeader');
    
    $(element).find(".headerArrow").removeClass('arrowRotate');
    
    $(element).find('.repContent').hide(250);
}

function openPanel(element)
{
    var subPageName;
    var pageId = $(element).attr('id');
    switch(pageId)
    {
        case 'network':
            subPageName = 'Network';
            closePanel($('#software,#hardware'));
            break;
        case 'software':
            subPageName = 'Software';
            closePanel($('#network,#hardware'));
            break;
        case 'hardware':
            subPageName = 'Hardware';
            closePanel($('#software,#network'));
            break;
    }
    
    $(element).addClass('activeHeader');
    
    $(element).find(".headerArrow").addClass('arrowRotate');
    
    $.ajax({
        url: './?module=REPORTING&page=' + subPageName,
        type: 'POST',
        
        beforeSend: function()
        {
            $(element).find('.headerArrow img').remove();
            $(element).find('.headerArrow').spin(spinnerOptions);
        },
        
        success: function(data)
        {
            $(element).find('.headerArrow').html('<img src="./images/chevron-right.png" alt="&#8680;" />');
            $(element).find('.repContent').html(data).show(250);
            
            // Attach event handler to filter input
            $('#filterValue').on('keyup', function(event)
            {
                if(event.which === 13)
                {
                    $.ajax({
                        url: './?module=REPORTING&page=' + subPageName,
                        type: 'POST',
                        data: {
                            'filterType': $('#filterType').val(),
                            'filterValue': $('#filterValue').val()
                        },
                        
                        success: function(data)
                        {
                            $('#' + pageId + ' .repContent').html(data);
                        }
                    });
                }
            });
        }
    });
}