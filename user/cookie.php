<style>
    .cookie-notice {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f7f7f7;
        border-top: 1px solid #ccc;
        padding: 10px;
        text-align: center;
        font-size: 12px;
        z-index: 1200;
    }

    .cookie-notice p {
        margin-bottom: 10px;
    }

    .cookie-notice button {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .cookie-notice button:hover {
        background-color: #3e8e41;
    }
</style>

<div id="cookie-notice" class="cookie-notice">
    <p>This website uses cookies to improve your experience. By continuing to browse, you agree to our <a href="<?= URL ?>terms-and-conditions.php">Terms and conditions</a>.</p>
    <button id="cookie-accept">Accept</button>
</div>



<script>
    const cookieNotice = document.getElementById('cookie-notice');
    const cookieAccept = document.getElementById('cookie-accept');

    cookieAccept.addEventListener('click', () => {
        cookieNotice.style.display = 'none';
        localStorage.setItem('cookie-accepted', 'true');
    });

    if (localStorage.getItem('cookie-accepted') === 'true') {
        cookieNotice.style.display = 'none';
    }
</script>