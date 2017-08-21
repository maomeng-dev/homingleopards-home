$(() => {
    let $doc = $(document);
    let $content = $('.content');

    // disable default scroll
    $doc.on('scroll', function(e) {
        $content.removeClass('at-banner');
    });

    // slider
    $('.distribution-slide').slick({
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        infinite: true
    });
});