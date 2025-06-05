<?php
    include __DIR__ . "/./database.php";
?>


<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/php;charset=UTF-8" />
    <head>
		<title>Expert Capital - Birth of Finance. </title>
        
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">

        
		<link rel="icon" type="image/png" href="assets/images/logoIcon/favicon.png">



		<link rel="stylesheet" href="assets/templates/bank/frontend/css/bootstrap.css"/>
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
								<a href="index.php"><img src="assets/images/logoIcon/f-logo2.png" alt="Expert Capitals"></a>
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
							<div class="accessNav">
								<a href="javascript:void(0);" class="menuToggler"><i class="twi-bars1"></i></a>

                                &nbsp; &nbsp; &nbsp;
                                    <?php if (!isset($_SESSION['user'])): ?>
                                        <a href="login.php" class="userBtn"><i class="twi-user1"></i></a>

                                        <a href="register.php" class="qu_btn">Join</a>
                                    <?php else: ?>
                                        <a href="<?= URL ?>user/home.php">
                                            <?php if (strlen($_SESSION['user']['avatar']) > 1): ?>
                                                <img src="<?= URL ?>assets/images/avatar/<?= $_SESSION['user']['avatar'] ?>" style="width: 40px; height: 40px; border-radius: 50%" alt="">
                                            <?php else: ?>
                                                <a href="<?= URL ?>user/home.php">
                                                    <img src="<?= URL ?>assets/images/avatar/unknown.jpeg" style="width: 40px; height: 40px; border-radius: 50%" alt="">
                                                </a>
                                            <?php endif ?>
                                        </a>
                                    <?php endif ?>
                            </div>
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










        



