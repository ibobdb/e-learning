<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="post" action="<?= base_url('auth/formDaftar') ?>">
                <div class="login-form-head">
                    <h4>Daftar Akun</h4>
                    <p>Hello there, Sign up and Join with Us</p>
                </div>
                <div class="login-form-body">
                    <div class="message"> <?= $this->session->flashdata('message'); ?></div>
                    <div class="form-gp">
                        <label for="exampleInputName1">Check Nomor Induk</label>
                        <input type="text" id="exampleInputName1" class="text-muted" value="<?= $this->session->userdata('no_induk') ?>" readonly name="no_induk">
                        <i class=" ti-user"></i>
                        <div class="text-danger"></div>
                        <small class="text-muted">Guru:NIP Siswa : NIS</small>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputName1">Nama Lengkap</label>
                        <input type="text" id="exampleInputName1" name="nama_user" value="<?= $this->session->userdata('nama') ?>">
                        <i class="ti-user"></i>
                        <div class="text-danger"></div>
                        <?= form_error('nama_user', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" id="exampleInputEmail1" name="email_user">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                        <?= form_error('email_user', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password1">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                        <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" id="exampleInputPassword2" name="password2">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Daftar <i class="ti-arrow-right"></i></button>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>