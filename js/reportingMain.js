var opts = {
    lines: 17, // The number of lines to draw
    length: 0, // The length of each line
    width: 5, // The line thickness
    radius: 5, // The radius of the inner circle
    corners: 1, // Corner roundness (0..1)
    rotate: 0, // The rotation offset
    direction: 1, // 1: clockwise, -1: counterclockwise
    color: '#333', // #rgb or #rrggbb
    speed: 1.6, // Rounds per second
    trail: 100, // Afterglow percentage
    shadow: false, // Whether to render a shadow
    hwaccel: true, // Whether to use hardware acceleration
    className: 'spinner', // The CSS class to assign to the spinner
    zIndex: 2e9, // The z-index (defaults to 2000000000)
    top: 'auto', // Top position relative to parent in px
    left: 'auto' // Left position relative to parent in px
};

$(document).ready(function() {

    $('#network,#software,#hardware').click(function() {
        if($(this).hasClass('activeHeader'))
        {
            closePanel($(this));
        }
        else
        {
            openPanel($(this));
        }
    });
});

function closePanel(element)
{
    $(element).removeClass('activeHeader');
    
    $(element).find(".headerArrow").removeClass('arrowRotate');
    
    $(element).find('.repContent').html('');
}

function openPanel(element)
{
    closePanel($('#network,#software,#hardware'));
    
    $(element).addClass('activeHeader');
    
    $(element).find(".headerArrow").addClass('arrowRotate');
    
    var subPageName;
    
    switch($(element).attr('id'))
    {
        case 'network':
            subPageName = 'Network';
            break;
        case 'software':
            subPageName = 'Software';
            break;
        case 'hardware':
            subPageName = 'Hardware';
            break;
    }
    
    $.ajax({
        url: './?module=REPORTING&page=' + subPageName,
        type: 'POST',
        
        beforeSend: function()
        {
            $(element).find('.headerArrow img').remove();
            $(element).find('.headerArrow').spin(opts);
        },
        
        success: function(data)
        {
            $(element).find('.headerArrow').html('<img src="./images/chevron-right.png" alt="&#8680;" />');
            $(element).find('.repContent').html(data);
        }
    });
}