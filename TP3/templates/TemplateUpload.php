<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="css/styleIndex.css"/>
        <link rel="stylesheet" href="css/dropDown.css" />
        <!-- Vendor CSS Files -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/icofont/icofont.min.css" rel="stylesheet">
        <!-- Favicons -->
        <link href="Img/favicon.png" rel="icon">
        <link href="Img/apple-touch-icon.png" rel="apple-touch-icon">
        
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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

        <!-- ======= Submit Content ======= -->
        <section id="contact" class="contact section-bg" style="padding-bottom: 160px">
            <div class="container">
                <div class="section-title">
                    <?php echo $msg; ?>
                    <h2>Submit content</h2>
                    <p>Submit the monument below and write a description for the monument.<br>If the content is public it will be displayed to everyone.</p>
                    <h4 style="text-align: center;color:#DC143C;margin-top: 10px;">Ofensive or inappropriate content will be remove and the user will be deleted</h4>
                </div>
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-10">
                        <form  id="cntForm" method="POST" enctype="multipart/form-data" class="php-email-form" onsubmit="return validateContent()"><!----> 
                            <div style="text-align:center;">
                                <input type="file" name="image" id ="image" accept="image/x-png,image/jpg,video/*"/>
                            </div>
                            <?php echo $districts; ?>
                            <div class="form-group">
                                <input type="text" class="form-control" id="monument-name" name="monument-name" aria-describedby="monument" placeholder="Name of the monument"/> 
                            </div>
                            <div>
                                <textarea id="content" class="content-image" cols="500" rows="10" name="content" placeholder="Describe the content in some words..."></textarea>
                            </div>

                            <div class="align-privacy" >
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="publicity" id="public" value="option1" required>
                                    <label class="form-check-label" for="inlineRadio1">Public</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="publicity" id="private" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Private</label>
                                </div>
                            </div>

                            <div class="text-center"><button name="submit" id="submit"  type="submit">Submit content</button></div>
                            <p id="invalid" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
                            <?php echo $msg_error; ?>
                        </form>
                    </div>
                </div>
            </div>
        </section>

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
        <script>
                            selectorDistrict();
                            document.addEventListener("click", closeAllSelect);//quando clica fora da box
        </script>
    </body>
</html>



