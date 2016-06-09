$(document).ready(function(){
    
    var oScrollbar1 = $('#scrollbar1');
    var oScrollbar2 = $('#scrollbar2');
    oScrollbar1.tinyscrollbar();
    oScrollbar2.tinyscrollbar();
    
    $(".investors,.investors1").click(function(){
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
    
    $(".start_up,.start_up1").click(function(){
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
    
   if($("#owl-demo").length > 0)
   {
    $("#owl-demo").owlCarousel({
      //autoPlay: 3000,
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
    
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function(event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);

            $name.text($tab.text());

            $info.show();
        }
    });
    $(".help").click(function(){
        $(this).parent().find(".answer").toggle();
    });
    
});