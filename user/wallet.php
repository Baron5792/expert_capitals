<?php
    include "../database.php";


    $query = mysqli_query($connection, "INSERT INTO wallet (walletName, walletId) VALUES ('Bitcoin (BTC)', '1CVLELdTZzavrCFNSeNLVHLMQVW6n5Y4a7')");