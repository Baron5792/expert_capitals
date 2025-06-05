<?php
    include __DIR__ . '/./database.php';
?>

<!DOCTYPE html>
<html lang="en">
	

	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title> Contact Us | Expert Capital </title>
        
        <meta name="csrf-token" content="AO2ua27JOmWhHxiFLXB9eZPcH5xriTErAYgCBNHz">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">

        
		<link rel="icon" type="image/png" href="assets/images/logoIcon/favicon.png">



		<link rel="stylesheet" href="assets/templates/bank/frontend/css/bootstrap.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/animate.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/themewar-font.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/quera-icon.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/owl.carousel.min.css">
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/jquery.datetimepicker.min.css">
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/nice-select.css">
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/lightcase.css">
		<link rel="stylesheet" type="text/css" href="assets/templates/bank/frontend/css/settings.css">
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/preset.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/ignore_for_wp.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/theme.css" />
		<link rel="stylesheet" href="assets/templates/bank/frontend/css/responsive.css" />




        
        <link rel="stylesheet" href="assets/wa/plugin/whatsapp-chat-support.css">


        <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>

        <script type="text/javascript" src="../translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>



        <link rel="stylesheet" href="assets/templates/bank/css/color1f2e.php?color=b85543&amp;secondColor=000000">


        
        <style>
    .capcha div{
        width: 100% !important;
    }
