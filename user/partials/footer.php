                    <style>
                        @media screen and (max-width: 767px) {
                            .section-40-content {
                                padding-bottom: 20px;
                                margin-bottom: 40px;
                            }
                        }

                        .footer {
                            margin-top: 140px;
                        }
                    </style>
                    <!-- footer  -->
                    <div class="footer pb-4 pt-4">
                        <footer style="
                            font-family: 'Segoe UI', Arial, sans-serif;
                            text-align: center;
                            padding: 1.2rem 0;
                            margin-top: 2rem;
                            color: #555;
                            font-size: 0.85rem;
                            border-top: 1px solid #eaeaea;
                            ">
                            <div style="max-width: 800px; margin: 0 auto;">
                                <div class="mb-3">
                                    <img src="<?= URL ?>assets/images/logoIcon/logo.png" alt="expert logo" style="width: 100px;">
                                </div>
                                <p style="margin: 0 0 0.5rem 0;">
                                    © 2025 Expert Capitals. All rights reserved.
                                </p>
                                <div style="display: flex; justify-content: center; gap: 1.5rem;">
                                    <a href="<?= URL ?>terms-and-conditions.php" style="color: #444; text-decoration: none;">Terms</a>
                                    <a href="<?= URL ?>who-we-are.php" style="color: #444; text-decoration: none;">About Us</a>
                                    <a href="<?= URL ?>mail-us.php" style="color: #444; text-decoration: none;">Contact</a>
                                </div>
                            </div>
                        </footer>
                    </div>
               </div>
            </div>
        </div>
    </div>

    <?php 
        $randomAlphabets = '';
        $alphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        for ($i = 0; $i < 100; $i++) {
            $randomAlphabets .= $alphabets[rand(0, strlen($alphabets) - 1)];
        }
    ?>

    <!-- Mobile navigation -->
    <div class="mobile-nav d-md-none">
        <a href="<?= URL ?>user/home.php" class="d-block home-btn" id="home-btn">
            <span class="material-icons">home</span>
            <p style="font-size: 10px;">Home</p>
        </a>
        
        <a href="<?= URL ?>user/profile.php" class="d-block profile-btn" id="profile-btn">
            <span class="material-icons">person_outline</span>
            <p style="font-size: 10px;">Profile</p>
        </a>

        
        
        <a href="<?= URL ?>user/investment/halal.php" class="d-block" id="halal-btn">
            <span class="material-icons">trending_up</span>
            <p style="font-size: 10px;">Halal</p>
        </a>
        
        <a href="<?= URL ?>user/deposit-track.php?transaction-id=<?= $randomAlphabets ?>&&user=<?= $userId ?>" class="d-block deposit-btn" id="deposit-btn">
            <span class="material-icons">account_balance</span>
            <p style="font-size: 10px;">Deposit</p>
        </a>
        
        <a href="<?= URL ?>user/transfer.php" class="d-block watch-btn">
            <span class="material-icons">compare_arrows</span>
            <p style="font-size: 10px;">Transfer</p>
        </a>

        
        
    </div>

    <script>
        function searchTitles(query) {
            if (query.length > 0) {
            $('.search-helper-text').hide();
            $.ajax({
                type: 'POST',
                url: 'search.php',
                data: {query: query},
                success: function(data) {
                $('#search-results').html(data);
                }
            });
            } else {
            $('.search-helper-text').show();
            $('#search-results').html('');
            }
        }
    </script>



    <script>
        $(document).ready(function() {
            $("#halal_con").click(function() {
                event.preventDefault();
                $(".halal-contents").toggle(100) && $(".deposit-contents").hide(100) && $(".withdrawal-contents").hide(100);
            })

            $("#deposit_con").click(function() {
                event.preventDefault();
                $(".deposit-contents").toggle(100) && $(".halal-contents").hide(100) && $(".withdrawal-contents").hide(100);
            })

            $("#withdrawal_con").click(function() {
                event.preventDefault();
                $(".withdrawal-contents").toggle(100) && $(".halal-contents").hide(100) && $(".deposit-contents").hide(100);
            })

            $("#loan_con").click(function() {
                event.preventDefault();
                $(".loan-contents").toggle(100) && $(".halal-contents").hide(100) && $(".deposit-contents").hide(100) && $(".withdrawal-contents").hide(100);
            })


        })
    </script>
    


   



    

    <?php
        include __DIR__ . "/../cookie.php";
    ?>
    
    <script src="<?= URL ?>assets/bootstrap-5.3.3/dist/js/bootstrap.js"></script>
</body>
</html>