<?php
    include __DIR__ . '/../database.php';
?>
<!DOCTYPE html>
<html lang="en">
	

	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
		<title> Turkey | Expert Capital </title>
        
        <meta name="csrf-token" content="AO2ua27JOmWhHxiFLXB9eZPcH5xriTErAYgCBNHz">

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">

        
		<link rel="icon" type="image/png" href="<?= URL ?>assets/images/logoIcon/favicon.png">



		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/bootstrap.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/animate.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/themewar-font.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/quera-icon.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/jquery.datetimepicker.min.css">
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/nice-select.css">
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/lightcase.css">
		<link rel="stylesheet" type="text/css" href="<?= URL ?>assets/templates/bank/frontend/css/settings.css">
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/preset.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/ignore_for_wp.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/theme.css" />
		<link rel="stylesheet" href="<?= URL ?>assets/templates/bank/frontend/css/responsive.css" />




        
        <link rel="stylesheet" href="<?= URL ?>assets/wa/plugin/whatsapp-chat-support.css">


        <script type="text/javascript">
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        // new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>

        <script type="text/javascript" src="<?= URL ?><?= URL ?>translate.google.com/translate_a/elementa0d8.js?cb=googleTranslateElementInit"></script>



        <link rel="stylesheet" href="<?= URL ?>assets/templates/bank/css/color1f2e.html?color=b85543&amp;secondColor=000000">


        
        
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
								<a href="index.php"><img src="<?= URL ?>assets/images/logoIcon/f-logo2.png" alt="E-Finance"></a>
							</div>
							<nav class="mainMenu">
								<ul>
									<li class="menu-item-has-children  ">
										<a href="#">The Bank</a>
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
										<a href="<?= URL ?>citizenship-by-investment.php">Citizenship By Investment</a>
										<ul class="sub-menu">
											<li><a href="<?= URL ?>citizenship-by-investment.php">Citizenship By Investment</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/antigua-barbuda.php">Antigua & Barbuda</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/dominica.php">Dominica</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/grenada.php">Grenada</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/malta.php">Malta</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/montenegro.php">Montenegro</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/portugal.php">Portugal</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/saint-lucia.php">Saint Lucia</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/st-kitts-nevis.php">St. Kitts & Nevis</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/turkey.php">Turkey</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/united-kingdom.php">United Kingdom</a></li>
                                            <li><a href="<?= URL ?>citizenship-by-investment/vanuatu.php">Vanuatu</a></li>

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

                                    <a href="register.php" class="qu_btn">E-Banking</a>
                                </div>
                            <?php
                                }
                                else {
                            ?>  
                                    <div class="accessNav">
                                        <a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>&nbsp; &nbsp; &nbsp;
                                        <a href="login.php" class="userBtn"><i class="twi-user1"></i></a>

                                        <a href="register.php" class="qu_btn">E-Banking</a>
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
							<a href="#">The Bank</a>
							<ul class="sub-menu">
								<li><a href="<?= URL ?>who-we-are.php">About Us</a></li>
                                
                                <li class="menu-item-has-children">
                                    <a href="javascript:void(0);">Solutions</a>
                                    <ul class="sub-menu">
                                        <li><a href="<?= URL ?>financial-solutions.php">Financial</a></li>
                                        <li><a href="<?= URL ?>trading-solutions.php">Trading</a></li>
                                    </ul>
                                </li>
                                            
                                
                                

							</ul>
						</li>
                        
						
						<li class="menu-item-has-children ">
							<a href="#">Account</a>
							<ul class="sub-menu">
                                <li><a href="<?= URL ?>account/personal.php">Personal</a></li>
                                <li><a href="<?= URL ?>account/savings.php">Savings</a></li>
                                <li><a href="<?= URL ?>account/retirement.php">Retirement</a></li>
                                <li><a href="<?= URL ?>account/joint.php">Joint</a></li>
                                <li><a href="<?= URL ?>account/company.php">Company</a></li>
                                
							</ul>
						</li>


                        
                                    
                        <li class="menu-item-has-children   current-menu-item">
                            <a href="#">Citizenship By Investment</a>
                            <ul class="sub-menu">
                                <li><a href="<?= URL ?>citizenship-by-investment.php">Citizenship By Investment</a></li>
                                <li><a href="antigua-barbuda.php">Antigua & Barbuda</a></li>
                                <li><a href="dominica.php">Dominica</a></li>
                                <li><a href="grenada.php">Grenada</a></li>
                                <li><a href="malta.php">Malta</a></li>
                                <li><a href="montenegro.php">Montenegro</a></li>
                                <li><a href="portugal.php">Portugal</a></li>
                                <li><a href="saint-lucia.php">Saint Lucia</a></li>
                                <li><a href="st-kitts-nevis.php">St. Kitts & Nevis</a></li>
                                <li><a href="turkey.php">Turkey</a></li>
                                <li><a href="united-kingdom.php">United Kingdom</a></li>
                                <li><a href="vanuatu.php">Vanuatu</a></li>

                            </ul>
                        </li>

                        
                        <li><a href="<?= URL ?>news.php">News</a></li>
						
                        
						

						
						<li><a href="<?= URL ?>mail-us.php">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</section>










        

<section class="page_banner" style="background-image: url('<?= URL ?>assets/templates/bank/frontend/images/bg/citizenship.png'); height: 100px;">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-md-8">
                <h2 class="banner-title">Turkey</h2>
            </div>
            <div class="col-md-4 text-right">
                <p class="breadcrumbs">
                    <a href="<?= URL ?>index.php" rel="v:url"><i class="twi-home-alt1"></i>Home</a>
                    <span>/</span>
                    <a href="<?= URL ?>citizenship-by-investment.php">Citizenship By Investment</a>
                    <span>/</span>
                        Turkey
                </p>
            </div>
        </div>
    </div>
</section>


<section class="aboutSection04" style="padding: 120px 0 120px;">
    <div class="container">

        
        <h4><strong style="color: #ea6f43; letter-spacing: 1.5px; font-weight: 500;">From €250,000</strong></h4>
        <br>
        <p><strong style="color: #ea6f43;">110 Countries & Territories</strong></p>

        <p>
            Turkey is a transcontinental Eurasian country located on the Bosphorus Strait, on the Anatolian peninsula in Western Asia, with a smaller portion on the Balkan peninsula in Southeastern Europe. This significant geographic location makes Turkey a go-to destination for investors aiming to enjoy the incredible benefits of operating a business in Europe while directly harnessing the potentials of the vast consumer-base in Asia.
        </p>
        <br><br>

        
        <h4><strong style="color: #ea6f43; letter-spacing: 1.5px; font-weight: 500;">Citizenship by Investment </strong></h4>
        <p>
            The Turkish Citizenship-by-Investment Program was launched in January 2017 with the aim of attracting foreign direct investment to the overall development of the country’s economy, with special emphasis on the country’s real estate market.
        </p>
        <p>
            Turkey’s economic and social development performance has been impressive since 2000. According to the World Bank, the country’s economic growth is leading to increased employment and incomes and making Turkey an upper-middle-income country. There are several benefits of having a Turkey Second Citizen passport. Some of them include:
        </p>
        <ul style="line-height: 1.7; margin-bottom: 15px;   font-size: 15px">
            <li>Visa-free or visa-on-arrival access to 111 destinations including Hong Kong, Japan, and Singapore.</li>
            <li>Citizenship of a country that enjoys a mild Mediterranean climate, beautiful scenery, and a high standard of living.</li>
            <li>Full citizenship granted to the applicant<br>Inclusion of Family Members.</li>
            <li>Eligibility for an E-2 Investor Visa in the USA for a five-year renewable period.</li>
        </ul>

        <ul style="line-height: 1.7; margin-bottom: 15px;   font-size: 15px">
            <li>In addition, Turkish citizens can apply directly for a US green card (permanent residency) if the investments are bigger than $900,000 for rural areas and $1,800,000 for all others.</li>
            <li>Other business visas such as EB-1, O-1, and L-1 are also available for Turkish citizens</li>
            <li>Ankara agreement &amp; Turkish Business person Visa allows Turkish citizens to: start a new business in the UK, work in the UK, &amp; apply to settle in the UK permanently and bring family (‘dependants’) with themselves.</li>
            <li>Access to a transcontinental Eurasian country that is a stable economic, financial, and political hub between Europe, Western Asia, and the Middle East</li>
            <li>The main applicant may include their spouse, dependent children below the age of 18, and children of any age who are living with disabilities in their application.</li>
        </ul>
        <br><br>

        
        <h4><strong style="color: #ea6f43; letter-spacing: 1.5px; font-weight: 500;">QUALIFICATIONS </strong></h4>
        <p>
            To qualify for citizenship, the main applicant should fulfil one of the following investment requirements:
        </p>

        <ul style="line-height: 1.7; margin-bottom: 15px;   font-size: 15px">
            <li>Acquire at least $250,000 worth of real estate.</li>
            <li>Invest a minimum of $500,000 fixed capital contribution.</li>
            <li>Deposit at least $500,000 into a Turkish bank account.</li>
            <li>Commit at least $500,000 into government bonds.</li>
            <li>Commit at least $500,000 into real estate investment fund share or venture capital investment fund share.</li>
            <li>Create jobs for at least 50 people, as attested by the Ministry of Family, Labour and Social Services.</li>
        </ul>
        <br><br>



        <p>Apply with us to secure second citizenship that suits your goals and objectives.</p>

        <form method="post" action="https://efinancebank.co/citizenship-by-investment/apply" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="AO2ua27JOmWhHxiFLXB9eZPcH5xriTErAYgCBNHz">            

            <input type="hidden" name="citizenship" value="Turkey">

            <button type="submit" class="btn-lg btn-success">APPLY TODAY</button>
        </form>
        
        
    </div>
</section>




        







        
        <footer class="footer_01">
            <div class="container largeContainer">

               

                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="aboutWidget" style="text-align: center">
                            
                            <img src="<?= URL ?>assets/images/logoIcon/f-logo2.png" alt="E-Finance" style="display: block; margin: 0 auto;" width="200px">

                            <p>E-Finance creates a smart, feasible and adaptive digital banking and finance atmosphere for our clients despite their supposed diverse circumstances.</p>

                            <hr>
                            
                            

                            <p>
                                HeadQuarters
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.9850320323185!2d-4.2390465!3d55.862926099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488847c54481c531%3A0xde8d5d5c98f7b950!2sEfinancebanks%20HQ!5e0!3m2!1sen!2sng!4v1655388250987!5m2!1sen!2sng" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </p>




                            

                            <span class="__cf_email__">info@e-financebank.co</span>
                            
                            <div style="text-align: center" id="google_translate_element"></div>
                            

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <div class="widget PL28">
                            <h3 class="widget_title">The Bank</h3>
                            <ul class="menu">
                                <li><a href="<?= URL ?>who-we-are.php">About Us</a></li>

                                <li><a href="<?= URL ?>careers.php">Careers</a></li>

                                <li><a href="<?= URL ?>islamic-banking.php">Islamic</a></li>

                                

                                                                    <li><a href="<?= URL ?>arbitrage.php">Arbitrage</a></li>
                                
                                                                    <li><a href="<?= URL ?>annuities-contract.php">Annuities</a></li>
                                
                                

                                                                    <li><a href="<?= URL ?>fixed-deposit-receipt.php">Fixed Deposit</a></li>
                                
                                                                    <li><a href="<?= URL ?>deposit-pension-scheme.php">Pension</a></li>
                                                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Explore</h3>
							<ul class="menu">
								<li><a href="<?= URL ?>affiliate.php">Affiliate</a></li>
								
								<li><a href="<?= URL ?>terms-and-conditions.php">Terms of Use</a></li>
                                
                                <li><a href="<?= URL ?>fraud-prevention.php">Fraud Prevention</a></li>
                                
                                <li><a href="<?= URL ?>mail-us.php">Contact Us</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-6 col-lg-2">
						<div class="widget PL28">
							<h3 class="widget_title">Accounts</h3>
							<ul class="menu">
                                <li><a href="<?= URL ?>account/personal.php">Personal</a></li>
                                <li><a href="<?= URL ?>account/retirement.php">Retirement</a></li>
                                <li><a href="<?= URL ?>account/savings.php">Savings</a></li>
                                <li><a href="<?= URL ?>account/joint.php">Joint</a></li>
                                <li><a href="<?= URL ?>account/company.php">Company</a></li>
                                
							</ul>
						</div>
					</div>

					<div class="col-md-6 col-lg-3">
						<div class="widget PL28">
							<h3 class="widget_title">Catalogue</h3>
							<ul class="menu">
								<li><a href="<?= URL ?>assets/documents/Efinance_-_Risk_Warning_Notices.pdf">Risk Warning Notices</a></li>
                                <li><a href="<?= URL ?>assets/documents/E-Finance_-_Complaint_Handling_Policy.pdf">Complaint Handling Policy</a></li>
                                <li><a href="<?= URL ?>assets/documents/E-Finance_-_Conflicts_of_Interest_policy.pdf">Conflicts of Interest Policy</a></li>
                                
                                <li><a href="<?= URL ?>assets/documents/E-Finance-Annual_Financial_Statements_and_Reports-2021.pdf">2021 Annual Report</a></li>
                                <li><a href="<?= URL ?>assets/documents/E-Finance-Annual_Financial_Statements_and_Reports-2020.pdf">2020 Annual Report</a></li>
                                
                                
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
                        <p>©2013-2023 <a href="<?= URL ?>index.php" style="color:#fff">E-Finance Bank</a>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="copyMenu">
                            <ul>
                                <li><a href="<?= URL ?>privacy-policy.php">Privacy Policy </a></li>
                                <li><a href="<?= URL ?>cookie-policy.php"> Cookie Policy</a></li>
                                <li><a href="<?= URL ?>security-policy.php">Security Policy</a></li>
                                <li><a href="<?= URL ?>legal-notice.php">Legal Notice </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        
		<a href="javascript:void(0);" id="backtotop"><i class="twi-arrow-to-top1"></i></a>

		
        <script src="<?= URL ?>assets/templates/bank/frontend/js/jquery.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/bootstrap.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/jquery.appear.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/owl.carousel.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/shuffle.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/nice-select.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/lightcase.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/jquery.datetimepicker.full.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/circle-progress.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/gmaps.js"></script>
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyBJtPMZ_LWZKuHTLq5o08KSncQufIhPU3o"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.actions.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.carousel.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.kenburn.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.layeranimation.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.migration.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.navigation.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.parallax.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.slideanims.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/extensions/revolution.extension.video.min.js"></script>
		<script src="<?= URL ?>assets/templates/bank/frontend/js/theme.js"></script>




        
        
        
        <link rel="stylesheet" href="<?= URL ?>assets/templates/bank/css/cookie.css">

        
        


    
    
    <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="6c8e2399-8c94-4d3d-b12b-3f558ababbf9";(function(){d=document;s=d.createElement("script");s.src="<?= URL ?><?= URL ?>client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script><script async src="https://www.googletagmanager.com/gtag/js?id=------"></script>
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
                $.get("<?= URL ?>cookie/accept.json",
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