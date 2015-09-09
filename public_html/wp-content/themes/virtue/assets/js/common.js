
$( document ).ready(function() {
	  $( "#class1" ).click(function() {
		  $( "#class" ).val(1);
		  $( "#class1" ).addClass('time-class-active');
		  $( "#class2" ).removeClass("time-class-active");
		  $( "#class3" ).removeClass("time-class-active");
		});
	  $( "#class2" ).click(function() {
		  $( "#class" ).val(2);
		  $( "#class2" ).addClass("time-class-active");
		  $( "#class1" ).removeClass("time-class-active");
		  $( "#class3" ).removeClass("time-class-active");
		});
	  $( "#class3" ).click(function() {
		  $( "#class" ).val(3);
		  $( "#class3" ).addClass("time-class-active");
		  $( "#class2" ).removeClass("time-class-active");
		  $( "#class1" ).removeClass("time-class-active");
		});
	  
	  $( "#room1" ).click(function() {
		  $( "#room" ).val(1);
		  $( "#room1" ).addClass('add-info-active');
		  $( "#room2" ).removeClass("add-info-active");
		  $( "#room3" ).removeClass("add-info-active");
		});
	  $( "#room2" ).click(function() {
		  $( "#room" ).val(2);
		  $( "#room2" ).addClass("add-info-active");
		  $( "#room3" ).removeClass("add-info-active");
		  $( "#room1" ).removeClass("add-info-active");
		});
	  $( "#room3" ).click(function() {
		  $( "#room" ).val(3);
		  $( "#room3" ).addClass("add-info-active");
		  $( "#room1" ).removeClass("add-info-active");
		  $( "#room2" ).removeClass("add-info-active");
		});
	  var top = 930;
	    $(window).scroll(function (event) {            
	      var y = $(this).scrollTop();      
	      if (y >= top) {        
	        $('#nav-fmenu').removeClass('hide');
	        $('#nav-fmenu').attr('style','');        
	        
	        $('#mb-gototop').removeClass('hide');
	      } else {        
	        $('#nav-fmenu').addClass('nav-fmenu hide');

	        $('#mb-gototop').addClass('show-mb hide');
	        $('#mb-gototop').addClass('show-mb');
	      }
	    });
	    $('#nav-fmenu').addClass('nav-fmenu hide');
	    
	    
	    
	 // Add scrollspy to <body>
	    $('body').scrollspy({target: ".navbar", offset: 50});

	    // Add smooth scrolling to all links inside a navbar
	    $("#myNavbar a").on('click', function(event){

	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash (#)
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area (the speed of the animation)
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){

	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    });

  });