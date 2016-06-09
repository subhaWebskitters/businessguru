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
    
 
    
    //(function($){
    //    $(window).load(function(){
    //            
    //            $("#content-1").mCustomScrollbar({
    //                    autoHideScrollbar:true,
    //                    theme:"rounded"
    //            });
    //            
    //    });
    //})(jQuery);
    
});