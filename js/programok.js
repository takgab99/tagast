

/* PROGRAMS */
$(function() {
		
		$.each($('.ui-accordion .ui-accordion-header'),function(index,value){
			$(value).next().hide()
		});
		$('.ui-accordion .ui-accordion-header').click(function() {
			if ($(this).hasClass('ui-state-active')){
				$(this).next().hide();
				$(this).removeClass('ui-state-active')
			} else {
				$(this).next().slideDown(1000);
				$(this).addClass('ui-state-active')
			}
		});
		var query = window.location.hash.substring(1);
		if (query.length>0){
			$('html, body').stop().animate({
				scrollTop: $('#' + query).offset().top - 130
			}, 1500);
			$('#' + query).click();
		}
		
		
		
		

    $(".programs-page .programs-one tr").click(function() {
        var programId = $(this).data("id");
        $("#description-"+programId).toggle("slow");
    }); 

    $(".programs-page .programs-full td").click(function() {
        var programId = $(this).data("id");
        var rownum = $(this).parent().data('rownum');

        var table = $(this).closest('table');
        var desc = table.find($("#description-"+programId));
	
				$.each($('.open-program'),function(index, value){
					var id = $(value).attr('id').replace('description-','');
					if (id != programId){
						$(value).hide('slow');
						$('[data-id="' + id +  '"]').css('background-color', 'transparent');
					}
				});
				
        if (desc.is(':hidden')) {
						console.log('show');
            $(this).siblings().css('background', 'transparent');
            $(this).css('background-color', '#dddda8');
            desc.show('slow');
						desc.addClass('open-program');
        } else {
						console.log('hide');
						desc.removeClass('open-program');
            $(this).css('background-color', 'transparent');
            desc.hide('slow');
        }
    });
});