</style>

        <style>
            .centerImg {
                display: block;
                margin: 0 auto;
            }


            .cookie-modal {
                background: rgba(0, 0, 0, 0.9);
                position: fixed;
                bottom: -600px;
                width: 100%;
                padding: 30px 100px;
                transition: bottom 0.5s;
                z-index: 1000;
                color: #fff;
            }

            .bg-clr {
                /* background-color: #edfff5; */
                background-color: #f8f8f8;
            }


            .aboutIcontext {
                background: #f8f8f8;
                padding: 40px 0
            }

            .aboutIcontext .uk-container {
                margin: 0 auto
            }

            .aboutIcontext .about-image {
                float: left;
                width: 85px;
                height: 85px;
                position: relative;
                background: #81cdd0;
                border-radius: 50%
            }

            .aboutIcontext .about-image img {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%)
            }

            .aboutIcontext .about-text {
                float: left;
                width: calc(100% - 85px);
                padding: 0 70px 0 30px;
                font-size: 16px
            }

            .aboutIcontext .about-text h3 {
                font-size: 22px;
                padding-bottom: 10px;
                border-bottom: 1px solid #81cdd0;
                color: #26aae0;
                text-transform: capitalize;
                margin-top: 0
            }

            @media (max-width:1024px) {
                .aboutIcontext .about-text {
                    padding-right: 0
                }
            }

            @media (max-width:767px) {
                .aboutIcontext .uk-width-1-1 {
                    margin-bottom: 20px
                }
                .aboutIcontext .uk-width-1-1:last-child {
                    margin-bottom: 0
                }
                .aboutIcontext .about-text {
                    padding-left: 20px
                }
            }

            @media (max-width:479px) {
                .aboutIcontext .about-image {
                    width: 50px;
                    height: 50px;
                    padding: 5px
                }
                .aboutIcontext .about-image img {
                    width: 40px
                }
                .aboutIcontext .about-text {
                    width: calc(100% - 50px)
                }
            }
        </style>

	</head>
	<body>
		
    <header class="header03 isSticky">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="navbar01">
							<div class="logo">
								<a href="index.php"><img src="assets/images/logoIcon/f-logo2.png" alt="Expert Capital"></a>
							</div>
							<nav class="mainMenu">
								<ul>
									<li class="menu-item-has-children  ">
										<a href="#">The Expert</a>
										<ul class="sub-menu">
											<li><a href="who-we-are.php">About Us</a></li>
                                            
											<li class="menu-item-has-children">
												<a href="javascript:void(0);">Solutions</a>
												<ul class="sub-menu">
													<li><a href="financial-solutions.php">Financial</a></li>
													<li><a href="trading-solutions.php">Trading</a></li>
												</ul>
											</li>

                                            
											

										</ul>
									</li>

									<li class="menu-item-has-children  ">
										<a href="#">Account</a>
										<ul class="sub-menu">
											<li><a href="account/personal.php">Personal</a></li>
                                            <li><a href="account/savings.php">Savings</a></li>
                                            <li><a href="account/retirement.php">Retirement</a></li>
                                            <li><a href="account/joint.php">Joint</a></li>
                                            <li><a href="account/company.php">Company</a></li>
										</ul>
									</li>


                                    
									<li class="menu-item-has-children  ">
										<a href="citizenship-by-investment.php">Citizenship By Investment</a>
										<ul class="sub-menu">
											<li><a href="citizenship-by-investment.php">Citizenship By Investment</a></li>
                                            <li><a href="citizenship-by-investment/antigua-barbuda.php">Antigua & Barbuda</a></li>
                                            <li><a href="citizenship-by-investment/dominica.php">Dominica</a></li>
                                            <li><a href="citizenship-by-investment/grenada.php">Grenada</a></li>
                                            <li><a href="citizenship-by-investment/malta.php">Malta</a></li>
                                            <li><a href="citizenship-by-investment/montenegro.php">Montenegro</a></li>
                                            <li><a href="citizenship-by-investment/portugal.php">Portugal</a></li>
                                            <li><a href="citizenship-by-investment/saint-lucia.php">Saint Lucia</a></li>
                                            <li><a href="citizenship-by-investment/st-kitts-nevis.php">St. Kitts & Nevis</a></li>
                                            <li><a href="citizenship-by-investment/turkey.php">Turkey</a></li>
                                            <li><a href="citizenship-by-investment/united-kingdom.php">United Kingdom</a></li>
                                            <li><a href="citizenship-by-investment/vanuatu.php">Vanuatu</a></li>

										</ul>
									</li>


                                    
									<li><a href="news.php">News</a></li>

									
									
									<li><a href="mail-us.php">Contact Us</a></li>
								</ul>
							</nav>
                            <?php
                                if (isset($_SESSION['user'])) {
                            ?>
                                <div class="accessNav" style="display: none;">
                                    <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>&nbsp; &nbsp; &nbsp;
                                    <a href="login.php" class="userBtn"><i class="twi-user1"></i></a>

                                    <a href="register.php" class="qu_btn">Join</a>
                                </div>
                            <?php
                                }
                                else {
                            ?>  
                                    <div class="accessNav">
                                        <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>&nbsp; &nbsp; &nbsp;
                                        <a href="login.php" class="userBtn"><i class="twi-user1"></i></a>

                                        <a href="register.php" class="qu_btn">Join</a>
                                    </div>
                            <?php
                                }
                            ?>


							<div class="navleft">
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

        
		<section class="sidebarMenu">
			<div class="sidebarMenuOverlay"></div>
			<div class="SMArea">
				<div class="SMAHeader">
					<h3>
						<i class="twi-bars1"></i> Menu
					</h3>
					<a href="javascript:void(0);" class="SMACloser"><i class="twi-times2"></i></a>
				</div>
				<div class="SMABody">
					<ul>
						<li class="menu-item-has-children ">
							<a href="#">The Expert</a>
							<ul class="sub-menu">
								<li><a href="who-we-are.php">About Us</a></li>
                                
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Solutions</a>
                                    <ul class="sub-menu">
                                        <li><a href="financial-solutions.php">Financial</a></li>
                                        <li><a href="trading-solutions.php">Trading</a></li>
                                    </ul>
                                </li>
                                            
                                
                                

							</ul>
						</li>
                        
						
						<li class="menu-item-has-children ">
							<a href="#">Account</a>
							<ul class="sub-menu">
                                <li><a href="account/personal.php">Personal</a></li>
                                <li><a href="account/savings.php">Savings</a></li>
                                <li><a href="account/retirement.php">Retirement</a></li>
                                <li><a href="account/joint.php">Joint</a></li>
                                <li><a href="account/company.php">Company</a></li>
                                
							</ul>
						</li>


                        
                                    
                        <li class="menu-item-has-children  ">
                            <a href="#">Citizenship By Investment</a>
                            <ul class="sub-menu">
                                <li><a href="citizenship-by-investment.php">Citizenship By Investment</a></li>
                                <li><a href="citizenship-by-investment/antigua-barbuda.php">Antigua & Barbuda</a></li>
                                <li><a href="citizenship-by-investment/dominica.php">Dominica</a></li>
                                <li><a href="citizenship-by-investment/grenada.php">Grenada</a></li>
                                <li><a href="citizenship-by-investment/malta.php">Malta</a></li>
                                <li><a href="citizenship-by-investment/montenegro.php">Montenegro</a></li>
                                <li><a href="citizenship-by-investment/portugal.php">Portugal</a></li>
                                <li><a href="citizenship-by-investment/saint-lucia.php">Saint Lucia</a></li>
                                <li><a href="citizenship-by-investment/st-kitts-nevis.php">St. Kitts & Nevis</a></li>
                                <li><a href="citizenship-by-investment/turkey.php">Turkey</a></li>
                                <li><a href="citizenship-by-investment/united-kingdom.php">United Kingdom</a></li>
                                <li><a href="citizenship-by-investment/vanuatu.php">Vanuatu</a></li>

                            </ul>
                        </li>

                        
                        <li><a href="news.php">News</a></li>
						
                        
						

						
						<li><a href="mail-us.php">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</section>










        




