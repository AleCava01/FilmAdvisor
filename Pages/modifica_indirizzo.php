<!-- Modal per la modifica dell'indirizzo -->
<div class="modal fade" id="modifica_indirizzo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modifica_indirizzo_title">Modifica indirizzo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <label>Via:</label>
                            <input type="text" class="form-control" onchange="validate_charonly('via_new')" id="via_new" value="<?php echo($dati_utente["via"]); ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label>Civico:</label>
                            <input type="text" class="form-control" onchange="validate_civico()" id="civico_new" value="<?php echo($dati_utente["civico"]); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                            <label>Città:</label>
                            <input type="text" class="form-control" id="citta_new" onchange="validate_charonly('citta_new')" value="<?php echo($dati_utente["citta"]); ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label>Provincia:</label>
                            <input type="text" class="form-control" id="provincia_new" onchange="validate_charonly('provincia_new')" value="<?php echo($dati_utente["provincia"]); ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label>CAP:</label>
                            <input type="text" class="form-control" id="cap_new" onchange="validate_cap()" value="<?php echo($dati_utente["cap"]); ?>" required>
                        </div>
                    </div>
                </div>
                    
                <div class="form-group">
                    <label>Password attuale:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="addr_password" onchange="validate()" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <button onclick="toggle('addr_password')" style="border:none;outline:none;">
                                    <i class="fas fa-eye" id="addr_password_icon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="invalid-feedback" id="password_feedback">
                            Password errata
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="modal-footer">
            <button id = "addr_submit" type="submit" class="btn btn-primary" onclick="update_addr()">Conferma</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="addr_quit_button">Annulla</button>
        </div>
        </div>

    </div>
</div>
<script src="Scripts/modifica_indirizzo.js"></script>
