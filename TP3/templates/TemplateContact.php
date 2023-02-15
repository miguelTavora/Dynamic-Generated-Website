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
                    </ul>
                </nav>
                <div class="header-social-links">
                    <a href="https://twitter.com/" class="twitter"><i class="icofont-twitter"></i></a>
                    <a href="https://www.facebook.com/" class="facebook"><i class="icofont-facebook"></i></a>
                    <a href="https://www.instagram.com/" class="instagram"><i class="icofont-instagram"></i></a>
                </div>
            </div>
        </header>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container">
                <div class="section-title">
                    <?php echo $submit_text; ?>
                    <h2>Contact</h2>
                    <p>Write the comment below, we will responde as soon as possible</p>
                    
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-10">
                        <div class="info-wrap">
                            <div class="row">
                                <div class="col-lg-4 info">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>Rua Emídio Navarro<br>Chelas, Lisboa</p>
                                </div>
                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@smi.com</p>
                                </div>
                                <div class="col-lg-4 info mt-4 mt-lg-0">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+1 244 244 244</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-10">
                        <form  method="post" id="myForm" class="php-email-form" onsubmit="return validateMessage()">
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"/>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" id="message" placeholder="Message"></textarea>
                            </div>
                            <div class="text-center"><button name="submit" id="submit"  type="submit">Send Message</button></div>
                            <p id="invalid" class="invalid" style="font-size: 16px;"/>
                            <?php echo $submit_error; ?>
                        </form>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

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

        <script src="scripts/main.js"></script>
    </body>
</html>



