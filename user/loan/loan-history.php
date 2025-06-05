<?php
    include __DIR__ . "/../partials/header.php";
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
        font-size: 13px;
    }
    
    table td {
        font-size: 13px;
    }

    table {
        text-align: center;
        margin-bottom: 40px;
    }

    @media screen and (max-width: 767px) {
        table th:nth-child(2), table td:nth-child(2) {
            display: none;
        }
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Loan History | Expert Capitals";
</script>

    <!-- display swal alert -->
<?php
    // Display SweetAlert if error exists
    if (isset($_SESSION['swal_success'])): 
?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire(<?= json_encode($_SESSION['swal_success']) ?>);
            });
        </script>
<?php
        // Clear the error after displaying
        unset($_SESSION['swal_success']); 
    endif;
?>

<div class="container-fluid mt-4">
    <div>
        <p class="fs-4 text-secondary"><span class="bi bi-graph-up small bounce-icon"></span> Loan History</p>
    </div>
    
    <!--table data-->
    <table>
        <tr>
            <th>S/N</th>
            <th></th>
            <th>Amount ($)</th>
            <th>Bank</th>
            <th>Account No.</th>
            <th>Repayment Term</th>
            <th>Repayment Amount ($)</th>
            <th>Repayment Frequency</th>
            <th>Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php
            $query = mysqli_query($connection, "SELECT * FROM loan WHERE userId= '$userId' ORDER BY id DESC");
            if (mysqli_num_rows($query) > 0) {
                $sn = 1;
                foreach ($query as $row) {
                    $id = $row['id'];
                    $uniqId = $row['uniqId'];
                    $amount = $row['amount'];
                    $bank = $row['bankName'];
                    $account_no = $row['account_number'];
                    $term = $row['terms'];
                    $repaymentAmount = $row['repaymentAmount'];
                    $repaymentFrequency = $row['repaymentFrequency'];
                    $date = $row['date'];
                    $status = $row['status'];
                    $day = date('j', strtotime($date));
                    $month = date('F', strtotime($date));
                    $year = date('Y', strtotime($date));
                    $time = date('h:i A', strtotime($date));
                    $formattedDate = "$day $month $year";
        ?>
                    <tr>
                        <td><?= $sn++ ?></td>
                        <td><?= $uniqId ?></td>
                        <td><?= $amount ?></td>
                        <td><?= $bank ?></td>
                        <td><?= $account_no ?></td>
                        <td><?= $term ?></td>
                        <td><?= $repaymentAmount ?></td>
                        <td><?= $repaymentFrequency ?></td>
                        <td><?= $formattedDate ?></td>
                        <?php if ($status == 'pending'): ?>
                            <td><button type="button" class="btn btn-warning btn-sm button button4 text-sm">Pending</button></td>
                        <?php elseif ($status == 'accepted'): ?>
                            <td><button type="button" class="btn btn-success btn-sm button button4">Accepted</button></td>
                        <?php else: ?>
                            <td><button type="button" class="btn btn-danger btn-sm button button4">Declined</button></td>
                        <?php endif ?>
                        <td>
                            <a href="">
                                <button type="button" class="btn btn-normal btn-sm">
                                    <span class="bi bi-eye"></span>
                                </button>
                            </a>
                        </td>
                    </tr>
        <?php
                }
            }
            
            else {
                echo "<tr>
                    <td class='bounce-icon' colspan='12'>No Loan records found</td>
                </tr>";
            }
        ?>
    </table>
    
</div>


<?php
    include __DIR__ . "/../partials/footer.php";
?>