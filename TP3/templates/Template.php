<html>
    <head>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="css/styleIndex.css"/>

        <!-- Favicons -->
        <link href="Img/favicon.png" rel="icon">
        <link href="Img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
    </head>

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center head-edit">
            <div class="container d-flex align-items-center" style="max-width: none;">
                <div class="logo mr-auto">
                    <a href="index.php"><img src="Img/logo.png" alt="" class="img-fluid"></a>
                </div>
                <nav class="nav-menu d-none d-lg-block" style="float: right;">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#portfolio">Images</a></li>
                        <li><a href="#videos">Videos</a></li>
                        <?php echo $user_info ?>
                        <?php echo $show_logged; ?>

                    </ul>
                </nav>
                <div class="header-social-links">
                    <a href="https://twitter.com/" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="https://www.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/" class="instagram"><i class="icofont-instagram"></i></a>
                </div>
            </div>
        </header>

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex flex-column justify-content-center align-items-center" style="margin: 0;">
            <div class="container text-center text-md-left" data-aos="fade-up">
                <h1>Welcome to <span>Portugal Monuments</span></h1>
                <h2>Here you can find the best places to visit in Portugal</h2>
            </div>
        </section>

        <main id="main">
            <!-- ======= Images Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container">

                    <div class="section-title">
                        <h2>Monuments</h2>
                        <h4>Here you can see some monuments you can visit</h4>
                        <p style="padding-top:10px;">There is also some user experiences visiting the monuments</p>
                    </div>
                    <?php echo $sectionDis; ?>

                    <div class="row portfolio-container">
                        <?php echo $conteudo; ?>
                    </div>

                </div>
            </section>


            <section id="videos" class="portfolio">
                <div class="container">
                    <div class="section-title">
                        <h2>Videos</h2>
                    </div>

                    <div class="row portfolio-container">
                        <?php echo $sectionVideo; ?>
                    </div>
                    
                </div>
            </section>

        </main><!-- End #main -->



        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="container d-md-flex footerReset">

                <div class="mr-md-auto text-center text-md-left" style ="line-height: 35px;text-align: center;">
                    <div class="copyright">
                        &copy; Copyright. All Rights Reserved
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0 distan">
                    <a href="https://twitter.com/" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="https://www.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/" class="instagram"><i class="icofont-instagram"></i></a>
                </div>
            </div>
        </footer>

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- scripts Vendor -->
        <script src="vendor/jquery/jquery.min.js"></script><!--seta e animação-->
        <script src="vendor/jquery.easing/jquery.easing.min.js"></script><!--animação subir-->
        <script src="vendor/waypoints/jquery.waypoints.min.js"></script><!--organização do conteudo-->
        <script src="vendor/counterup/counterup.min.js"></script>
        <script src="vendor/isotope-layout/isotope.pkgd.min.js"></script>

        <script src="scripts/anim.js"></script>

    </body>

</html>


