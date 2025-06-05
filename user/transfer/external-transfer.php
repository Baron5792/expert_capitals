<?php
    include __DIR__ . "/./transfer-board.php";
    $userId = $_SESSION['user']['id'];
    $regNo = $_SESSION['user']['reg_no'];
?>

<style>
    #external {
        background-color: grey;
        color: silver;
    }

    .external-img img {
        width: 70px;
        border-radius: 40%;
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "External Transfer | Expert Capital";
    document.getElementById("regId").addEventListener("input", function() {
        const regId = this.value;
        if (regId.length === 10) {
            window.location.href = "<?= URL ?>user/transfer/fetch-user.php?regId=" + regId;
        }
    });

</script>

<div class="container-fluid mt-4">
    <div class="mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <form action="<?= URL ?>user/transfer/fetch-user.php" method="POST">
                    <input type="hidden" name="userId" value="<?= $userId ?>">
                    <label for="recipient" class="form-label small">Recipient's ID →</label>
                    <div class="input-group mb-3">
                        <input type="text" maxlength="10" name="regId" class="form-control" required placeholder="Enter recipient's ID">
                        <button class="btn btn-success" name="submit" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-12">
                <?php
                    if (isset($_GET['uniq'])) {
                        $uniqId = $_GET['uniq'];
                        $query = mysqli_query($connection, "SELECT * FROM external_track WHERE uniqId= '$uniqId' AND userId= '$userId'");
                        if (mysqli_num_rows($query) > 0) {
                            $data = mysqli_fetch_assoc($query);
                            $regId = $data['regId'];

                            // check for current user
                            if ($regId !== $regNo) {
                                // check for related user
                                $check = mysqli_query($connection, "SELECT * FROM users WHERE reg_no= '$regId'");
                                if (mysqli_num_rows($check) > 0) {
                                    $row = mysqli_fetch_assoc($check);
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $username = $row['username'];
                                    $avatar = $row['avatar'];
                ?>
                                    <div id="spinner" class="text-center my-4">
                                        <i class="fas fa-cog fa-spin fa-1x"></i>
                                    </div>
                                    <div class="receivers_con" style="display: none;">
                                        <form action="<?= URL ?>user/transfer/external-logic.php" method="POST">
                                            <input type="hidden" name="userId" value="<?= $userId ?>">
                                            <p class="fs-4 text-secondary">Confirm Transfer</p>
                                            <p>Receiver's Details:</p>
                                            <!-- receivers avatar here -->
                                            <div class="external-img text-center mb-2">
                                                <?php if (strlen($avatar) < 1): ?>
                                                    <img src="<?= URL ?>assets/images/avatar/unknown.jpeg" alt="avatar">
                                                <?php else: ?>
                                                    <img src="<?= URL ?>assets/images/avatar/<?= $avatar ?>" alt="avatar">
                                                <?php endif ?>
                                            </div>
                                            <ul>
                                                <li><em>Name:</em> <?= $firstname . " " . $lastname ?></li>
                                                <li><em>Username:</em> @<?= $username ?></li>
                                                <li><em>ID:</em> <?= $regId ?></li>
                                                <li><em>Account Type:</em> Personal</li>
                                            </ul>

                                            <div class="form-group col-12 col-md-6 mb-3">
                                                <div class="input-group">
                                                    <span class="input-group-text">$</span>
                                                    <input type="number" class="form-control" placeholder="Enter amount">
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="check1" name="option1" required value="something">
                                                <label class="form-check-label small">
                                                    I understand that initiating a transfer will incur certain fees and charges, and I authorize the transfer of funds from my account to the recipient's account.

                                                    I also confirm that I am the authorized account holder, and I am responsible for ensuring the accuracy of the transfer details.
                                                </label>
                                            </div>

                                            <button type="submit" class="btn btn-success col-12 col-md-6 mt-3">Confirm Transfer</button>

                                        </form>
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const spinner = document.getElementById("spinner");
                                            const receiversCon = document.querySelector(".receivers_con");

                                            setTimeout(() => {
                                                spinner.style.display = "none";
                                                receiversCon.style.display = "block";
                                            }, 10000); // 10 seconds
                                        });
                                    </script>
                <?php
                                }

                                else {
                                    echo "<p class='text-danger small'>No user found, please try again</p>";
                                }
                            }

                            else {
                                echo "<p class='text-danger small'>Invalid user, please try again</p>";
                            }
                        }

                        else {
                            echo "<p class='text-danger small'>No record's found</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    include __DIR__ . "/./transfer-footer.php";
?>