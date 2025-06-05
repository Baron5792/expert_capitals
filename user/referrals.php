<?php
    include __DIR__ . "/./partials/header.php";

    $ref_code = "https://zinofix.org/register.php?ref=" . $ref_id;
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 190px;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: center;
    }

    table th {
        background-color: #f2f2f2;
        text-align: center;
        font-weight: lighter;
    }

    table {
        text-align: center;
        margin-bottom: 40px;
    }

    .ref {
        word-wrap: break-word;
    }

    @media screen and (max-width: 767px) {
        table th:nth-child(3), table td:nth-child(4), table th:nth-child(4), table td:nth-child(3) {
            display: none;
        }
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Referrals | Expert Capitals";

    function copyReferralCode() {
        const referralCode = document.querySelector('.referral-code').innerText;
        const tempInput = document.createElement('input');
        tempInput.value = referralCode;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        // alert('Referral code copied to clipboard');
        Swal.fire({
            title: 'Copied',
            text: 'Your referral link has been been successfully copied to your clipboard',
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: 'green'
        })
    }

    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.referral-row');
        const seeMoreButton = document.getElementById('seeMoreButton');
        let visibleRows = 7;

        function updateVisibleRows() {
            rows.forEach((row, index) => {
                row.style.display = index < visibleRows ? '' : 'none';
            });

            if (visibleRows >= rows.length) {
                seeMoreButton.style.display = 'none';
            }
        }

        seeMoreButton.addEventListener('click', function () {
            visibleRows += 7;
            updateVisibleRows();
        });

        updateVisibleRows();
    });
</script>


<div class="container-fluid mt-4">
    <div>
        <p class="fs-4 text-secondary"><span class="bi-people small bounce-icon"></span> Referrals</p>
    </div>
    <div>
        <p class="">Invite friends to join our community and earn attractive rewards!</p>
        <p class="fs-5 text-secondary">How it Works</p>
        <ul>
            <li>Share your unique referral link with friends and family.</li>
            <li>When they sign up and make a deposit, you'll receive a referral reward.</li>
            <li>Earn interest on your reward, and watch your earnings grow!</li>
        </ul>
        <p class="fs-5 text-secondary">Start Referring Now!</p>
        <p>Share your referral link:</p>
        <p class="fw-light text-secondary ref"><span class="bi-box-arrow-up"></span> <span class="referral-code"><?= $ref_code ?></span> <button type="button" class="btn btn-normal" onclick="copyReferralCode()"><span class="bi-files"></span></button></p>
    </div>


    <table>
        <thead>
            <tr>
                <th>S/N</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Reward Earned ($)</th>
                <th>No. Deposits</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($connection, "SELECT * FROM users WHERE sponsor_id= '$ref_id'");
                if (mysqli_num_rows($query) > 0) {
                    $sn = 1;
                    foreach ($query as $row) {
                        $id = $row['id'];
                        $fullname = $row['firstname'] . " " . $row['lastname'];
                        $email = $row['email'];
                        $deposit_interest = $row['deposit_interest'];
                        $date = $row['date'];
                        $interest = $row['interest'];

                        // date format
                        $day = date('j', strtotime($date));
                        $month = date('F', strtotime($date));
                        $year = date('Y', strtotime($date));
                        $formattedDate = "$day $month $year";

                        // fetch amount of deposits
                        $sql = mysqli_query($connection, "SELECT * FROM deposit WHERE userId= '$id' AND status= 'accepted'");
                        $deposits = mysqli_num_rows($sql);
            ?>
                        <tr class="small referral-row">
                            <td><?= $sn++ ?></td>
                            <td><?= $fullname ?></td>
                            <td><?= $email ?></td>
                            <td><?= $interest ?></td>
                            <td><?= $deposits ?></td>
                            <td><?= $formattedDate ?></td>
                        </tr>
            <?php
                    }
                } else {
            ?>
                    <tr>
                        <td colspan="7" class="bounce-icon">No records found</td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <button id="seeMoreButton" class="btn btn-primary btn-sm">See More</button>
</div>



<?php
    include __DIR__ . "/./partials/footer.php";
?>