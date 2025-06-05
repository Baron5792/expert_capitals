<?php
    include __DIR__ . "/../partials/header.php";
?>

<script>
    document.getElementById("title_title").innerHTML = "Transfer | Expert Capitals";
</script>

<div class="-fluid pt-4 pb-4">
    <p class="fs-4 text-secondary">Overview</p>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 rounded shadow text-secondary pt-4 pb-4 text-center">
                <p>Aggregate</p>
                <p>0.00</p>
            </div>
            <div class="col-12 col-md-3 rounded shadow text-secondary pt-4 pb-4 text-center">
                <p>Total Number of Transfers</p>
                <p>0</p>
            </div>
            <div class="col-12 col-md-3 rounded shadow text-secondary pt-4 pb-4 text-center">
                <p>Last Transfer Date</p>
                <p>Today</p>
            </div>
            <div class="col-12 col-md-3 rounded shadow text-secondary pt-4 pb-4 text-center">
                <p>Transfer History</p>
                <a href="">
                    <button type="button" class="btn btn-primary btn-sm w-100">View History</button>
                </a>
            </div>
        </div>
    </div>

    <!-- end of overview -->

    <div>
        <p class="fs-4 text-secondary mt-4"><span class="bi-arrow-left-right small bounce-icon"></span> Transfer</p>
    </div>

    <div class="container-fluid">
        <p>Choose a transfer type to get started: </p>
        <div class="row">
            <button type="button" id="internal" class="btn btn-light col-md-6 col-12 mt-2 bg-normal">Internal Transfer <span class="bi bi-arrow-left-right"></span></button>

            <button type="button" id="external" class="btn btn-light col-md-6 col-12 mt-2 bg-normal">External Transfer <span class="bi bi-box-arrow-up-right"></span></button>
        </div>
    </div>

    <p class="mt-3">Please fill out all required fields to initiate the transfer:</p>
    <p>All fields are mandatory. Once you've filled out the form, we'll retrieve the necessary information to complete your transfer</p>

    

