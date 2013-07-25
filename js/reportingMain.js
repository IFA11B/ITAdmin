$(document).ready(function() {

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
    switch($(element).attr('id'))
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
        }
    });
}