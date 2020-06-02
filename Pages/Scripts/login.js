const xhr = new XMLHttpRequest();

//send if enter is pressed
document.getElementById("pass_input").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("login_button").click();
    }
});
document.getElementById("user_input").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("login_button").click();
    }
});

function submit(){
    //get input values
    var username_input = document.getElementById("user_input").value;
    var password_input = document.getElementById("pass_input").value;

    //check
    if(username_input != "" && password_input!= ""){
        //send via POST
        xhr.onload = function(){
            const serverResponse = document.getElementById("serverResponse");
            if(this.responseText=="authorized"){
                location.href="homepage.php";
            }
            else{
                serverResponse.innerHTML = this.responseText;

            }
        };
        xhr.open("POST","login.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username="+username_input+"&password="+password_input);
    }
}