<!-- Modal per la modifica dell'email -->

<div class="modal fade" id="modifica_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modifica_password_title">Modifica password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label>Password attuale:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pass_password_old" onchange="validate_old_pass()" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button onclick="toggle('pass_password_old')" style="border:none;outline:none;">
                                    <i class="fas fa-eye" id="pass_password_old_icon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback" id="pass_old_password_feedback">
                        Password errata
                         </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nuova password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pass_password_new" onchange="validate_pass()" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button onclick="toggle('pass_password_new')" style="border:none;outline:none;">
                                    <i class="fas fa-eye" id="pass_password_new_icon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback" id="pass_new_password_feedback">
                            La password deve contenere un minimo di 8 caratteri tra cui almeno un numero, una lettera maiuscola e una minuscola.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Ripeti password:</label>
                    <div class="input-group">
                    <input type="password" class="form-control" id="pass_password_confirm" onchange="validate_confirm_pass()" required>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <button onclick="toggle('pass_password_confirm')" style="border:none;outline:none;">
                                <i class="fas fa-eye" id="pass_password_confirm_icon"></i>
                            </button>
                        </div>
                    </div>
                    <div class="invalid-feedback" id="pass_confirm_password_feedback">
                        Le password non corrispondono
                    </div>
                </div>
            </div>  
        </div>
        
        <div class="modal-footer">
            <button id = "pass_submit" type="submit" class="btn btn-primary" onclick="reset_pass()">Conferma</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="pass_quit_button">Annulla</button>
        </div>
        </div>

    </div>
</div>
<script>
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
</script>