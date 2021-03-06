var spinnerOptions = {
    lines: 8, // The number of lines to draw
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


$(document).ready(function(){

	
	$('.navbar').click(function(event){
				
		/* Navigation */
		$.ajax({
		    url: './?module='+event.target.id,
		    type: 'POST',
		    
		    success: function(data)
		    {
		        $("#content").html(data);
		    }
		});
		
	});
});

