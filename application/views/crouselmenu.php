<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="YAYASAN GEMA NURANI">
    <meta name="author" content="">
    <title>E-SIPEM | Sisinfo</title>
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>global/images/logo.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>global/images/logo.png">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/site.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/flag-icon-css/flag-icon.css">
    <style>
        .page-locked:before {
            background-image: url("<?php echo base_url() ?>global/images/lockscreen1.jpg");
        }

        .page-locked .avatar {
            margin-bottom: 15px;
        }

        .page-locked .locked-user {
            margin-bottom: 35px;
        }

        .page-locked a {
            color: #9fa8da;
        }

        .page-locked form {
            width: 300px;
            margin: 22px auto;
        }

        #weather {
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1), 0 0 5px rgba(0, 0, 0, 0.2), inset 0 0 5px rgba(255, 255, 255, 0.5);
            margin-top: 30px;
            padding: 5px;
            margin-left: 15px;
            margin-right: 15px;
        }

        #weather {
            float: left;
            text-align: center;
        }

        #weather .temp {
            color: white;
            font-weight: 400;
            font-size: 80px;
            line-height: 80px;
            padding: 5px 0;
            background: rgba(0, 0, 0, 0.2);
            vertical-align: middle;
        }

        #weather .temp:after {
            /* margin-left: 15px;
            content: 'A';
            display: inline-block; */
            height: 50px;
            width: 50px;
            /* background: url(data:image/png;base64,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) center no-repeat; */
            background-size: 50px;
        }

        #weather figcaption {
            padding: 10px 0;
            color: #333;
            font-size: 14px;
            font-weight: 700;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url() ?>global/vendor/jquery-selective/jquery-selective.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/asset/examples/css/apps/projects.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo base_url() ?>global/fonts/web-icons/web-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url() ?>global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
    <script src="<?php echo base_url() ?>global/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    <!-- Scripts -->
    <script src="<?php echo base_url() ?>global/vendor/breakpoints/breakpoints.js"></script>
    <script>
        Breakpoints();
    </script>
</head>

<body class="animsition page-locked layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo base_url() ?>http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
            <div class="dock">
                <div class="dock-container">
                    <figure id="weather" name="operator">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>dashboard" target="operator">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/operator.png" width="70" height="70"/></div>
                            <figcaption>Operator</figcaption>
                    </figure>
                    <figure id="weather" name="kasir">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>modulkasir/dashboard" target="kasir">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/kasir.png" width="70" height="70"/></div>
                            <figcaption>Kasir</figcaption>
                    </figure>
                    <figure id="weather" name="akunting">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>modulakunting/dashboard" target="akunting">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/akunting.png" width="70" height="70"/></div>
                            <figcaption>Akunting</figcaption>
                    </figure>
                    <figure id="weather" name="akunting">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>modulguru/dashboard" target="akunting">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/teacher.png" width="70" height="70"/></div>
                            <figcaption>Guru</figcaption>
                    </figure>
                    <figure id="weather" name="akunting">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>modulsiswa/dashboard" target="akunting">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/group.png" width="70" height="70"/></div>
                            <figcaption>Siswa</figcaption>
                    </figure>
                    <figure id="weather" name="payroll">
                        <a style="color:#333" class="dock-item" href="<?php echo base_url() ?>modulpayroll/dashboard" target="payroll">
                            <div class="temp"><img src="<?php echo base_url() ?>global/images/magnifying-glass.png" width="70" height="70"/></div>
                            <figcaption>Payroll</figcaption>
                    </figure>
                    <!-- <a class="dock-item" href="<?php echo base_url() ?>dashboard"><span></span><img src="<?php echo base_url() ?>global/images/operator1.png" width="128" height="128" alt="contact" /></a>
                    <a class="dock-item" href="<?php echo base_url() ?>modulkasir/dashboard"><span></span><img src="<?php echo base_url() ?>global/images/kasir1.png" width="128" height="128" alt="contact" /></a>
                    <a class="dock-item" href="<?php echo base_url() ?>modulakunting/dashboard"><span></span><img src="<?php echo base_url() ?>global/images/akunting.png" width="128" height="128" alt="contact" /></a> -->
                    <!--<a class="dock-item" href="<?php echo base_url() ?>KOPERASI/"><span></span><img src="<?php echo base_url() ?>global/images/koperasi.png" width="128" height="128" alt="contact" /></a> -->
                </div>
            </div>
            <div align="center" class="gambar"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>global/images/logo.png" width="200x" /></a></div>
            <footer class="page-copyright page-copyright-inverse">
                <p>WEBSITE BY ALPHA</p>
                <p>© 2020. All RIGHT RESERVED.</p>
                <!-- <div class="social">
          <a href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a href="javascript:void(0)">
            <i class="icon bd-dribbble" aria-hidden="true"></i>
          </a>
        </div> -->
            </footer>
        </div>
    </div>
    <!-- End Page -->
    <!-- Core  -->
    <script src="<?php echo base_url() ?>global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/tether/tether.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <!-- Plugins -->
    <script src="<?php echo base_url() ?>global/vendor/switchery/switchery.min.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/intro-js/intro.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/screenfull/screenfull.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    <script src="<?php echo base_url() ?>global/vendor/bootbox/bootbox.js"></script>
    <!-- Scripts -->
    <script src="<?php echo base_url() ?>global/js/State.js"></script>
    <script src="<?php echo base_url() ?>global/js/Component.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin.js"></script>
    <script src="<?php echo base_url() ?>global/js/Base.js"></script>
    <script src="<?php echo base_url() ?>global/js/Config.js"></script>
    <script src="<?php echo base_url() ?>asset/js/Section/Menubar.js"></script>
    <script src="<?php echo base_url() ?>asset/js/Section/GridMenu.js"></script>
    <script src="<?php echo base_url() ?>asset/js/Section/Sidebar.js"></script>
    <script src="<?php echo base_url() ?>asset/js/Section/PageAside.js"></script>
    <script src="<?php echo base_url() ?>asset/js/Plugin/menu.js"></script>
    <script src="<?php echo base_url() ?>global/js/config/colors.js"></script>
    <script src="<?php echo base_url() ?>asset/js/config/tour.js"></script>
    <script>
        Config.set('<?php echo base_url() ?>asset', '<?php echo base_url() ?>asset');
    </script>
    <!-- Page -->
    <script src="<?php echo base_url() ?>asset/js/Site.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/asscrollable.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/slidepanel.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/switchery.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/jquery-placeholder.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/animate-list.js"></script>
    <script src="<?php echo base_url() ?>global/js/Plugin/bootbox.js"></script>
    <script src="<?php echo base_url() ?>asset/js/App/Projects.js"></script>
    <script src="<?php echo base_url() ?>asset/examples/js/apps/projects.js"></script>
    <script>
        (function(document, window, $) {
            'use strict';
            var Site = window.Site;
            $(document).ready(function() {
                Site.run();
            });
        })(document, window, jQuery);
    </script>
</body>

</html>