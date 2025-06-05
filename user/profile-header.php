<?php
    include __DIR__ . "/./partials/header.php";
?>

<style>
    .profile-img {
        position: relative;
    }

    .profile-img img {
        height: 100px;
        border-radius: 50%;
        width: 100px;
    }

    .profile-btn {
        margin-top: 38px;
    }

    .image-preview {
        width: 100%;
        height: 300px;
        /* border-radius: 50%; */
        object-fit: cover;
        display: none;
    }

    .image-upload {
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed #ccc;
        border-radius: 10px;
        padding: 20px;
        cursor: pointer;
        transition: border-color 0.3s;
    }

    .image-upload:hover {
        border-color: #343a40;
    }

    .image-upload input {
        display: none;
    }

    .image-upload label {
        cursor: pointer;
        color: #343a40;
        font-weight: lighter;
    }

    .profile-links a {
        color: E6E9F9;
        padding: 10px 8px;
    }

    @media screen and (max-width: 767px) {
        .profile-img img {
            width: 40px;
            height: 40px;
        }

        .profile-btn {
            margin-top: 0px;
            color: #BB5441;
        }

        .profile-links a span {
            display: none;
        }
    }
    </style>
    
<?php
    // Display SweetAlert if no error exists
    if (isset($_SESSION['success'])): 
?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['success']) ?>);
            });
        </script>
<?php
    unset($_SESSION['success']); 
    endif;
?>


<?php
    if (isset($_SESSION['error'])):
?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['error']) ?>)
            })
        </script>
<?php
    unset($_SESSION['error']);
    endif;
?>


<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Select Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <form action="<?= URL ?>user/update-avatar.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <div class="form-group">
                        <div class="image-upload">
                            <label for="profileImage">Click to select image</label>
                            <input type="file" class="form-control" id="profileImage" name="profileImage" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <img id="imagePreview" class="image-preview mt-3" src="#" alt="Image Preview">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary mt-4">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<div class="container pt-4">
    <p class="fs-4 fw-bold text-secondary">Account Settings</p>

    <div class="row">
        <div class="col-md-3 col-12 shadow pt-3 pb-3">
            <div class="row profile-links">
                <div class="col-4 col-md-12">
                    <a href="<?= URL ?>user/profile.php" class="text-decoration-none small d-block" id="profile"><span class="bi-person"></span> Profile</a>
                </div>
                <div class="col-4 col-md-12">
                    <a href="<?= URL ?>user/change-password.php" class="text-decoration-none small d-block" id="password"><span class="bi-gear"></span> Password</a>
                </div>
                <div class="col-4 col-md-12">
                    <a href="<?= URL ?>user/verification.php" class="text-decoration-none small d-block" id="verify"><span class="bi-check2-circle"></span> Verification</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-12 shadow pt-3 pb-3">
            <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2 col-md-3 profile-img">
                                <?php if (strlen($avatar) < 1): ?>
                                    <img src="<?= URL ?>assets/images/avatar/unknown.jpeg" alt="" class="">
                                <?php else: ?>
                                    <img src="<?= URL ?>assets/images/avatar/<?= $avatar ?>" alt="" class="">
                                <?php endif ?>
                            </div>
                            <div class="col-10 col-md-9 profile-btn mt-1">
                                <div class="row">
                                    <div class="col-6 col-md-3">
                                        <button type="button" class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#editProfileModal">Update New</button>
                                    </div>
                                    <div class="col-6 col-md-3">
                                        <?php if (strlen($avatar) > 0): ?>
                                            <a href="<?= URL ?>user/delete-avatar.php?userId=<?= $userId ?>">
                                                <button type="button" class="btn btn-light btn-sm">Delete Avatar</button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-dismissible alert-danger mt-3">
                <!--<button type="button" class="btn-close" data-bs-dismiss="alert"></button>-->
                <?=
                    $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
        </div>
        <?php endif ?>
