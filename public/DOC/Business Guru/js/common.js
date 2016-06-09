$(document).ready(function(){
    
    var oScrollbar1 = $('#scrollbar1');
    var oScrollbar2 = $('#scrollbar2');
    oScrollbar1.tinyscrollbar();
    oScrollbar2.tinyscrollbar();
    
    $(".investors").click(function(){
       $("#scrollbar1").toggle("slow", function()
        {                               
            oScrollbar1.tinyscrollbar_update();
        });
        
        $(".investors .two_img_text").toggle("slow");
        $(".start_up").toggleClass("disable");
    });
    $('#scrollbar1').on('click', function(e) {
        e.stopPropagation();
    });
    
    $(".start_up").click(function(){
        $("#scrollbar2").toggle("slow", function()
        {                               
            oScrollbar2.tinyscrollbar_update();
        });
        
        $(".start_up .two_img_text").toggle("slow");
        $(".investors").toggleClass("disable");
    });
    $('#scrollbar2').on('click', function(e) {
        e.stopPropagation();
    });
    
    $('#scrollbar3').tinyscrollbar();
    $('#scrollbar4').tinyscrollbar();
    
    
    $("#owl-demo").owlCarousel({

      //autoPlay: 3000,
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      pagination: false
    });
    
    $(".owl").owlCarousel({

      autoPlay: 3000,
      navigation : true,
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem : true,
      pagination: false
    });
    
    $(".owl2").owlCarousel({
        //autoPlay: 3000,
        items : 4,
        navigation:true,
        pagination: false,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
    });
    
    $('.wp9').waypoint(function() {
            $('.wp9').addClass('animated bounceIn');
    }, {
            offset: '75%'
    });
    

    $(".help").click(function(){
        $(this).parent().parent().find(".answer").toggle();
    });
    
    if ($('.basicType').length > 0) {
        $('.basicTypePan').fadeOut();
        $('.tab1_option1').fadeIn();
        $('.basicType').click(function(){
            var selectedVal = $('.basicType:checked').val();
            var panOpt = 'tab1_option' + selectedVal;
            $('.basicTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    }
    
    if ($('.proposalType').length > 0) {
        $('.proposalTypePan').fadeOut();
        $('.tab2_option1').fadeIn();
        $('.proposalType').click(function(){
            var selectedVal = $('.proposalType:checked').val();
            var panOpt = 'tab2_option' + selectedVal;
            $('.proposalTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    }
    
    if ($('.accountType').length > 0) {
        $('.accountTypePan').fadeOut();
        $('.tab3_option1').fadeIn();
        $('.accountType').click(function(){
            var selectedVal = $('.accountType:checked').val();
            var panOpt = 'tab3_option' + selectedVal;
            $('.accountTypePan').fadeOut();
            $('.' + panOpt).fadeIn();
        });
    }
    /*=============Start:price-slider===================*/
    
    $(function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 500,
          values: [ 0, 500 ],
          slide: function( event, ui ) {
            $(".left_span").html("$" + ui.values[ 0 ]);
            $(".right_span").html("$" + ui.values[ 1 ]);
          }
        });
        $(".left_span").html("$" + $( "#slider-range" ).slider( "values", 0 ));
        $(".right_span").html("$" + $( "#slider-range" ).slider( "values", 1 ));
    });

    /*==============================Start:browse button=========================*/
    
    ;(function( $ ) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		      isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		    return this.each(function() {

		      var $file = $(this).addClass('customfile'), // the original file input
		          $wrap = $('<div class="customfile-wrap">'),
		          $input = $('<input type="text" class="customfile-filename" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="customfile-upload">Select File</button>'),
		          // Hack for IE
		          $label = $('<label class="customfile-upload" for="'+ $file[0].id +'">Select File</label>');

		      // Hide by shifting to the left so we
		      // can still trigger events
		      $file.css({
		        position: 'absolute',
		        left: '-9999px'
		      });

		      $wrap.insertAfter( $file )
		        .append( $file, $input, ( isIE ? $label : $button ) );

		      // Prevent focus
		      $file.attr('tabIndex', -1);
		      $button.attr('tabIndex', -1);

		      $button.click(function () {
		        $file.focus().click(); // Select File dialog
		      });

		      $file.change(function() {

		        var files = [], fileArr, filename;

		        // If multiple is supported then extract
		        // all filenames from the file array
		        if ( multipleSupport ) {
		          fileArr = $file[0].files;
		          for ( var i = 0, len = fileArr.length; i < len; i++ ) {
		            files.push( fileArr[i].name );
		          }
		          filename = files.join(', ');

		        // If not supported then just take the value
		        // and remove the path to just show the filename
		        } else {
		          filename = $file.val().split('\\').pop();
		        }

		        $input.val( filename ) // Set the value
		          .attr('title', filename) // Show filename in title tootlip
		          .focus(); // Regain focus

		      });

		      $input.on({
		        blur: function() { $file.trigger('blur'); },
		        keydown: function( e ) {
		          if ( e.which === 13 ) { // Enter
		            if ( !isIE ) { $file.trigger('click'); }
		          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
		            // On some browsers the value is read-only
		            // with this trick we remove the old input and add
		            // a clean clone with all the original events attached
		            $file.replaceWith( $file = $file.clone( true ) );
		            $file.trigger('change');
		            $input.val('');
		          } else if ( e.which === 9 ){ // TAB
		            return;
		          } else { // All other keys
		            return false;
		          }
		        }
		      });

		    });

		  };

		  // Old browser fallback
		  if ( !multipleSupport ) {
		    $( document ).on('change', 'input.customfile', function() {

		      var $this = $(this),
		          // Create a unique ID so we
		          // can attach the label to the input
		          uniqId = 'customfile_'+ (new Date()).getTime(),
		          $wrap = $this.parent(),

		          // Filter empty input
		          $inputs = $wrap.siblings().find('.customfile-filename')
		            .filter(function(){ return !this.value }),

		          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

		      // 1ms timeout so it runs after all other events
		      // that modify the value have triggered
		      setTimeout(function() {
		        // Add a new input
		        if ( $this.val() ) {
		          // Check for empty fields to prevent
		          // creating new inputs when changing files
		          if ( !$inputs.length ) {
		            $wrap.after( $file );
		            $file.customFile();
		          }
		        // Remove and reorganize inputs
		        } else {
		          $inputs.parent().remove();
		          // Move the input so it's always last on the list
		          $wrap.appendTo( $wrap.parent() );
		          $wrap.find('input').focus();
		        }
		      }, 1);

		    });
		  }

		}( jQuery ));

		$('input[type=file]').customFile();

    /*==============================Start:Responsive-menu=========================*/
    ( function( $ ) {
            var body    = $( 'body' ),
                _window = $( window ),
                    nav, button, menu;
    
            nav = $( '#site-navigation' );
            button = nav.find( '.menu-toggle' );
            menu = nav.find( '.nav-menu' );
    
            /**
             * Adds a top margin to the footer if the sidebar widget area is higher
             * than the rest of the page, to help the footer always visually clear
             * the sidebar.
             */
            $( function() {
                    if ( body.is( '.sidebar' ) ) {
                            var sidebar   = $( '#secondary .widget-area' ),
                                secondary = ( 0 === sidebar.length ) ? -40 : sidebar.height(),
                                margin    = $( '#tertiary .widget-area' ).height() - $( '#content' ).height() - secondary;
    
                            if ( margin > 0 && _window.innerWidth() > 999 ) {
                                    $( '#colophon' ).css( 'margin-top', margin + 'px' );
                            }
                    }
            } );
    
            /**
             * Enables menu toggle for small screens.
             */
            ( function() {
                    if ( ! nav || ! button ) {
                            return;
                    }
    
                    // Hide button if menu is missing or empty.
                    if ( ! menu || ! menu.children().length ) {
                            button.hide();
                            return;
                    }
    
                    button.on( 'click.twentythirteen', function() {
                            nav.toggleClass( 'toggled-on' );
                            if ( nav.hasClass( 'toggled-on' ) ) {
                                    $( this ).attr( 'aria-expanded', 'true' );
                                    menu.attr( 'aria-expanded', 'true' );
                            } else {
                                    $( this ).attr( 'aria-expanded', 'false' );
                                    menu.attr( 'aria-expanded', 'false' );
                            }
                    } );
    
                    // Fix sub-menus for touch devices.
                    if ( 'ontouchstart' in window ) {
                            menu.find( '.menu-item-has-children > a, .page_item_has_children > a' ).on( 'touchstart.twentythirteen', function( e ) {
                                    var el = $( this ).parent( 'li' );
    
                                    if ( ! el.hasClass( 'focus' ) ) {
                                            e.preventDefault();
                                            el.toggleClass( 'focus' );
                                            el.siblings( '.focus' ).removeClass( 'focus' );
                                    }
                            } );
                    }
    
                    // Better focus for hidden submenu items for accessibility.
                    menu.find( 'a' ).on( 'focus.twentythirteen blur.twentythirteen', function() {
                            $( this ).parents( '.menu-item, .page_item' ).toggleClass( 'focus' );
                    } );
            } )();
    
            /**
             * @summary Add or remove ARIA attributes.
             * Uses jQuery's width() function to determine the size of the window and add
             * the default ARIA attributes for the menu toggle if it's visible.
             * @since Twenty Thirteen 1.5
             */
            function onResizeARIA() {
                    if ( 643 > _window.width() ) {
                            button.attr( 'aria-expanded', 'false' );
                            menu.attr( 'aria-expanded', 'false' );
                            button.attr( 'aria-controls', 'primary-menu' );
                    } else {
                            button.removeAttr( 'aria-expanded' );
                            menu.removeAttr( 'aria-expanded' );
                            button.removeAttr( 'aria-controls' );
                    }
            }
    
            _window
                    .on( 'load.twentythirteen', onResizeARIA )
                    .on( 'resize.twentythirteen', function() {
                            onResizeARIA();
            } );
    
            /**
             * Makes "skip to content" link work correctly in IE9 and Chrome for better
             * accessibility.
             *
             * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
             */
            _window.on( 'hashchange.twentythirteen', function() {
                    var element = document.getElementById( location.hash.substring( 1 ) );
    
                    if ( element ) {
                            if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
                                    element.tabIndex = -1;
                            }
    
                            element.focus();
                    }
            } );
    
            /**
             * Arranges footer widgets vertically.
             */
            if ( $.isFunction( $.fn.masonry ) ) {
                    var columnWidth = body.is( '.sidebar' ) ? 228 : 245;
    
                    $( '#secondary .widget-area' ).masonry( {
                            itemSelector: '.widget',
                            columnWidth: columnWidth,
                            gutterWidth: 20,
                            isRTL: body.is( '.rtl' )
                    } );
            }
    } )( jQuery );

});
