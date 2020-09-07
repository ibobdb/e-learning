<div class="row">
    <div class="col-4 mt-5">

        <div class="card">
            <div class="card-body">

                <h4 class="header-tittle py-2">
                    Upload Materi Pelajaran
                </h4>
                <form action="<?= base_url('guru/newMateri') ?>" method="post" enctype="multipart/form-data">
                    <label for="example-text-input" class="col-form-label">Mata Pelajaran</label>
                    <select class="form-control" name="mapel" required>
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($getMapel as $r) : ?>
                            <option value="<?= $r['id_mapel'] ?>"><?= $r['nama_mapel'] ?></option>

                        <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Judul Materi</label>
                        <input class="form-control form-control-sm" type="text" value="" id="" name="nm_materi" required>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Kelas Tujuan</label>
                        <select class="form-control" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($getKelas as $r) : ?>
                                <option value="<?= $r['id_kelas'] ?>"><?= $r['label_kelas'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" class="col-form-label">Import Materi</label>
                        <input class="form-control form-control-sm" type="file" value="" id="" name="materi" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit">Upload</button>
                        <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    <div class="col-8 mt-5">

        <div class="card">
            <div class="card-body">

                <h4 class="header-tittle py-2">
                    Riwayat Upload
                </h4>
                <div class="data-tables">
                    <table id="dataTable2" class="text-center ">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Kelas</th>
                                <th>Mata pelajaran</th>
                                <th>Materi</th>
                                <th>Jam</th>
                                <th>Perintah</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($riwayat_upload as $r) : ?>
                                <tr>
                                    <td><?= $r['label_kelas'] ?></td>
                                    <td><?= $r['nama_mapel'] ?></td>
                                    <th><?= $r['judul_materi'] ?></th>
                                    <td><?= $r['is_created'] ?></td>
                                    <td><a href="<?= base_url('guru/download/') . $r['id_materi'] ?>" class="btn  btn-success p-2"><i class="ti-download"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- Test WEBHOOK -->