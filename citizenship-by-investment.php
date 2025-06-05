<?php
    include __DIR__ . '/./database.php';
?>

<!DOCTYPE html>
<html lang="en">
	

	

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title> Citizenship By Investment | Expert Capital </title>
        
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



        <link rel="stylesheet" href="assets/templates/bank/css/color1f2e.html?color=b85543&amp;secondColor=000000">


        
        
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
								<a href="index.php"><img src="<?= URL ?>assets/images/logoIcon/f-logo2.png" alt="Expert Capital"></a>
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
								<li><a href="who-we-are.html">About Us</a></li>
                                
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Solutions</a>
                                    <ul class="sub-menu">
                                        <li><a href="financial-solutions.html">Financial</a></li>
                                        <li><a href="trading-solutions.html">Trading</a></li>
                                    </ul>
                                </li>
                                            
                                
                                

							</ul>
						</li>
                        
						
						<li class="menu-item-has-children ">
							<a href="#">Account</a>
							<ul class="sub-menu">
                                <li><a href="account/personal.html">Personal</a></li>
                                <li><a href="account/savings.html">Savings</a></li>
                                <li><a href="account/retirement.html">Retirement</a></li>
                                <li><a href="account/joint.html">Joint</a></li>
                                <li><a href="account/company.html">Company</a></li>
                                
							</ul>
						</li>


                        
                                    
                        <li class="menu-item-has-children   current-menu-item">
                            <a href="#">Citizenship By Investment</a>
                            <ul class="sub-menu">
                                <li><a href="citizenship-by-investment.html">Citizenship By Investment</a></li>
                                <li><a href="citizenship-by-investment/antigua-barbuda.html">Antigua & Barbuda</a></li>
                                <li><a href="citizenship-by-investment/dominica.html">Dominica</a></li>
                                <li><a href="citizenship-by-investment/grenada.html">Grenada</a></li>
                                <li><a href="citizenship-by-investment/malta.html">Malta</a></li>
                                <li><a href="citizenship-by-investment/montenegro.html">Montenegro</a></li>
                                <li><a href="citizenship-by-investment/portugal.html">Portugal</a></li>
                                <li><a href="citizenship-by-investment/saint-lucia.html">Saint Lucia</a></li>
                                <li><a href="citizenship-by-investment/st-kitts-nevis.html">St. Kitts & Nevis</a></li>
                                <li><a href="citizenship-by-investment/turkey.html">Turkey</a></li>
                                <li><a href="citizenship-by-investment/united-kingdom.html">United Kingdom</a></li>
                                <li><a href="citizenship-by-investment/vanuatu.html">Vanuatu</a></li>

                            </ul>
                        </li>

                        
                        <li><a href="news.html">News</a></li>
						
                        
						

						
						<li><a href="mail-us.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</section>










        

<section class="page_banner" style="background-image: url('assets/templates/bank/frontend/images/bg/citizenship.png'); height: 100px;">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-8">
                <h2 class="banner-title">Citizenship By Investment</h2>
            </div>
            <div class="col-md-4 text-right">
                <p class="breadcrumbs"><a href="index.html" rel="v:url"><i class="twi-home-alt1"></i>Home</a><span>/</span>Citizenship By Investment</p>
            </div>
        </div>
    </div>
</section>
<style>
    b {
        color: #c95f3f;
    }
