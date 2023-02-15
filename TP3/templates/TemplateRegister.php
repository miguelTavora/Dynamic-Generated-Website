<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="css/styleRegister.css" />
        <script src="scripts/main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link href="Img/favicon.png" rel="icon">
        <link href="Img/apple-touch-icon.png" rel="apple-touch-icon">
    </head>
    <body>
        <div class="main">
            <section class="signup">
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" class="signup-form" onsubmit="return validateRegister()"><!---->
                            <h2 class="form-title">Create account</h2>
                            <div class="form-group">
                                <input type="text" class="form-input" name="username" id="username" placeholder="Username"/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-input" name="email" id="email"  placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-input"  name="password" id="password"  placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="g-recaptcha" data-sitekey="6LdKRacZAAAAAJdnGKbHbk7NsRWm9hKyjMhPWmGk"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" id="submit"  class="form-submit" value="Sign up"/>
                            </div>
                            <?php echo $incorrect; ?>
                            <p id="invalid" class="invalid" style="font-size: 16px;"/>
                        </form>
                        <p class="loginhere">
                            Have already an account ?
                            <a href="logIn.php" class="loginhere-link">Login here</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>


