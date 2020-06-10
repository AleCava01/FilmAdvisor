
//Aggiunta di EventListener: 
//impostano una funzione che verrà attivata se si verifica un determinato evento
document.getElementById("pass_input").addEventListener("keyup", function(event) {
    if (event.keyCode === 13) { //il codice 13 identifica il tasto enter
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

const xhr = new XMLHttpRequest();

function submit(){
    //ottengo i valori degli input di testo tramite HTML DOM
    var username_input = document.getElementById("user_input").value;
    var password_input = document.getElementById("pass_input").value;

    if(username_input != "" && password_input!= ""){
        //i dati vengono inviati con metodo POST utilizzando l'API XMLHttpRequest
        xhr.onload = function(){
            const serverResponse = document.getElementById("serverResponse");
            if(this.responseText=="authorized"){
                //se le credenziali inserite sono corrette avviene il reindirizzamento
                //alla homepage
                location.href="homepage.php";
            }
            else{
                //altrimenti viene mostrato l'errore
                serverResponse.innerHTML = this.responseText;
            }
        };
        xhr.open("POST","login.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //specifica dei parametri da inviare
        xhr.send("username="+username_input+"&password="+password_input);
    }
}