</style>
<section class="aboutSection04" style="padding: 120px 0 120px;">
    <div class="container">

        <h5><b>Citizenship by Investment </b></h5>
        <p>Citizenship by Investment (CBI) programs offer successful people the opportunity to legally acquire a new citizenship within a short period of time and without any disruptions to their lives.</p>
        <p> </p>
        <p>The program offers an expedited citizenship process to foreign investors in exchange for a one-time economic contribution to the development of the country, such as buying a property or making a substantial donation/contribution to the Government fund.</p>
        <p> </p>
        <p> Though the prerequisite under which the status of naturalization is granted varies from state to state, quite a number of developing countries have introduced citizenship-by-investment programs to offer a direct route to citizenship for high net worth individuals looking for a way to access certain universal opportunities or global citizenship. Such countries include: Antigua and Barbuda, Cyprus, Dominica, Grenada, Malta, and St. Kitts and Nevis, St. Lucia and several others.</p>

        <br><br>


        <p>
            <img src="assets/templates/bank/frontend/images/pages/citizenship/passport.jpg" alt="" loading="lazy" srcset="https://e-financebank.co/assets/templates/bank/frontend/images/pages/citizenship/passport.jpg" width="100%"/>
        </p>

        <br><br>

        <h5>
            <span style="font-size: 14px; font-weight: 400;">
                The first modern citizenship by investment program was introduced by St Kitts and Nevis in 1983. The number has gradually increased since then and more than 10 countries have enshrined this program into their constitution today. Presently the Citizenship by Investment industry is estimated to be worth $5 billion annually. Most Caribbean countries offering the program have used the proceeds for disaster recovery and rebuilding
            </span>
        </h5>

        <br>


        <h5 style="color: #ea6f43; text-align: start;"><strong><span style="font-size: 14px;">Second citizenship</span></strong></h5>
        <h5>
            <span style="font-size: 14px; font-weight: 400;">
                Second citizenship or dual citizenship offers you a key to a better future for your family and your business with more opportunities opening up in terms of healthcare, security, business, education and global mobility in general.
            </span>
        </h5>

        <br>

        <h5>
            <span style="font-size: 14px; font-weight: 400; letter-spacing: -0.01em; text-align: inherit;">
                It offers a plethora of citizenship solutions for investors, frequent travelers, corporate professionals and all successful people in search of better opportunities and safety.
            </span>
            <span style="font-size: 14px; font-weight: 400; letter-spacing: -0.01em; text-align: inherit;">.</span>
        </h5>

        <br>

        <h5><span style="font-size: 14px; font-weight: 400;"> </span></h5>

        
        <h5 style="color: #ea6f43; text-align: start;"><span style="font-size: 14px;">Explore Our Citizenship by Investment Programmes</span></h5>



        <div class="row">

            <div class="col-3">
                <a href="citizenship-by-investment/antigua-barbuda.html" class="btn btn-info">Antigua & Barbuda</a>
            </div>

            
            <div class="col-3">
                <a href="citizenship-by-investment/dominica.html" class="btn btn-info">Dominica</a>
            </div>
            
            <div class="col-3">
                <a href="citizenship-by-investment/grenada.html" class="btn btn-info">Grenada</a>
            </div>
            
            <div class="col-3">
                <a href="citizenship-by-investment/malta.html" class="btn btn-info">Malta</a>
            </div>

        </div>

        <br>
            
        
        <div class="row">

            <div class="col-3">
                <a href="citizenship-by-investment/montenegro.html" class="btn btn-info">Montenegro</a>
            </div>

            <div class="col-3">
                <a href="citizenship-by-investment/portugal.html" class="btn btn-info">Portugal</a>
            </div>

            <div class="col-3">
                <a href="citizenship-by-investment/saint-lucia.html" class="btn btn-info">Saint Lucia</a>
            </div>

            <div class="col-3">
                <a href="citizenship-by-investment/st-kitts-nevis.html" class="btn btn-info">St. Kitts & Nevis</a>
            </div>

        </div>

        <br>
            
        
        <div class="row">

            <div class="col-3">
                <a href="citizenship-by-investment/turkey.html" class="btn btn-info">Turkey</a>
            </div>

            <div class="col-3">
                <a href="citizenship-by-investment/united-kingdom.html" class="btn btn-info">United Kingdom</a>
            </div>

            <div class="col-3">
                <a href="citizenship-by-investment/vanuatu.html" class="btn btn-info">Vanuatu</a>
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
                            <h3 class="widget_title">The Expert</h3>
                            <ul class="menu">
                                <li><a href="who-we-are.html">About Us</a></li>

                                <li><a href="careers.html">Careers</a></li>

                                <li><a href="islamic-banking.html">Islamic</a></li>

                                

                                                                    <li><a href="arbitrage.html">Arbitrage</a></li>
                                
                                                                    <li><a href="annuities-contract.html">Annuities</a></li>
                                
                                

                                                                    <li><a href="fixed-deposit-receipt.html">Fixed Deposit</a></li>
                                
                                                                    <li><a href="deposit-pension-scheme.html">Pension</a></li>
                                                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Explore</h3>
							<ul class="menu">
								<li><a href="affiliate.html">Affiliate</a></li>
								
								<li><a href="terms-and-conditions.html">Terms of Use</a></li>
                                
                                <li><a href="fraud-prevention.html">Fraud Prevention</a></li>
                                
                                <li><a href="mail-us.html">Contact Us</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Accounts</h3>
							<ul class="menu">
                                <li><a href="account/personal.html">Personal</a></li>
                                <li><a href="account/retirement.html">Retirement</a></li>
                                <li><a href="account/savings.html">Savings</a></li>
                                <li><a href="account/joint.html">Joint</a></li>
                                <li><a href="account/company.html">Company</a></li>
                                
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
                        <p>©2013-2023 <a href="index.html" style="color:#fff">Expert Capital</a>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="copyMenu">
                            <ul>
                                <li><a href="privacy-policy.html">Privacy Policy </a></li>
                                <li><a href="cookie-policy.html"> Cookie Policy</a></li>
                                <li><a href="security-policy.html">Security Policy</a></li>
                                <li><a href="legal-notice.html">Legal Notice </a></li>
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