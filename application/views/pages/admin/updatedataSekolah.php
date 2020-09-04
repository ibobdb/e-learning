<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">

            <h4 class="header-tittle py-2">
                Data Sekolah
            </h4>
            <div class="row">
                <div class="col-6 col-md-6 ">
                    <form action="<?= base_url('admin/updateDataSekolah') ?>" method="post" enctype="multipart/form-data">
                        <div class="message"> <?= $this->session->flashdata('message'); ?></div>
                        <?php foreach ($dataSekolah as $r) : ?>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Nama Sekolah</label>
                                <input class="form-control col-8" type="text" value="<?= $r['nama_sekolah'] ?>" id="" name="nama_sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">NPSN</label>
                                <input class="form-control col-8" type="text" value="<?= $r['npsn'] ?>" id="" name="npsn" readonly>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Status Sekolah</label>
                                <select class="form-control col-8" name="status" required>
                                    <option value="">Status Sekolah</option>
                                    <option value="negri">Negri</option>
                                    <option value="swasta">Swasta</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Jenjang Pendidikan</label>
                                <select class="form-control col-8" name="pendidikan" required>
                                    <option value="">Pilih Jenjang pendidikan</option>
                                    <option value="sma">SMA</option>
                                    <option value="smp">SMP</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input" class="col-form-label">Logo</label>
                                <input class="form-control col-8" type="file" value="" id="" name="uploadLogo" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </div>
                    </form>
                </div>

                <div class="col-6 md-6">
                    <label for="example-text-input" class="col-form-label">Logo Preview</label>
                    <img src="<?= base_url() ?>assets/img/logo/<?= $r['logo'] ?>" class="img-thumnail img-fluid" width="50%" height="50%" alt="Logo <?= $r['nama_sekolah'] ?>">

                </div>
            <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>