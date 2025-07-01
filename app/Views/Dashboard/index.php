<?= $this->extend('Templates/index'); ?>
<?= $this->section('konten'); ?>
<?php 
if(session()->get('role') == 'Admin'  || session()->get('role') == 'Kadin'): ?>
<div class="col-md-12 col-lg-12">
    <div class="row row-cols-1">
        <div class="overflow-hidden d-slider1 ">
            <ul class="p-0 m-0 mb-2 swiper-wrapper list-inline">
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-01"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Pengguna</p>
                                <h4 class="counter"><?= $total_users; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-02"
                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Pegawai</p>
                                <h4 class="counter"><?= $total_pegawai; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-03"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Jumlah External</p>
                                <h4 class="counter"><?= $total_external; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-04"
                                class="text-center circle-progress-01 circle-progress circle-progress-info"
                                data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Surat Masuk</p>
                                <h4 class="counter"><?= $total_surat_masuk; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1100">
                    <div class="card-body">
                        <div class="progress-widget">
                            <div id="circle-progress-05"
                                class="text-center circle-progress-01 circle-progress circle-progress-primary"
                                data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                                <svg class="card-slie-arrow icon-24" width="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                </svg>
                            </div>
                            <div class="progress-detail">
                                <p class="mb-2">Jumlah Surat Keluar</p>
                                <h4 class="counter"><?= $total_surat_keluar; ?></h4>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
        </div>
    </div>
</div>
<div class="col-md-12 col-lg-12">
    <div class="card" data-aos="fade-up" data-aos-delay="800">
        <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
            <div class="header-title">
                <h4 class="card-title">Grafik</h4>
                <p class="mb-0">Surat Masuk & Keluar</p>
            </div>
            <div class="d-flex align-items-center align-self-center">
                <div class="d-flex align-items-center text-primary">
                    <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                        </g>
                    </svg>
                    <div class="ms-2">
                        <span class="text-gray">Surat Masuk</span>
                    </div>
                </div>
                <div class="d-flex align-items-center ms-3 text-info">
                    <svg class="icon-12" xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                        fill="currentColor">
                        <g>
                            <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                        </g>
                    </svg>
                    <div class="ms-2">
                        <span class="text-gray">Surat Keluar</span>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <form id="formTahunSurat" method="post" action="<?= base_url('/'); ?>">
                    <select class="form-select form-select-sm select2" id="tahun" name="tahun"
                        aria-label="Default select example" OnChange="this.form.submit()">
                        <option value="">Pilih Tahun</option>
                        <?php for ($i = date('Y'); $i >= 2024; $i--) : ?>
                        <option value="<?= $i; ?>" <?= ($tahun == $i) ? 'selected' : ''; ?>><?= $i; ?></option>
                        <?php endfor; ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div id="chartSurat" class="chartSurat"></div>
        </div>
    </div>
</div>
<?php else: ?>

<?php endif; ?>
<?= $this->endSection('konten'); ?>
<?= $this->section('script'); ?>
<script>
if (document.querySelectorAll('#chartSurat').length) {
    const options = {
        series: [{
            name: 'Surat Masuk',
            data: <?= json_encode(array_map(function ($item) {
                return (int)$item['surat_masuk'];
            }, $data_surat)); ?>
        }, {
            name: 'Surat Keluar',
            data: <?= json_encode(array_map(function ($item) {
                return (int)$item['surat_keluar'];
            }, $data_surat)); ?>
        }],
        chart: {
            fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
            height: 350,
            width: '100%',
            type: 'area',
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: false,
            },
        },
        colors: ["#3a57e8", "#4bc7d2"],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 3, // ubah dari 6 → 3 agar lebih jelas
        },
        yaxis: {
            show: true,
            labels: {
                show: true,
                minWidth: 19,
                style: {
                    colors: "#8A92A6",
                },
                offsetX: -5,
            },
            title: {
                text: 'Jumlah Surat',
                style: {
                    color: "#8A92A6",
                    fontSize: '12px',
                }
            },
            min: 0,
            max: <?= max(array_merge(array_column($data_surat, 'surat_masuk'), array_column($data_surat, 'surat_keluar'))) + 5; ?>,
            tickAmount: 5,
        },
        legend: {
            show: false,
        },
        xaxis: {
            labels: {
                minHeight: 22,
                show: true,
                style: {
                    colors: "#8A92A6",
                },
            },
            lines: {
                show: false
            },
            categories: <?= json_encode(array_map(function ($item) {
                return DateTime::createFromFormat('!m', $item['bulan'])->format('M');
            }, $data_surat)); ?>
        },
        grid: {
            show: true, // ubah ke true untuk memastikan garis terlihat
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: "vertical",
                shadeIntensity: 0,
                gradientToColors: undefined,
                inverseColors: true,
                opacityFrom: 0.4,
                opacityTo: 0.1,
                stops: [0, 50, 80],
                colors: ["#3a57e8", "#4bc7d2"]
            }
        },
        tooltip: {
            enabled: true,
        },
    };

    const chart = new ApexCharts(document.querySelector("#chartSurat"), options);
    chart.render();

    document.addEventListener('ColorChange', (e) => {
        const newOpt = {
            colors: [e.detail.detail1, e.detail.detail2],
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: "vertical",
                    shadeIntensity: 0,
                    gradientToColors: [e.detail.detail1, e.detail.detail2],
                    inverseColors: true,
                    opacityFrom: 0.4,
                    opacityTo: 0.1,
                    stops: [0, 50, 60],
                    colors: [e.detail.detail1, e.detail.detail2],
                }
            },
        }
        chart.updateOptions(newOpt);
    });
}
</script>
<?= $this->endSection('script'); ?>