<section class="page_banner" style="background-image: url('assets/templates/bank/frontend/images/bg/contact.jpg'); height: 100px;">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-8">
                <h2 class="banner-title">Contact Us</h2>
            </div>
            <div class="col-md-4 text-right">
                <p class="breadcrumbs"><a href="index.php" rel="v:url"><i class="twi-home-alt1"></i>Home</a><span>/</span>Contact Us</p>
            </div>
        </div>
    </div>
</section>

<section class="coniconboxPage">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-location-pin"></i></div>
                    <h3>Office:</h3>
                    
                    <p>
                        <a href="https://goo.gl/maps/Bj76i1UAezCitwjUA" target="_blank">
                        Uk - HEADQUARTERS<br>
                        Garnett Hall, Glasgow G4 0QG, United Kingdom.</a>
                    </p>
                    <br>


                    <p>
                        <a href="https://goo.gl/maps/sycMjHXNtazj9Pdy6" target="_blank">
                        Spain - Operations Branch <br>
                        C. de Londres, 22, 28028 Madrid, Spain</a>
                    </p>
                    <br>

                    <p>
                        <a href="https://goo.gl/maps/vsW2F7z65beji7ku9" target="_blank">
                            Hungary - Service Branch <br>
                            Székesfehérvár, Váralja sor 4, 8000 Hungary</a>
                    </p>
                    <br>

                    <p>
                        <a href="https://goo.gl/maps/LaMBWtW7tSJE2Sp76" target="_blank">
                            Serbia - Service Branch <br>
                            Hajduk Veljkova, Svilajnac 35210, Serbia</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-telephone"></i></div>
                    <h3>Call:</h3>
                    <p>+1 (908) 257-5458</p>
                    <p>Referrer to Whatsapp or support</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="icon_box_10">
                    <div class="ib_box"><i class="icons-envelope-1"></i></div>
                    <h3>Email:</h3>
                    <p><a>info@expert-capital.com</a><br> <a>support@expert-capital.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contactSection">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-8">
                <div class="appointment_form">
                    <p>Your email address will not be published*</p>
                    <h3>Send Us a Message</h3>
                    <?php
                        if (isset($_SESSION['user'])) {
                            $userId = $_SESSION['user']['id'];
                            $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                            if (mysqli_num_rows($query) > 0) {
                                $data = mysqli_fetch_assoc($query);
                                $name = $data['firstname'] . " " . $data['lastname'];
                                $email = $data['email'];
                            }
                        }
                        
                        else {
                            $name = "";
                            $email = "";
                            $userId = "unregistered";
                        }
                    ?>
                    
                    <!--alerts here-->
                    <?php if (isset($_SESSION['mail-success'])): ?>
                        <div class="alert alert-dismissible alert-success">
                            <?=
                                $_SESSION['mail-success'];
                                unset($_SESSION['mail-success']);
                            ?>
                        </div>
                    <?php endif ?>
                    
                    <?php if (isset($_SESSION['mail-error'])): ?>
                        <div class="alert alert-dismissible alert-danger">
                            <?=
                                $_SESSION['mail-error'];
                                unset($_SESSION['mail-error']);
                            ?>
                        </div>
                    <?php endif ?>
                    
                    
                    <form method="POST" action="<?= URL ?>mail-us-logic.php" id="contact-form" class="row">
                        <input type="hidden" value="<?= $userId ?>" name="userId">
                        <div class="input-field col-md-6">
                            <i class="twi-user2"></i>
                            <input class="required" type="text" name="name" id="name" value="<?= $name ?>" placeholder="Your Name *" required>
                        </div>
                        <div class="input-field col-md-6">
                            <i class="twi-envelope2"></i>
                            <input class="required" type="email" name="email" id="email" value="<?= $email ?>" placeholder="Your E-mail *" required>
                        </div>
                        <div class="input-field icRight col-md-12">
                            <select class="required" name="subject" id="subject" required>
                                <option value="" disabled>Select a Subject</option>
                                <option value="Enquiry">Enquiry</option>
                                <option value="Financial Advice">Financial Advice</option>
                                <option value="Account Issues">Account Issues</option>
                                <option value="Other Issues">Other Issues</option>
                            </select>
                        </div>
                        <div class="input-field col-md-12">
                            <i class="twi-pen2"></i>
                            <textarea class="required" name="message" required placeholder="Type Your Message"></textarea>
                        </div>
                        <div class="input-field col-md-12">
                        <div class="form-note-s2 text-center display-none pt-4">
                        <link href="https://fonts.googleapis.com/css?family=Henny+Penny&amp;display=swap" rel="stylesheet"><div style="height: 46px; line-height: 46px; width:100%; text-align: center; background-color: #fff; color: #b85543; font-size: 26px; font-weight: bold; letter-spacing: 20px; font-family: 'Henny Penny', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;"><span style="    float:left;     -webkit-transform: rotate(14deg);"></span><span style="    float:left;     -webkit-transform: rotate(-29deg);"></span><span style="    float:left;     -webkit-transform: rotate(-47deg);"></span><span style="    float:left;     -webkit-transform: rotate(55deg);"></span><span style="    float:left;     -webkit-transform: rotate(-55deg);"></span><span style="    float:left;     -webkit-transform: rotate(-45deg);"></span></div><input type="hidden" name="captcha_secret" value="7994330eabe79aa9925be755781f525bab6adf7ba7629977e93215231c42688e">    </div>
                        <br>
                    
                        <!--<div class="form-group">-->
                        <!--    <input type="number" name="captcha" id="recaptcha-code" class="form-control" placeholder="Enter Captcha code" autocomplete="off" required>-->
                        <!--</div>-->


                        </div>
                        <div class="input-field col-md-12">
                            <button type="submit" class="qu_btn" name="submit">Submit Now</button>
                            <div class="con_message"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chatNow">
                    <h4>Chat With Support</h4>
                    <p>Let’s chat our live experts to get answer your question</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>










        







        
        <footer class="footer_01">
            <div class="container largeContainer">

               

                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="aboutWidget" style="text-align: center">
                            
                            <img src="assets/images/logoIcon/f-logo2.png" alt="Expert Capital" style="display: block; margin: 0 auto;" width="200px">

                            <p>Expert Capital creates a smart, feasible and adaptive digital banking and finance atmosphere for our clients despite their supposed diverse circumstances.</p>

                            <hr>
                            
                            





                            

                            <span class="__cf_email__">info@expert-capital.com</span>
                            
                            <div style="text-align: center" id="google_translate_element"></div>
                            

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <div class="widget PL28">
                            <h3 class="widget_title">The Bank</h3>
                            <ul class="menu">
                                <li><a href="who-we-are.php">About Us</a></li>

                                <li><a href="careers.php">Careers</a></li>

                                <li><a href="islamic-banking.php">Islamic</a></li>

                                

                                                                    <li><a href="arbitrage.php">Arbitrage</a></li>
                                
                                                                    <li><a href="annuities-contract.php">Annuities</a></li>
                                
                                

                                                                    <li><a href="fixed-deposit-receipt.php">Fixed Deposit</a></li>
                                
                                                                    <li><a href="deposit-pension-scheme.php">Pension</a></li>
                                                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Explore</h3>
							<ul class="menu">
								<li><a href="affiliate.php">Affiliate</a></li>
								
								<li><a href="terms-and-conditions.php">Terms of Use</a></li>
                                
                                <li><a href="fraud-prevention.php">Fraud Prevention</a></li>
                                
                                <li><a href="mail-us.php">Contact Us</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Accounts</h3>
							<ul class="menu">
                                <li><a href="account/personal.php">Personal</a></li>
                                <li><a href="account/retirement.php">Retirement</a></li>
                                <li><a href="account/savings.php">Savings</a></li>
                                <li><a href="account/joint.php">Joint</a></li>
                                <li><a href="account/company.php">Company</a></li>
                                
							</ul>
						</div>
					</div>

					<div class="col-md-6 col-lg-3">
						<div class="widget PL28">
							<h3 class="widget_title">Catalogue</h3>
							<ul class="menu">
								<li><a href="assets/documents/Efinance_-_Risk_Warning_Notices.pdf">Risk Warning Notices</a></li>
                                <li><a href="assets/documents/E-Finance_-_Complaint_Handling_Policy.pdf">Complaint Handling Policy</a></li>
                                <li><a href="assets/documents/E-Finance_-_Conflicts_of_Interest_policy.pdf">Conflicts of Interest Policy</a></li>
                                
                                <li><a href="assets/documents/E-Finance-Annual_Financial_Statements_and_Reports-2021.pdf">2021 Annual Report</a></li>
                                <li><a href="assets/documents/E-Finance-Annual_Financial_Statements_and_Reports-2020.pdf">2020 Annual Report</a></li>
                                
                                
							</ul>
						</div>
					</div>

                    

                    

                </div>
            </div>



            <div class="text-center">
                <div class="abSocial">
                    <a href="https://t.me/+nlhk6g8-D3JmNTNh"><i class="twi-telegram"></i></a>
                    <a href="https://instagram.com/efinancebank.ltd"><i class="twi-instagram"></i></a>
                    <a href="https://youtube.com/channel/UCOM3IL2ztPCGXfbd2iAbnEg"><i class="twi-youtube"></i></a>
                    <a href="https://www.linkedin.com/company/efinance-bank"><i class="twi-linkedin"></i></a>
                </div>
                
                
            </div>
            
        </footer>
        <section class="fcopyright">
            <div class="container largeContainer">
                <div class="row">
                    <div class="col-md-6">
                        <p>©2013-2023 <a href="index.php" style="color:#fff">Expert Capital</a>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="copyMenu">
                            <ul>
                                <li><a href="privacy-policy.php">Privacy Policy </a></li>
                                <li><a href="cookie-policy.php"> Cookie Policy</a></li>
                                <li><a href="security-policy.php">Security Policy</a></li>
                                <li><a href="legal-notice.php">Legal Notice </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        
		<a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>

		
        <script src="assets/templates/bank/frontend/js/jquery.js"></script>
		<script src="assets/templates/bank/frontend/js/bootstrap.min.js"></script>
		<script src="assets/templates/bank/frontend/js/jquery.appear.js"></script>
		<script src="assets/templates/bank/frontend/js/owl.carousel.min.js"></script>
		<script src="assets/templates/bank/frontend/js/shuffle.min.js"></script>
		<script src="assets/templates/bank/frontend/js/nice-select.js"></script>
		<script src="assets/templates/bank/frontend/js/lightcase.js"></script>
		<script src="assets/templates/bank/frontend/js/jquery.datetimepicker.full.min.js"></script>
		<script src="assets/templates/bank/frontend/js/circle-progress.js"></script>
		<script src="assets/templates/bank/frontend/js/gmaps.js"></script>
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
		<script src="assets/templates/bank/frontend/js/jquery.themepunch.tools.min.js"></script>
		<script src="assets/templates/bank/frontend/js/jquery.themepunch.revolution.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.actions.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.carousel.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.migration.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.navigation.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.parallax.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script src="assets/templates/bank/frontend/js/extensions/revolution.extension.video.min.js"></script>
		<script src="assets/templates/bank/frontend/js/theme.js"></script>




        
        
        
        <link rel="stylesheet" href="assets/templates/bank/css/cookie.css">

        
        


    
    
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
    <script>
        "use strict";
        (function ($) {


            

            $(".langSel").on("change", function() {
                window.location.href = "https://e-financebank.co/change/"+$(this).val();
            });

            let myModal = document.getElementById('cookieModal');
                            myModal.classList.remove('show');
            
            $('.cookie-modal .close-btn').on('click', function(){
                $('#cookieModal').removeClass('show');
            });
            

            $('.cookie-accept').on('click', function(){
                $.get("cookie/accept.json",
                    function (response) {
                        if(response.success){
                            notify('success', response.success);
                            $('#cookieModal').removeClass('show');
                        }
                    }
                );
            });

        })(jQuery);
    </script>


        <script>
            (function ($) {
                "use strict";
                var form = $("#subscribeForm");
                form.on('submit', function (e) {
                    e.preventDefault();
                    var data = form.serialize();
                    $.ajax({
                        url: `https://e-financebank.co/subscribe`,
                        method: 'post',
                        data: data,
                        success: function (response) {
                            if (response.success) {
                                form.find('input[name=email]').val('');
                                notify('success', response.message);
                            }else{
                                notify('error', response.error);
                            }
                        }
                    });
                });

            })(jQuery);
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




	</body>
    

    </html>