<section class="slider_03">
    <div class="rev_slider_wrapper">
        <div id="rev_slider_3" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.1">
            <ul>
                <li data-index="rs-3050" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="assets/templates/bank/frontend/images/slider/e1.jpg" alt="Expert Capitals" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['top']" data-voffset="['110','110','110','90']" data-fontsize="['20','20','20','19']" data-fontweight="400" data-lineheight="['30']" data-letterspacing="1.2" data-width="['100%']" data-height="['auto']" data-whitesapce="normal" data-color="['#ffffff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1500,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Digital finance services made easy!</div>
                    <div class="tp-caption headFont ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['8','8','-10','-20']" data-fontsize="['90','80','60','36']" data-fontweight="['700']" data-lineheight="['100','90','74','46']" data-letterspacing="0" data-width="['100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1800,"speed":400,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"> Effortless financial management
                    </div>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['158','158','120','100']" data-fontsize="['18','18','18','18']" data-fontweight="['400']" data-lineheight="['30','30','30','30']" data-letterspacing="0" data-width="['750','750','600','100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#d7d7d7']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2100,"speed":500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Manage your banking anytime, anywhere.</div>
                    <div class="tp-caption tp-resizeme" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['266','266','230','230']" data-fontsize="['16']" data-fontweight="700" data-lineheight="60" data-width="['auto']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2400,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]' data-textAlign="['center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"><a href="register.php" class="qu_btn">Get Started</a></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3000,"speed":800,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-250','0','0','0']" data-voffset="['-300','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s7.png" alt="layer" width="844" height="731"></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3300,"speed":900,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-400','0','0','0']" data-voffset="['-310','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s8.png" alt="layer" width="564" height="560"></div>
                </li>
                
                <li data-index="rs-3051" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="assets/templates/bank/frontend/images/slider/e2.jpg" alt="Expert Capital" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['top']" data-voffset="['110','110','110','90']" data-fontsize="['20','20','20','19']" data-fontweight="400" data-lineheight="['30']" data-letterspacing="1.2" data-width="['100%']" data-height="['auto']" data-whitesapce="normal" data-color="['#ffffff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1500,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Struggling Financially or not!</div>
                    <div class="tp-caption headFont ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['8','8','-10','-20']" data-fontsize="['90','80','60','36']" data-fontweight="['700']" data-lineheight="['100','90','74','46']" data-letterspacing="0" data-width="['100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1800,"speed":400,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">We are here for you.</div>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['158','158','120','100']" data-fontsize="['18','18','18','18']" data-fontweight="['400']" data-lineheight="['30','30','30','30']" data-letterspacing="0" data-width="['750','750','600','100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#d7d7d7']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2100,"speed":500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">We understand how much people suffer to attain financial stability, we exist solely for that very purpose to help people meet their financial obligations and expectations.</div>
                    <div class="tp-caption tp-resizeme" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['266','266','230','230']" data-fontsize="['16']" data-fontweight="700" data-lineheight="60" data-width="['auto']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2400,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]' data-textAlign="['center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"><a href="register.php" class="qu_btn">Get Started</a></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3000,"speed":800,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-250','0','0','0']" data-voffset="['-300','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s7.png" alt="layer" width="844" height="731"></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3300,"speed":900,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-400','0','0','0']" data-voffset="['-310','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s8.png" alt="layer" width="564" height="560"></div>
                </li>

                <li data-index="rs-3052" data-transition="random-premium" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power3.easeInOut" data-easeout="Power3.easeInOut" data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <img src="assets/templates/bank/frontend/images/slider/e3.jpg" alt="Expert Capital" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg" data-no-retina>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['top']" data-voffset="['110','110','110','90']" data-fontsize="['20','20','20','19']" data-fontweight="400" data-lineheight="['30']" data-letterspacing="1.2" data-width="['100%']" data-height="['auto']" data-whitesapce="normal" data-color="['#ffffff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1500,"speed":300,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Goal Getter!</div>
                    <div class="tp-caption headFont ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['8','8','-10','-20']" data-fontsize="['90','80','60','36']" data-fontweight="['700']" data-lineheight="['100','90','74','46']" data-letterspacing="0" data-width="['100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":1800,"speed":400,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Aim for the stars, <br> shoot for the moon</div>
                    <div class="tp-caption ws_nowrap" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['158','158','120','100']" data-fontsize="['18','18','18','18']" data-fontweight="['400']" data-lineheight="['30','30','30','30']" data-letterspacing="0" data-width="['750','750','600','100%']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#d7d7d7']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2100,"speed":500,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-textAlign="['left']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,20]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]">Through the corona virus pandemic, we had a cultural shift that made us realize that we can actually spend less than we used to prior while investing more.
                        <br>
                        It's a culture worth living.</div>
                    <div class="tp-caption tp-resizeme" data-x="['left']" data-hoffset="['0']" data-y="['middle']" data-voffset="['266','266','230','230']" data-fontsize="['16']" data-fontweight="700" data-lineheight="60" data-width="['auto']" data-height="['auto']" data-whitesapce="['normal']" data-color="['#fff']" data-type="text" data-responsive_offset="off" data-frames='[{"delay":2400,"speed":600,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]' data-textAlign="['center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,20]"><a href="register.php" class="qu_btn">Get Started</a></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3000,"speed":800,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-250','0','0','0']" data-voffset="['-300','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s7.png" alt="layer" width="844" height="731"></div>
                    <div class="tp-caption tp-resizeme anLayer" data-frames='[{"delay":3300,"speed":900,"frame":"0","from":"y:bottom;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]' data-type="image" data-x="right" data-y="bottom" data-hoffset="['-400','0','0','0']" data-voffset="['-310','0','0','0']" data-width="['auto']" data-height="['auto']"><img src="assets/templates/bank/frontend/images/slider/s8.png" alt="layer" width="564" height="560"></div>
                </li>
            </ul>
        </div>
    </div>
</section>



<section class="aboutSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-5">
                <div class="absThumb">
                    <img src="assets/templates/bank/frontend/images/home2/inv.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="absCon">
                    <h2 class="secTitle">An easy way to invest for your future</h2>
                    <div class="subTitle"><span class="bleft"></span>...always you before us.</div>
                    <p class="secDesc">
                        By offering you a transparent means of earning extra as you put your digital assets to work through investment banking portfolio, we are here to help you put your first foot forward on your biggest financial journey to greatness notwithstanding your level of knowledge in the crypto market and hemisphere.                    </p>
                    <div class="row">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>




<section class="companySec01" style="padding: 120px 0 101px;">
    <div class="container largeContainer">
        <div class="row">

            <div class="col-lg-7">
                <div class="comCon">
                    <div class="subTitle"><span class="bleft"></span>Expert Capital could help you beat this.</div>
                    <h2 class="secTitle">What’s inflation doing to your money?</h2>
                    <p class="secDesc">
                        Through financial difficulties and the decrease in the value of fiat, we offer an unmatched opportunity by providing you long term plans to keep your assets afloat and maintain its value.  Therere lots of opportunities in our portfolios and packages, never hold cash.                    </p>
                    
                    
                </div>
            </div>
            
            <div class="col-lg-5 noPaddingRight">
                <img src="assets/templates/bank/frontend/images/home3/inflation.jpg" alt="">
            </div>
        </div>
    </div>
</section>



<section class="chooseSection chooseSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-4">
                <div class="subTitle"><span class="bleft"></span>Why Now?</div>
                <h2 class="secTitle white" style="font-size: 30px">Benefits of Working with Us</h2>
                
            </div>
            <div class="col-xl-8 mt8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div>
                                <i class="icon-local_1"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>How we Can Help You Achieve Your Financial Goals</h3>
                            <p>
                                We provide you with access to a wide range of financial services, including investment management, wealth planning, and retirement planning. By working with a platform that has expertise in these areas, you can develop a personalized financial plan that aligns with your unique financial goals and helps you achieve them.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div>
                                <i class="icon-local_3"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>The Convenience of Investing Under One Roof</h3>
                            <p>We offer investment services, allowing you to manage your finances and investments all in one place. This can provide you with greater convenience and make it easier to track your overall financial progress.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div>
                                <i class="icon-XjxC7N01"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Access to Expert Financial Advice</h3>
                            <p>We will assign to you our experienced financial advisors who can provide you with expert advice on a wide range of financial topics. This can include investment strategy, tax planning, and retirement planning, among others. By working with a financial advisor, you can benefit from their expertise and knowledge, which can help you make more informed financial decisions.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="icon_box_05">
                            <div class="ib_box">
                                <div class="pin1"></div>
                                <i class="icon-local_11"></i>
                                <div class="pin2"></div>
                            </div>
                            <h3>Protecting Your Assets and Your Future</h3>
                            <p>We also provide you with access to insurance and other risk management services. This can help you protect your assets and your financial future, providing you with greater peace of mind.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="testimonialSection01">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="cta">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="icon_box_06">
                                <div class="ib_box"><i class="icon-local_7"></i></div>
                                <h3>Fraud </h3>
                                <p>Operating on an anti-fraud security protocols and verifications to protect you from poachers, predators and security breaches to always keep you safe. </p>
                            </div>
                        </div>
                        <div class="col-lg-2 text-center">
                            <div class="orcta">
                                <p>&</p>
                            </div>
                        </div>
                        <div class="col-lg-5 text-right">
                            <div class="icon_box_06">
                                <div class="ib_box"><i class="icons-target"></i></div>
                                <h3>Security</h3>
                                <p>We have adopted the worldbank-tier encryption to protect your personal and account information from unverified and unauthorized third-parties.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
                    <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="subTitle"><span class="bleft"></span>Testimonial<span class="bright"></span></div>
                    <h2 class="secTitle">Client’s <span>Feedback</span></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonialslider01 owl-carousel">

                                                    <div class="testiItem01">
                                
                                <p class="quotation">
                                    "Expert Capital investment provides an excellent service, be it on a business or on a personal level. I have found the company&#039;s advice regarding investment opportunities particularly helpful - everything is explained fully, no matter how complex the subject. I am pleased to see the results in comparison to the experiences one reads or hears about in the media. I get the feeling that Expert Capital are ahead of the game."
                                </p>
                                <div class="ts_author">
                                    <img src="assets/images/frontend/testimonial/62ca2380803001657414528.jpg" alt="">
                                    <h5>Silke Hochwald</h5>
                                    <span>Former proprietor, Apparel for Women of Frankfurt⭐️⭐️⭐️⭐️⭐️</span>
                                </div>
                            </div>
                                                    <div class="testiItem01">
                                
                                <p class="quotation">
                                    "Expert Capital approach of identifying our future needs/goals and then working out how to achieve them is a vital approach to reduce the lottery of financial planning. Much better than the previous IFA approach of ticking the boxes of financial products that would have left the future very uncertain."
                                </p>
                                <div class="ts_author">
                                    <img src="assets/images/frontend/testimonial/62ca2272ad07f1657414258.jpg" alt="">
                                    <h5>Sebastián Rodrigo</h5>
                                    <span>Venture capitalists</span>
                                </div>
                            </div>
                                                    <div class="testiItem01">
                                
                                <p class="quotation">
                                    "I would personally like to appreciate all the hard work and diligent effort that you have put into establishing our project. It was your persistent hard work and research that has given us a fruitful result eventually. On behalf of all the board of members and trustees of Logična tehnika incorporations, I would like to thank you for your services from last two years. We are grateful to have Expert Capital as one of our capital platform in this project and we understand and value your contribution in bringing our project to fruition.

We are grateful to have you as the finance money manager of our company and we hope to see you grow!

Thanking you,"
                                </p>
                                <div class="ts_author">
                                    <img src="assets/images/frontend/testimonial/629c28999f4cb1654401177.jpg" alt="">
                                    <h5>Bostjan Kovac</h5>
                                    <span>C.F.O Logična tehnika incorporations⭐️⭐️⭐️⭐️⭐️</span>
                                </div>
                            </div>
                                                    <div class="testiItem01">
                                
                                <p class="quotation">
                                    You&#039;re heavily building the best standards on the operations of your institution. The adoption of Bancassurrance solutions in your loan contract made it become a top-notch. That&#039;s why the positive outputs keep surfacing.
                                </p>
                                <div class="ts_author">
                                    <img src="assets/images/frontend/testimonial/629913ea546641654199274.jpg" alt="">
                                    <h5>Dr. Tonino Russo</h5>
                                    <span>SENIOR FINANCIAL ADVISOR  ⭐️⭐️⭐️⭐️⭐️</span>
                                </div>
                            </div>
                                                    <div class="testiItem01">
                                
                                <p class="quotation">
                                    Every compliment I get on my new business establishment is thanks to your years of adequate and sufficient investment offers and experience.


Your skills and professionalism are why I keep coming back. 

I hope you never leave nor diminish in your mode of operation. I love the fact that you appreciate your clients so well.
                                </p>
                                <div class="ts_author">
                                    <img src="assets/images/frontend/testimonial/62980db038de81654132144.jpg" alt="">
                                    <h5>Dr. Patrick Magee</h5>
                                    <span>Founder/Owner MOON BIOPHARMA ⭐️⭐️⭐️⭐️⭐️</span>
                                </div>
                            </div>
                                                
                    </div>
                </div>
            </div>
        
    </div>
</section>


<section class="processSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-5">
                <div class="wpProcess">
                    <img src="assets/templates/bank/frontend/images/home2/black_tower.jpg" alt="">
                    <div class="IconImage"><img src="assets/templates/bank/frontend/images/home2/save_invest.png" alt=""></div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="worCon">
                    <div class="subTitle"><span class="bleft"></span>The difference between saving and investing</div>
                    <h2 class="secTitle">Should you save or invest?</h2>
                    <p class="secDesc">
                        It can be difficult to decide whether you should save or invest. The right answer for you is all down to your own personal financial situation and goals
                    </p>
                    <div class="icon_box_08">
                        <div class="ib_box"><i class="icon-gGaLLZ01"></i><span>01</span></div>
                        <h3>Saving</h3>
                        <p>Specially designed for our prospective clients with financial disabilities who wishes to build up and accumulate their subsequent deposits and compounding interests to amount to a particular financial target. Savings have the advantage of being dependable, predictable and easy to access. If you know you'll need a set amount of money in the next 12 months, for example, then regularly depositing in a savings account may be the best solution. Savings will grow over time as more money is put away and interest accrues on your balance. Our pension scheme is always the best option that defines this, try it out today. </p>
                    </div>
                    <div class="icon_box_08">
                        <div class="ib_box"><i class="icons-analytics"></i><span>02</span></div>
                        <h3>Investing</h3>
                        <p>A tailored portfolio to offer you an incomparable best offer that you've ever seen elsewhere. Enjoy our strategically designed annual-based arbitrage plans and packages that offers you as much as 15 Percent interest on daily basis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="serviceSection02">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="subTitle"><span class="bleft"></span>Expert Capital Accounts<span class="bright"></span></div>
                
            </div>
        </div>
        <div class="row">

            
            
            <div class="col-xl-3 col-md-6">
                <div class="icon_box_07 text-center">
                    <div class="ib_box"><i class="icons-cabin"></i></div>
                    <h3><a href="trading-solutions.php">Trading Account</a></h3>
                    <p>Offering a composite high profit opportunity for trading.</p>
                    <a class="sm" href="trading-solutions.php">Read More<i class="twi-arrow-right1"></i></a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="icon_box_07 text-center">
                    <div class="ib_box"><i class="icons-cabin"></i></div>
                    <h3><a href="account/savings.php">Savings Account</a></h3>
                    <p>An account for the purpose of savings towards something, deposit pension scheme.</p>
                    <a class="sm" href="account/savings.php">Read More<i class="twi-arrow-right1"></i></a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="icon_box_07 text-center">
                    <div class="ib_box"><i class="icons-cabin"></i></div>
                    <h3><a href="account/retirement.php">Retirement Account</a></h3>
                    <p>An account for the purpose of retirement or annuities contracts.</p>
                    <a class="sm" href="account/retirement.php">Read More<i class="twi-arrow-right1"></i></a>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="icon_box_07 text-center">
                    <div class="ib_box"><i class="icons-cabin"></i></div>
                    <h3><a href="account/joint.php">Joint Account</a></h3>
                    <p>An account for two persons, who will have access to the funds in such account.</p>
                    <a class="sm" href="account/joint.php">Read More<i class="twi-arrow-right1"></i></a>
                </div>
            </div>

            
        </div>
    </div>
</section>

<section class="videoFact01">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-6">
                <div class="video_banner">
                    <img src="assets/templates/bank/frontend/images/bg/video.jpg" alt="">
                    
                    <a href="https://www.youtube.com/embed/gNlr5JvvBSg" class="popup_video"><i class="twi-play"></i></a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="fact_02">
                    <h5>Customers With 100% Satisfaction</h5>
                    <h2><span class="counter" data-count="884000">800</span><i>k</i></h2>
                    <p>A digital platform ready to serve and guide you through...</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="fact_02">
                    <h5>Experienced & Professional Experts</h5>
                    <h2><span class="counter" data-count="219">219</span>k</h2>
                    <p>A typical business holds many different...</p>
                </div>
            </div>
        </div>
    </div>
</section>




<section class="aboutSection02">
    <div class="container largeContainer">
        <div class="row">

            <div class="col-lg-7">
                <div class="absCon">
                    <h2 class="secTitle">Become Our Affiliate </h2>
                    
                    <p class="secDesc">
                        To foster good relationship and create a worthwhile experience, we are open to offering ground breaking opportunities for you to earn even more.

                        <br><br>

                        Join our partnership program either  as an individual or a corporation today and enjoy many benefits and offers in forms of monthly rewards or have us manage your company assets to maximize your earnings and increase yield interests for your shareholders and clients.                    </p>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="absThumb">
                    <img src="<?= URL ?>assets/images/frontend/affiliate.jpg" alt="">
                </div>
            </div>

        </div>
    </div>
</section>










<section class="blogSectiont03">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="subTitle"><span class="bleft"></span>Press<span class="bright"></span></div>
                <h2 class="secTitle">Latest News</h2>
            </div>
        </div>
        <div class="row">

                            <div class="col-lg-4 col-md-6">
                    <div class="blogItem03 bborder">
                        <div class="blogThumb">
                            <img src="assets/images/frontend/footer2.jpg" alt="">
                        </div>
                        <div class="blogContent">
                            <div class="bmeta">
                                <span><i class="twi-calender"></i><a>30 Mar, 2023</a></span>|<span><i class="twi-user2"></i><a>Admin</a></span>
                            </div>
                            
                            <h3><a href="news/e-finance-management-bank-makes-donation-to-turkey-earthquake-relief.php">Expert Capital management Makes Donation to Turkey Earthquake Relief</a></h3>
                        </div>
                    </div>
                </div>
                            <div class="col-lg-4 col-md-6">
                    <div class="blogItem03 bborder">
                        <div class="blogThumb">
                            <img src="assets/images/frontend/footer2.jpg" alt="">
                        </div>
                        <div class="blogContent">
                            <div class="bmeta">
                                <span><i class="twi-calender"></i><a>07 Mar, 2023</a></span>|<span><i class="twi-user2"></i><a>Admin</a></span>
                            </div>
                            
                            <h3><a href="news/the-importance-of-emergency-funds-how-to-build-and-maintain-one.php">The Importance of Emergency Funds: How to Build and Maintain One</a></h3>
                        </div>
                    </div>
                </div>
                            <div class="col-lg-4 col-md-6">
                    <div class="blogItem03 bborder">
                        <div class="blogThumb">
                            <img src="assets/images/frontend/footer3.jpg" alt="">
                        </div>
                        <div class="blogContent">
                            <div class="bmeta">
                                <span><i class="twi-calender"></i><a>07 Mar, 2025</a></span>|<span><i class="twi-user2"></i><a>Admin</a></span>
                            </div>
                            
                            <h3><a href="news/8-financial-planning-tips-for-a-successful-2023.php">8 Financial Planning Tips for a Successful 2025</a></h3>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</section>





<section class="appStore">
    <div class="container largeContainer">
        <div class="row">
            <div class="col-xl-8">
                <h2 class="secTitle">
                    A quick and simple way to help you make your money work <br> harder and go further.
                </h2>
                
            </div>
            <div class="col-xl-2 offset-xl-2">
                <div class="skrItem">
                    <div class="circle-skill" data-bg="#ffe5e6" data-skills="0.99" data-gradientstart="#b95441" data-gradientend="#b95441"><strong></strong></div>
                    <h5>Safe & Secure</h5>
                    <p>Digital Investment</p>
                </div>
                
            </div>
        </div>
    </div>
</section>





<section class="clientLogo01" style="background-color: #fff; color: #000">
	<div class="container largeContainer">
		<div class="row">
			<div class="col-xl-3 col-md-12">
				<h2 class="secTitle" style="color: #000">Featured In</h2>
			</div>

			<div class="col-xl-9 col-md-12">
				<div class="client-slider owl-carousel owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage" style="transform: translate3d(-1195px, 0px, 0px); transition: all 0.6s ease 0s; width: 2049px;">

                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://www.marketwatch.com/press-release/a-free-and-better-way-to-transact-the-most-anticipated-crypto-finance-institution-in-spain-2022-08-13?mod=search_headline" target="_blank">
                                        <img src="assets/images/featured_in/marketwatch.png" alt="MARKETWATCH">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://techbullion.com/efinance-bank-partners-with-alvin-insurance-to-provide-collateralized-loan-support-to-users/" target="_blank">
                                        <img src="assets/images/featured_in/techbullion.png" alt="TECHBULLION">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://finance.yahoo.com/efinancebank-partner-wirex-crypto-cards-183000023.php" target="_blank">
                                        <img src="assets/images/featured_in/yahoofinance.png" alt="YAHOO">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://news.yahoo.com/efinancebank-partner-wirex-crypto-cards-183000023.php" target="_blank">
                                        <img src="assets/images/featured_in/yahoofinance.png" alt="YAHOO">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://www.digitaljournal.com/pr/efinancebank-to-partner-with-wirex-to-provide-crypto-cards" target="_blank">
                                        <img src="assets/images/featured_in/digitaljournal.png" alt="DIGITALJOURNAL">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://techbullion.com/efinance-bank-partners-with-alvin-insurance-to-provide-collateralized-loan-support-to-users/" target="_blank">
                                        <img src="assets/images/featured_in/techbullion.png" alt="TECHBULLION">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://ventsmagazine.com/2022/04/21/efinancebank-extends-fast-banking-services-to-dubai/" target="_blank">
                                        <img src="assets/images/featured_in/vents.png" alt="VENTS">
                                    </a>
                                </div>
                                                            <div class="owl-item" style="width: 140.75px; margin-right: 30px;">
                                    <a href="https://finance.yahoo.com/news/efinancebank-partner-wirex-crypto-cards-183000023.php" target="_blank">
                                        <img src="assets/images/featured_in/yahoofinance.png" alt="YAHOO">
                                    </a>
                                </div>
                            
						</div>
					</div>

					<div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button>
                        <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                    </div>
					<div class="owl-dots disabled"></div>
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

                            <p>Expert Capital creates a smart, feasible and finance atmosphere for our clients despite their supposed diverse circumstances.</p>

                            <hr>
                            
                            

                            <p>
                                <!-- HeadQuarters -->
                                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.9850320323185!2d-4.2390465!3d55.862926099999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x488847c54481c531%3A0xde8d5d5c98f7b950!2sEfinancebanks%20HQ!5e0!3m2!1sen!2sng!4v1655388250987!5m2!1sen!2sng" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                            </p>




                            

                            <span class="__cf_email__">info@expert-capital.com</span>
                            
                            <div style="text-align: center" id="google_translate_element"></div>
                            

                        </div>
                    </div>

                    <div class="col-md-6 col-lg-2">
                        <div class="widget PL28">
                            <h3 class="widget_title">The Expert</h3>
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
                        <p>©2013-2025 <a href="index.php" style="color:#fff">Expert Capital</a>. All rights reserved.</p>
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
                    data-number="+1 (587) 667-2814"
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