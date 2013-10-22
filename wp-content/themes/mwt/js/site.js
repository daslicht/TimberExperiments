jQuery(document).ready(function($) {

    jQuery(window).scroll(function() {
        var top = jQuery(window).scrollTop();
        console.log(top);
        jQuery('#header_stick').css({
            "position":"absolute",
            "top":top+"px",
            "opacity":"0.7"
        });
        if(top> 157 ){
            console.log(">153");
            jQuery('#main-navigation').css({
                "position":"absolute",
                "top":top-30+"px"

            });
        }else {
            console.log("<153");
            jQuery('#main-navigation').css({
                "position":"absolute",
                "top":"131px"}
            );
        }


        /*console.log('scroll');
        var top = jQuery(window).scrollTop();
        if (top > 42) // height of float header
            jQuery(function() {
                jQuery('#header_stick').addClass('stick');
               // jQuery('#base').addClass('pad');
            })
        else {
           // jQuery('#base').removeClass('pad');
            jQuery('#header_stick').removeClass('stick');
        }*/
    })

});