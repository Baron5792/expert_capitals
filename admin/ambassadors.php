<?php
    include "./partials/header.php";
    
    $firstname = $_SESSION['error-data']['firstname'] ?? null;
    $lastname = $_SESSION['error-data']['lastname'] ?? null;
    $country = $_SESSION['error-data']['country'] ?? null;
    $avatar = $_SESSION['error-data']['avatar']['name'] ?? null;
    $occupation = $_SESSION['error-data']['occupation'] ?? null;
    unset($_SESSION['error-data']);
?>

<script>
    document.getElementById("title").innerHTML = "Ambassadors";
</script>

<!--for add Ambassadors-->
<?php
    if (isset($_GET['add'])) {
?>

        <div class="container-fluid mb-4">
            <p class="fs-3 text-center">Add Ambassador</p>
            <form action="<?= URL ?>admin/add-ambassadors.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <input type="text" name="firstname" required title="Firstname" value="<?= $firstname ?>" class="form-control" placeholder="Enter First Name">
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <input type="text" name="lastname" required title="Lastname" value="<?= $lastname ?>" class="form-control" placeholder="Enter Last Name">
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <input type="text" name="country" required title="Country" value="<?= $country ?>" class="form-control" placeholder="Enter Country">
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <input type="text" name="email" required title="Email" value="<?= $email ?>" class="form-control" placeholder="Enter Email">
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <select class="form-control" title="Make a featured or not" name="featured">
                            <option value="1" selected>Featured</option>
                            <option value="0">Not Featured</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <select name="star" title="No. of stars" class="form-control">
                            <option disabled>No. of stars</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <input type="file" name="avatar" title="Select Avatar" value="<?= $avatar ?>" required class="form-control">
                    </div>
                    
                    <div class="form-group col-md-12 col-12 mb-3 mt-3">
                        <textarea name="occupation" required title="Occupation" placeholder="Occupation" class="form-control outline-none"><?= $occupation ?></textarea>
                    </div>
                    
                    <div class="form-group col-md-4 col-12 mb-3 mt-3">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Add <span class="bi bi-plus"></span></button>
                    </div>
                </div>
            </form>
        </div>
<?php
    }
?>




<!--edit an ambassador-->
<?php
    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = mysqli_query($connection, "SELECT * FROM ambassador WHERE id= '$id'");
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $country = $data['country'];
            $featured = $data['featured'];
            $status = $data['status'];
            $star = $data['star'];
?>

            <div class="container-fluid">
                <p class="fs-3 text-center">Edit Ambassador</p>
                <form action="<?= URL ?>admin/edit-ambassador.php" method="POST">
                    <input type="hidden" value="<?= $id ?>" name="id">
                    <div class="row">
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <input type="text" name="firstname" required title="Firstname" value="<?= $firstname ?>" class="form-control" placeholder="Enter First Name">
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <input type="text" name="lastname" required title="Lastname" value="<?= $lastname ?>" class="form-control" placeholder="Enter Last Name">
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <input type="email" name="email" required title="Email" value="<?= $email ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <input type="text" name="country" required title="Country" value="<?= $country ?>" class="form-control" placeholder="Country">
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <select class="form-control" name="featured">
                                <?php if ($featured == 1): ?>
                                    <option value="1" selected>Featured</option>
                                    <option value="0">Not Featured</option>
                                <?php else: ?>
                                    <option value="1">Featured</option>
                                    <option value="0" selected>Not Featured</option>
                                <?php endif ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <input type="number" name="star" max="5" required title="Star" value="<?= $star ?>" class="form-control" placeholder="Star">
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <select class="form-control" name="status">
                                <?php
                                    if ($featured == 0) {
                                ?>
                                        <option disabled>Status</option>
                                        <option value="1">Inactive</option>
                                        <option value="0" selected>Active</option>
                                <?php
                                    }
                                    else {
                                ?>
                                        <option value="0">Active</option>
                                <?php
                                    }
                                ?>
                                    
                            </select>
                            <p class="small text-danger">Note: you can't inactivate a featured ambassador</p>
                        </div>
                        
                        <div class="form-group col-md-4 col-12 mb-3 mt-3">
                            <button type="submit" name="submit" class="btn btn-warning btn-md mb-4 form-control">Edit Ambassador</button>
                        </div>
                    </div>
                </form>
            </div>
<?php
        }
    }
?>
    

<?php if (!isset($_GET['add'])): ?>
    <a href="<?= URL ?>admin/ambassadors.php?add=true">
        <button type="button" class="btn btn-primary btn-md mb-4">Add Ambassador <span class="bi bi-plus"></span></button>
    </a>
<?php endif ?>

<table>
    <thead>
        <tr>
            <th>S/N</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Occupation</th>
            <th>Country</th>
            <th>Star</th>
            <th>Featured</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody> 
        <?php
            $query = mysqli_query($connection, "SELECT * FROM ambassador ORDER BY id DESC");
            if (mysqli_num_rows($query) > 0) {
                $sn = 1;
                foreach ($query as $row) {
                    $id = $row['id'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $occupation = $row['occupation'];
                    $status = $row['status'];
                    $featured = $row['featured'];
                    $star = $row['star'];
                    $country = $row['country'];
                    $date = $row['date'];
                    
                    if ($featured == 1) {
                        $featured = "Featured";
                    }
                    else {
                        $featured = "Not Featured";
                    }
                    
                    if ($status == 0) {
                        $status = "Active";
                    }
                    
                    else {
                        $status = "Inactive";
                    }
        ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $firstname ?></td>
                        <td><?= $lastname ?></td>
                        <td><?= $email ?></td>
                        <td><?= $occupation ?></td>
                        <td><?= $country ?></td>
                        <td><?= $star ?></td>
                        <td><?= $featured ?></td>
                        <td><?= $status ?></td>
                        <td><?= $date ?></td>
                        <td>
                            <a href="<?= URL ?>admin/ambassadors.php?edit=<?= $id ?>">
                                <button type="button" class="btn btn-warning btn-sm text-white">Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="">
                                <button type="button" class="btn btn-info btn-sm text-white">Change Avatar</button>
                            </a>
                        </td>
                        <?php if ($featured !== 1 ): ?>
                            <td>
                                <a href="">
                                    <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                </a>
                            </td>
                        <?php endif ?>
                    </tr>
        <?php
                }
            }
            else {
        ?>
                <tr>
                    <td colspan="12">No ambassador found</td>
                </tr>
        <?php      
            }
        ?>
            
    </tbody>
</table>





<?php
    include "./partials/footer.php";
?>
