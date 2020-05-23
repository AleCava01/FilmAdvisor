function handleTrailerData(data){
    document.getElementById("selected-trailer").innerHTML=data;    
}
function sendAjaxTrailer(mex, handleTrailerData) {  
    $.ajax({
        url: 'trailer.php',
        type: 'POST',
        data: {
            id_f: mex,
        },  
        success:function(data1) {
            handleTrailerData(data1); 
        }
    });
}
