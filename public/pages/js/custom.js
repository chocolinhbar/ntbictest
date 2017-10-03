$(document).ready(function(){
    
	var clickEvent = false;
	$('#myCarousel').carousel({
		interval:   4000	
	}).on('click', '.list-group li', function() {
			clickEvent = true;
			$('.list-group li').removeClass('active');
			$(this).addClass('active');		
	}).on('slid.bs.carousel', function(e) {
		if(!clickEvent) {
			var count = $('.list-group').children().length -1;
			var current = $('.list-group li.active');
			current.removeClass('active').next().addClass('active');
			var id = parseInt(current.data('slide-to'));
			if(count == id) {
				$('.list-group li').first().addClass('active');	
			}
		}
		clickEvent = false;
	});
})
$(document).ready(function() {
 	$.ajaxSetup({
 		headers: {
 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 		}
 	});
 	$('#locale').click(function() {
 		var locale = $(this).data('locale');
 		$(this).attr('href',location.href);
 		console.log(locale);
 		$.ajax({
 			type: 'post',
 			url: 'change-language',
 			dataType: 'json',
 			data: {
 				'locale': locale
 			},
 			success: function() {
 				location.reload();
 			}
 		});
 	});
 });
$(window).on('load',function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
	$('#myCarousel .list-group-item').outerHeight(triggerheight);
});

$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 2000
    })
});