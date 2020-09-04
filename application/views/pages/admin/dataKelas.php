<div class="row">
    <div class="col-4 mt-5">

        <div class="card">
            <div class="card-body">

                <h4 class="header-tittle py-2">
                    Data Kelas
                </h4>
                <form action="<?= base_url('admin/tambahKelas') ?>" method="post">
                    <div class="message"> <?= $this->session->flashdata('message'); ?></div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Label Kelas</label>
                        <input class="form-control form-control-sm" type="text" value="" id="" name="label" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Jurusan</label>
                        <select class="form-control" name="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="ipa">Ipa</option>
                            <option value="ips">Ips</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Tingkat</label>
                        <select class="form-control " name="tingkat" required>
                            <option value="">Pilih Tingkat</option>
                            <?php for ($i = 1; $i <= 3; $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>

                            <?php endfor; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                        <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <div class="col-8 mt-5">

        <div class="card">
            <div class="card-body">

                <h4 class="header-tittle py-2">
                    Kelas Terdaftar
                </h4>
                <div class="data-tables">
                    <table id="dataTable2" class="text-center ">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Label</th>
                                <th>Jurusan</th>
                                <th>Tingkat</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getKelas as $r) : ?>
                                <tr>
                                    <td><?= $r['label_kelas'] ?></td>
                                    <td><?= $r['jurusan'] ?></td>
                                    <td><?= $r['tingkat'] ?></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>
</div>