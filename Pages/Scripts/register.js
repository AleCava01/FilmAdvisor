const xhr = new XMLHttpRequest();

function submit(){
    var username_input = document.getElementById("username_input").value;
    var password_input = document.getElementById("password_input").value;
    var email_input = document.getElementById("email_input").value;
    var nome_input = document.getElementById("nome_input").value;
    var cognome_input = document.getElementById("cognome_input").value;
    var datanascita_input = document.getElementById("dataNascita_input").value;
    var sesso_input = document.getElementById("sesso_input").value;
    var via_input = document.getElementById("via_input").value;
    var civico_input = document.getElementById("civico_input").value;
    var CAP_input = document.getElementById("CAP_input").value;
    var citta_input = document.getElementById("citta_input").value;
    var provincia_input = document.getElementById("provincia_input").value;
    
    if(username_input != "" && password_input != "" && email_input != "" && nome_input!="" &&cognome_input!=""&&via_input!=""&&civico_input!=""&&CAP_input!=""&&citta_input!=""&&provincia_input!="" && datanascita_input!="" && sesso_input!=""){
        xhr.onload = function(){
            const serverResponse = document.getElementById("serverResponse");
            if(this.responseText == "success"){
                location.href = "benvenuto.html";
            }
            else{
                serverResponse.innerHTML = this.responseText;
            }
        };
        xhr.open("POST","register.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("username="+username_input+
        "&password="+password_input+
        "&email="+email_input+
        "&nome="+nome_input+
        "&cognome="+cognome_input+
        "&via="+via_input+
        "&civico="+civico_input+
        "&CAP="+CAP_input+
        "&citta="+citta_input+
        "&provincia="+provincia_input+
        "&sesso="+sesso_input+
        "&datanascita="+datanascita_input
        );
    }
    else{
        document.getElementById("serverResponse").innerHTML = "Riempire tutti i campi";
    }
}