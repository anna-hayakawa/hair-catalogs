$(function() {
    var moreNum = 15;
    $('$(style):nth-child(n + ' + (moreNum + 1) + ')').addClass('is-hidden');
    $('.more').on('click', function() {
    $('$(style).is-hidden').slice(0, moreNum).removeClass('is-hidden');
    if ($('$(style).is-hidden').length == 0) {
        $('.more').fadeOut();
    }})
});

