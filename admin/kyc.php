<?php
    include __DIR__ . "/./partials/header.php";
?>
<script>
    document.getElementById("title").innerHTML = "KYC";
</script>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $fetch = mysqli_query($connection, "SELECT * FROM kyc ORDER BY date DESC");
            if (mysqli_num_rows($fetch) > 0) {
                $sn = 1;
                foreach ($fetch as $row) {
                    $id = $row['id'];
                    $userId = $row['userId'];
                    $status = $row['status'];
                    $date = $row['date'];
                    $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                    if (mysqli_num_rows($query) > 0) {
                        $data = mysqli_fetch_assoc($query);
                        $fullname = $data['firstname'] . " " . $data['lastname'];
                        $email = $data['email'];
                    }
        ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $fullname ?></td>
                        <td><?= $email ?></td>
                        <td><?= $status ?></td>
                        <td><?= $date ?></td>
                        <td>
                            <a href="<?= URL ?>admin/view-kyc.php?id=<?= $id ?>">
                                <button type="button" class="btn btn-warning text-white btn-sm">View</button>
                            </a>
                        </td>
                        <td>
                            <?php if ($status == "pending"): ?>
                                <a href="">
                                    <button type="button" class="btn btn-success btn-sm">Accept</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-danger btn-sm">Decline</button>
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
        <?php
                }
            }
            
            else {
                echo "No records found";
            }
        ?>
            
    </tbody>
</table>






<?php
    include __DIR__ . "/./partials/footer.php";
?>