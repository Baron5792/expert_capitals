<?php
    include __DIR__ . '/../database.php';
   
    
    if (isset($_GET['reset'])) {
        $id = $_GET['reset'];
        
        $query = mysqli_query($connection, "SELECT * FROM reset WHERE uniqId= '$id' ORDER BY date DESC LIMIT 1");
        
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            $email = $row["email"];
            $code = $row['code'];
            $user_id = $row['user_id'];
            
            // Split the email into local part and domain
            $email_parts = explode('@', $email);
    
            // Get the local part (before @)
            $local_part = $email_parts[0];
    
            // Get the first 2 letters and the last 2 letters of the local part
            $first_two_letters = substr($local_part, 0, 2);
            $last_two_letters = substr($local_part, -2);
    
            // Replace the remaining letters with *
            $hidden_local_part = str_repeat('*', strlen($local_part) - 4);
            $displayed_email = $first_two_letters . $hidden_local_part . $last_two_letters . '@' . $email_parts[1];
    
        }
    }    
?>

<!DOCTYPE html>
<html lang="en" class="js">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="AO2ua27JOmWhHxiFLXB9eZPcH5xriTErAYgCBNHz">

    <!-- Fav Icon  -->
    <title> Forgot Password | Expert Capitals ]</title>
    
    
    <meta name="description" content="Expert Capital is a licensed and supervised digital bank providing a seamless, secure and easy-to-use bridge between digital and traditional assets.">
    <meta name="keywords" content="bank,e-banking,digital banking,digital bank,laon,deposit,fdr,dps,arbitrage,annuity,islamic banking,halal,deposit pension,fixed deposit,annuities contract,annuities">
    <link rel="shortcut icon" href="<?= URL ?>assets/images/logoIcon/favicon.png" type="image/x-icon">

    
    <link rel="apple-touch-icon" href="<?= URL ?>assets/images/logoIcon/logo.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="E-Finance Bank - Forgot Password">

    
    <meta itemprop="name" content="Expert Capital - Forgot Password">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="<?= URL ?>assets/images/seo/61dcdaa9a49c71641863849.png">

    
    <meta property="og:type" content="website">
    <meta property="og:title" content="Expert Capital">
    <meta property="og:description" content="Expert Capital is a licensed and supervised digital bank providing a seamless, secure and easy-to-use bridge between digital and traditional assets.">
    <meta property="og:image" content="<?= URL ?>assets/images/seo/61dcdaa9a49c71641863849.png"/>
    <meta property="og:image:type" content="image/png" />
        <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="315" />
    <meta property="og:url" content="reset.php">
    
    
    <meta name="twitter:card" content="summary_large_image">

    <link rel="shortcut icon" href="<?= URL ?>assets/images/logoIcon/favicon.png" type="image/x-icon">

    <!-- Page Title  -->
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="<?= URL ?>assets/templates/bank/userend/css/apps4250.css?ver=2.7.0">
    

    
    
    <style type="text/css">
        .base--color {
            color: #b95441 !important;
        }
    </style>



        
    <link rel="stylesheet" href="<?= URL ?>assets/wa/plugin/whatsapp-chat-support.css">

    
    <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
    </script>
    
</head>






