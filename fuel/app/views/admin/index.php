<html lang="en">

<head>
    <title>Nội thất Gia Thế</title>
    <meta name="robots" content="noindex, nofollow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/admin/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url('/assets/admin/img/login_bg.jpg');">
    <section class="ftco-section h-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <div class="d-flex justify-content-center mb-1">
                            <div class="d-flex justify-content-center align-items-center rounded-circle overflow-hidden" style="width: 150px; height: 150px;">
                                <img src="/assets/img/logo.jpg" alt="" class="w-100 h-100">
                            </div>
                        </div>
                        <form action="" method="post" class="signin-form">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password"
                                    required="">
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="text-danger h6">
                                <?= isset($login_error) ? "* $login_error" : '' ?>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked="">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/assets/admin/js/jquery.min.js"></script>
    <script src="/assets/admin/js/popper.js"></script>
    <script src="/assets/admin/js/bootstrap.min.js"></script>
    <script src="/assets/admin/js/main.js"></script>
</body>

</html>