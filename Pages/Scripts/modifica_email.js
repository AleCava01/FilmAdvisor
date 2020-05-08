var password_input = document.getElementById("password");
var password_feedback = document.getElementById("password_feedback");

var email_input = document.getElementById("email_new");
var email_feedback = document.getElementById("email_feedback");

var submit = document.getElementById("email_submit");

password_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    submit.click();
}
});
email_input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    submit.click();
}
});

const xhr = new XMLHttpRequest();

function validate(){
    var password = password_input.value;
    var email_new = email_input.value;

   
    if(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.exec(email_new)){
        email_input.className = "form-control is-valid";
    }
    else{
        email_input.className = "form-control is-invalid";
    }
}
function reset_email(){

    var password = password_input.value;
    var email_new = email_input.value;

    if(password == ""){
        password_input.className = "form-control is-invalid";
    }

    if(password != "" && /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.exec(email_new)){
        xhr.onload = function(){
            if(this.responseText == "not_match"){
                password_input.className = "form-control is-invalid";
            }
            else if(this.responseText == "success"){
                password_input.className = "form-control is-valid";
                document.getElementById("email_quit_button").click();
                location.reload();

            }
        };
        xhr.open("POST","modifica_email_script.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("password="+password+"&email_new="+email_new);
    }
    
}
