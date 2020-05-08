function toggle(input_id){
    var input = document.getElementById(input_id);
    var input_icon = document.getElementById(input_id+"_icon");
    if(input.type == "password"){
        input.setAttribute("type", "text");
        input_icon.setAttribute("class", "fas fa-eye-slash");
    }
    else{
        input.setAttribute("type", "password");
        input_icon.setAttribute("class", "fas fa-eye");
    }
}