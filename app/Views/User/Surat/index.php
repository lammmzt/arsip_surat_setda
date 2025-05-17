<?= $this->extend('Templates/index') ?>
<?= $this->section('konten') ?>
<div class="col-sm-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Daftar Surat</h4>
            </div>
            <div class="header-title">

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
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Nomor</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th style="min-width: 100px">Action</th>
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
                            <td><?= ($jns['keterangan_surat_keluar'] != null) ? $jns['keterangan_surat_keluar'] : '-'; ?>
                            </td>
                            <td>
                                <?php if($jns['status_detail_surat_keluar'] == '0'): ?>
                                <span class="badge bg-danger">Blum dibaca</span>
                                <?php else: ?>
                                <span class="badge bg-success">Sudah dibaca</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <!-- detail -->
                                    <a class="btn btn-sm btn-icon btn-info" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Detail"
                                        href="<?= base_url('Surat/detail/'.$jns['id_detail_surat_keluar']); ?>">
                                        <span class="btn-inner">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.1614 12.0531C15.1614 13.7991 13.7454 15.2141 11.9994 15.2141C10.2534 15.2141 8.83838 13.7991 8.83838 12.0531C8.83838 10.3061 10.2534 8.89111 11.9994 8.89111C13.7454 8.89111 15.1614 10.3061 15.1614 12.0531Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.998 19.355C15.806 19.355 19.289 16.617 21.25 12.053C19.289 7.48898 15.806 4.75098 11.998 4.75098H12.002C8.194 4.75098 4.711 7.48898 2.75 12.053C4.711 16.617 8.194 19.355 12.002 19.355H11.998Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <!-- preview -->
                                    <a class="btn btn-sm btn-icon btn-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Preview Surat"
                                        href="<?= base_url('Surat/preview/'.$jns['id_detail_surat_keluar']); ?>"
                                        target="_blank">

                                        <span class="btn-inner">
                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <mask maskUnits="userSpaceOnUse" x="3" y="0" width="18" height="24"
                                                    fill="black">
                                                    <rect fill="white" x="3" width="18" height="24"></rect>
                                                    <path
                                                        d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z">
                                                    </path>
                                                </mask>
                                                <path
                                                    d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"
                                                    stroke="#fff" stroke-width="2" mask="url(#path-1-outside-1)">
                                                </path>
                                                <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="3" y="0"
                                                    width="18" height="24">
                                                    <mask mask-type="luminance" maskUnits="userSpaceOnUse" x="3" y="0"
                                                        width="18" height="24" fill="black">
                                                        <rect fill="white" x="3" width="18" height="24"></rect>
                                                        <path
                                                            d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z">
                                                        </path>
                                                    </mask>
                                                    <path
                                                        d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"
                                                        fill="#fff"></path>
                                                    <path
                                                        d="M4 3.00004C4 1.89547 4.89543 1.00004 6 1.00004H13.0801C13.664 1.00004 14.2187 1.25517 14.5986 1.69845L19.5185 7.43826C19.8292 7.80075 20 8.26243 20 8.73985V21C20 22.1046 19.1046 23 18 23H6C4.89543 23 4 22.1046 4 21V3.00004Z"
                                                        stroke="#fff" stroke-width="2" mask="url(#path-2-outside-2)">
                                                    </path>
                                                </mask>
                                                <path d="M14 6V0L21 8H16C14.8954 8 14 7.10457 14 6Z" stroke="#fff">
                                                </path>
                                                <mask fill="white">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M7 14.5945L8.99429 12.1334C9.12172 11.9761 9.34898 11.9549 9.50189 12.0859C9.6548 12.217 9.67546 12.4507 9.54804 12.6079L7.93828 14.5945L9.54804 16.581C9.67546 16.7383 9.6548 16.972 9.50189 17.103C9.34898 17.2341 9.12172 17.2128 8.99429 17.0556L7 14.5945Z">
                                                    </path>
                                                </mask>
                                                <path d="M15.7161 16.2234H8.49609" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M15.7161 12.0369H8.49609" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                                <path d="M11.2521 7.86011H8.49707" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>

                                            </svg>
                                        </span>
                                    </a>
                                    <!-- <a class="btn btn-sm btn-icon btn-danger" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete"
                                        href="<?= base_url('Surat_keluar/delete/'.$jns['id_detail_surat_keluar']); ?>">
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
<?= $this->endSection('konten'); ?>