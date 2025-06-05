<?php
    include("./partials/header.php");  
?>
<script>
    document.getElementById("title").innerHTML = "Mails";
</script>

<?php
    if (isset($_GET['reply'])) {
        $id = $_GET['reply'];
        $sql = mysqli_query($connection, "SELECT * FROM mail WHERE id= '$id'");
        if (mysqli_num_rows($sql) == 1) {
            $data = mysqli_fetch_assoc($sql);
            $email = $data['email'];
            $name = $data['name'];
?>
            <div class="container-fluid mb-4 mt-4">
                <p>Reply <?= $email ?> <span class="bi bi-chevron-down"></span></p>
                <form action="" method="POST">
                    <div class="col-12 col-md-4 mt-2">
                        <input type="text" name="subject" required class="form-control" placeholder="Enter Subject">
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <textarea name="message" required placeholder="Enter Message" class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-md-4 mt-2">
                        <button type="submit" name="submit" class="btn btn-info w-100 btn-sm text-white">Reply</button>
                    </div>
                </form>
            </div>
<?php
        }
    }
?>
    

<div class="container-fluid">
    <table>
        <thead>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($connection, "SELECT* FROM mail");
                if (mysqli_num_rows($query) > 0) {
                    $sn = 1;
                    foreach ($query as $row) {
                        $id = $row['id'];
                        $userId = $row['userId'];
                        $message = $row['message'];
                        $date = $row['date'];
                        $name = $row['name'];
                        $email = $row['email'];
                        
                        if ($userId == "unregistered") {
                            $fullname = "Not registered";
                        }
                        else {
                            // fetch name
                            $fetch = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                            if (mysqli_num_rows($fetch) > 0) {
                                $data = mysqli_fetch_assoc($fetch);
                                $fullname = $data['firstname'] . " " . $data['lastname'];
                            }
                        }
            ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= $email ?></td>
                            <td><?= $message ?></td>
                            <td><?= $date ?></td>
                            <td>
                                <a href="<?= URL ?>admin/contact-us.php?reply=<?= $id ?>">
                                    <button type="button" class="btn btn-info text-white btn-sm">Reply</button>
                                </a>
                            </td>
                            <td>
                                <a href="<?= URL ?>admin/delete-mail.php?id=<?= $id ?>">
                                    <button type="button" class="btn btn-danger text-white btn-sm">Delete</button>
                                </a>
                            </td>
                        </tr>
            <?php
                        
                    }
                }
            ?>
        </tbody>
    </table>
</div>

    


<?php
    include("./partials/footer.php");
?>