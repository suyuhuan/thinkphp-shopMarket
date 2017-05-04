$(document).ready(function() {
	
	// Settings
	var slideToSpeed = 1000;
	var slideUpSpeed = 700;
	var $easingType= 'easeInOutQuart';
	
	// Caching
	var $close_button = $('#close');	
	var $load_items = $('a.loadcontent');
	// end Caching
	
	
	// Control if hash is set if yes, we load the wanted content
	var hash = window.location.hash.substr(1);
	var y=0;
	$load_items.each(function(){
		var i=0;
		var $this = $(this);							 
		var rel = $this.attr('rel');
		var href = $this.attr('href');
		if(hash==rel){
			// Bugfix for multiple load if more links exists
			if (y < 1) {
				$(this).addClass('active');
				$('html, body').animate({scrollTop: $("#header").prop("scrollHeight")}, slideToSpeed, $easingType, function() {
					if (i < 1) { // Bugfix for double load html, body
						$(this).addClass('active');
						loadContent(href);
					}
					i++;
				});
			}
			y++;
		}											
	});
		
	
	$("body").on("click", 'a.loadcontent', function() {
		var i=0;
		
		//  remove & add active class
		$load_items.removeClass('active');
		$(this).addClass('active');					   
		//						   
			
		var $this = $(this);	
		var rel = $this.attr('rel');
		var href = $this.attr('href');
		
		if(window.location.hash.substr(1) == rel) { 
			$('html, body').animate({scrollTop: $("#header").prop("scrollHeight")}, slideToSpeed, $easingType);
		} else {
			window.location.hash = rel;	// set the hash
			$('html, body').animate({scrollTop: $("#header").prop("scrollHeight")}, slideToSpeed, $easingType, function() {
				// Bugfix for double load html, body
				if (i < 1) {		
					$close_button.fadeOut(100);
					$('#pagecontent').slideUp(slideUpSpeed, $easingType, function() {
						loadContent(href);
					});
				}
				i++;
			});
		}
		return(false);
	});
	
	
	$close_button.click(function() {
		$load_items.removeClass('active');
		$close_button.fadeOut(500);
		$('#pagecontent').slideUp(slideUpSpeed, $easingType);
		window.location.hash = '#_';								// delete hash
		return(false);
	});
	
	
		
	function loadContent(href) {
		
		$('#loader').fadeIn(100);
		
		var LoadContentWrapper = href;
		
		$('#pageloader').delay(1000).queue(function() {
			$(this).load(LoadContentWrapper, function() {
				$('#loader').fadeOut(100);
				$('#pagecontent').slideDown(slideUpSpeed, $easingType, function() {
					$close_button.fadeIn(500);
				});	
				initialise('#pagecontent'); // after loading is complete we initialise all scripts
			});
			$(this).dequeue();
		});

	}
	

});