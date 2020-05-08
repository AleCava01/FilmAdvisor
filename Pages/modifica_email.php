<!-- Modal per la modifica dell'email -->
<div class="modal fade " id="modifica_email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
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
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" onchange="validate()" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button onclick="toggle('password')" style="border:none;outline:none;">
                                    <i class="fas fa-eye" id="password_icon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback" id="password_feedback">
                            Password errata
                        </div>
                    </div>
                </div>
            ATTENZIONE: una mail di conferma dell'operazione verrà inviata all'indirizzo <?php echo($dati_utente['email']);?>

        </div>
        
        <div class="modal-footer">
            <button id = "email_submit" type="submit" class="btn btn-primary" onclick="reset_email()">Conferma</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="email_quit_button">Annulla</button>
        </div>
        </div>

    </div>
</div>
<script src="Scripts/modifica_email.js"></script>
