<?php
    include "../database.php";
    
    $query = mysqli_query($connection, "INSERT INTO transactions (userId, title, amount, uniqId, status, Date) VALUES ('31', 'Deposit', '500', '67ef8e6db9f1d', 'accepted', '2025-04-04 07:49:44')");
    
    if ($query) {
        $insertHalal = mysqli_query($connection, "INSERT INTO transactions (userId, title, amount, uniqId, status, Date) VALUES ('31', 'Halal Investment', '500', '67ef91973b33c', 'accepted', '2025-04-04 08:00:23')");
        
        if ($insertHalal) {
            echo "done";
        }
    }