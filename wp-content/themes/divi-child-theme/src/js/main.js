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
    
    // $('a').each(function(){
    //   if($('body').hasClass('home') && !$(this).isExternal()) {
    //     $(this).attr({
    //       rel: 'dofollow'
    //     });
    //   }
    //   else if($('body').hasClass('home') && $(this).isExternal()) {
    //     $(this).attr({
    //       rel: 'nofollow noreferrer',
    //       target: '_blank'
    //     });
    //   }
    //   else {
    //     if($(this).isExternal()) {
    //       $(this).attr({
    //         rel: 'nofollow noreferrer',
    //         target: '_blank'
    //       });
    //     }
    //   }
    // });

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

  $(window).scroll(function(){
    var ScrollTop = parseInt($(window).scrollTop());
    console.log(ScrollTop);

    if (ScrollTop > 10) {
      $('#main-header').addClass('et-fixed-header');
    }
    else {
      $('#main-header').removeClass('et-fixed-header');
    }
  }).scroll();

  $('.lightbox-trigger').click(function(e){
    e.preventDefault();
    openLightbox($(this));
  });

  $('.lightbox-close').click(function(e){
    e.preventDefault();
    closeLightbox();
  });

  function openLightbox(trigger) {
    var link = trigger.attr('data-embed-id');

    $('#lightbox .inner').empty().html('<iframe id="lightbox-video" src="https://www.youtube.com/embed/'+link+'/?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen autoplay="1"></iframe>');
    $('#lightbox').addClass('active');
    $('body').addClass('lightbox-active');
  }

  function closeLightbox() {
    $('#lightbox').removeClass('active').addClass('closing');
    $('body').removeClass('lightbox-active');
    $('#lightbox .inner').empty();

    setTimeout(function(){
      $('#lightbox').removeClass('closing');
    },250);
  }
});
