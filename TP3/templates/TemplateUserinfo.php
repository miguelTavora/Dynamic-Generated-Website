<html>
    <head>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" type="text/css" href="css/styleIndex.css"/>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"/>
        <link href="css/styleUserInfo.css" rel="stylesheet" id="bootstrap-css" />
        <link rel="stylesheet" href="css/dropDown.css" />

        <!-- Favicons -->
        <link href="Img/favicon.png" rel="icon">
        <link href="Img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/icofont/icofont.min.css" rel="stylesheet">

        <!-- j-Query -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body style="background-color: #fff !important;">
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
        <section id="contact" class="contact section-bg" style="padding-bottom: 250px;">
            <div class="container">
                <div class="section-title">
                    <?php echo $submit_text; ?>
                    <h2>User profile</h2>
                    <p>Here you can see and change some information about your profile and publications</p>
                </div>

                <div class="row mt-5 justify-content-center">
                    <div class="container emp-profile">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6">
                                        <h4>Username</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 style="color: #B0D7F4;"><?php echo $user; ?></h4>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6">
                                        <h4>Email</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 style="color: #B0D7F4;"><?php echo $email_user; ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
                        <div class="col-md-2" style="margin-top: 20px;margin-bottom: 20px;">
                            <button id="buttonEdit" class="profile-edit-btn" type="button">Edit Profile</button>
                        </div>
                        <div id="edition" style="display: none;" style="margin-bottom: 20px;">
                            <form method="POST" id="form1" class="signup-form" onsubmit="return validateNewPassword()"><!---->
                                <ul class="nav nav-tabs" id="myTab" role="tablist"></ul>
                                <h3 style="margin-top: 20px;">Change password</h3>
                                <div class="form-group" style="margin-top: 40px;">
                                    <input type="password" class="form-control" id="pass1" name="pass1"  placeholder="Current password"/> 
                                </div>
                                <div class="form-group" style="margin-top: 30px;">
                                    <input type="password" class="form-control" id="pass2" name="pass2" placeholder="New Password"/> 
                                </div>
                                <div class="form-group" style="margin-top: 30px;margin-bottom: 30px;">
                                    <input type="password" class="form-control" id="pass3" name="pass3" placeholder="Re-enter new password"/> 
                                </div>
                                <div class="col-md-2" style="margin-top: 20px;margin-bottom: 20px;">
                                    <button id="submit1" name="submit1" id="button-profile" class="profile-edit-btn" type="submit">Submit</button>
                                </div>
                                <p id="invalid" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
                            </form>
                            <?php echo $edit_content; ?>
                            <?php echo $user_content; ?>
                            <?php echo $edit_content2; ?>

                        </div>
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
        <script src="scripts/editUser.js"></script>
        <?php echo $script_content; ?>
    </body>
</html>
