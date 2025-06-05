<?php
    include (__DIR__ . "/./partials/header.php");
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
        table th:nth-child(2), table td:nth-child(5), table th:nth-child(5), table td:nth-child(2) {
            display: none;
        }
    }

    .transaction-container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    .transaction-header {
        background-color: #b95441;
        padding: 20px;
        text-align: center;
    }
    
    .transaction-header img {
        width: 140px;
    }

    .transaction-body {
        padding: 20px;
        color: #333333;
    }
    .transaction-body h1 {
        color: #b95441;
    }
    .transaction-footer {
        text-align: center;
        padding: 10px;
        background-color: #f4f4f9;
        font-size: 12px;
        color: #888888;
    }
    .print-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #b95441;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
    }
    .print-button:hover {
        background-color: #a04438;
    }


</style>

<script>
    document.getElementById("title_title").innerHTML = "Transactions | Expert Capitals";
</script>

<script>
  document.getElementById("title_title").innerHTML = "Transactions | Expert Capitals";
  
  function printTransaction(uniqId, title, amount, status, date) {
    document.getElementById("print-uniqId").innerHTML = "Transaction ID: " + uniqId;
    document.getElementById("print-title").innerHTML = "Title: " + title;
    document.getElementById("print-amount").innerHTML = "Amount: " + amount;
    document.getElementById("print-status").innerHTML = "Status: " + status;
    document.getElementById("print-date").innerHTML = "Date: " + date;
    
    var printArea = document.getElementById("print-area");
    var WinPrint = window.open('', '', 'width=600,height=400');
    WinPrint.document.write(printArea.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
  }
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const alertDiv = document.getElementById("alert-div");
        setTimeout(() => {
            alertDiv.style.display = "none";
        }, 10000); // 10 seconds
    });
</script>


<div class="container-fluid mt-4">
    <div>
        <p class="fs-4 text-secondary"><span class="bi-clipboard-data bounce-icon"></span> Transactions</p>
        <div class="alert alert-info" id="alert-div" role="alert">
            <p>This page displays a record of your recent transactions, including deposits, withdrawals, and other account activity.</p>
            <p>Please review this information carefully to ensure that all transactions are accurate and up-to-date.</p>
        </div>

    </div>

    <!-- table -->
    <table>
        <thead>
            <th>S/N</th>
            <th>Transaction ID</th>
            <th>Title</th>
            <th>Amount ($)</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
        </thead>
        <tbody>
            <?php
                $query = mysqli_query($connection, "SELECT * FROM transactions WHERE userId= '$userId' ORDER BY date DESC LIMIT 13");
                if (mysqli_num_rows($query) > 0) {
                    $sn = 1;
                    foreach ($query as $row) {
                        $title = $row['title'];
                        $status = $row['status'];
                        $uniqId = $row['uniqId'];
                        $amount = $row['amount'];
                        $date = $row['Date'];

                        $day = date('j', strtotime($date));
                        $month = date('F', strtotime($date));
                        $year = date('Y', strtotime($date));
                        $time = date('h:i A', strtotime($date));
                        $formattedDate = "$day $month $year";
            ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $uniqId ?></td>
                            <td><?= $title ?></td>
                            <td><?= $amount ?></td>
                            <td><?= $status ?></td>
                            <td><?= $formattedDate ?></td>
                            <td>
                                <button type="button" class="btn btn-normal" onclick="printTransaction('<?= $uniqId ?>', '<?= $title ?>', '<?= $amount ?>', '<?= $status ?>', '<?= $formattedDate ?>')"><span class="bi bi-printer"></span></button>
                            </td>
                        </tr>
            <?php
                    }
                }

                else {
            ?>
                    <tr>
                        <td colspan="7" class="bounce-icon">No transaction records found</td>
                    </tr>
            <?php
                }
            ?>
        </tbody>

    </table>
</div>


<div id="print-area" style="display: none;">
  <div class="transaction-container">
    <div class="transaction-header">
      <img src="https://zinofix.org/assets/images/logoIcon/logo.png" alt="Expert Capitals Logo">
    </div>
    <div class="transaction-body">
      <h2>Transaction Slip</h2>
      <p id="print-uniqId"></p>
      <p id="print-title"></p>
      <p id="print-amount"></p>
      <p id="print-status"></p>
      <p id="print-date"></p>
      <p>Thank you for choosing Expert Capitals.</p>
      <p>Best regards,</p>
      <p>The Expert Capitals Team</p>
    </div>
    <div class="transaction-footer">
      &copy; 2023 Expert Capitals. All rights reserved.
    </div>

</div>






<?php
    include (__DIR__ . "/./partials/footer.php");
?>