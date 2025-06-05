<?php
    include __DIR__ . "/./partials/header.php";
?>

<script>
    document.getElementById("title").innerHTML = "Withdrawal";
</script>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Amount</th>
            <th>Wallet</th>
            <th>Address</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($connection, "SELECT * FROM withdrawal ORDER BY date DESC");
            if (mysqli_num_rows($query) > 0) {
                $sn = 1;
                foreach ($query as $row) {
                    $id = $row['id'];
                    $userId = $row['userId'];
                    $wallet = $row['wallet'];
                    $walletId = $row['walletId'];
                    $status = $row['status'];
                    $amount = $row['amount'];
                    $date = $row['date'];
                    
                    $sql = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($sql) > 0) {
                        $data = mysqli_fetch_assoc($sql);
                        $fullname = $data['firstname'] . " " . $data['lastname'];
                        $email = $data['email'];
                    }
                    
        ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $fullname ?></td>
                        <td><?= $email ?></td>
                        <td><?= $amount ?></td>
                        <td><?= $wallet ?></td>
                        <td><?= $walletId ?></td>
                        <td><?= $status ?></td>
                        <td><?= $date ?></td>
                        <?php if ($status == "pending"): ?>
                            <td>
                                <a href="<?= URL ?>admin/accept-withdrawal.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-success btn-sm text-white">Accept</button>
                                </a>
                            </td>
                            <td>
                                <a href="<?= URL ?>admin/decline-withdrawal.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-danger btn-sm text-white">Decline</button>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
        <?php
                }
            }
        ?>
            
    </tbody>
</table>






<?php
    include __DIR__ . "/./partials/footer.php";
?>