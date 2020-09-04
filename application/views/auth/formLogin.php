<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="post" action="<?= base_url('auth/formLogin') ?>">
                <div class="login-form-head bg-1">
                    <h4>Login</h4>
                    <p>Selamat Datang di WEB E-LEARNING</p>
                </div>
                <div class="login-form-body">
                    <div class="message"> <?= $this->session->flashdata('message'); ?></div>

                    <div class="form-gp">
                        <label for="username">Username</label>
                        <input type="text" id="" name="username">
                        <i class="ti-email"></i>
                        <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="password" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>


                    <div class="submit-btn-area">
                        <button id="form_submit" name="Masuk" type="submit">Masuk <i class="ti-arrow-right"></i></button>

                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Guru atau Siswa yang belum terdaftar silahkan click disini <a href="<?= base_url('auth/CheckUser') ?>">Daftar</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>