function addNew(eventType, modulename, subPageName){
	
	if(eventType == 'open'){
		var $contentDiv = $('a.'+subPageName).parent();
	
		$.ajax({
	        type: "POST",
	        url: './?module='+modulename+'&page='+subPageName,
	        data: {
	        	'addNew':subPageName
	        },
	        beforeSend: function()
	        {
	        	$contentDiv.find('.headerArrow img').remove();
	        	$contentDiv.find('.headerArrow').spin(spinnerOptions);
	        },
	        success: function(data)
	        {
	        	$contentDiv.find('.headerArrow').html('<img src="./images/chevron-right.png" alt="&#8680;" />');
	        	$contentDiv.find('.repContent').html(data).show(250);
	        }
			});
	}
	if(eventType == 'save'){
		var $form = $('form#new'+subPageName);
		
		$.ajax({
	           type: "POST",
	           url: './?module='+modulename+'&page='+subPageName,
	           data: $form.serialize(), // serializes the form's elements.

	           success: function(data)
	           {
	        	   $form.parent('.repContent').html(data);

	           }
			});
	}
}

function toggleCheckbox(id, eventType, modulename, subPageName){
	if(eventType == 'edit'){

		$('input[type=checkbox]').each(function() {
			$(this).removeAttr('disabled');
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

function toggleInput(id, eventType, modulename, subPageName){
	
	var $form = $('form#'+subPageName+id);
	
		if(eventType == 'edit'){
			$form.addClass('found');
			$form.find('.toggleInput').each(function() {
				var oldText = $(this).text();
				$(this).html('<input type="text" name="'+$(this).attr('name')+'" value="'+oldText+'"/>');
			}); 
			
			var newLink = "<a class='save' onclick=\"toggleInput('"+id+"','save', '"+modulename+"','"+subPageName+"')\">speichern</a>";
			$form.find('a.edit').replaceWith(newLink);
		}
		else if(eventType=='save'){
									
			$.ajax({
	           type: "POST",
	           url: './?module='+modulename+'&page='+subPageName,
	           data: $form.serialize(), // serializes the form's elements.

	           success: function(data)
	           {
	        	   $form.parent('.repContent').html(data);

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
