<?php
    include __DIR__ . "/./partials/header.php";
    $link = "https://zinofix.org/register.php?ref=";
    $code = $ref_id;
    
?>

<style>
    #home-btn {
        color: #BB5441;
    }

    .home-img {
        margin-top: 30px;
    }

    .shadow {
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }

    .border {
        border-radius: 10px;
    }
    
    .home-footer {
        height: 280px;
    }

    @media screen and (max-width: 767px) {
        .home-img img {
            height: 200px;
        }

        .tradingview-widget-container {
            display: none;
        }
    }

    .home-img img {
        width: 100%;
        height: 300px;
        border-radius: 10px;
    }

    .welcome {
        transform: translateX(-100%);
        transition: transform 1s ease-in-out;
        /* margin-top: 70px; */
    }

    .welcome p:first-child {
        font-size: xx-large;
    }

    .welcome p:nth-child(2) {
        /*font-size: large;*/
        color: grey;
    }

    .welcome.slide-in {
        transform: translateX(0);
    }

    table {
        width: 100%;
        font-size: x-small;
    }

    table tr th {
        border-bottom: 3px solid #BB5441;
        text-align: center;
        padding-bottom: 20px;
    }

    .ref {
        word-wrap: break-word;
    }

    .graph-scale img {
        height: 400px;
    }

    canvas {
        background-color: #2a2a2a; /* Slightly lighter dark background */
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0, 255, 200, 0.5); /* Neon glow */
        padding: 20px;
    }
    
    .track-graph img {
        height: 300px;
    }
</style>
<style>
    .carousel-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px;
    }

    .description-item {
        transition: opacity 0.3s ease;
    }

    .carousel-item img {
        height: 300px;
    }

    /* Optional: Add some styling to make it look nicer */
    .carousel {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .descriptions {
        /*background-color: #f8f9fa;*/
        padding: 15px;
        /*border-radius: 5px;*/
        /*border: 1px solid #dee2e6;*/
    }
    
    .chart-container {
      width: 100%;
      max-width: 100%;
      background: white;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
    
    #myChart {
      background: transparent !important;
      display: block;
    }
</style>

<!-- notification panel -->
<style>
    .notification-container {
        /* background-color: #16213e; */
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 15px;
        border-left: 4px solid #4cc9f0;
    }
    
    .notification-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .notification-title {
        font-size: 18px;
        font-weight: 600;
        color: #4cc9f0;
        margin: 0;
    }
    
    .notification-time {
        font-size: 12px;
        color: #b8b8b8;
    }
    
    .notification-content {
        font-size: 14px;
        line-height: 1.5;
        color: #e6e6e6;
    }
    
    .notification-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 15px;
    }
    
    .notification-btn {
        background-color: #0f3460;
        color: #e6e6e6;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 12px;
        transition: background-color 0.2s;
    }
    
    .notification-btn:hover {
        background-color: #4cc9f0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const welcomeDiv = document.querySelector('.welcome');
        setTimeout(() => {
            welcomeDiv.classList.add('slide-in');
        }, 100);
    });

    document.getElementById("title_title").innerHTML = "Dashboard | Expert Capitals";

    function copyReferralCode() {
        const referralCode = document.querySelector('.ref').innerText;
        const tempInput = document.createElement('input');
        tempInput.value = referralCode;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        // alert('Referral link copied to clipboard');
        Swal.fire({
            title: 'Copied',
            text: 'Your referral link has been successfully copied to your clipboard',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: 'green'
        })
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carousel = document.getElementById('imageCarousel');
        var descriptions = document.querySelectorAll('.description-item');
        
        carousel.addEventListener('slid.bs.carousel', function (event) {
            // Hide all descriptions
            descriptions.forEach(function(desc) {
                desc.classList.add('d-none');
            });
            
            // Show active description
            descriptions[event.to].classList.remove('d-none');
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- for the swal error for email sending -->
<?php
    if (isset($_SESSION['error'])):
?>  
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['error']) ?>)
            })
        </script>
<?php
    unset($_SESSION['error']);
    endif
