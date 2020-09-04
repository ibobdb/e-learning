<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">

            <h4 class="header-tittle py-2">
                Data Guru
            </h4>

            <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-warning mb-2 ">Tambah Data</a>
            <a href="" data-toggle="modal" data-target=".import-modal" class="btn btn-sm btn-primary mb-2">Import data</a>
            <div class="data-tables table-responsive">
                <div class="message"> <?= $this->session->flashdata('message'); ?></div>
                <table id="dataTable" class="text-center  ">
                    <thead class="bg-light text-capitalize">
                        <tr>
                            <th>No</th>
                            <th>Nis</th>
                            <th>nama</th>
                            <th>jenis kelamin</th>
                            <th>kelahiran</th>
                            <th>agama</th>
                            <th>jurusan</th>
                            <th>tungkat</th>
                            <th>kelas</th>
                            <th>Status User</th>
                            <th>Perintah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getSiswa as $r) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r['no_induk'] ?></td>
                                <td><?= $r['nama'] ?></td>
                                <td><?= $r['kelamin'] ?></td>
                                <td><?= $r['tanggal'] ?></td>
                                <td><?= $r['agama'] ?></td>
                                <td><?= $r['jurusan'] ?></td>
                                <td><?= $r['tingkat'] ?></td>
                                <td><?= $r['kelas'] ?></td>
                                <td><?= $r['is_active'] ?></td>
                                <td><a href="<?= base_url('admin/hapusDatasiswa/' . $r['no_induk']) ?>" class="btn-hapus p-4" title="Hapus Data"><i class="ti-trash"></i></a><a href="" class="" title="Detail Data"><i class="ti-search"></i></a></td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="col-lg-6 mt-5">

    <div class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="<?= base_url('admin/tambahSiswa') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nis</label>
                            <input class="form-control col-8" type="text" value="" id="" name="nis" required>
                            <?= form_error('nip', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nama Lengkap</label>
                            <input class="form-control col-8" type="text" value="" id="" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Tanggal Lahir</label>
                            <input class="form-control col-8" type="date" value="" id="" name="kelahiran" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jenis Kelamin</label>
                            <select class="form-control col-8" name="kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Agama</label>
                            <select class="form-control col-8" name="agama" required>
                                <option value="">Pilih agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jurusan</label>
                            <select class="form-control col-8" name="jurusan">
                                <option value="">Pilih Jurusan</option>
                                <option value="1">IPA</option>
                                <option value="1">IPS</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Tingkat</label>
                            <select class="form-control col-8 " name="tingkat" required>
                                <option value="">Pilih Tingkat</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kelas</label>
                            <select class="form-control col-8 " name="kelas" required>
                                <option value="">Pilih kelas</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>


                            </select>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-sm btn-danger" type="reset">Reset</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 mt-5">

    <div class="modal fade bd-example-modal-lg import-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="<?= base_url('admin/importdatasiswa') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <input type="file" name="importdata" id="" class="form-group form-group-sm">

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn bttn-sm btn-danger">Reset</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>