<!-- <body class="nk-body bg-white npc-general pg-auth"> -->
<body class="nk-body bg-white npc-general pg-auth bg_img" style="background: url(<?= URL ?>assets/images/frontend/login_bg/1.jpg) no-repeat center center/cover">
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
                                <img class="logo-light logo-img logo-img-lg" src="<?= URL ?>assets/images/logoIcon/logo.png" srcset="https://e-financebank.co/assets/images/logoIcon/logo.png 2x" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="<?= URL ?>assets/images/logoIcon/logo1.png" srcset="<?= URL ?>assets/images/logoIcon/logo1.png 2x" alt="logo-dark">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title text-center"> - <span class="base--color">Enter Verifcation Code</span> </h4>
                                        <div class="nk-block-des">
                                            <p>We've sent a verification code to  <span class="base--color"><?= $displayed_email ?></span></p>
                                            <?php if (isset($_SESSION['email'])): ?>
                                                <div>
                                                    <p style="color:red">
                                                        <?=
                                                            $_SESSION['email'];
                                                            unset($_SESSION['email']);
                                                        ?>
                                                    </p>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                                <form action="<?= URL ?>password/email-logic.php" method="POST">
                                	<!--for email-->
                                	<input type="hidden" name="id" value="<?= $user_id ?>">

                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email Verification Code</label>
                                        </div>
                                        <div class="form-control-wrap">
                                            

                                            <input type="text" class="form-control form-control-lg " id="value" name="value" value="" required autofocus="off" placeholder="Enter your Email Verification Code" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-dark btn-block" name="email">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>









                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">
                                <div class="col-lg-6 order-lg-last">
                                    <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= URL ?>terms-and-conditions.php">Terms & Condition</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= URL ?>privacy-policy.php">Privacy Policy</a>
                                        </li>

                                        <li class="nav-item">
                                            <div id="google_translate_element"></div>
                                            
                                        </li>

                                        
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">©2013-2023 <a href="<?= URL ?>index.php" class="base--color">Expert Capital</a>. All rights reserved.</p>
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
    <script src="<?= URL ?>assets/templates/bank/userend/js/bundle4250.js?ver=2.7.0"></script>
    
    <script src="<?= URL ?>assets/templates/bank/userend/js/scripts4250.js?ver=2.7.0"></script>
    
    
        <script>

    (function($){
        "use strict";

        myVal();
        $('select[name=type]').on('change',function(){
            myVal();
        });
        function myVal(){
            $('.my_value').text($('select[name=type] :selected').text());
        }
    })(jQuery)
</script>
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6c8e2399-8c94-4d3d-b12b-3f558ababbf9";(function(){d=document;s=d.createElement("script");s.src="../../client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script><script async src="https://www.googletagmanager.com/gtag/js?id=------"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag("js", new Date());
                
                  gtag("config", "------");
                </script><script type="text/javascript" src="<?= URL ?>assets/wa/plugin/whatsapp-chat-support.js"></script>





        <div class="whatsapp_chat_support wcs_fixed_right" id="wa-efinance">
            <div class="wcs_button_label">
                    Need Answers?
                </div>  
            <div class="wcs_button wcs_button_circle">
                <img src="<?= URL ?>assets/wa/img/wa.png" alt="" width="100%">
            </div>  
        
            <div class="wcs_popup">
                <div class="wcs_popup_close">
                    <img src="<?= URL ?>assets/wa/img/close.png" alt="" width="25px">
                </div>
                <div class="wcs_popup_header">
                    <span class="twi-whatsapp"></span>
                    <br>
                    <strong>Customer Support</strong>
                    
                    <div class="wcs_popup_header_description">Need Assistance? Chat with us on Whatsapp</div>
                </div>

                <div 
                    class="wcs_popup_input" 
                    data-number="+441420467415"
                >
                    <input type="text" placeholder="Ask your question!" required="" />
                    <i class="fa fa-play"></i>
                </div>

                <div class="wcs_popup_avatar">
                    <img src="<?= URL ?>assets/wa/img/agent.png" alt="">
                </div>
            </div>
        </div>


        <script>
            $('#wa-efinance').whatsappChatSupport({
                defaultMsg : '',
            });
        </script>
<link rel="stylesheet" href="<?= URL ?>assets/global/css/iziToast.min.css">
<script src="<?= URL ?>assets/global/js/iziToast.min.js"></script>

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




        <script type="text/javascript" src="<?= URL ?>assets/wa/plugin/components/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?= URL ?>assets/wa/plugin/components/moment/moment-timezone-with-data.min.js"></script>

</body>


</html>