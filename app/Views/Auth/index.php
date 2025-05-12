<?php 
    use App\Models\Data_instansiModel;
    $instansi = new Data_instansiModel();
    $data_instansi = $instansi->first();
?>
<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('Assets/img/data_instansi/').$data_instansi['logo_instansi']; ?>"
        type="image/x-icon" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/hope-ui.min.css?v=2.0.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/custom.min.css?v=2.0.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/dark.min.css" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/customizer.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/css/rtl.min.css" />


</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="<?= base_url('Auth'); ?>"
                                        class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->
                                        <!--logo End-->

                                        <!--Logo start-->
                                        <div class="logo-main">
                                            <div class="logo-normal">
                                                <img src="<?= base_url('Assets/img/data_instansi/').$data_instansi['logo_instansi']; ?>"
                                                    class="img-fluid" Width="50" alt="logo">
                                            </div>
                                            <div class="logo-mini">
                                                <img src="<?= base_url('Assets/img/data_instansi/').$data_instansi['logo_instansi']; ?>"
                                                    class="img-fluid" Width="50" alt="logo">
                                            </div>
                                        </div>
                                        <!--logo End-->
                                        <h4 class="logo-title ms-3">ARSIP SURAT</h4>
                                    </a>
                                    <h2 class="mb-2 text-center">Sign In</h2>
                                    <p class="text-center">Login to stay connected.</p>
                                    <form method="post" class="needs-validation" novalidate id="form-login">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        aria-describedby="username" placeholder="Masukkan Username"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                        aria-describedby="password" placeholder="Masukkan Password"
                                                        required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary" id="btn-login">Sign
                                                In</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sign-bg">
                        <svg width="280" height="230" viewBox="0 0 431 398" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.05">
                                <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                                <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                                <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                                    transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                                <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                                    transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/images/auth/01.png"
                        class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
            </div>
        </section>
    </div>

    <!-- Library Bundle Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/charts/vectore-chart.js"></script>
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/charts/dashboard.js"></script>

    <!-- fslightbox Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/plugins/setting.js"></script>

    <!-- Slider-tab Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/plugins/slider-tabs.js"></script>

    <!-- Form Wizard Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="<?= base_url('Assets/hope-ui-html-2.0/html/'); ?>assets/js/hope-ui.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom Script -->
    <script type="text/javascript">
    $(document).ready(function() {
        function sweetalert(icon, title, text, type) {
            Swal.fire({
                icon: icon,
                title: title,
                text: text,
                showConfirmButton: true,
                timer: 1500
            });
        }
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $('#btn-login').html('Loading...');
            $('#btn-login').attr('disabled', 'disabled');
            $.ajax({
                url: '<?= base_url('Auth/login'); ?>',
                type: 'POST',
                data: {
                    username: $('#username').val(),
                    password: $('#password').val()
                },
                success: function(response) {
                    if (response.status == '200') {
                        sweetalert('success', 'Berhasil', response.data, 'success');
                        setTimeout(function() {
                            window.location.href = '<?= base_url('/'); ?>';
                        }, 1500);
                    } else {
                        $('#btn-login').html('Sign In');
                        $('#btn-login').removeAttr('disabled');
                        sweetalert('error', 'Gagal', response.data, 'error');
                    }
                }
            });
        });
    });
    </script>

</body>

</html>