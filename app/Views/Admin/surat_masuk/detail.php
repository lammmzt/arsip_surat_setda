<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Detail Surat Masuk</h4>
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
                        <strong>Berhasil!</strong> <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                        <strong>Terjadi Kesalahan!</strong>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="mt-2 mx-3">
                <form action="<?= base_url('Surat_masuk/update'); ?>" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_surat_masuk" value="<?= $surat_masuk['id_surat_masuk']; ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pengirim_surat_masuk" class="form-label">Pengirim Surat</label>
                            <input type="text" class="form-control" id="pengirim_surat_masuk"
                                name="pengirim_surat_masuk"
                                value="<?= (old('pengirim_surat_masuk')) ? old('pengirim_surat_masuk') : $surat_masuk['pengirim_surat_masuk']; ?>"
                                disabled autofocus placeholder="Pengirim Surat">
                        </div>
                        <div class="col-md-6">
                            <label for="perihal_surat_masuk" class="form-label">Perihal Surat</label>
                            <input type="text" class="form-control" id="perihal_surat_masuk" name="perihal_surat_masuk"
                                value="<?= (old('perihal_surat_masuk')) ? old('perihal_surat_masuk') : $surat_masuk['perihal_surat_masuk']; ?>"
                                disabled placeholder="Perihal Surat">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="no_surat_masuk" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk"
                                value="<?= (old('no_surat_masuk')) ? old('no_surat_masuk') : $surat_masuk['no_surat_masuk']; ?>"
                                disabled placeholder="Nomor Surat">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_surat_masuk" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk"
                                value="<?= (old('tgl_surat_masuk')) ? old('tgl_surat_masuk') : $surat_masuk['tgl_surat_masuk']; ?>"
                                disabled placeholder="Tanggal Surat">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ket_surat_masuk" class="form-label ">Keterangan Surat</label>
                        <textarea class="form-control" id="ket_surat_masuk" name="ket_surat_masuk" disabled
                            rows="3"><?= (old('ket_surat_masuk')) ? old('ket_surat_masuk') : $surat_masuk['ket_surat_masuk']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="tipe_file_surat_masuk" name="tipe_file_surat_masuk" hidden>
                            <option value="img"
                                <?= $surat_masuk['tipe_file_surat_masuk'] == 'img' ? 'selected' : ''; ?>>IMG</option>
                            <option value="pdf"
                                <?= $surat_masuk['tipe_file_surat_masuk'] == 'pdf' ? 'selected' : ''; ?>>PDF</option>
                        </select>
                    </div>
                    <div class="mb-3" id="file_surat_masuk_container" style="display: none;">
                        <input type="file" class="form-control" id="file_surat_masuk" name="file_surat_masuk" hidden
                            value="<?= old('file_surat_masuk'); ?>" placeholder="File Surat">
                    </div>
                    <!-- preview  -->
                    <div class="mb-3" id="preview" style="display: none;">
                        <label for="preview" class="form-label">Preview</label>
                        <img src="" id="img-preview" class="img-fluid" alt="preview" style="display: none;">
                        <embed src="" id="pdf-preview" type="application/pdf" width="100%" height="600px"
                            style="display: none;">
                    </div>

                    <hr style="border-top: 1px solid; width: 100%; margin: 1rem 0;" class="mt-4">
                    <!-- acordion -->
                    <div class="accordion accordion-flush bg-white" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed bg-white" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <h4 class="card-title">Disposisi</h4>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse bg-white"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body bg-white">

                                    <!-- table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="5%" class="text-center">#</th>
                                                    <th scope="col">Pegawai</th>
                                                    <th scope="col">Ket</th>
                                                    <th scope="col" class="text-center" width="15%">Status</th>
                                                    <th scope="col" class="text-center" width="15%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="disposisi">
                                                <?php 
                                                if($disposisi):
                                                    $no = 1;
                                                    foreach($disposisi as $row): ?>

                                                <tr>
                                                    <td class="text-center"><?= $no++; ?></td>
                                                    <td><?= $row['nama_pegawai']; ?>(<?= $row['jabatan_pegawai']; ?>)
                                                    </td>
                                                    <td><?= $row['ket_disposisi']; ?></td>
                                                    <td>
                                                        <span
                                                            class="badge bg-<?= $row['status_disposisi'] == '0' ? 'danger' : 'success'; ?> p-2">
                                                            <?= $row['status_disposisi'] == '0' ? 'Belum dibaca' : 'Sudah dibaca'; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center " width="15%">
                                                        <!-- modal detail -->
                                                        <button type="button" class="btn btn-sm btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#detailDisposisi<?= $row['id_disposisi']; ?>">
                                                            Detail
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <tr>
                                                    <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-start mt-4">
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                        <a href="<?= base_url('Surat_masuk'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal detail -->
<?php if($disposisi):
    foreach($disposisi as $row): ?>
