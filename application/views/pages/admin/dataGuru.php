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
                            <th>Nip</th>
                            <th>nama</th>
                            <th>jenis kelamin</th>
                            <th>kelahiran</th>
                            <th>status</th>
                            <th>golongan</th>
                            <th>jabatan</th>
                            <th>ijazah</th>
                            <th>Status User</th>
                            <th>Perintah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($getGuru as $r) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $r['no_induk'] ?></td>
                                <td><?= $r['nama'] ?></td>
                                <td><?= $r['jenis_kelamin'] ?></td>
                                <td><?= $r['kelahiran'] ?></td>
                                <td><?= $r['status'] ?></td>
                                <td><?= $r['golongan'] ?></td>
                                <td><?= $r['jabatan'] ?></td>
                                <td><?= $r['ijazah'] ?></td>
                                <td><?= $r['is_active'] ?></td>
                                <td><a href="<?= base_url('admin/hapusDataguru/' . $r['no_induk']) ?>" class="btn-hapus p-4" title="Hapus Data"><i class="ti-trash"></i></a><a href="" class="" title="Detail Data"><i class="ti-search"></i></a></td>
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
                    <h5 class="modal-title">Tambah Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="<?= base_url('admin/tambahGuru') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Nip</label>
                            <input class="form-control col-8" type="text" value="" id="" name="nip" required>
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
                            <label class="col-form-label">Status</label>
                            <select class="form-control col-8" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="PNS">PNS</option>
                                <option value="CPNS">CPNS</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Jabatan</label>
                            <select class="form-control col-8 " name="jabatan" required>
                                <option value="">Jabatan</option>
                                <option value="Guru Mata Pelajaran">Guru Mata Pelajaran</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Golongan</label>
                            <select class="form-control col-8" name="golongan">
                                <option value="">Pilih Golongan</option>
                                <option value="1">-</option>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label"> Nama dan Tahun Ijazah</label>
                            <input class="form-control col-8" type="text" value="" id="" name="ijazah" placeholder="S1 Teknik Informatika" required>
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
<!-- Modal Import Data -->
<div class="col-lg-6 mt-5">

    <div class="modal fade bd-example-modal-lg import-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data Guru</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="<?= base_url('admin/importdataGuru') ?>" method="post" enctype="multipart/form-data">
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