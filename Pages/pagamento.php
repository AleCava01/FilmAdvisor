<!-- 1 mese -->
<div class="modal fade" id="pagamento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifica_indirizzo_title">Seleziona una modalità di pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <p id="pay" style="display:none"></p> -->
            <div class="modal-body">
                    <div class="form-group">
                    <div class="custom-control custom-radio">
                <input type="radio" id="carta" name="pagamento" class="custom-control-input">
                <label class="custom-control-label" for="carta">Carta di credito</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="bonifico" name="pagamento" class="custom-control-input">
                <label class="custom-control-label" for="bonifico">Bonifico bancario</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="paypal" name="pagamento" class="custom-control-input">
                <label class="custom-control-label" for="paypal">PayPal</label>
            </div>
        </div>
        <div class="modal-footer">
            <div style="width:100%"><h6>Abbonamento selezionato: </h6><h6 id="pay" style="font-weight:400;"></h6></div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" onclick="pay_submit()">Concludi l'acquisto</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="quit_button">Annulla</button>
        </div>
        </div>
    </div>
</div>
<script>
    function month(){
        document.getElementById("pay").innerHTML="1 Mese: 7,99€";
    }
    function quarter(){
        document.getElementById("pay").innerHTML="3 Mesi: 19,99€";
    }
    function year(){
        document.getElementById("pay").innerHTML="1 Anno: 49,99€";
    }
    function pay_submit(){
        var pagamento = 0;
        var in_carta = document.getElementById("carta");
        var in_bonifico = document.getElementById("bonifico");
        var in_paypal = document.getElementById("paypal");

        if(in_carta.checked){
            pagamento=1;
        }
        else if(in_bonifico.checked){
            pagamento=2;
        }
        else if(in_paypal.checked){
            pagamento=3;
        }
        else{
            pagamento=0;
        }
        if(pagamento!=0){
            var tipo_text = document.getElementById("pay").innerHTML;
            var tipo =0;
            if(tipo_text == "1 Mese: 7,99€"){
                tipo=1;
            }
            else if(tipo_text == "3 Mesi: 19,99€"){
                tipo=2;
            }
            else{
                tipo=3;
            }
            window.location.href = "pagamento_script.php?pagamento="+pagamento+"&tipo="+tipo;
        }
    }
</script>