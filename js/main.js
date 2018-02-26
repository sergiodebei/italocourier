$(document).ready(function() {

    var colorsky = "#1a8bcb";

    $(this).scrollTop(0);

    // $(function() {
    //     $('a[href*=#]:not([href=#])').click(function() {
    //         if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    //             var target = $(this.hash);
    //             target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    //             if (target.length) {
    //                 $('html,body').stop().animate({
    //                     scrollTop: target.offset().top - ($('nav').outerHeight() - 70)
    //                 }, 1000);
    //                 return false;
    //             }
    //         }
    //     });
    // });

    var hours = (new Date()).getHours();
    // console.log(hours);
    if(hours < 6 || hours >= 19){
        colorsky = "#1d4e69";
        $("body").addClass("night");
        // $("header, footer, .auto-scroll-to-top").addClass("night");
        // console.log('night');
        for (i = 0; i < 100; i++){
            $('.stars-wrapper').append("<div class='stars s" + i +"'></div>");
        }
    }else{
        $("body").removeClass("night");
        // $("header, footer, .auto-scroll-to-top").removeClass("night");
        // console.log('day');
    }

    $.simpleWeather({
        zipcode: '',
        woeid: '727232',
        location: '',
        unit: 'c',
        async: false,
        success: function(weather) {
            var today = parseInt(weather.todayCode, 10);
            // console.log(weather);
            // console.log(typeof(weather.todayCode));
            // console.log(parseInt(weather.todayCode, 10));
            // console.log(typeof(parseInt(weather.todayCode, 10)));
            var arr = [5, 6, 10, 11, 12, 30];
            // console.log(arr.includes(today));
            var raining = arr.includes(today);
            // console.log(raining);

            if(raining){
                // setColor();
                colorsky = "#4a7994";
                // console.log(colorsky);
                $("body").addClass("raining");
                for (i = 0; i <= 100; i++){
                    $(".rain-wrapper").append("<div class='rain rain-" + i + "'></div>");
                }
                $(".lightning").addClass('flashit');
            }
            initMap();
        },

        error: function (error) {
            initMap();
        }


    });


    // Select all links with hashes
    $('a[href*="#"]')
      // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
        // On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            // Figure out element to scroll to
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
            // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - ($('nav').outerHeight() - 70)
                }, 1000, function() {
                    // Callback after animation
                    // Must change focus!
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });

    //trailing spaces remover
    // var abc = document.body.innerHTML;
    // var a = String(abc).replace(/\u200B/g,'');
    // document.body.innerHTML = a;

/*   alert(templateUrl);*/

function initMap() {
    var myLatLng = {lat: 52.4297003, lng: 4.7191403};
    var map = new google.maps.Map(document.getElementById('map'), {
        scrollwheel: false,
        scaleControl: false,
        draggable: false,
        center: myLatLng,
        zoom: 12,
        disableDefaultUI: true,
        styles: [{
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#444444"
            }]
        }, {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [{
                "color": "#f3f3ee"
            }]
        }, {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "road",
            "elementType": "all",
            "stylers": [{
                "saturation": -100
            }, {
                "lightness": 45
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [{
                "visibility": "simplified"
            }]
        }, {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [{
                "visibility": "off"
            }]
        }, {
            "featureType": "water",
            "elementType": "all",
            "stylers": [{
                "color": colorsky
            }, {
                "visibility": "on"
            }]
        }, {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#ffffff"
            }]
        }]
    });

    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'Click for info',
/*        animation: google.maps.Animation.DROP,*/
        icon: {
            url: templateUrl + '/img/map_icon.png',
            anchor: new google.maps.Point(75,50),
            size: new google.maps.Size(130,100)
        }
    });

    google.maps.event.addListener(map, 'zoom_changed', function() {
        marker.setIcon(icon);
    });

    google.maps.event.addDomListener(window, "resize", function() {
        var center = map.getCenter();
        google.maps.event.trigger(map, "resize");
        map.setCenter(center);
    });

    var popup = new google.maps.InfoWindow({
        content: '<h1><strong>IItalo Express Courier</strong></h1><br />Heiligeweg 5 <br />PRO Store Amsterdam <br />1012 XN Amsterdam<br />Netherlands',
        maxWidth: 300
    });

    google.maps.event.addListener(marker, "click", function() {
        // console.log('click');
        popup.open(map, marker);
    });

    google.maps.event.addListener(popup, "closeclick", function() {
      //  map.panTo(center);
    });

}

$('.toggle_menu').click(function() {
    // console.log('click');
    $(this).toggleClass('active');
    $('.magic').toggleClass('active');
});

$('.nav-item > a').click(function() {
    // console.log('remove');
    $('.magic').removeClass('active');
});

});

$(window).scroll(function(){
    if($(this).scrollTop() > 200) {
        $(".auto-scroll-to-top").addClass("visible");
    } else {
        $(".auto-scroll-to-top").removeClass("visible");
    }
});

$(".auto-scroll-to-top").click(function(){
    $("html, body").animate({scrollTop: 0}, 600);
});

 // jQuery( function( $ ){

 //    var first_date_id   = 'fld_553185',    // date field ID to sync from
 //        second_date_id  = 'fld_2753849',    // date field ID to sync to
 //        date_forward    = 1;                // number of days to sync forward by

 //    // get the first field
 //    var first_date      = $( '[data-field="' + first_date_id + '"]' );

 //    if( !first_date.length ){
 //        return;
 //    }

 //    // bind date change event
 //    first_date.on("changeDate", function() {
 //        var start_date = first_date.cfdatepicker('getFormattedDate');
 //        var d = new Date( start_date );
 //        var second_date = first_date.closest('.row').find('[data-field="' + second_date_id + '"]');

 //        d.setDate( d.getDate() + date_forward );
 //        second_date.cfdatepicker( 'setStartDate', new Date(d) );
 //        if( !second_date.val().length ){
 //            second_date.cfdatepicker( 'update', new Date(d) );
 //        }

 //        second_date.on("changeDate", function() {
 //            second_date.cfdatepicker( 'hide' );
 //        });
 //        first_date.cfdatepicker( 'hide' );
 //    });
 // })


