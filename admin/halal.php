<?php
    include "./partials/header.php";
?>
<script>
    document.getElementById("title").innerHTML = "Halal Investment";
</script>
<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Country</th>
            <th>Wallet</th>
            <th>Amount</th>
            <th>Uniq ID</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($connection, "SELECT * FROM halal ORDER BY date DESC");
            if (mysqli_num_rows($query) > 0) {
                $sn = 1;
                foreach ($query as $data) {
                    $id = $data['id'];
                    $userId = $data['userId'];
                    $amount = $data['amount'];
                    $wallet = $data['walletName'];
                    $hash = $data['uniqId'];
                    $plan = $data['plan'];
                    $status = $data['status'];
                    
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
                        <td><?= $wallet ?></td>
                        <td>$<?= $amount ?></td>
                        <td><?= $hash ?></td>
                        <td><?= $status ?></td>
                        <?php if ($status == "pending"): ?>
                            <td>
                                <a href="<?= URL ?>admin/accept-halal.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                </a>
                                <a href="<?= URL ?>admin/decline-halal.php?id=<?= $id ?>">
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
    include __DIR__ . "/./partials/footer.php";
?>