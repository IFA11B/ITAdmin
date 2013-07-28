

$(document).ready(function() {
	
    $('#supplier .header,#room .header,#user .header').click(function() {
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
    
    $('#supplier .repContent, #room .repContent, #user .repContent')
        .hide();
});


function closePanel(element)
{
    $(element).removeClass('activeHeader');
    
    $(element).find(".headerArrow").removeClass('arrowRotate');
    
    $(element).find('.repContent').hide(250);
}

function toggleInput(id, eventType, modulename, subPageName){
		if(eventType == 'edit'){

			$('td.toggleInput').each(function() {
				var oldText = $(this).text();
				$(this).html('<input type="text" name="'+$(this).attr('name')+'" value="'+oldText+'"/>');
			}); 
			
			var newLink = "<a class='save' onclick=\"toggleInput('"+id+"','save', '"+modulename+"','"+subPageName+"')\">speichern</a>";
			$('a.edit').replaceWith(newLink);
		}
		else if(eventType=='save'){
			
			var $form = $('form#'+subPageName+id);
						
			$.ajax({
	           type: "POST",
	           url: './?module='+modulename+'&page='+subPageName,
	           data: $form.serialize(), // serializes the form's elements.

	           success: function(data)
	           {
	        	   $form.parent().replaceWith(data);

	           }
			});
	
		}
}


function deleteData(id, modulename, subPageName){
	
	$.ajax({
        type: "POST",
        url: './?module='+modulename+'&page='+subPageName,
        data: {
            'deleteData': id
        },

	    success: function(data)
	      {
	    	$('form#'+subPageName+id).parent().replaceWith(data);
	      }
		});
	
}

function openPanel(element)
{
    var subPageName;
    var pageId = $(element).attr('id');
    switch(pageId)
    {
        case 'supplier':
            subPageName = 'Supplier';
            closePanel($('#room,#user'));
            break;
        case 'room':
            subPageName = 'Room';
            closePanel($('#supplier,#user'));
            break;
        case 'user':
            subPageName = 'User';
            closePanel($('#supplier,#room'));
            break;
    }
    
    $(element).addClass('activeHeader');
    
    $(element).find(".headerArrow").addClass('arrowRotate');
    
    $.ajax({
        url: './?module=COREDATA&page=' + subPageName,
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
                        url: './?module=COREDATA&page=' + subPageName,
                        type: 'POST',
                        data: {
                            'filterType': $('#filterType').val(),
                            'filterValue': $('#filterValue').val()
                        },
                        
                        success: function(data)
                        {
                            $('#' + pageId + ' .repContent').html(data);
							addNoticeChanger();
                        }
                    });
                }
            });
        }
    });
}