?>


    <!-- trading view -->
    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div> -->
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
    {
    "symbols": [
        {
        "proName": "FOREXCOM:SPXUSD",
        "title": "S&P 500 Index"
        },
        {
        "proName": "FOREXCOM:NSXUSD",
        "title": "US 100 Cash CFD"
        },
        {
        "proName": "FX_IDC:EURUSD",
        "title": "EUR to USD"
        },
        {
        "proName": "BITSTAMP:BTCUSD",
        "title": "Bitcoin"
        },
        {
        "proName": "BITSTAMP:ETHUSD",
        "title": "Ethereum"
        }
    ],
    "showSymbolLogo": true,
    "isTransparent": false,
    "displayMode": "adaptive",
    "colorTheme": "light",
    "locale": "en"
    }
    </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- home image -->
    <div class="container home-img">
        <img src="<?= URL ?>assets/images/frontend/dashboard/banner2.jpg" alt="">
    </div>

    <div class="container">
        <div class="welcome mt-4 mb-4">
            <h4 class="mb-0">Welcome back, <span><?= $username ?>!</span></h4>
            <p class="mt-0 small">We're glad to see you again.</p>
        </div>


        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="shadow border pt-4 pb-4">
                    <form action="<?= URL ?>user/send-mail.php" method="POST">
                        <input type="hidden" value="<?= $link ?>" name="link">
                        <input type="hidden" value="<?= $code ?>" name="code">
                        <div class="form-group container">
                            <p class="mt-0 mb-0 fs-4">Refer and earn from your referral's deposits.</p>
                            
                            <?php if (isset($_SESSION['mail'])): ?>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        Swal.fire(<?= json_encode($_SESSION['mail']) ?>);
                                    })
                                </script>
                            <?php 
                                unset($_SESSION['mail']);
                                endif 
                            ?>
                            
                            <?php if (isset($_SESSION['mail-error'])): ?>
                                <div class="alert alert-danger mt-2 mb-2">
                                    <?=
                                        $_SESSION['mail-error'];
                                        unset($_SESSION['mail-error']);
                                    ?>
                                </div>
                            <?php endif ?>
                            <p class="mt-0 mb-0 small ref">https://zinofix.org/register.php?ref=<?= $ref_id ?> <span class="bi-files" onclick="copyReferralCode()"></span></p>
                            <input type="email" required name="email" placeholder="Enter Email Address" class="form-control mt-4" id="">
                            <button type="submit" name="submit" class="btn btn-warning w-100 mt-3 text-white">Send</button>
                        </div>
                    </form>
                </div>
            </div>

            


            <div class="col-md-6 mb-4">
                <div class="container">
                    <p class="fs-4 mt-3"><i class="bi bi-wallet"></i> Overview</p>
                    <div class="row bg-black pt-4 pb-4 border">
                        <div class="col-md-6 col-12">
                            <div class="container">
                                <div class="justify-content-between">
                                <?php
                                    $query = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$userId' AND status= 'accepted'");
                                    $accepted = 0;
                                    if (mysqli_num_rows($query) > 0) {
                                        foreach ($query as $key) {
                                            $accepted += $key['amount'];
                                        }
                                    }
                                    else {
                                        $accepted = 0;
                                    }
                                ?>
                                    <p class="fw-bold text-secondary mb-0">Total Deposits</p>
                                    <p class="mt-0 small text-white">$<?= number_format($accepted) ?>.00 <span class="bi-lock"></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="container">
                                <div class="justify-content-between">
                                    <?php
                                        $query = mysqli_query($connection, "SELECT * FROM withdrawal WHERE userId= '$userId' AND status= 'accepted'");
                                        $accepted = 0;
                                        if (mysqli_num_rows($query) > 0) {
                                            foreach ($query as $key) {
                                                $accepted += $key['amount'];
                                            }
                                        }
                                        else {
                                            $accepted = 0;
                                        }
                                    ?>
                                    <p class="fw-bold text-secondary mb-0">Total Withdrawal</p>
                                    <p class="mt-0 small text-white">$<?= number_format($accepted) ?>.00</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mt-4">
                            <div class="container">
                                <div class="justify-content-between">
                                    <p class="fw-bold text-secondary mb-0">Interest</p>
                                    <p class="mt-0 small text-white">$<?= number_format($interest)  ?>.00</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 mt-4">
                            <div class="container">
                                <div class="justify-content-between">
                                    <p class="fw-bold text-secondary mb-0">Total Approved Loan</p>
                                    <p class="mt-0 small text-white">$0.00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- transacion history -->
            <div class="col-md-6">
                <div class="shadow border pt-4 pb-4">
                    <div class="container">
                        <p class="align-center">Earnings History</p>
                        <table>
                            <tr>
                                <th>TITLE</th>
                                <th>AMOUNT (USD)</th>
                                <th>DATE</th>
                            </tr>
                            <?php
                                $check = mysqli_query($connection, "SELECT * FROM earning WHERE userId= '$userId' ORDER BY date DESC LIMIT 5");
                                if (mysqli_num_rows($check) > 0) {
                                    foreach ($check as $row) {
                                        $title = $row['title'];
                                        $amount = $row['amount'];
                                        $date = $row['date'];
                            ?>
                                        <tr>
                                            <td class="text-center"><?= $title ?></td>
                                            <td class="text-center"><?= $amount ?></td>
                                            <td class="text-center"><?= $date ?></td>
                                        </tr>
                            <?php
                                    }
                                }
                                else {
                            ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No records found</td>
                                    </tr>
                            <?php  
                                }
                            ?>
                                
                        </table>
                    </div>
                </div>
            </div>

            <!-- for accordion -->
            <div class="col-md-6 mb-4">
                <div class="mt-3">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                    Personal Account
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p class="small text-secondary">#<?= $regNo ?></p>
                                    <p class="text-info">Balance: $<?= $balance ?>.00</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseTwo">
                                    Company Account
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <!--<a href="" class="text-decoration-none">Create Account</a>-->
                                    <p class="small" title="You do not have an active account">No account found</p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseThree">
                                    Savings Account
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <!--<a href="" class="text-decoration-none">-->
                                    <!--    Create Account-->
                                    <!--</a>-->
                                    <p class="small" title="You do not have an active account">No account found</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- graphical representation -->
            <div class="col-md-6 mt-4">
                <p class="fs-4"><i class="bi bi-graph-up"></i> Investment Growth Overview</p>
                <div class="chart-container">
                    <canvas id="myChart"></canvas>
                </div>
                
                <script>
                    // Data for the graph
                    const data = {
                      labels: ['Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar'],
                      datasets: [{
                        label: 'Data Series',
                        data: [65, 59, 80, 81, 56, 72],
                        borderColor: '#66BB6A', // Light green line
                        backgroundColor: 'transparent', // No fill
                        borderWidth: 3, // Thicker line
                        pointBackgroundColor: 'white', // White points
                        pointBorderColor: '#66BB6A', // Green border for points
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        tension: 0.3 // Smooth curve
                      }]
                    };
                
                    // Chart configuration
                    const config = {
                      type: 'line',
                      data: data,
                      options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                          legend: {
                            labels: {
                              color: '#333333', // Dark gray text
                              font: {
                                size: 14
                              }
                            }
                          },
                          tooltip: {
                            backgroundColor: '#FFFFFF',
                            titleColor: '#333333',
                            bodyColor: '#333333',
                            borderColor: '#E0E0E0',
                            borderWidth: 1
                          }
                        },
                        scales: {
                          x: {
                            grid: {
                              display: true,
                              color: '#F0F0F0' // Very light gray grid
                            },
                            ticks: {
                              color: '#666666' // Gray ticks
                            }
                          },
                          y: {
                            grid: {
                              display: true,
                              color: '#F0F0F0'
                            },
                            ticks: {
                              color: '#666666'
                            }
                          }
                        }
                      }
                    };
                
                    // Render the chart
                    const ctx = document.getElementById('myChart').getContext('2d');
                    new Chart(ctx, config);
                  </script>
            </div>
                
                <!-- for ambassadors -->
            <div class="col-md-6 col-12 mt-4">
                <p class="fs-4"><i class="bi bi-shield-shaded"></i> Ambassadors</p>

                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Slides -->
                    <div class="carousel-inner rounded">
                        <!--fetch featured image-->
                        <?php
                            $fetured = mysqli_query($connection, "SELECT * FROM ambassador WHERE featured= '1'");
                            if (mysqli_num_rows($fetured) == 1) {
                                $data = mysqli_fetch_assoc($fetured);
                                $avatar = $data['avatar'];
                                $name = $data['firstname'];
                                $country = $data['country'];
                                $occupation = $data['occupation'];
                                $email = $data['email'];
                                $star = $data['star'];
                                
                                // Fetch out stars depending on the number given
                                $stars = '';
                                for ($i = 0; $i < $star; $i++) {
                                    $stars .= '&#9733; '; // &#9733; is the HTML code for a star symbol
                                }
                                
                        ?>
                                <div class="carousel-item active">
                                    <img src="<?= URL ?>assets/images/sponsors/<?= $avatar ?>" class="d-block w-100" alt="<?= $name ?>">
                                    <div class="carousel-caption">
                                        <p style="text-transform: capitalize;" class="mb-0"> <?= $name ?></p>
                                        <p class="mb-0 mt-0 small"><span class="bi bi-chat-left-text"></span> <?= $email ?></p>
                                        <p class="mt-0 mb-0 small"><?= $occupation ?></p>
                                        <p class="mt-0 mb-0 small"><span class="bi bi-geo-alt"></span> <?= $country ?></p>
                                        <p class="mt-0 mb-0 text-warning small"><?= $stars ?></p>   
                                     </div>
                                </div>
                        <?php
                            }
                        ?>
                            
                        <?php
                            $unfeatured = mysqli_query($connection, "SELECT * FROM ambassador WHERE featured= '0' AND status= '0'");
                            if (mysqli_num_rows($unfeatured) > 0) {
                                foreach ($unfeatured as $row) {
                                    $name = $row['firstname'] . " " . $row['lastname'];
                                    $avatar = $row['avatar'];
                                    $occupation = $row['occupation'];
                                    $country = $row['country'];
                                    $star = $row['star'];
                                    $email = $row['email'];
                                    
                                    // Fetch out stars depending on the number given
                                    $stars = '';
                                    for ($i = 0; $i < $star; $i++) {
                                        $stars .= '&#9733; '; // &#9733; is the HTML code for a star symbol
                                    }
                        ?>
                                    <div class="carousel-item">
                                        <img src="<?= URL ?>assets/images/sponsors/<?= $avatar ?>" class="d-block w-100" alt="<?= $name ?>">
                                        <div class="carousel-caption">
                                            <p style="text-transform: capitalize;" class="mb-0"><?= $name ?></p>
                                            <p class="mb-0 mt-0 small"><span class="bi bi-chat-left-text"></span> <?= $email ?></p>
                                            <p class="mt-0 mb-0 small"> <?= $occupation ?></p>
                                            <p class="mt-0 mb-0 small"><span class="bi bi-geo-alt"></span> <?= $country ?></p>
                                            <p class="mt-0 mb-0 small text-warning"><?= $stars ?></p>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>
                            
                    </div>
                </div>
            </div>

            <!-- notification panel -->
            <div class="col-md-6 col-12 mt-4">
                <p class="fs-4">Recent Activity</p>
                <!-- fetch activity track -->
                <?php
                    $today = date('Y-m-d');
                    $query = mysqli_query($connection, "SELECT * FROM activity WHERE userId= '$userId' AND DATE(date) = '$today' ORDER BY date DESC LIMIT 2");
                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $data) {
                            $title = $data['title'];
                            $message = $data['message'];
                            // Current time
                            $now = new DateTime();
                            $postTime = new DateTime($data['date']);
                            $interval = $now->diff($postTime);

                            
                            // Calculate time difference in different units
                            $seconds = $interval->s + ($interval->i * 60) + ($interval->h * 3600) + ($interval->d * 86400);
                            $minutes = floor($seconds / 60);
                            $hours = floor($seconds / 3600);
                            
                            // Determine the best unit to display
                            if ($seconds < 60) {
                                $timeAgo = "$seconds second" . ($seconds != 1 ? 's' : '') . " ago";
                            } elseif ($minutes < 60) {
                                $timeAgo = "$minutes minute" . ($minutes != 1 ? 's' : '') . " ago";
                            } else {
                                $timeAgo = "$hours hour" . ($hours != 1 ? 's' : '') . " ago";
                            }
                ?>
                            <div class="notification-container bg-normal">
                                <div class="notification-header">
                                    <h3 class="notification-title"><?= $title ?></h3>
                                    <span class="notification-time"><?= $timeAgo ?></span>
                                </div>
                                <div class="notification-content text-secondary">
                                    <i class="bi bi-info-circle"></i>
                                    <?= $message ?>
                                </div>
                            </div>
                <?php
                        }
                    }
                    else {
                ?>
                        <div class="alert alert-info alert-sm">
                            <i class="bi bi-info-circle"></i>
                            <span class=""></span>No recent activity found
                        </div>
                <?php
                    }
                ?>
                    
            </div>
            
            <!-- <div class="col-md-6 col-12 track-graph mt-4">
                <img src="<?= URL ?>assets/images/frontend/download.png" class="w-100">
            </div> -->
        </div>
            
            
            
        <div class="col-md-12 mt-4">
            <img src="<?= URL ?>assets/images/frontend/dashboard/footer1.jpg" alt="bg img" class="w-100 rounded home-footer">
        </div>
        
    </div> 

<?php
    include __DIR__ . "/./partials/footer.php";
?>