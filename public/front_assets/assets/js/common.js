$(document).ready(function(){
    
    var oScrollbar1 = $('#scrollbar1');
    var oScrollbar2 = $('#scrollbar2');
    oScrollbar1.tinyscrollbar();
    oScrollbar2.tinyscrollbar();
    
    $(".investors,.investors1").click(function(){
       $("#scrollbar1").toggle("slow", function()
        {                               
           //oScrollbar2.tinyscrollbar_update();
           var box1 = oScrollbar1.data("plugin_tinyscrollbar"); 
           box1.update();
        });
        
        $(".investors .two_img_text").toggle("slow");
        $(".start_up").toggleClass("disable");
        $(".invester_signin").show();
        $(".business_signin").hide();
    });
    $('#scrollbar1').on('click', function(e) {
        e.stopPropagation();
    });
    
    $(".start_up,.start_up1").click(function(){
        $("#scrollbar2").toggle("slow", function()
        {                               
            //oScrollbar2.tinyscrollbar_update();
            var box2 = oScrollbar2.data("plugin_tinyscrollbar"); 
            box2.update();
        });
        
        $(".start_up .two_img_text").toggle("slow");
        $(".investors").toggleClass("disable");
        $(".business_signin").show();
        $(".invester_signin").hide();
    });
    $('#scrollbar2').on('click', function(e) {
        e.stopPropagation();
    });
    
    if ($('#scrollbar3').length > 0){ 
				/*$('#scrollbar3').tinyscrollbar();
				var box7 = $('#scrollbar3').data("plugin_tinyscrollbar"); 
				box7.update();*/
        
        var $scrollbar3  = $('#scrollbar3');
        var loadingData3 = false;
        
                $scrollbar3.tinyscrollbar();

                var scrollbarData3 = $scrollbar3.data("plugin_tinyscrollbar")

                $scrollbar3.bind("move", function()
                {
                    // The threshold will enable us to start loading the text before we reach the end.
                    //
                    var threshold3       = 0.9
                    ,   positionCurrent3 = scrollbarData3.contentPosition + scrollbarData3.viewportSize
                    ,   positionEnd3     = scrollbarData3.contentSize * threshold3
                    ;

                    // Check if have reached the "end" and that we arent allready in the process of loading new data.
                    //
                   
										
										
										if(!loadingData3 && positionCurrent3 >= positionEnd3)
                    { 
                        loadingData3 = false;
												var base_url_suffix	= '';
												var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
												var curpage = $('#currentpage').val();
												var nxtpage = eval(curpage)+eval(1); 
												var url 	= base_url + 'loadmoreBusiness?page='+nxtpage;
												var token = $('meta[name="csrf-token"]').attr('content');
												 
												$.ajax({
														type: "POST",
														url: url,
														data:{
																'_token'    		:  token,
															},
														beforeSend: function(){
														},
														success: function(response){
																if(response){
																		loadingData3 = true;
																		$('#currentpage').val(nxtpage);
																		$('#blog').append(response);
																		scrollbarData3.update("relative");
																}
														}
												});
                    }
                });
        
        
    }
		
		
		    if ($('#scrollbar4').length > 0){ 
						/*
						$('#scrollbar4').tinyscrollbar();
						var box7 = $('#scrollbar3').data("plugin_tinyscrollbar"); 
						box7.update();
						*/
						var $scrollbar  = $('#scrollbar4');
						var loadingData = false;
            $scrollbar.tinyscrollbar();
            var scrollbarData = $scrollbar.data("plugin_tinyscrollbar")

						$scrollbar.bind("move", function(){
								// The threshold will enable us to start loading the text before we reach the end.
								//
								var threshold       = 0.9
								,   positionCurrent = scrollbarData.contentPosition + scrollbarData.viewportSize
								,   positionEnd     = scrollbarData.contentSize * threshold
								;
								// Check if have reached the "end" and that we arent allready in the process of loading new data.
								
								if(!loadingData && positionCurrent >= positionEnd){ 
										loadingData = false;
										var base_url_suffix	= '';
										var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
										var curpagepopular = $('#currentpagepopular').val();
										var nxtpagepopular = eval(curpagepopular)+eval(1); 
										var url 	= base_url + 'loadmorepopularBusiness?page='+nxtpagepopular;
										var token = $('meta[name="csrf-token"]').attr('content');
										 
										$.ajax({
												type: "POST",
												url: url,
												data:{
														'_token':  token,
													},
												beforeSend: function(){
												},
												success: function(response){
														if(response){
																loadingData = true;
																$('#currentpagepopular').val(nxtpagepopular);
																$('#side-bar').append(response);
																scrollbarData.update("relative");
														}
												}
										});
								}
						});
				}

		
		
		
		    if ($('#scrollbar5').length > 0){ 
						/*
								$('#scrollbar5').tinyscrollbar();
								var box7 = $('#scrollbar3').data("plugin_tinyscrollbar"); 
								box7.update();
						*/
        
						var $scrollbar5  = $('#scrollbar5');
						var loadingData5 = false;
        
            $scrollbar5.tinyscrollbar();
            var scrollbarData5 = $scrollbar5.data("plugin_tinyscrollbar")

						$scrollbar5.bind("move", function(){
								// The threshold will enable us to start loading the text before we reach the end.
								
								var threshold5       = 0.9
								,   positionCurrent5 = scrollbarData5.contentPosition + scrollbarData5.viewportSize
								,   positionEnd3     = scrollbarData5.contentSize * threshold5
								;

								// Check if have reached the "end" and that we arent allready in the process of loading new data.
								
								if(!loadingData5 && positionCurrent5 >= positionEnd5){ 
										loadingData5 = false;
										var base_url_suffix	= '';
										var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
										var curpage = $('#currentpagelb').val();
										var nxtpage = eval(curpage)+eval(1); 
										var url 	= base_url + 'sortingbyprice?page='+nxtpage;
										var token = $('meta[name="csrf-token"]').attr('content');
										 
										$.ajax({
												type: "POST",
												url: url,
												data:{
														'_token'    		:  token,
													},
												beforeSend: function(){
												},
												success: function(response){
														if(response){
																loadingData5 = true;
																$('#currentpagelb').val(nxtpage);
																$('#listbusiness').append(response);
																scrollbarData5.update("relative");
														}
												}
										});
								}
						});
				}

		
		
		
		
		
				
    
    $(".owl2").owlCarousel({
        //autoPlay: 3000,
        items : 4,
				center:true,
				loop:true,
        navigation:true,
        pagination: false,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
    });
		
		if($("#owl-demo").length > 0){  
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
		}
    
    $('.wp9').waypoint(function() {
            $('.wp9').addClass('animated bounceIn');
    }, {
            offset: '75%'
    });
    

    $(".help").click(function(){
        $(this).parent().find(".answer").toggle();
    });
    

    
    /*=============Start:price-slider===================*/
    

		
		
				$(function() {
						max_price = $('#max_price').val();
						
						
						$( "#slider-range" ).slider({
								range: true,
								min: 0,
								max: max_price,
								step:1000,
								values: [ 0, max_price ],
								slide: function( event, ui ) {
										//$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										$(".left_span").html("$" + ui.values[ 0 ]);
										$(".right_span").html("$" + ui.values[ 1 ]);
								},
								stop: function( event, ui ) {
										
										var searchtext = $('#search_text').val();
										if (!searchtext) {
												search_text = '';
										}
										else{
												search_text = searchtext;
										}
										
										
										var industries = new Array();
										var i=0;
										$('.industryChoose').each(function(){    
												if($(this).prop('checked')){
														if ($(this).val() != '') {
																industries[i] =$(this).val();
																i++;
														}
												}
												
										});
										industries_ids= industries.join(',');
										if (industries_ids != '') {
												iIds= industries_ids;
										}
										else{
												iIds= '';
										}
										getBusinessSearch(ui.values[0], ui.values[1],search_text,iIds);
										//var nr_total = 
										//$("#number_results").text(nr_total);
								},
						});
				
						$(".left_span").html("$" + $( "#slider-range" ).slider( "values", 0 ));
						$(".right_span").html("$" + $( "#slider-range" ).slider( "values", 1 ));
						//$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
						//  " - $" + $( "#slider-range" ).slider( "values", 1 ) );
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


		/* Click on Category / Industry Dasboard Page Icons */
		$('.catIndustry').click(function(){
		    var min_price	= parseInt(0);
		    var max_price	= parseInt($('#max_price').val());
		    var search_text	= '';
		    var iId 		= $(this).attr('id');
		    
		    getBusinessSearch(min_price, max_price, search_text, iId);
		})
		/* END */
		
		/* Click on Category / Discover Page Icons */
		$('.discoverCat').click(function(){
		    
		    var catId 		= $(this).attr('item');
		    getDiscoverPageBusinessSearchCat(catId);
		})
		/* END */
		

		function getBusinessSearch(min_price, max_price,search_text,iIds){ 
				var number_of_estates = 0;
				var base_url_suffix	= '';
				var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
				var url 	= base_url + 'sortingbyprice';
				var token = $('meta[name="csrf-token"]').attr('content');
				
				$.ajax({
						type: "POST",
						url: url,
						data: {'minprice': min_price, 'maxprice':max_price, '_token': token, 'srchtext': search_text, 'indID': iIds},
						async: false,
						success: function(response){ 
								$('#listbusiness').html(response);
						}
				});
				//return number_of_estates;
		}
		
		
		function getDiscoverPageBusinessSearchCat(catId) {
				var base_url_suffix	= '';
				var base_url = location.protocol + '//' + location.host + '/' + base_url_suffix;
				var url 	= base_url + 'searchbusiness';
				var token = $('meta[name="csrf-token"]').attr('content');
				
				$.ajax({
						type: "POST",
						url: url,
						data: {'_token': token,'indID': catId},
						async: false,
						success: function(response){ 
								$('#blogdiscover').html(response);
						}
				});
		}
		
		
		$('#search_text').on('blur',function(){
				
				alert($('#search_text').val());
				var search_text = $('#search_text').val();
				
				
				var industries = new Array();
				var i=0;
				$('.industryChoose').each(function(){    
						if($(this).prop('checked')){
								if ($(this).val() != '') {
										industries[i] =$(this).val();
										i++;
								}
						}		
				});
				industries_ids= industries.join(',');
				if (industries_ids != '') {
						iIds= industries_ids;
				}
				else{
						iIds= '';
				}
				
				mn_price = $(".left_span").html();
				minprice = mn_price.substr(1);
				
				mx_price = $(".right_span").html();
				maxprice = mx_price.substr(1);
				
				getBusinessSearch(minprice, maxprice,search_text,iIds);
				
		});

		$('.industryChoose').on('click',function(){
				var industries = new Array();
				var i=0;
				$('.industryChoose').each(function(){    
						if($(this).prop('checked')){
								if ($(this).val() != '') {
										industries[i] =$(this).val();
										i++;
								}
						}
						
				});
				industries_ids= industries.join(',');
				
				
				var searchtext = $('#search_text').val();
				if (!searchtext) {
						search_text = '';
				}
				else{
						search_text = searchtext;
				}
				
				mn_price = $(".left_span").html();
				minprice = mn_price.substr(1);
				
				mx_price = $(".right_span").html();
				maxprice = mx_price.substr(1);
				
				getBusinessSearch(minprice, maxprice,search_text,industries_ids);
				
				
		});
				
		

});
