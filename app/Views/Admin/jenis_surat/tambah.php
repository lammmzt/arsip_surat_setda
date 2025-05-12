<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<style>
#cke_editor1 {
    max-width: 1150px;
    /* Lebar F4 dalam px */
    /* Biar editor selalu di tengah */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    /* Opsional: biar kayak lembar dokumen */
}
</style>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Tambah Jenis Surat</h4>
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
            <div class="mt-2 mx-3">
                <form action="<?= base_url('Jenis_surat/save'); ?>" method="post" enctype="multipart/form-data"
                    class="needs-validation" novalidate>
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_jenis_surat" class="form-label">Nama Jenis Surat</label>
                        <input type="text" class="form-control" id="nama_jenis_surat" name="nama_jenis_surat"
                            value="<?= old('nama_jenis_surat'); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ket_jenis_surat" class="form-label">Keterangan Jenis Surat</label>
                        <textarea class="form-control" name="ket_jenis_surat"
                            rows="3"><?= old('ket_jenis_surat'); ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kode_surat" class="form-label">Kode Surat</label>
                        <input type="text" class="form-control" id="kode_surat" name="kode_surat"
                            value="<?= old('kode_surat'); ?>">
                        <div class="form-text">Contoh kode surat: 800</div>
                    </div>
                    <div class="mb-3">
                        <label for="kode_surat" class="form-label">Detail Jenis Surat</label>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h4 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Referensi Data
                                    </button>
                                </h4>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php 
                                    foreach($referensi as $ref): ?>
                                        <!-- checkbox -->
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox"
                                                id="<?= $ref['id_referensi_jenis_surat']; ?>"
                                                name="detail_jenis_surat[]"
                                                value="<?= $ref['id_referensi_jenis_surat']; ?>">
                                            <label class="form-check-label"
                                                for="<?= $ref['id_referensi_jenis_surat']; ?>"><?= $ref['kode_referensi_jenis_surat']; ?></label>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="template_jenis_surat" class="form-label">Template Jenis Surat</label>
                        <textarea id="editor1" name="template_jenis_surat" rows="10" cols="80"
                            placeholder="Masukkan template surat"><?= old('template_jenis_surat'); ?></textarea>
                    </div>
                    <!-- <hr> -->
                    <div class="text-start mt-4">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('Jenis_surat'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script style="text/javascript">
CKEDITOR.replace('editor1', {
    // height: 250,
    width: '100%',
    baseFloatZIndex: 10005,
    //clipboard_handleImages: false,
    extraPlugins: 'image2,uploadimage',
    // Configure your file manager integration. This example uses CKFinder 3 for PHP.
    filebrowserBrowseUrl: '<?= base_url(); ?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '<?= base_url(); ?>ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: '<?= base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '<?= base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    // Upload dropped or pasted images to the CKFinder connector (note that the response type is set to JSON).
    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

    // ckfinder delete image in server
    filebrowserImageDeleteUrl: '<?= base_url(); ?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',

    // ckfinder delete file in server in demo mode

    // Reduce the list of block elements listed in the Format drop-down to the most commonly used.
    format_tags: 'p;h1;h2;h3;pre',
    fontSize_defaultLabel: '20',
    font_defaultLabel: 'Times New Roman',
    // Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
    //removeDialogTabs: 'image:advanced;link:advanced',
    toolbarGroups: [{
            name: 'document',
            groups: ['mode', 'document', 'doctools']
        },
        {
            name: 'clipboard',
            groups: ['clipboard', 'undo']
        },
        {
            name: 'editing',
            groups: ['find', 'selection', 'spellchecker', 'editing']
        },
        {
            name: 'forms',
            groups: ['forms']
        },
        '/',
        {
            name: 'basicstyles',
            groups: ['basicstyles', 'cleanup']
        },
        {
            name: 'paragraph',
            groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
        },
        {
            name: 'links',
            groups: ['links']
        },
        {
            name: 'insert',
            groups: ['insert']
        },
        '/',
        {
            name: 'styles',
            groups: ['styles']
        },
        {
            name: 'colors',
            groups: ['colors']
        },
        {
            name: 'tools',
            groups: ['tools']
        },
        {
            name: 'others',
            groups: ['others']
        },
        {
            name: 'about',
            groups: ['about']
        }
    ],
    removeButtons: 'ExportPdf,Save,NewPage,Templates,About,Smiley,Iframe,Link,Anchor,Unlink,Blockquote,CreateDiv,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Scayt,PasteFromWord'
});
</script>
<?= $this->endSection('konten'); ?>