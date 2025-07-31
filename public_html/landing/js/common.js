$(function() {


    // ADAPTIVE MENU

    $('.hamburger').click(function() {
        $(this).toggleClass('is-active');
        $('.main-nav').toggleClass('open');
        $('body').toggleClass('hidden');
    });

    // SCROLL TO ANY SECTION

    $('a[href*="#"]').on('click', function(e) {
        e.preventDefault();

        $('.hamburger').toggleClass('is-active');
        $('.main-nav').removeClass('open');
        $('body').removeClass('hidden');

        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 800, 'linear');
    });


    // SLICK SLIDER INIT

    if($('.hold-slider').length) {
        $('.hold-slider').slick({
            rows: false,
            arrows: false,
            infinite: false,
            touchThreshold: 300,
            responsive: [{
                breakpoint: 767,
                settings: {

                }
            }, ]
        }) 
    }

    if($('.history').length) {
        $('.history').slick({
            rows: false,
            arrows: false,
            infinite: false,
            touchThreshold: 300,
            responsive: [{
                breakpoint: 767,
                settings: {

                }
            }, ]
        }) 
    }

    if($('.month-slider').length) {
        $('.month-slider').slick({
            rows: false,
            arrows: false,
            infinite: false,
            touchThreshold: 300,
            responsive: [{
                breakpoint: 767,
                settings: {

                }
            }, ]
        }) 
    }

    $(".calculator .download").not(".slick-initialized").slick({
        slidesToShow: 1,
        arrows: false,
        rows: false,
        speed: 900,
        mobileFirst: true,
        touchThreshold: 300,
        responsive: [
            {
                breakpoint: 2000,
                settings: 'unslick'
            },
            {
                breakpoint: 1600,
                settings: 'unslick'
            },
            {
                breakpoint: 1200,
                settings: 'unslick'
            },
            {
                breakpoint: 1023,
                settings: 'unslick'
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });

    $(".track .download").not(".slick-initialized").slick({
        slidesToShow: 1,
        arrows: false,
        rows: false,
        speed: 900,
        mobileFirst: true,
        touchThreshold: 300,
        responsive: [
            {
                breakpoint: 2000,
                settings: 'unslick'
            },
            {
                breakpoint: 1600,
                settings: 'unslick'
            },
            {
                breakpoint: 1200,
                settings: 'unslick'
            },
            {
                breakpoint: 1023,
                settings: 'unslick'
            },
            {
                breakpoint: 768,
                settings: 'unslick'
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                }
            },
        ]
    });

    $(window).on('resize', function() {
        $(".calculator .download").slick('resize');
        $(".track .download").slick('resize');
    });

    // IOS HEIGHT FIX

    var vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', vh + 'px');

    window.addEventListener('resize', function() {
        var vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', vh + 'px');
    });


    // CUSTOM SELECT

    if($('.js-select').length) {
        $(".js-select").select2();
    }

    // CALCULATOR

    $('#inp_dep').bind("keypress keyup blur change input", function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        } 
    });

    function calc(){
        let inp_dep = document.getElementById("inp_dep");
        let inp_avg = document.getElementById("inp_avg");
        let prc = Math.random()*1.5 + 4.5;
        inp_dep.addEventListener("input",function (){
            if (inp_dep.value) {
                inp_avg.value = parseFloat(parseInt(inp_dep.value)*(prc/100)).toFixed(2);
            } else {
                inp_avg.value = '';
            }
        })
       
    }
    calc();



    // FEEDBACK

    $('.js-sendform').on('submit', function(e){
        e.preventDefault()
        var form = $(this); 
        var data = new FormData();  

        form.find(':input[name]').not('[type="file"]').each(function() { 
            var field = $(this);
            data.append(field.attr('name'), field.val());
        });

        var filesField = form.find('input[type="file"]');
        if (filesField.length) {
            $.each($(filesField)[0].files,function(key, input){
                data.append('file[]', input);
            });
        }

        var namefield = form.find('.js-name');
        if(namefield.length){
            var name = namefield.val().length;
            if (name > 2) {
                namefield.removeClass('tx-error');
            }  else {
                namefield.addClass('tx-error').trigger('focus');
                return false;
            }
        }

        var emailfield = form.find('.js-email');
        if(emailfield.length) {
            var emailpattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var email = emailfield.val();
            if(email != '') {
                if(!emailpattern.test(email)) {
                    emailfield.addClass('tx-error').trigger('focus');
                    return false;
                } else {
                    emailfield.removeClass('tx-error');
                }
            } else {
                emailfield.addClass('tx-error').trigger('focus');
                return false;
            }
        }

        var messagefield = form.find('.js-message');
        if(messagefield.length){
            var message = messagefield.val().length;
            if (message > 2) {
                messagefield.removeClass('tx-error');
            }  else {
                messagefield.addClass('tx-error').trigger('focus');
                return false;
            }
        }


        var checkbox = form.find('input[type="checkbox"]');
        if (checkbox.length) {
            if (checkbox.is(':checked')) {
                checkbox.parent().removeClass('error-checkbox');
            } else {
                checkbox.parent().addClass('error-checkbox');
                return false;
            }
        }

        var url = '/landing/mail/mail.php';
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            contentType: false,
            cache: false, 
            processData:false, 
            success: function(response) {
                form.find('input').val('');
                form.find('textarea').val('');
                $('.js-modal').addClass('active');
            }           
        });  
    })



    // MODAL

    $('.modal__close').click(function() {
        $('.js-modal').removeClass('active');
    });

 // MODAL TEAM


    $(".team-item").on({
    mouseenter: function () {
        $('body').addClass('active-bg');
    },
    mouseleave: function () {
        $('body').removeClass('active-bg');
    }
});
   

});
