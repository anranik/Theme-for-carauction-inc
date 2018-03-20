
var $ = jQuery.noConflict();
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});
// after wp
$(document).ready(function(){
 /* $("#picDD").change(function(){
     $("img[name=image-swap]").attr("src",$(this).val());

   });*/

});
$('#vehical').change(function () {
    var val = parseInt($('#vehical').val());
    $('img[name=image-swap]').attr("src",pictureList[val]);
});


