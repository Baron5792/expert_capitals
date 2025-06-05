<?php
    include __DIR__ . '/./database.php';
    $username_email = $_SESSION['login-data']['username_email'] ?? null;
    unset($_SESSION['login-data'])
?>


<!DOCTYPE html>
<html lang="en" class="js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="AO2ua27JOmWhHxiFLXB9eZPcH5xriTErAYgCBNHz">

    <!-- Fav Icon  -->
    <title> Sign In | Expert Capital </title>
    
    
    <meta name="description" content=" Secure and trusted online platform for saving, depositing, and loaning. High-level policy and security measures ensure your financial transactions are safe and protected.">
    <meta name="keywords" content="online banking, secure loans, savings accounts, deposit services, financial solutions, online financial services, secure transactions, loan services, banking solutions">
    <link rel="shortcut icon" href="assets/images/logoIcon/favicon.png" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="assets/images/logoIcon/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Expert Capital - Sign In">

    
    <meta itemprop="name" content="Expert Capital - Sign In">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="assets/images/seo/61dcdaa9a49c71641863849.png">

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="Expert Capital">
    <meta property="og:description" content="Expert Capital is a licensed and supervised digital bank providing a seamless, secure and easy-to-use bridge between digital and traditional assets.">
    <meta property="og:image" content="assets/images/seo/61dcdaa9a49c71641863849.png"/>
    <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="login.php">
    
    
    <meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" href="assets/images/logoIcon/favicon.png" type="image/x-icon">

    <!-- Page Title  -->
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="assets/templates/bank/userend/css/apps4250.css?ver=2.7.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    

    
    <style>
    .capcha div{
        width: 100% !important;
    }
</style>

    <style type="text/css">
        .base--color {
            color: #b95441 !important;
        }
    </style>



        
    <link rel="stylesheet" href="assets/wa/plugin/whatsapp-chat-support.css">

    
    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    <link rel="stylesheet" href="./assets/templates/bank/frontend/css/index.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>



<!-- swal error alert -->
<?php
    if (isset($_SESSION['error'])):
?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['error']) ?>);
            })
        </script>
<?php
    unset($_SESSION['error']);
    endif;
?>  



