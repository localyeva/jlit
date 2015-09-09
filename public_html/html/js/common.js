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
  });