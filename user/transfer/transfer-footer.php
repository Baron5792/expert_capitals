</div>





<script>
    document.getElementById("internal").addEventListener("click", function() {
        window.location.href = "<?= URL ?>user/transfer/internal-transfer.php";
    })

    document.getElementById("external").addEventListener("click", function() {
        window.location.href = "<?= URL ?>user/transfer/external-transfer.php";
    })
</script>

<?php
    include __DIR__ . "/../partials/footer.php";
?>