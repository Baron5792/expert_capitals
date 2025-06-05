<?php
    include __DIR__ . "/./profile-header.php";
?>

<style>
    .profile-content {
        margin-top: 49px
    }

    #profile {
        color: black;
    }

    input[type="text"] {
        font-size: small;
    }

    input[type="email"] {
        color: silver;
        font-size: small;
    }

    .radio div {
        font-size: small;
    }

    .radio div {
        border: 1px solid silver;
        padding: 7px 7px;
        margin: 4px;
        border-radius: 7px
    }

    #profile {
        color: blue;
        background-color: #E7E9F8;
        border-right: 3px solid blue;
    }

    @media screen and (max-width: 767px) {
        .profile-links a span {
            display: none;
        }
    }

</style>

<script>
    document.getElementById('title_title').innerHTML = "Profile | Expert Capitals";
</script>

<?php if (isset($_SESSION['profile-error'])): ?>
    <div class="alert alert-dismissible alert-danger mt-3">
        <!--<button type="button" class="btn-close" data-bs-dismiss="alert"></button>-->
        <?=
            $_SESSION['profile-error'];
            unset($_SESSION['profile-error']);
        ?>
    </div>
<?php endif ?>

<?php if (isset($_SESSION['profile-success'])): ?>
    <div class="alert alert-dismissible alert-success mt-3">
        <!--<button type="button" class="btn-close" data-bs-dismiss="alert"></button>-->
        <?=
            $_SESSION['profile-success'];
            unset($_SESSION['profile-success']);
        ?>
    </div>
<?php endif ?>

<div class="container profile-content pb-4">
    <form action="<?= URL ?>user/update-profile.php" method="POST">
        <input type="hidden" name="userId" value="<?= $userId ?>">
        <div class="row">
            <div class="form-group col-md-6 col-12 mt-3">
                <label for="firstname">First Name <span class="text-danger">*</span></label>
                <input type="text" name="firstname" id="" value="<?= $firstname ?>" class="form-control">
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <label for="firstname">Last Name <span class="text-danger">*</span></label>
                <input type="text" name="lastname" value="<?= $lastname ?>" id="" class="form-control">
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <label for="firstname">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" value="<?= $email ?>" readonly id="" class="form-control">
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <label for="firstname">Mobile Number <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text text-secondary" id="toggle-confirm-password"><i>+</i></span>
                    <input type="text" readonly name="fullname" id="fullname" value="<?= $phone ?>" class="form-control">
                </div>
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <label for="">Gender</label>
                <div class="container">
                    <?php if ($gender == 1): ?>
                        <div class="row radio">
                            <div class="col-md-4">
                                <input type="radio" checked name="gender" value="1" id="gender">
                                Male
                            </div>
                            <div class="ml-2 col-md-4">
                                <input type="radio"  name="gender" value="0" id="gender">
                                Female
                            </div>
                        </div>
                    <?php elseif ($gender == 0): ?>
                        <div class="row radio">
                            <div class="col-md-4">
                                <input type="radio" name="gender" value="1" id="gender">
                                Male
                            </div>
                            <div class="ml-2 col-md-4">
                                <input type="radio" checked name="gender" value="0" id="gender">
                                Female
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="row radio">
                            <div class="col-md-4">
                                <input type="radio" name="gender" value="1" id="gender">
                                Male
                            </div>
                            <div class="ml-2 col-md-4">
                                <input type="radio" name="gender" value="0" id="gender">
                                Female
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <label for="firstname">Residential Address</label>
                <input type="text" name="address" value="<?= $address ?>" id="" class="form-control">
            </div>

            <div class="form-group col-md-6 col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-primary w-100">Save Changes</button>
            </div>
        </div>
    </form>
</div>




<?php
    include __DIR__ . "/./profile-footer.php";
?>