document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#thumbnail-carousel', {
        fixedWidth: 300,
        gap       : 10,
        rewind    : true,
        pagination: false,
    } ).mount();
} );