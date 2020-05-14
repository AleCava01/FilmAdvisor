var categoryOwl = $('#category-carousel');
var allMoviesOwl = $('#allMovies-carousel');

categoryOwl.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    center:true,
    dots: false,
    URLhashListener:true,

    responsive:{
        0:{
            nav:false,
            items:3
        },
        600:{
            items:5
        },
        1000:{
            items:7
        }
    }
})
allMoviesOwl.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    responsive:{
        0:{
            nav:false,
            items:5
        },
        600:{
            items:5,
            stagePadding: 100
        },
        900:{
            stagePadding: 100,
            items:8
        },
        1300:{
            stagePadding: 100,
            items:9
        },
        2000:{
            stagePadding: 100,
            items:10
        }
    }
})

categoryOwl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        categoryOwl.trigger('next.owl');
    } else {
        categoryOwl.trigger('prev.owl');
    }
    e.preventDefault();
});

allMoviesOwl.on('mousewheel', '.owl-stage', function (e) {
    if (e.deltaY>0) {
        allMoviesOwl.trigger('next.owl');
    } else {
        allMoviesOwl.trigger('prev.owl');
    }
    e.preventDefault();
});


