const xhr = new XMLHttpRequest();
var input = document.getElementById("pass_input");
input.addEventListener("keyup", function(event) {
if (event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("login_button").click();
}
});
function submit(){
    var username_input = document.getElementById("user_input").value;
    var password_input = document.getElementById("pass_input").value;
    if(username_input != "" && password_input!= ""){
        document.getElementById("user_error").style = "display:none";
        document.getElementById("pass_error").style = "display:none";

        xhr.onload = function(){
            const serverResponse = document.getElementById("serverResponse");
            if(this.responseText=="authorized"){
                location.href="homepage.php";
            }
            serverResponse.innerHTML = this.responseText;
        };
        xhr.open("POST","login_script.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username="+username_input+"&password="+password_input);
    }
    else if(username_input == "" && password_input == ""){
        document.getElementById("user_error").style = "display:inline";
        document.getElementById("pass_error").style = "display:inline";
    }
    else if(username_input == ""){
        document.getElementById("user_error").style = "display:inline";
        document.getElementById("pass_error").style = "display:none";

    }
    else if(password_input == ""){
        document.getElementById("pass_error").style = "display:inline";
        document.getElementById("user_error").style = "display:none";

    }
}