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
                    <h2>Admin</h2>
                    <p>Control the users and the content on your website</p>
                </div>

                <div class="row mt-5 justify-content-center">
                    <div class="container emp-profile">
                        <form method="POST" id="form1" onsubmit="return validateEditUser()"><!---->
                            <h3 style="margin-top: 20px;margin-bottom: 20px;">Edit User</h3>
                            <?php echo $all_user; ?>
                            <h5 style="margin-top: 20px;margin-bottom: 10px;">Field change</h5>
                            <div class="align-privacy" style="float: left;">
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="user" id="email" value="option1" required>
                                    <label class="form-check-label" for="inlineRadio1">Email</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="user" id="pass" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Password</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="user" id="delete1" value="option3">
                                    <label class="form-check-label" for="inlineRadio2">Delete</label>
                                </div>
                            </div>
                            <div style="position: static;margin-top: 80px;">
                                <div class="form-group" style="margin-top: 30px;">
                                    <input type="text" class="form-control" id="new" name="new" placeholder="New Field Value" style="width: 50% !important;display: inline-block"/> 
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 20px;margin-bottom: 20px;">
                                <button id="submit1" name="submit1" id="button-profile" class="profile-edit-btn" type="submit">Submit</button>
                            </div>
                            <p id="invalid" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
                        </form>

                        <form method="POST" id="form2" onsubmit="return validateEditPriority()"><!---->
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;"></ul>
                            <h3 style="margin-top: 20px;">Edit Priority</h3>
                            <?php echo $all_user2; ?>
                            <h5 style="margin-top: 20px;margin-bottom: 10px;">New priority</h5>
                            <div class="align-privacy" style="float: left;">
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="priority" id="utilizador" value="o1" required>
                                    <label class="form-check-label" for="inlineRadio3">utilizador</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="priority" id="simpatizante" value="o2">
                                    <label class="form-check-label" for="inlineRadio4">simpatizante</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="priority" id="admin" value="o3">
                                    <label class="form-check-label" for="inlineRadio5">admin</label>
                                </div>
                            </div>
                            <div class="col-md-2" style="max-height: 50px;margin-top: 70px;">
                                <button id="submit1" name="submit2" id="button-profile" class="profile-edit-btn" type="submit">Submit</button>
                            </div>
                            <p id="invalid2" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
                        </form>
                        <form method="POST" id="form3" onsubmit="return validateEditContentAdmin()"><!---->
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;"></ul>
                            <h3 style="margin-top: 20px;">Change Content submited by users</h3>
                            <?php echo $all_content; ?>
                            <!---->
                            <h5 style="margin-top: 20px;margin-bottom: 10px;">Select the opcions for the content</h5>
                            <div class="align-privacy" style="float: left;">
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="cont" id="public" value="opt1" required>
                                    <label class="form-check-label" for="inlineRadio1">public</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="cont" id="private" value="opt2">
                                    <label class="form-check-label" for="inlineRadio2">private</label>
                                </div>
                                <div class="form-check form-check-inline" style="position:static;">
                                    <input class="form-check-input" type="radio" name="cont" id="delete" value="opt3">
                                    <label class="form-check-label" for="inlineRadio2">delete</label>
                                </div>
                            </div>
                            <div class="col-md-2" style="max-height: 50px;margin-top: 70px;">
                                <button id="submit1" name="submit3" id="button-profile" class="profile-edit-btn" type="submit">Submit</button>
                            </div>
                            <p id="invalid3" class="invalid" style="font-size: 16px; text-align: center;margin-top:10px;"/>
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
        <script src="scripts/editUser.js"></script>
        <script>selectorDistrict();selectorDistrict2();selectorDistrict3();document.addEventListener("click", closeAllSelect);</script>
    </body>
</html>

