<?php
    include __DIR__ . "/./partials/header.php";
    $userId = $_SESSION['user']['id'];
    
    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
        
        $remove = mysqli_query($connection, "DELETE FROM users WHERE id= '$delete'");
        if ($remove) {
            $_SESSION['success'] = "User has been successfully deleted";
            header('location: ' . URL . "admin/manage-users.php");
        }
        
        else {
            $_SESSION['error'] = "Error during deletion, please try again";
            header('location: '. $_SERVER['HTTP_REFERER']);
        }
    }
?>
<script>
    document.getElementById("title").innerHTML = "Manage Users";
</script>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Interest</th>
            <th>Referer</th>
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Admin</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = mysqli_query($connection, "SELECT * FROM users WHERE NOT id= '$userId'");
            if (mysqli_num_rows($query) > 0)  {
                $sn = 1;
                foreach ($query as $data) {
                    $id = $data['id'];
                    $firstname = $data['firstname'];
                    $lastname = $data['lastname'];
                    $username = $data['username'];
                    $email = $data['email'];
                    $balance = $data['balance'];
                    $referer = $data['sponsor_id'];
                    $country = $data['country'];
                    $city = $data['city'];
                    $address = $data['address'];
                    $phone = $data['phone'];
                    $admin = $data['admin'];
                    $interest = $data['interest'];
                    $date = $data['date'];
                    $day = date('j', strtotime($date));
                    $month = date('F', strtotime($date));
                    $year = date('Y', strtotime($date));
                    $time = date('h:i A', strtotime($date));
                    $formattedDate = "$day $month $year";
                    
                    if ($admin == 0) {
                        $admin = "user";
                    }
                    else {
                        $admin = "admin";
                    }
                    
                    // fetch referer's name
                    $get = mysqli_query($connection, "SELECT * FROM users WHERE ref_id= '$referer'");
                    if (mysqli_num_rows($get) > 0) {
                        $row = mysqli_fetch_assoc($get);
                        $ref_user = $row['username'];
                    }
                    else {
                        $ref_user = "none";
                    }
        ?>
                    <tr class="small">
                        <td><?= $sn++ ?></td>
                        <td><?= $firstname ?></td>
                        <td><?= $lastname ?></td>
                        <td><?= $username ?></td>
                        <td><?= $email ?></td>
                        <td>$<?= $balance ?></td>
                        <td>$<?= $interest ?></td>
                        <td><?= $ref_user ?></td>
                        <td><?= $country ?></td>
                        <td><?= $city ?></td>
                        <td><?= $address ?></td>
                        <td>+<?= $phone ?></td>
                        <td><?= $admin ?></td>
                        <td><?= $formattedDate ?></td>
                        <td>
                            <a href="<?= URL ?>admin/edit-user.php?id=<?= $id ?>">
                                <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="<?= URL ?>admin/manage-users.php?delete=<?= $id ?>">
                                <button type="button" onclick="check();" class="btn btn-danger btn-sm text-white">Delete</button>
                            </a>
                        </td>
                    </tr>
        <?php    
                }
            }
        ?>
            
    </tbody>
</table>





<script>
    function check() {
        if (confirm("Are you sure?")) {
            true;
        }
        else {
            event.preventDefault();
            event.stopPropagation();
        }
    }
</script>


<?php
    include __DIR__ . "/./partials/footer.php";
?>