$(document).ready( function() {
    $('#myCarousel').carousel({
        interval: 3000
    });
    
    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function() {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');        
    }).on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.nav li').first().addClass('active');    
            }
        }
        clickEvent = false;
    });
});

$(document).ready(function() {
	$("#register").click(function() {
		var id = $(this).data("id");
        console.log(id);
        
        $("#submit").click(function() {
            var ten = $('input[name=ten]').val();
            var email = $('input[name=email]').val();
            var phone = $('input[name=phone]').val();
            $.ajax({
                url: 'su-kien/'+ id,
                type: 'post',
                dataType: 'json',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'ten': $('input[name=ten]').val(),
                    'email': $('input[name=email]').val(),
                    'phone': $('input[name=phone]').val(),
                },
                success: function() {
                    location.reload();
                }
            });
        });
	});
});