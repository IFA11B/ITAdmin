$(document).ready(function() {

    $('#change .header,#mount .header,#remove .header').click(function() {
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
    
    $('#change .repContent, #mount .repContent, #remove .repContent')
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
        case 'change':
            subPageName = 'Austausch';
            closePanel($('#mount,#remove'));
            break;
        case 'mount':
            subPageName = 'Einbau';
            closePanel($('#change,#remove'));
            break;
        case 'remove':
            subPageName = 'Ausbau';
            closePanel($('#change,#mount'));
            break;
    }
    
    $(element).addClass('activeHeader');
    
    $(element).find(".headerArrow").addClass('arrowRotate');
    
    $.ajax({
        url: './?module=MAINTENANCE&page=' + subPageName,
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