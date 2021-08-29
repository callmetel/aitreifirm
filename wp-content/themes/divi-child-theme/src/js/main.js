jQuery(document).ready(function ($) {

  $('#page-container > .et_pb_section').remove();

  /**************************************************/ 
  /*** Check if Link is External & Add Rel=Nofollow
  /*************************************************/ 

  $.fn.isExternal = function() {
    var host = window.location.host;
    var link = $('<a>', {
      href: this.attr('href')
    })[0].hostname;

    return (link !== host);
  };

  /********************************************/ 
  /*** Remove Auto <p> from Images and Links
  /********************************************/ 

  $.fn.ignore = function(sel){
    return this.clone().find(sel||">*").remove().end();
  };

  $(window).on('load', function(){
    $('img').each(function() {
      var attr = $(this).parent().attr('class');
      if( $(this).parent().is('p') && !$(this).parent().is('a')) {
        $(this).unwrap();
      }
    });

    $('p').each(function() {
      var $this  = $(this),
          ts = $this.ignore("a");
      if (ts.text().length == 0) {
          $(this).find('a').unwrap();
      }
    });
    
    $('a').each(function(){
      if($('body').hasClass('home') && !$(this).isExternal()) {
        $(this).attr({
          rel: 'dofollow'
        });
      }
      else if($('body').hasClass('home') && $(this).isExternal()) {
        $(this).attr({
          rel: 'nofollow noreferrer',
          target: '_blank'
        });
      }
      else {
        if($(this).isExternal()) {
          $(this).attr({
            rel: 'nofollow noreferrer',
            target: '_blank'
          });
        }
      }
    });

    if ( $("#mobile_menu").parents(".mobile_nav").length == 1 ) { 
      console.log('already has mobile menu');
      $('body').addClass('mobile-menu-active');
    } else {
      var $menu = $('#top-menu').html();
       $('.mobile_nav').append('<ul id="mobile_menu" class="et_mobile_menu">' + $menu + '</ul>');
       if($(window).width() < 980) {
        $('#page-container').css('padding-top','67px');
      };
    };
  });

  $('.mobile_menu_bar_toggle').click(function(){
    if(!$('body').hasClass('mobile-menu-active')) {
      $('#mobile_menu').slideToggle(600);
    };
  });

  $(window).on('resize', function(){

    /****************************************/ 
    /*** Reposition Call Banner on Mobile
    /****************************************/ 

    if($(window).width() < 981 && $(".call-today").closest("#et-top-navigation").length>0) {
      $('#main-header').prepend($('.call-today'));
      changeClicktoCall();
    } 
    else if($(window).width() > 980 && $(".call-today").closest("#main-header").length>0) {
      $('#et-top-navigation').prepend($('.call-today'));
      changeClicktoCall();
    }
  }).resize();

  $(window).on('load', function(){

    /*************************************/ 
    /*** Add <span> to Menu Item Links
    /*************************************/ 

    $('.menu-item > a').each(function(){
        $(this).addClass('menu-image-title-after');
        $(this).wrapInner('<span class="menu-image-title"></span>');

        /******************************************************************/ 
        /*** Allow User to Click on Name of Mobile Menu Item w/ Children
        /******************************************************************/ 

        $('#mobile_menu > .menu-item-has-children > a > .menu-image-title').on('click', function(event){
          event.stopPropagation();
          var link = $(this).parent().attr('href');
          location.href = link;
        });
        
    });
  });

  /***************************************************************/ 
  /*** Enable Mobile Dropdown for Mobile Menu Item w/ Children
  /***************************************************************/

  function setup_collapsible_submenus() {
      var $menu = $('#mobile_menu'),
          top_level_link = '#mobile_menu .menu-item-has-children > a';
           
      $menu.find('a').each(function() {
          $(this).off('click');
            
          if ( $(this).is(top_level_link) ) {
              // $(this).attr('href', '#');
          }
            
          if ( ! $(this).siblings('.sub-menu').length ) {
              $(this).on('click', function(event) {
                  $(this).parents('.mobile_nav').trigger('click');
              });
          } else {
              $(this).on('click', function(event) {
                  event.preventDefault();
                  $(this).parent().toggleClass('visible');
              });
          }
      });
  }
    
  $(window).load(function() {
    setTimeout(function() {
        setup_collapsible_submenus();
    }, 700);
  });

  function changeClicktoCall() {
    /****************************************/ 
    /*** Reposition Call Banner on Mobile
    /****************************************/ 

    if($(window).width() < 981) {
      $('.click-to-call').each(function(){
        var $PhoneHref = $('.phone-number').attr('href');
        $(this).attr('href', $PhoneHref);
      });
    } 
    else if($(window).width() > 980) {
      var headerHeight = $('#main-header').height();
      $('#page-container').css('padding-top', headerHeight);
      $('.click-to-call').each(function(){
        var desktopLink = $(this).attr('data-href');
        $(this).attr('href', desktopLink);
      });
    }
  }
});
