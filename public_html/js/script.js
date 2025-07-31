const wnd = $(window);
if (wnd.width() < 1024) {
  $('.header__humb').on('click', function() {
    $('.header').addClass('open');
  });
  $('.header__nav i').on('click', function() {
    $('.header').removeClass('open');
  });
}

// $('.quest__home-btn .btn, .quest__form-btn .btn, .quest__success-btn div.btn').on('click', function() {
//   $('.quest__item.active').next().addClass('active').siblings().removeClass('active');
//   $('.quest__progress span').css('width',$(this).data('width')+'%');
// });

$(document).ready(function() {
  svg();
});

//modal
$('body').delegate('.open-modal', 'click', function(e) {
  // open_modal($(this).data('href'));
    show_modal($(this).data("id"));
  e.preventDefault();
});

function show_modal(id){
    let modal = document.getElementById(id);
    if(modal){
        $('.modal.ajax').remove();
        $('body').append('<div class="modal hide ajax"><div class="modal__bg"></div><div class="modal__cot"></div></div>');
        $('.modal.ajax .modal__cot').append(modal).parent().removeClass('hide');
        setTimeout(function() {
            $('.modal.ajax').addClass('load');
        },100);
    }
}

function open_modal(href) {
  $('.modal.ajax').remove();
  $('body').append('<div class="modal hide ajax"><div class="modal__bg"></div><div class="modal__cot"></div></div>');
  setTimeout(function() {
    $('.modal.ajax').addClass('load');
  },100);
  htmlhide();
  $.ajax({
    url: href,
    dataType: 'html',
    success: function(data) {
      $('.modal.ajax .modal__cot').append(data).parent().removeClass('hide');
    }
  });
  $('.header').css('overflowY', 'scroll');
}
$('body').delegate('.modal__close, .modal-close, .modal__bg', 'click', function() {
  close_modal();
});
function close_modal() {
  $('.modal').addClass('hide').removeClass('load');
  setTimeout(function() {
    $('.header').css('overflowY', 'initial');
    $('html').removeClass('hide').css({'padding-right':'', 'overflow-y':''});
  },500);
}
function htmlhide() {
  var block = $('<div>').css({'height':'50px','width':'50px'}),
  indicator = $('<div>').css({'height':'200px'});
  $('body').append(block.append(indicator));
  var w1 = $('div', block).innerWidth();
  block.css('overflow-y', 'scroll');
  var w2 = $('div', block).innerWidth();
  $(block).remove();
  $('html').addClass('hide').css({'padding-right':w1-w2, 'overflow-y':'hidden'});
}

function svg() {
  $('img[src$=".svg"]').each(function () {
    var $img = $(this);
    var imgURL = $img.attr('src');
    var attributes = $img.prop('attributes');
    if ($img.hasClass('svg')) {
      $.get(imgURL, function (data) {
        var $svg = jQuery(data).find('svg');
        $svg = $svg.removeAttr('xmlns:a');
        $.each(attributes, function () {
          $svg.attr(this.name, this.value);
        });
        $img.removeClass('svg').replaceWith($svg);
      }, 'xml');
    }
  });
}


function fillDropdowns(date) {
    var monthDropdown = document.getElementById('monthDropdown');
    var dayDropdown = document.getElementById('dayDropdown');
    var yearDropdown = document.getElementById('yearDropdown');
    if(monthDropdown && dayDropdown && yearDropdown){
        // Fill Month dropdown
        for (var i = 1; i <= 12; i++) {
            var option = document.createElement('option');
            option.text = moment().month(i - 1).format('MMMM');
            option.value = i;
            if(option.value === date.month){
                option.setAttribute("selected","selected")
            }
            monthDropdown.add(option);
        }

        // Fill Day dropdown
        for (var i = 1; i <= 31; i++) {
            var option = document.createElement('option');
            option.text = i;
            option.value = i;
            if(option.value === date.day){
                option.setAttribute("selected","selected")
            }
            dayDropdown.add(option);
        }

        var currentYear = moment().year();
        for (var i = currentYear - 18; i >= 1900; i--) {
            var option = document.createElement('option');
            option.text = i;
            option.value = i;
            if(option.value === date.year){
                option.setAttribute("selected","selected")
            }
            yearDropdown.add(option);
        }
    }
}

document.addEventListener("setBDate",function (e){
    fillDropdowns(e.detail);
})

fillDropdowns();

function calc(){
    let inp_dep = document.getElementById("inp_dep");
    let inp_avg = document.getElementById("inp_avg");
    let prc = Math.random()*1.5 + 4.5;
    if(inp_dep){
        inp_dep.addEventListener("input",function (){
            inp_avg.value = parseFloat(parseInt(inp_dep.value)*(prc/100)).toFixed(2);
        })
    }

}

calc();
