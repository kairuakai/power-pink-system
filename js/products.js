

var $swiper = $('.box').isotope({
    itemSelector:'image',
    layoutMode:'fitRows'
})

$('.info').on('click','button',function(){
    var filterValue = $(this).attr('data-filter');
    $swiper.isotope({filter:filterValue});
})