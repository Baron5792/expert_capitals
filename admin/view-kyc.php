<?php
    include "./partials/header.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($connection, "SELECT * FROM kyc WHERE id= '$id'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $userId = $data['userId'];
            $avatar = $data['avatar'];
            $status = $data['status'];
            $date = $data['date'];
            
            // fetch users name
            $fetch = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
            if (mysqli_num_rows($fetch) > 0) {
                $row = mysqli_fetch_assoc($fetch);
                $fullname = $row['firstname'] . " " . $row['lastname'];
                $email = $row['email'];
            }
?>
            <style>
                .image img {
                    width: 100%;
                    height: 500px;
                }
            </style>
            <script>
                document.getElementById("title").innerHTML = "View KYC";
            </script>
            
            <div class="container">
                <p class="small">Name: <?= $fullname ?></p>
                <p class="small">Email: <?= $email ?></p>
                <p class="small">Status: <?= $status ?></p>
                <p class="small">Date: <?= $date ?></p>
                
                <?php if ($status == "pending"): ?>
                    <a href="<?= URL ?>admin/accept-kyc.php?id=<?= $id ?>">
                        <button type="button" class="btn btn-success btn-sm">Accept</button>
                    </a>
                    <a href="<?= URL ?>admin/decline-kyc.php?id=<?= $id ?>">
                        <button type="button" class="btn btn-danger btn-sm">Decline</button>
                    </a>
                <?php endif ?>
                
                <div class="image">
                    <img src="<?= URL ?>assets/images/kyc/<?= $avatar ?>">
                </div>
            </div>

<?php
            
        }
    }
?>






<?php
    include "./partials/footer.php";
?>