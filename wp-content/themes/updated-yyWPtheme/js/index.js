
$(function() {
    $("tr[class=showHidden]").click(function(event) {
        event.stopPropagation();
        var $target = $(event.target);
        if ( $target.closest("td").attr("colspan") > 1 ) {
            $target.slideUp();
        } else {
            $target.closest("tr").next().find("p").slideToggle();
	    // don't replace "p" with ".contenttext", this will break the toggle animation.
            $target.closest("tr").toggleClass('active-tr');
            $target.closest("tr").find("div.square").toggleClass('clicked');
        }
    });

});


$(document).ready(function()
    {

        // var windowWidth = $(window).width();
        // if ($(window).width() < 767){
        //     $('table').width(windowWidth - 80);
        // }
        
        // var resizeTimer;

        // $(window).on('resize', function(e) {

        //   clearTimeout(resizeTimer);
        //   resizeTimer = setTimeout(function() {

        //     if ($(window).width() < 767){
        //         $('table').width(windowWidth - 80);
        //     }
                    
        //   }, 250);

        // });

        $(".tbl-content").tablesorter({
            cssChildRow: "hiddenData"
        });
    }
);

$("#openAll").click(function(){
    $(".showHidden").addClass('active-tr');
    $(".contenttext p").slideDown().show();
});

$("#closeButton").click(function(){
    $(".showHidden.active-tr").removeClass('active-tr');
    $(".contenttext p").slideUp().hide();
})


