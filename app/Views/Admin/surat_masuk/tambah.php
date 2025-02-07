<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Surat Masuk</h4>
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
                <form action="<?= base_url('Surat_masuk/save'); ?>" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <?= csrf_field(); ?>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="pengirim_surat_masuk" class="form-label">Pengirim Surat</label>
                            <input type="text" class="form-control" id="pengirim_surat_masuk"
                                name="pengirim_surat_masuk" value="<?= old('pengirim_surat_masuk'); ?>" required
                                autofocus placeholder="Pengirim Surat">
                        </div>
                        <div class="col-md-6">
                            <label for="perihal_surat_masuk" class="form-label">Perihal Surat</label>
                            <input type="text" class="form-control" id="perihal_surat_masuk" name="perihal_surat_masuk"
                                value="<?= old('perihal_surat_masuk'); ?>" required placeholder="Perihal Surat">
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="no_surat_masuk" class="form-label">Nomor Surat</label>
                            <input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk"
                                value="<?= old('no_surat_masuk'); ?>" required placeholder="Nomor Surat">
                        </div>
                        <div class="col-md-6">
                            <label for="tgl_surat_masuk" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk"
                                value="<?= old('tgl_surat_masuk'); ?>" required placeholder="Tanggal Surat">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="ket_surat_masuk" class="form-label ">Keterangan Surat</label>
                        <textarea class="form-control" id="ket_surat_masuk" name="ket_surat_masuk" required
                            rows="3"><?= old('ket_surat_masuk'); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_file_surat_masuk" class="form-label">Tipe File</label>
                        <select class="form-select" id="tipe_file_surat_masuk" name="tipe_file_surat_masuk" required>
                            <option selected>Pilih Tipe File</option>
                            <option value="img">IMG</option>
                            <option value="pdf">PDF</option>
                        </select>
                    </div>
                    <div class="mb-3" id="file_surat_masuk_container" style="display: none;">
                        <label for="file_surat_masuk" class="form-label">File Surat</label>
                        <input type="file" class="form-control" id="file_surat_masuk" name="file_surat_masuk"
                            value="<?= old('file_surat_masuk'); ?>" required placeholder="File Surat">
                    </div>
                    <!-- preview  -->
                    <div class="mb-3" id="preview" style="display: none;">
                        <label for="preview" class="form-label">Preview</label>
                        <img src="" id="img-preview" class="img-fluid" alt="preview" style="display: none;">
                        <embed src="" id="pdf-preview" type="application/pdf" width="100%" height="600px"
                            style="display: none;">
                    </div>

                    <hr style="border-top: 1px solid; width: 100%; margin: 1rem 0;" class="mt-4">
                    <!-- tambah disposisi -->
                    <h5 class="card-title mb-2">Tambah Disposisi</h5>
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <label for="pegawai_disposisi" class="form-label">Pegawai Disposisi</label>
                            <select class="form-select select2" id="pegawai_disposisi" name="pegawai_disposisi" required
                                style="width: 100%;">
                                <option selected>Pilih Pegawai</option>
                                <?php foreach($pegawai as $p): ?>
                                <option value="<?= $p['id_pegawai']; ?>" <?= old('pegawai_disposisi') == $p['id_pegawai'] ?
                                    'selected' : ''; ?>><?= $p['nama_pegawai']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- button plus -->
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="button" class="btn btn-primary " id="tambah_disposisi">
                                <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <!-- table -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%" class="text-center">#</th>
                                    <th scope="col">Pegawai</th>
                                    <th scope="col">Ket</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="disposisi">
                                <tr class="text-center" id="belum_disposisi">
                                    <td colspan="4" class="text-center">Belum ada disposisi</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-start mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('Surat_masuk'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script style="text/javascript">
$(document).ready(function() {
    $('#tipe_file_surat_masuk').change(function() {
        var tipe = $(this).val();
        // alert(tipe);
        if (tipe == 'img') {
            $('#file_surat_masuk_container').attr('style', 'display: block');
            $('#file_surat_masuk').attr('type', 'file');
            $('#file_surat_masuk').attr('accept', 'image/*');
            $('#file_surat_masuk').attr('name', 'file_surat_masuk');
            $('#file_surat_masuk').attr('required', 'required');
            $('#file_surat_masuk').attr('value', '');
            $('#file_surat_masuk').attr('class', 'form-control');
            $('#file_surat_masuk').attr('placeholder', 'File Surat');
            $('#file_surat_masuk').attr('style', 'display: block');
            $('#preview').attr('style', 'display: none');
            $('#pdf-preview').attr('src', '');
            $('#img-preview').attr('src', '');
        } else if (tipe == 'pdf') {
            $('#file_surat_masuk_container').attr('style', 'display: block');
            $('#file_surat_masuk').attr('type', 'file');
            $('#file_surat_masuk').attr('accept', 'application/pdf');
            $('#file_surat_masuk').attr('name', 'file_surat_masuk');
            $('#file_surat_masuk').attr('required', 'required');
            $('#file_surat_masuk').attr('value', '');
            $('#file_surat_masuk').attr('class', 'form-control');
            $('#file_surat_masuk').attr('placeholder', 'File Surat');
            $('#file_surat_masuk').attr('style', 'display: block');
            $('#preview').attr('style', 'display: none');
            $('#pdf-preview').attr('src', '');
            $('#img-preview').attr('src', '');
        } else {
            $('#file_surat_masuk_container').attr('style', 'display: none');
            $('#file_surat_masuk').attr('type', 'hidden');
            $('#file_surat_masuk').attr('name', '');
            $('#file_surat_masuk').attr('required', '');
            $('#file_surat_masuk').attr('value', '');
            $('#file_surat_masuk').attr('class', '');
            $('#file_surat_masuk').attr('placeholder', '');
            $('#file_surat_masuk').attr('style', 'display: none');
            $('#preview').attr('style', 'display: none');
            $('#img-preview').attr('src', '');
            $('#pdf-preview').attr('src', '');
        }
    });
    $('#file_surat_masuk').change(function() {
        var file = $(this).val();
        var tipe = $('#tipe_file_surat_masuk').val();
        $('#preview').attr('style', 'display: block');
        if (tipe == 'img') {
            $('#pdf-preview').attr('style', 'display: none');
            $('#pdf-preview').attr('src', '');
            $('#img-preview').attr('style', 'display: block');
            $('#img-preview').attr('src', URL.createObjectURL(event.target.files[0]));
        }
        if (tipe == 'pdf') {
            $('#img-preview').attr('style', 'display: none');
            $('#pdf-preview').attr('style', 'display: block');
            $('#img-preview').attr('src', '');
            $('#pdf-preview').attr('src', URL.createObjectURL(event.target.files[0]));
        }
    });
});
var i = 0;
$('#tambah_disposisi').click(function() {
    var pegawai = $('#pegawai_disposisi').val();
    var nama_pegawai = $('#pegawai_disposisi option:selected').text();
    if (pegawai == 'Pilih Pegawai') {
        alert('Pilih Pegawai');
    } else {
        $('#belum_disposisi').remove();
        i++;
        $('#disposisi').append('<tr>' +
            '<td>' + i + '</td>' +
            '<td>' + nama_pegawai + '<input type="hidden" name="pegawai_disposisi[]" value="' + pegawai +
            '"></td>' +
            '<td><input type="text" class="form-control" name="ket_disposisi[]" style="min-width: 200px;" required></td>' +
            '<td><button type="button" class="btn btn-danger hapus_disposisi">Hapus</button></td>' +
            '</tr>');

    }
});
$(document).on('click', '.hapus_disposisi', function() {
    $(this).closest('tr').remove();
    if ($('#disposisi tr').length == 0) {
        $('#disposisi').append('<tr class="text-center" id="belum_disposisi">' +
            '<td colspan="4" class="text-center">Belum ada disposisi</td>' +
            '</tr>');
    }
    i--;
});
</script>
<?= $this->endSection('script'); ?>