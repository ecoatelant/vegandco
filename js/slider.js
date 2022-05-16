document.addEventListener( 'DOMContentLoaded', function() {
    var splide1 = new Splide('#splide1', {
        autoplay: true,
        pauseOnFocus: boolean = false,
        interval: number = 4500,
        type   : 'loop',
        perPage: 1,
    });
    splide1.mount();
  } );
    