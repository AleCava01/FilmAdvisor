function handleData(data){
    document.getElementById("selected-category").innerHTML=data;
    var filmCatOwl = $('#film-cat-carousel');

    filmCatOwl.owlCarousel({
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
    filmCatOwl.on('mousewheel', '.owl-stage', function (e) {
        if (e.deltaY>0) {
            filmCatOwl.trigger('next.owl');
        } else {
            filmCatOwl.trigger('prev.owl');
        }
        e.preventDefault();
    });
    
}
function testAjax(handleData) {
    if(window.location.hash) {
        var hash = window.location.hash.substring(1);
        if(hash!="" && hash!="AllMovies"){
            $.ajax({
                url: 'category.php',
                type: 'POST',
                data: {
                    genere: hash,
                },  
                success:function(data1) {
                  handleData(data1); 
                }
              });
        }
    }
}
function doAll(){
    testAjax(handleData);
}
function showCategory(){
    $.ajax({
        url: 'category.php',
        type: 'POST',
        data: {
            genere: hash,
        },
        success: function(msg) {
            alert('Email Sent');
        }               
    });
}
