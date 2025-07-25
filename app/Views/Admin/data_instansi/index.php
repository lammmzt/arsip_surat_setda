<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
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
                <?php if(session()->getFlashdata('error')): ?>
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
            <form action="<?= base_url('Data_instansi/save') ?>" method="post" enctype="multipart/form-data">
                <!-- logo ditengah" bisa diubah -->
                <div class="text-center mb-4">
                    <img src="<?= ($data_instansi != null) ? base_url('Assets/img/data_instansi/' . $data_instansi['logo_instansi']) : base_url('Assets/hope-ui-html-2.0/html/assets/images/avatars/01.png') ?>"
                        alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100"
                        id="view_logo_instansi">
                    <input type="file" class="form-control" id="logo_instansi" name="logo_instansi"
                        value="<?= old('logo_instansi') ?>">
                    <style>
                    /* sesuaikan input di  */
                    #logo_instansi {
                        display: none;
                    }

                    .theme-color-default-img {
                        cursor: pointer;
                    }

                    .theme-color-default-img:hover {
                        opacity: 0.7;
                    }
                    </style>

                    <script type="text/javascript">
                    //    when click image, trigger input file to choose file
                    document.getElementById('view_logo_instansi').addEventListener('click', function() {
                        document.getElementById('logo_instansi').click();
                    });

                    //    when file is selected, show image
                    document.getElementById('logo_instansi').addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function() {
                                document.getElementById('view_logo_instansi').setAttribute('src', reader
                                    .result);
                            }
                            reader.readAsDataURL(file);
                        }
                    });
                    </script>
                </div>
                <!-- end logo -->
                <hr>
                <?= csrf_field(); ?>
                <div class="form-group row mt-2">
                    <label for="nama_instansi" class="col-sm-2 col-form-label">Nama Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['nama_instansi'] : old('nama_instansi') ?>"
                            required placeholder="Nama Instansi">
                    </div>
                </div>
                <div class="form-group row mt-2 ">
                    <label for="alamat_instansi" class="col-sm-2 col-form-label">Alamat Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat_instansi" name="alamat_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['alamat_instansi'] : old('alamat_instansi') ?>"
                            required placeholder="Alamat Instansi">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="no_tlp_instansi" class="col-sm-2 col-form-label">No. Telp Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_tlp_instansi" name="no_tlp_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['no_tlp_instansi'] : old('no_tlp_instansi') ?>"
                            required placeholder="No. Telp Instansi">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="email_instansi" class="col-sm-2 col-form-label">Email Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="email_instansi" name="email_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['email_instansi'] : old('email_instansi') ?>"
                            required placeholder="Email Instansi">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="nama_kepala_instansi" class="col-sm-2 col-form-label">Nama Kepala Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama_kepala_instansi" name="nama_kepala_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['nama_kepala_instansi'] : old('nama_kepala_instansi') ?>"
                            required placeholder="Nama Kepala Instansi">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="nip_kepala_instansi" class="col-sm-2 col-form-label">NIP Kepala Instansi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip_kepala_instansi" name="nip_kepala_instansi"
                            value="<?= ($data_instansi) ? $data_instansi['nip_kepala_instansi'] : old('nip_kepala_instansi') ?>"
                            required placeholder="NIP Kepala Instansi">
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
        </div>
    </div>
</div>
<?= $this->endSection('konten') ?>