<?php
    include __DIR__ . "/./partials/header.php";  
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // fetch users details
        $update = mysqli_query($connection, "SELECT * FROM users WHERE id= '$id'");
        if (mysqli_num_rows($update) > 0) {
            $data = mysqli_fetch_assoc($update);
            $admin = $data['admin'];
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $balance = $data['balance'];
            $interest = $data['interest'];
            $phone = $data['phone'];
            
?>
            <script>
                document.getElementById("title").innerHTML = "Edit User";
            </script>

            <form action="<?= URL ?>admin/edit-logic.php" method="POST">
                <input type="hidden" value="<?= $id ?>" name="userId">
                <div class="container">
                    <div class="form-group col-md-6">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" value="<?= $firstname ?>" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" value="<?= $lastname ?>" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Balance</label>
                        <input type="number" name="balance" value="<?= $balance ?>" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Interest</label>
                        <input type="number"  name="interest" value="<?= $interest ?>" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Phone</label>
                        <input type="text"  name="phone" value="<?= $phone ?>" class="form-control">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Status</label>
                        <?php if ($admin == 1): ?>
                            <select name="admin" class="form-control">
                                <option value="1" selected>Admin</option>
                                <option value="0">User</option>
                            </select>
                        <?php endif ?>
                        <?php if ($admin == 0): ?>
                            <select name="admin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="0" selected>User</option>
                            </select>
                        <?php endif ?>
                    </div>
                    <div class="form-group col-md-6 mt-4">
                        <button type="submit" name="submit" class="btn btn-primary btn-md form-control text-white">Edit User</button>
                    </div>
                </div>
            </form>
            
<?php
        }
    }
    
    else {
        header('location: ' . $_SERVER['HTTP+HTTP_REFERER']);
    }
    
    include "./partials/footer.php";
?>