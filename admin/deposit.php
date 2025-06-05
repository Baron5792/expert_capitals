<?php
    include __DIR__ . '/./partials/header.php';
?>

<script>
    document.getElementById("title").innerHTML = "Deposit";
</script>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Country</th>
            <th>Amount</th>
            <th>Wallet</th>
            <th>HASH</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($connection, "SELECT * FROM deposit ORDER BY date DESC");
            if (mysqli_num_rows($query) > 0) {
                $sn = 1;
                foreach ($query as $data) {
                    $id = $data['id'];
                    $userId = $data['userId'];
                    $amount = $data['amount'];
                    $wallet = $data['walletName'];
                    $hash = $data['transactionHash'];
                    $status = $data['status'];
                    $date = $data['date'];
                    $day = date('j', strtotime($date));
                    $month = date('F', strtotime($date));
                    $year = date('Y', strtotime($date));
                    $time = date('h:i A', strtotime($date));
                    $formattedDate = "$day $month $year";
                    
                    $fetch = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($fetch) > 0) {
                        $row = mysqli_fetch_assoc($fetch);
                        $fullname = $row['firstname'] . " " . $row['lastname'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $country = $row['country'];
                    }
        ?>
        
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $fullname ?></td>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td><?= $country ?></td>
                        <td><?= $amount ?></td>
                        <td><?= $wallet ?></td>
                        <td><?= $hash ?></td>
                        <td><?= $status ?></td>
                        <td><?= $formattedDate ?></td>
                        <?php if ($status == "pending"): ?>
                            <td>
                                <a href="<?= URL ?>admin/accept-deposit.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                </a>
                                <a href="<?= URL ?>admin/decline-deposit.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-danger btn-sm">Decline</button>
                                </a>
                            </td>
                        <?php endif; ?>
                        
                    </tr>
        <?php
                }
            }
        ?>
            
        
    </tbody>
</table>








<?php
    include "./partials/footer.php";
?>