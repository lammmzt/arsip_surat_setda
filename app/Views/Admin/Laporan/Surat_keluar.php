<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h5 class="card-title">Laporan Surat Keluar</h5>
            </div>
            <div class="header-title">

            </div>
        </div>
        <div class="card-body px-0">
            <div class="row m-2 mb-3">
                <div class="col-12">
                    <form action="<?= base_url('Laporan/Surat_keluar'); ?>" method="post" class="d-flex">
                        <div class="input-group">
                            <label for="tanggal_awal" class="input-group-text">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control" value="<?= $tanggal_awal; ?>">
                            <span class="input-group-text">s/d</span>
                            <label for="tanggal_akhir" class="input-group-text">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control" value="<?= $tanggal_akhir; ?>">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row m-2">
                <div class="col-12">
                    <a href="<?= base_url('Laporan/cetakSuratKeluar/' . $tanggal_awal . '/' . $tanggal_akhir); ?>"
                        class="btn btn-primary mb-3" target="_blank">Cetak Laporan</a>
                </div>
            </div>
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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th>Pembuat</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        ?>
                        <?php foreach($surat_keluar as $jns): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= ($jns['judul_surat_keluar'] != null) ? $jns['judul_surat_keluar'] : '-'; ?></td>
                            <td><?= ($jns['tanggal_surat_keluar'] != null) ? date('d-m-Y', strtotime($jns['tanggal_surat_keluar'])) : '-'; ?>
                            </td>
                            <td><?=  ($jns['nomor_surat_keluar'] != null) ? $jns['kode_surat'].'/'.$jns['nomor_surat_keluar'] : '-'; ?>
                            <td><?= $jns['nama_user']; ?></td>
                            <td><?= ($jns['keterangan_surat_keluar'] != null) ? $jns['keterangan_surat_keluar'] : '-'; ?>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten'); ?>