<!-- <body class="nk-body bg-white npc-general pg-auth"> -->
<body class="nk-body bg-white npc-general pg-auth bg_img" style="background: url(assets/images/frontend/login_bg/1.jpg) no-repeat center center/cover">
     

    <div class="nk-app-root">
        <!-- main @s  -->
        <div class="nk-main ">
            <!-- wrap @s  -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s  -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="<?= URL ?>index.php" class="logo-link">
                                <img class="logo-light logo-img logo-img-lg" src="<?= URL ?>assets/images/logoIcon/logo.png" srcset="<?= URL ?>assets/images/logoIcon/logo.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="<?= URL ?>assets/images/logoIcon/logo1.png" srcset="<?= URL ?>assets/images/logoIcon/logo1.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">

                                    

                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title text-center"> - <span class="base--color">Login into Account</span></h4>
                                        <div class="nk-block-des">
                                            <p>Gain access into your account</p>

                                              <?php if (isset($_SESSION['register-success'])): ?>
                                                <div class="alert alert-dismissible alert-success fade show">
                                                    <button type="button" class="close" data-dismiss="alert"></button>
                                                    <?=
                                                        $_SESSION['register-success'];
                                                        unset($_SESSION['register-success']);
                                                    ?>
                                                </div>
                                            <?php endif ?>

                                            <?php if (isset($_SESSION['login'])): ?>
                                                <div class="alert alert-dismissible alert-danger fade show">
                                                    <button type="button" class="close" data-dismiss="alert"></button>
                                                    <?=
                                                        $_SESSION['login'];
                                                        unset($_SESSION['login']);
                                                    ?>
                                                </div>
                                            <?php endif ?>

                                        </div>
                                    </div>

                                </div>
                                <form action="<?= URL ?>loginlogic.php" method="POST"">
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Username or Email</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-lg" id="default-01" name="username_email" value="<?= $username_email ?>" placeholder="Username or Email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <a class="link link-primary link-sm" href="password/reset.php">Forgot Password?</a>
                                        </div>
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter password" minlength="6" data-msg-required="Required." data-msg-minlength="At least 6 chars." required>
                                        </div>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember"
                                        >
                                        <label class="custom-control-label" for="remember">Remember Me</label>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                                                                    </div>
                                    </div>
                                    <div class="form-note-s2 text-center pt-4">
    <!--    <link href="https://fonts.googleapis.com/css?family=Henny+Penny&amp;display=swap" rel="stylesheet"><div style="height: 46px; line-height: 46px; width:100%; text-align: center; background-color: #fff; color: #b85543; font-size: 26px; font-weight: bold; letter-spacing: 20px; font-family: 'Henny Penny', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;"><span style="    float:left;     -webkit-transform: rotate(40deg);">4</span><span style="    float:left;     -webkit-transform: rotate(3deg);">5</span><span style="    float:left;     -webkit-transform: rotate(-47deg);">3</span><span style="    float:left;     -webkit-transform: rotate(-58deg);">8</span><span style="    float:left;     -webkit-transform: rotate(-37deg);">2</span><span style="    float:left;     -webkit-transform: rotate(-5deg);">8</span></div><input type="hidden" name="captcha_secret" value="9c4796a22b08f6c557333c6f9993d7914a85f5beedd78b147246bb915cc4f279">    </div>-->
    <!--<br>-->

    <!--<div class="form-group">-->
    <!--    <input type="text" name="captcha" id="recaptcha-code" class="form-control" placeholder="Enter Captcha code" autocomplete="off" required>-->
    <!--</div>-->



                                    <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-dark btn-block" name="login">Login</button>
                                    </div>
                                </form>
                                <div class="form-note-s2 text-center pt-4"> Are you new? <a href="<?= URL ?>register.php">Open an account</a>
                                </div>
                                <!--<div class="text-center pt-4 pb-3">
                                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>
                                </div>
                                <ul class="nav justify-center gx-4">
                                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>
                                </ul>-->
                            </div>
                        </div>
                    </div>









                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="terms-and-conditions.php">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="privacy-policy.php">Privacy Policy</a>
                                        </li>

                                        <li class="nav-item">
                                            <div id="google_translate_element"></div>
                                            
                                        </li>

                                        
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">©2013-2023 <a href="index.php" class="base--color">Expert Capital</a>. All rights reserved.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e  -->
            </div>
            <!-- content @e  -->
        </div>
        <!-- main @e  -->
    </div>
    <!-- app-root @e  -->

    <!-- JavaScript -->
    <script src="assets/templates/bank/userend/js/bundle4250.js?ver=2.7.0"></script>
    
    <script src="assets/templates/bank/userend/js/scripts4250.js?ver=2.7.0"></script>
    
    
            <script>
      "use strict";
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
                return false;
            }
            return true;
        }
        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6c8e2399-8c94-4d3d-b12b-3f558ababbf9";(function(){d=document;s=d.createElement("script");s.src="../client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script><script async src="https://www.googletagmanager.com/gtag/js?id=------"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag("js", new Date());
                
                  gtag("config", "------");
                </script><script type="text/javascript" src="assets/wa/plugin/whatsapp-chat-support.js"></script>





        <div class="whatsapp_chat_support wcs_fixed_right" id="wa-efinance">
            <div class="wcs_button_label">
                    Need Answers?
                </div>  
            <div class="wcs_button wcs_button_circle">
                <img src="assets/wa/img/wa.png" alt="" width="100%">
            </div>  
        
            <div class="wcs_popup">
                <div class="wcs_popup_close">
                    <img src="assets/wa/img/close.png" alt="" width="25px">
                </div>
                <div class="wcs_popup_header">
                    <span class="twi-whatsapp"></span>
                    <br>
                    <strong>Customer Support</strong>
                    
                    <div class="wcs_popup_header_description">Need Assistance? Chat with us on Whatsapp</div>
                </div>

                <div 
                    class="wcs_popup_input" 
                    data-number="+1 (908) 257-5458"
                >
                    <input type="text" placeholder="Ask your question!" required="" />
                    <i class="fa fa-play"></i>
                </div>

                <div class="wcs_popup_avatar">
                    <img src="assets/wa/img/agent.png" alt="">
                </div>
            </div>
        </div>


        <script>
            $('#wa-efinance').whatsappChatSupport({
                defaultMsg : '',
            });
        </script>
<link rel="stylesheet" href="assets/global/css/iziToast.min.css">
<script src="assets/global/js/iziToast.min.js"></script>

<script>
    "use strict";
        function notify(status, message) {
            if(typeof message == 'string'){
                iziToast[status]({
                    message: message,
                    position: "topRight"
                });
            }else{
                $.each(message, function(i, val) {
                    iziToast[status]({
                        message: val,
                        position: "topRight"
                    });
                });
            }

        }
</script>




        <script type="text/javascript" src="assets/wa/plugin/components/moment/moment.min.js"></script>
        <script type="text/javascript" src="assets/wa/plugin/components/moment/moment-timezone-with-data.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('.passcode-switch');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the icon
            this.querySelector('em').classList.toggle('icon-hide');
            this.querySelector('em').classList.toggle('icon-show');
        });
    });
</script>
</body>
</html>