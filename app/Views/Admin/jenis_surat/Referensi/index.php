<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Referensi</h4>
            </div>
            <div class="header-title">
                <a href="#" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#addreferensi">
                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                            fill="currentColor"></path>
                    </svg> Tambah
                </a>
            </div>
        </div>
        <div class="card-body px-0">

            <div class="bd-example mx-3">
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                    </symbol>
                    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                    </symbol>
                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </symbol>
                </svg>

                <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <?= session()->getFlashdata('errors'); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="table-responsive">
                <table id="user-list-table" class="table table-striped data_tables" role="grid"
                    data-bs-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>#</th>
                            <th>Nama Referensi</th>
                            <th>Kode</th>
                            <th>Tipe Inputan</th>
                            <th>Keterangan</th>
                            <th style="min-width: 100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        ?>
                        <?php foreach($referensi as $rf): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $rf['kode_referensi_jenis_surat']; ?></td>
                            <td><?= $rf['nama_referensi_jenis_surat']; ?></td>
                            <td>
                                <?php if($rf['tipe_referensi_jenis_surat'] != ''): ?>
                                <?= $rf['tipe_referensi_jenis_surat']; ?>
                                <?php else: ?>
                                Tanpa Inputan
                                <?php endif; ?>
                            </td>
                            <td><?= $rf['ket_referensi_jenis_surat']; ?></td>

                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="modal" href="#"
                                        data-bs-target="#editreferensi<?= $rf['id_referensi_jenis_surat']; ?>">
                                        <span class="btn-inner">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete"
                                        href="<?= base_url('Jenis_surat/delete/'.$rf['id_referensi_jenis_surat']); ?>">
                                        <span class="btn-inner">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                <path
                                                    d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973"
                                                    stroke="currentColor" stroke-width="1 5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a> -->
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addreferensi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="addreferensiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addreferensiLabel">Tambah referensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Jenis_surat/saveReferensi'); ?>" method="post" class="needs-validation"
                    novalidate>
                    <div class="form-group">
                        <label for="kode_referensi_jenis_surat" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode_referensi_jenis_surat"
                            name="kode_referensi_jenis_surat" placeholder="Kode" required
                            value="<?= old('kode_referensi_jenis_surat'); ?>">

                    </div>
                    <div class="form-group">
                        <label for="nama_referensi_jenis_surat" class="form-label">Nama Referensi</label>
                        <input type="text" class="form-control" id="nama_referensi_jenis_surat"
                            name="nama_referensi_jenis_surat" placeholder="Nama Referensi" required
                            value="<?= old('nama_referensi_jenis_surat'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipe_referensi_jenis_surat" class="form-label">Tipe Inputan</label>
                        <select class="form-select" id="tipe_referensi_jenis_surat" name="tipe_referensi_jenis_surat">

                            <option value="" <?= (old('tipe_referensi_jenis_surat') == '') ? 'selected' : ''; ?>>Tanpa
                                Inputan
                            </option>
                            <option value="input"
                                <?= (old('tipe_referensi_jenis_surat') == 'input') ? 'selected' : ''; ?>>Input</option>
                            <option value="textarea"
                                <?= (old('tipe_referensi_jenis_surat') == 'textarea') ? 'selected' : ''; ?>>Textarea
                            </option>
                            <option value="date"
                                <?= (old('tipe_referensi_jenis_surat') == 'date') ? 'selected' : ''; ?>>Date</option>
                            <option value="datetime"
                                <?= (old('tipe_referensi_jenis_surat') == 'datetime') ? 'selected' : ''; ?>>Datetime
                            </option>
                            <option value="time"
                                <?= (old('tipe_referensi_jenis_surat') == 'time') ? 'selected' : ''; ?>>Time</option>
                            <option value="number"
                                <?= (old('tipe_referensi_jenis_surat') == 'number') ? 'selected' : ''; ?>>Number
                            </option>
                            <option value="ckeditor"
                                <?= (old('tipe_referensi_jenis_surat') == 'ckeditor') ? 'selected' : ''; ?>>ckeditor
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tipe_referensi_jenis_surat'); ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ket_referensi_jenis_surat" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="ket_referensi_jenis_surat" name="ket_referensi_jenis_surat"
                            placeholder="Keterangan" required
                            value="<?= old('ket_referensi_jenis_surat'); ?>"></textarea>
                    </div>

                    <div class="text-start mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit -->
<?php foreach($referensi as $rf): ?>
<div class="modal fade" id="editreferensi<?= $rf['id_referensi_jenis_surat']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editreferensiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editreferensiLabel">Edit referensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Jenis_surat/updateReferensi'); ?>" method="post" class="needs-validation"
                    novalidate>
                    <div
                        class="form-group <?= ($validation->hasError('kode_referensi_jenis_surat')) ? 'has-error' : ''; ?>">
                        <label for="kode_referensi_jenis_surat" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="kode_referensi_jenis_surat"
                            name="kode_referensi_jenis_surat" placeholder="Kode" required
                            value="<?= $rf['kode_referensi_jenis_surat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('kode_referensi_jenis_surat'); ?>
                        </div>
                    </div>
                    <input type="hidden" name="id_referensi_jenis_surat"
                        value="<?= $rf['id_referensi_jenis_surat']; ?>">
                    <div class="form-group
                        <?= ($validation->hasError('nama_referensi_jenis_surat')) ? 'has-error' : ''; ?>">
                        <label for="nama_referensi_jenis_surat" class="form-label">Nama Referensi</label>
                        <input type="text" class="form-control" id="nama_referensi_jenis_surat"
                            name="nama_referensi_jenis_surat" placeholder="Nama Referensi" required
                            value="<?= $rf['nama_referensi_jenis_surat']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama_referensi_jenis_surat'); ?>
                        </div>
                    </div>
                    <div class="form-group
                        <?= ($validation->hasError('tipe_referensi_jenis_surat')) ? 'has-error' : ''; ?>">
                        <label for="tipe_referensi_jenis_surat" class="form-label">Tipe Inputan</label>
                        <select class="form-select" id="tipe_referensi_jenis_surat" name="tipe_referensi_jenis_surat">
                            <option value="" <?= ($rf['tipe_referensi_jenis_surat'] == '') ? 'selected' : ''; ?>>
                                Tanpa Inputan </option>
                            <option value="input"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'input') ? 'selected' : ''; ?>>Input</option>
                            <option value="textarea"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'textarea') ? 'selected' : ''; ?>>Textarea
                            </option>
                            <option value="date"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'date') ? 'selected' : ''; ?>>Date</option>
                            <option value="datetime"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'datetime') ? 'selected' : ''; ?>>Datetime
                            </option>
                            <option value="time"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'time') ? 'selected' : ''; ?>>Time</option>
                            <option value="number"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'number') ? 'selected' : ''; ?>>Number
                            </option>
                            <option value="ckeditor"
                                <?= ($rf['tipe_referensi_jenis_surat'] == 'ckeditor') ? 'selected' : ''; ?>>ckeditor
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tipe_referensi_jenis_surat'); ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ket_referensi_jenis_surat" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="ket_referensi_jenis_surat" name="ket_referensi_jenis_surat"
                            placeholder="Keterangan" required
                            value="<?= $rf['ket_referensi_jenis_surat']; ?>"><?= $rf['ket_referensi_jenis_surat']; ?></textarea>
                    </div>
                    <div class="text-start mt-3">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>


<?= $this->endSection('konten'); ?>