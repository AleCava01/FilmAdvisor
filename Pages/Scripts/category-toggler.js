function handleData(data){
    var response = data.split("!SCRIPT!");
    document.getElementById("selected-category").innerHTML=response[0];
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

    eval(response[1]);

}
function sendAjax(hash, handleData) {  
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
function doAll(){
    var hash ="";
    if(window.location.hash) {
        hash = window.location.hash.substring(1);
    }
    if(hash=="" || hash=="suggested"){
        hash="allMovies";
    }
    sendAjax(hash,handleData);
}
