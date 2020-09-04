<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="post" action="<?= base_url('auth/checkUser') ?>">
                <div class="login-form-head bg-1">
                    <h4>Silahkan Masukan NIS/NIP</h4>
                </div>
                <div class="login-form-body">
                    <div class="message"> <?= $this->session->flashdata('message'); ?></div>
                    <div class="form-gp">
                        <label for="username">Username</label>
                        <input type="text" id="" name="username">
                        <i class="ti-userl"></i>
                        <small class="text-muted">Masukan NIS / NIP</small>
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" name="check" type="submit">Masuk <i class="ti-arrow-right"></i></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>