
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('.page-scroll a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top-40
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    //>=, not <=
    if (scroll >= 500) {
        //clearHeader, not clearheader - caps H
        $(".navbar-inverse").addClass("dark-header");
        $(".navbar-inverse a.navbar-brand").removeClass("hide");
        $(".navbar-inverse .navbar-social a").addClass("invert");
    }
    else {
        $(".navbar-inverse").removeClass("dark-header");
        $(".navbar-inverse a.navbar-brand").addClass("hide");
        $(".navbar-inverse .navbar-social a").removeClass("invert");

    }
});

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('.index-body').scrollspy({
    target: '.navbar-fixed-top'
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});


/* COUNTER */ 
$(function() {
    $("#counter-wrapper").countdown("2015/09/25 17:00", function(event) {
      $("#counter-days-num").text(
        event.strftime('%D')
      );
	  
	  $("#counter-hours-num").text(
        event.strftime('%H')
      );
	  
	  $("#counter-minutes-num").text(
        event.strftime('%M')
      );
	  
	  $("#counter-seconds-num").text(
        event.strftime('%S')
      );
    });
	
	var display = true;
	$("#counter-toggle").click(function() {
		if (display) {
			$("#counter-wrapper .digit").hide("slow");
			$(this).html('<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>');
			display = false;
		}
		else {
			$("#counter-wrapper .digit").show();
			$(this).html('<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>');
			display = true;
		}
	});
});
