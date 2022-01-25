<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="shortcut icon" href="/img/LOGO.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    
    <div id="auth">
    <?php require("./class/kull_hata.php"); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="/img/LOGO.png" height="98" class='mb-4'>
                                <h3>Giriş Yap</h3>
                                <p>Sisteme giriş için lütfen giriş y apın.</p>
                            </div>
                            <form action="/class/kontrol.php" method="post">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Kullanıcı Adı</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="username">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Şifre</label>
                                        <a href="auth-forgot-password.html" class='float-end'>
                                           
                                        </a>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" name="pass">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class='form-check clearfix my-4'>
                                    <div class="checkbox float-start">
                                        <input type="checkbox" id="checkbox1" class='form-check-input'>
                                        <label for="checkbox1">Beni Hatırla</label>
                                    </div>
                                    <div class="float-end">
                                        <a href="auth-register.html">Kullanıcı adı: admin Şifre:123</a>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <button name="oturumac" type="submit" class="btn btn-primary float-end">Giriş</button>
                                </div>
                            </form>
                            <div class="divider">
                                
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>