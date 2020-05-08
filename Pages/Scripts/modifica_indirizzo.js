var via_new_input = document.getElementById("via_new");
var civico_new_input = document.getElementById("civico_new");
var citta_new_input = document.getElementById("citta_new");
var provincia_new_input = document.getElementById("provincia_new");
var cap_new_input = document.getElementById("cap_new");
var addr_password_input = document.getElementById("addr_password");

var addr_submit = document.getElementById("addr_submit");

via_new_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
civico_new_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
citta_new_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
provincia_new_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
cap_new_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
addr_password_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    addr_submit.click();
}
});
function validate_charonly(input_name){
    var input = document.getElementById(input_name);
    if((/^[a-zA-Z ]+$/.exec(input.value))){
        input.className = "form-control is-valid";
        return true;
    }
    else{
        input.className = "form-control is-invalid";
        return false;
    }
}
function validate_civico(){
    if(/^[0-9]{1,3}([\/]?)([a-z]?)([0-9]?){1,3}$/.exec(civico_new_input.value)){
        civico_new_input.className = "form-control is-valid";
        return true;
    }
    else{
        civico_new_input.className = "form-control is-invalid";
        return false;
    }
}
function validate_cap(){
    if(/^[0-9]{5,5}$/.exec(cap_new_input.value)){
        cap_new_input.className = "form-control is-valid";
        return true;
    }
    else{
        cap_new_input.className = "form-control is-invalid";
        return false;
    }
}
function update_addr(){
    var via = via_new_input.value;
    var civico = civico_new_input.value;
    var citta = citta_new_input.value;
    var provincia = provincia_new_input.value;
    var cap = cap_new_input.value;
    var addr_password = addr_password_input.value;

    if(addr_password == ""){
        addr_password_input.className = "form-control is-invalid";
    }
    if(addr_password != "" && validate_charonly("via_new") && validate_charonly("citta_new") && validate_charonly("provincia_new") && validate_civico() && validate_cap()){
        xhr.onload = function(){
            if(this.responseText == "not_match"){
                addr_password_input.className = "form-control is-invalid";
            }
            else if(this.responseText == "success"){
                addr_password_input.className = "form-control is-valid";
                document.getElementById("addr_quit_button").click();
                location.reload();
            }
        };
        xhr.open("POST","modifica_indirizzo_script.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("addr_password="+addr_password+
        "&via="+via+
        "&civico="+civico+
        "&citta="+citta+
        "&provincia="+provincia+
        "&cap="+cap
        );
    }
    
}
