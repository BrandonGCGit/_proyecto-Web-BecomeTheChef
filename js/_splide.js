// import { Splide } from '@splidejs/splide';
// import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';



document.addEventListener( 'DOMContentLoaded', function () {
    new Splide( '#thumbnail-carousel', {
        fixedWidth: 300,
        gap       : 10,
        rewind    : true,
        pagination: false,
    } ).mount();

    // new Splide( '.splide' ).mount( window.splide.Extensions );
    //
    // new Splide( '.splide', {
    //     autoScroll: {
    //         speed: 2,
    //     },
    // } );
} );
