<!-- Modal per la modifica dell'email -->
<div class="modal fade" id="modifica_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modifica_email_title">Modifica email</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label>Nuova email:</label>
                    <input type="email" class="form-control" id="email_new" onchange="validate()" required>
                    <div class="invalid-feedback" id="email_feedback">
                        Inserire un indirizzo email valido
                    </div>
                </div>
                <div class="form-group">
                    <label>Password attuale:</label>
                    <input type="password" class="form-control" id="password" onchange="validate()" required>
                    <div class="invalid-feedback" id="password_feedback">
                        Password errata
                    </div>
                </div>
            ATTENZIONE: una mail di conferma dell'operazione verrà inviata anche all'indirizzo <?php echo($dati_utente['email']);?>

        </div>
        
        <div class="modal-footer">
            <button id = "email_submit" type="submit" class="btn btn-primary" onclick="reset_email()">Conferma</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="email_quit_button">Annulla</button>
        </div>
        </div>

    </div>
</div>
<script>
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

</script>
