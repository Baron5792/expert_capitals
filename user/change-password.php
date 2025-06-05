<?php
    include __DIR__ . "/./profile-header.php";
?>

<style>
    #password {
        color: blue;
        background-color: #E7E9F8;
        border-right: 3px solid blue;
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Change Password | Expert Capitals";
</script>

<?php if (isset($_SESSION['profile-error'])): ?>
    <div class="alert alert-dismissible alert-danger mt-3">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?=
            $_SESSION['profile-error'];
            unset($_SESSION['profile-error']);
        ?>
    </div>
</div>
<?php endif ?>

<?php if (isset($_SESSION['profile-success'])): ?>
    <div class="alert alert-dismissible alert-success mt-3">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?=
            $_SESSION['profile-success'];
            unset($_SESSION['profile-success']);
        ?>
    </div>
</div>
<?php endif ?>


<div class="container mt-4">
    <form action="<?= URL ?>user/change-password-logic.php" method="POST">
        <input type="hidden" name="userId" value="<?= $userId ?>">
        <div class="row">
            <div class="form-group col-md-6 mt-3">
                <label for="">Current Password <span class="text-danger">*</span></label>
                <input type="password" name="current" class="form-control" id="">
            </div>

            <div class="form-group col-md-6 mt-3">
                <label for="">New Password <span class="text-danger">*</span></label>
                <input type="password" name="new" class="form-control" id="">
            </div>

            <div class="form-group col-md-6 mt-3">
                <label for="">Confirm New Password <span class="text-danger">*</span></label>
                <input type="password" name="confirm" class="form-control" id="">
            </div>

            <div class="form-group col-md-6 mt-3 mb-4">
                <button type="submit" name="submit" class="btn btn-primary w-100 mt-4">Change Password</button>
            </div>
        </div>
    </form>
</div>





<?php
    include __DIR__ . "/./profile-footer.php";
?>