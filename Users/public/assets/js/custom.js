// JavaScript Document

jQuery(document).ready(function($) {

    // Slider plugin

    $(".rslides1").responsiveSlides({
        //auto: false,
        nav: true,
		pause: true,
        pager: true,
        speed: 2500,
		timeout: 5000,
        //maxwidth: 540
    });
	
	$(".rslides2").responsiveSlides({
        //auto: false,
        nav: true,
		pause: true,
        pager: true,
        speed: 2500,
		timeout: 7000,
        //maxwidth: 540
		before: function () {
			
		$(".rslides2").parents("#slider-color").removeClass();
	    $(".rslides2").parents("#slider-color").addClass( $('.rslides2 li.rslides1_on').attr("id") );
		$(".rslides2").parent().find('.caption').animate({ bottom: '-550px',opacity: 1},
											  {easing: 'easeOutExpo',
											  duration: 1500}
											  );
		$(".rslides2").parent().find('.caption').animate({ bottom: '35px',opacity: 1},
											  {easing: 'easeOutExpo',
											  duration: 1500}
											  );
		
		
        },
        after: function () {
         
        }
    });
	
	// Carousel plugin
	
	$('.testimonialswrap').carousel({
				slider: '#testimonials',
				slide: '.testimonials-slide',
				nextSlide : '.next-l',
				prevSlide : '.prev-l',
				addNav : false
			});

    // Top Text widget cycle 								

    $('.info-text').cycle({
        fx: 'scrollDown',
        speed: 500,
        timeout: 3500,
        pause: 1,
        cleartypeNoBg: true
    });

    setTimeout(function() {

        $('.top-bar').slideDown();

        //Social icon hover

        $('ul.socicon li').fadeTo(300, 0.5);
        var width = 0;
        var sWidth = width += $('ul.top-w li').outerWidth(true);
        var n = $('ul.top-w li').length;

        $('ul.top-w li').hover(function() {
            $(this).fadeTo(300, 0.8);

        },
        function() {
            $(this).fadeTo(300, 0.5);

        });

        $('ul.top-w').hover(function() {
            $('ul.top-w').stop().animate({
                width: sWidth * n
            },
            {
                duration: 500,
                specialEasing: {
                    width: 'swing'
                }
            });

        },
        function() {
            $('ul.top-w').stop().animate({
                width: '30px'
            },
            {
                duration: 500,
                specialEasing: {
                    width: 'swing'
                }
            });

        });

    },
    1000);

    //Google map setting

    $('#google_map').gmap3({
        action: 'addMarker',
        address: "Pearl St, NY",
        map: {
            center: true,
            zoom: 10
        },
        marker: {
            options: {
                draggable: false
            }
        },
        infowindow: {
            options: {
                // content: 'Hello World !<br>Phone: +1 111 111-11-11<br>Address: Chicago, IL, 111 Webdev St'
            },
            events: {
                closeclick: function() {

}
            }
        }
    });

    //Portfolio filter

    $('ul#portfolio-filter a').click(function() {

        $('ul#portfolio-filter a.currents').removeClass('currents');
        $(this).addClass('currents');

        var filterVal = $(this).text().toLowerCase().replace(' ', '-');

        if (filterVal == 'all') {
            $('#containment-portfolio li.hidden').show(1000).removeClass('hidden');
        } else {

            $('#containment-portfolio li').each(function() {
                if (!$(this).hasClass(filterVal)) {
                    $(this).hide(1000).addClass('hidden');

                } else {
                    $(this).show(1000).removeClass('hidden');

                }
            });
        }

        return false;
    });

    //Carousel images

    $('#Carousel1,#Carousel').carousel({
        interval: 2500
    });

    //Media element player

    $('audio,video').mediaelementplayer({
        audioWidth: '100%',
        audioHeight: '30px',
        videoWidth: '100%',
        videoHeight: '100%'
    });

    //prettyPhoto

    $("a[rel^='prettyPhoto']").prettyPhoto();

    //Portfolio item

    $('.item-block').hover(function() {
        $(this).css({
            background: '#f8f8f8'
        });
        $(this).find('.zoom').animate({
            left: "+=130px"
        },
        {
            duration: 300,
            specialEasing: {
                width: 'easeOutExpo'
            }
        });

        $(this).find('.link').animate({
            right: "+=130px"
        },
        {
            duration: 300,
            specialEasing: {
                width: 'easeOutExpo'
            }
        });

    },
    function() {
        $(this).css({
            background: 'none'
        });
        $(this).find('.zoom').animate({
            left: "-70px"
        },
        {
            duration: 300,
            specialEasing: {
                width: 'easeOutExpo'
            }
        });

        $(this).find('.link').animate({
            right: "-70px"
        },
        {
            duration: 300,
            specialEasing: {
                width: 'easeOutExpo'
            }
        });

        return false;
    });

    //Tweets setting

    function urlToLink(text) {
        var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
        return text.replace(exp, "<a href='$1'>$1</a>");
    }
    function relTime(time_value) {
        time_value = time_value.replace(/(\+[0-9]{4}\s)/ig, "");
        var parsed_date = Date.parse(time_value);
        var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
        var timeago = parseInt((relative_to.getTime() - parsed_date) / 1000);
        if (timeago < 60) return 'less than a minute ago';
        else if (timeago < 120) return 'about a minute ago';
        else if (timeago < (45 * 60)) return (parseInt(timeago / 60)).toString() + ' minutes ago';
        else if (timeago < (90 * 60)) return 'about an hour ago';
        else if (timeago < (24 * 60 * 60)) return 'about ' + (parseInt(timeago / 3600)).toString() + ' hours ago';
        else if (timeago < (48 * 60 * 60)) return '1 day ago';
        else return (parseInt(timeago / 86400)).toString() + ' days ago';
    }

    $('#tweet-list').hide();
    var user = 'envato'; // Set your twitter id
    var count = '3'; // How many feeds do you want. Recommended Max 10 Twitter Api

    $.getJSON('http://api.twitter.com/1/statuses/user_timeline.json?include_rts=true&screen_name=' + user + '&count=' + count + '&callback=?',
    function(tweetdata) {
        var tl = $("#tweet-list");
        $.each(tweetdata,
        function(i, tweet) {
            tl.append("<li>&ldquo;" + urlToLink(tweet.text) + "&rdquo;&ndash; " + relTime(tweet.created_at) + "</li>");
        });
    });

    setTimeout(function() {
        $('.tweets p').hide();
        $('#tweet-list').show();

    },
    1000);

    // Search effect 
	
    $('.navbar-search').hover(function() {
        $('.search-query').stop().animate({
            width: '150px'
        },
        {
            duration: 500,
            specialEasing: {
                width: 'swing'
            }
        });

    },
    function() {
        $('.search-query').stop().animate({
            width: '8px'
        },
        {
            duration: 500,
            specialEasing: {
                width: 'swing'
            }
        });

    });

    $("#header input#searchsubmit").mouseover(function() {
        $('#header #search form input#s').stop(false, true).animate({
            width: '152px',
            marginRight: '-6px',
            paddingLeft: '10px',
            paddingRight: '10px'
        }).focus();
    });
    $("#header #search").mouseleave(function() {
        value = '';
        $('#header #search form input#s').stop(false, true).animate({
            width: '3px',
            marginRight: '0',
            padding: '0'
        }).blur().val(value);
    });
	
	//Toggle

    $(".toggle-box").hide();
    $(".open-block").toggle(function() {
        $(this).addClass("active");
    },
    function() {
        $(this).removeClass("active");
    });
    $(".open-block").click(function() {
        $(this).next(".toggle-box").slideToggle();
    });
	
    //Accordion

    $('.accordion-box').hide();
    $('.open-block-acc').click(function() {
        $(".open-block-acc").removeClass("active"); 
		$('.accordion-box').slideUp('normal');
        if ($(this).next().is(':hidden') == true) {
            $(this).next().slideDown('normal');
            $(this).addClass("active");
        }
    });
	
	//Message box

    $('.message-box').find('.closemsg').click(function() {
        $(this).parent('.message-box').slideUp(500);
    });

    // Mobi Navigation

    $("nav ul").find('li').hover(function() {
        $(this).children("ul").stop(true, true).fadeIn(300);
    },
    function() {
        $(this).children("ul").stop(true, true).fadeOut(200);
    });

    (function() {

        var $navResp = $('nav').children('ul'),
        optionsList = '<option value="" selected>MENU</option>';

        $navResp.find('li').each(function() {
            var $this = $(this),
            $anchor = $this.children('a'),
            depth = $this.parents('ul').length - 1,
            indent = '';

            if (depth) {
                while (depth > 0) {
                    indent += '--';
                    depth--;
                }
            }

            optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
        }).end().after('<select class="responsive">' + optionsList + '</select>');

        $('.responsive').on('change',
        function() {
            window.location = $(this).find("option:selected").val();

        });

    })();

    // Validator plugin

    $('#submit').formValidator({
        scope: '#form'
    });

    $('#submit').click(function() {
        $('input.error-input, textarea.error-input').delay(300).animate({
            marginLeft: 0
        },
        100).animate({
            marginLeft: 10
        },
        100).animate({
            marginLeft: 0
        },
        100).animate({
            marginLeft: 10
        },
        100).animate({
            marginLeft: 0
        },
        100);
    });

    // Form plugin

    var options = {

        beforeSubmit: function() {
            $('.sending').show();

        },
        success: function() {
            $('.sending').hide();
            $('#form').hide();
            $(".mess").show().html('<h3>Thanks !</h3><h3>Your message has been sent.</h3>'); // Change Your message post send
            $('.mess').delay(3500).fadeOut(function() {

                $('#form').clearForm();
                $('#form').delay(4000).show();

            });
        }
    };

    $('#form').submit(function() {
        $(this).ajaxSubmit(options);
        return false;
    });

});