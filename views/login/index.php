<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base <?=URL?>>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?=URL?>public/img//icon.png"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=URL?>public/css/iranyekan.css">
    <link rel="stylesheet" href="../../public/css/costomstyle.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?=URL?>login/checkUser" method="post">
					<span class="login100-form-title p-b-26">
					خوش آمدید
					</span>
                <?php
                if(isset($_GET['error'])){
              ?>
                <div  style="padding: .75rem .25rem;text-align: center" class="alert alert-danger">
                    <?php
                    echo $_GET['error']
                    ?>
                </div>
        <?php } ?>
                <span class="login100-form-title p-b-48">
						<img src="<?=URL?>public/img/favicon.png">
					</span>

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="mobile" maxlength="11">
                    <span class="focus-input100 text-large" data-placeholder="شماره همراه"></span>
                </div>
                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="password">
                    <span class="focus-input100 text-large" data-placeholder="رمز عبور"></span>
                </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn text-xlarge ">
                          ورود
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/bootstrap/js/popper.js"></script>
<script src="<?=URL?>public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/daterangepicker/moment.min.js"></script>
<script src="<?=URL?>public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?=URL?>public/js/main.js"></script>

</body>
</html>