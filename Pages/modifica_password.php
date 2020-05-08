<!-- Modal per la modifica dell'email -->

<div class="modal fade" id="modifica_password" tabindex="-1" role="dialog" aria-hidden="true">
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
<script src="Scripts/modifica_password.js"></script>