<div class="modal fade" id="detailDisposisi<?= $row['id_disposisi']; ?>" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Disposisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="id_disposisi" class="form-label">No. Disposisi</label>
                    <input type="text" class="form-control" id="id_disposisi" name="id_disposisi"
                        value="<?= $row['id_disposisi']; ?>" disabled>
                </div>
                <div class="accordion accordion-flush bg-white" id="detailDisposisi">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed bg-white" type="button" data-bs-toggle="collapse"
                                data-bs-target="#detailDisposisibody" aria-expanded="true"
                                aria-controls="detailDisposisibody">
                                <h5 class="card-title">Timeline</h5>
                            </button>
                        </h2>
                        <div id="detailDisposisibody" class="accordion-collapse collapse bg-white"
                            aria-labelledby="headingOne" data-bs-parent="#detailDisposisi">
                            <div class="accordion-body bg-white">
                                <div
                                    class="iq-timeline m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0 w-100">
                                        <li>
                                            <div class="time">
                                                <span><?= date('Y-m-d', strtotime($row['created_at'])); ?></span>
                                            </div>
                                            <div class="content">
                                                <div class="timeline-dots new-timeline-dots"></div>
                                                <h6 class="mb-1">Admin Dinas</h6>
                                                <div class="d-inline-block w-100">
                                                    <p style="text-align: justify;">
                                                        Disposisi dengan Nomor <?= $row['id_disposisi']; ?>
                                                        dengan prihal
                                                        <?= $row['perihal_surat_masuk']; ?> dikirimkan kepada: <b>
                                                            <?= $row['nama_pegawai']; ?> </b>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php if($row['status_disposisi'] == '1'): ?>
                                        <li>
                                            <div class="time bg-success">
                                                <span><?= date('Y-m-d', strtotime($row['updated_at'])); ?></span>
                                            </div>
                                            <div class="content">
                                                <div class="timeline-dots new-timeline-dots border-success"></div>
                                                <h6 class="mb-1"><?= $row['nama_pegawai']; ?></h6>
                                                <div class="d-inline-block w-100">
                                                    <p style="text-align: justify;">
                                                        Disposisi dengan Nomor <?= $row['id_disposisi']; ?> telah
                                                        dibaca oleh <?= $row['nama_pegawai']; ?> dengan balasan: <b>
                                                            <?= $row['jawaban_disposisi']; ?>.</b>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script style="text/javascript">
$(document).ready(function() {
    changePreview('<?= base_url('Assets/file_surat_masuk/' . $surat_masuk['file_surat_masuk']); ?>',
        '<?= $surat_masuk['tipe_file_surat_masuk']; ?>');
});


// fungsi mengubah tampilan file
function changePreview(file, tipe) {
    console.log(file, tipe);
    $('#preview').attr('style', 'display: block');
    if (tipe == 'img') {
        $('#img-preview').attr('src', file);
        $('#img-preview').attr('style', 'display: block');
        $('#pdf-preview').attr('style', 'display: none');
    } else if (tipe == 'pdf') {
        $('#pdf-preview').attr('src', file);
        $('#pdf-preview').attr('style', 'display: block');
        $('#img-preview').attr('style', 'display: none');
    }
}
</script>
<?= $this->endSection('script'); ?>