var old_password_input = document.getElementById("pass_password_old");
var new_password_input = document.getElementById("pass_password_new");
var confirm_password_input = document.getElementById("pass_password_confirm");

var pass_submit = document.getElementById("pass_submit");

old_password_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    pass_submit.click();
}
});
new_password_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    pass_submit.click();
}
});
confirm_password_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    pass_submit.click();
}
});
function validate_confirm_pass(){
    var confirm_password = confirm_password_input.value;
    var new_password = new_password_input.value;


    if(confirm_password!=new_password){
        confirm_password_input.className = "form-control is-invalid";
    }
    else{
        confirm_password_input.className = "form-control is-valid";
    }
}
function validate_old_pass(){
    var old_password = old_password_input.value;

    if(old_password==""){
        old_password_input.className = "form-control is-invalid";
    }
}
function validate_pass(){
    var old_password = old_password_input.value;
    var new_password = new_password_input.value;
    var confirm_password = confirm_password_input.value;

    if(confirm_password!=new_password){
        confirm_password_input.className = "form-control is-invalid";
    }
    else{
        confirm_password_input.className = "form-control is-valid";
    }
    if(old_password!=""){
        old_password_input.className = "form-control";
    }
    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.exec(new_password)){
        new_password_input.className = "form-control is-valid";
    }
    else{
        new_password_input.className = "form-control is-invalid";
    }
}
function reset_pass(){

    var old_password = old_password_input.value;
    var new_password = new_password_input.value;
    var confirm_password = confirm_password_input.value;


    if(old_password == ""){
        old_password_input.className = "form-control is-invalid";
    }

    if(old_password != "" && /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.exec(new_password) && confirm_password==new_password){
        xhr.onload = function(){
            if(this.responseText == "not_match"){
                old_password_input.className = "form-control is-invalid";
            }
            else if(this.responseText == "success"){
                old_password_input.className = "form-control is-valid";
                document.getElementById("pass_quit_button").click();
                location.reload();

            }
        };
        xhr.open("POST","modifica_password_script.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("old_password="+old_password+"&new_password="+new_password);
    }
    
}

