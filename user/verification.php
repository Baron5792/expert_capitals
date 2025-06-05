<?php
    include __DIR__ . "/./profile-header.php";

    $extension = explode("@", $email)[0];
    $first = substr($extension, 0, 2); // Get the first two characters of the domain
    $end = substr($email, strpos($email, "@") + 1);

    // fetch kyc status
    $sql = mysqli_query($connection, "SELECT * FROM kyc WHERE userId= '$userId' ORDER BY date DESC LIMIT 1");
    if (mysqli_num_rows($sql) > 0) {
        $data = mysqli_fetch_assoc($sql);
        $status = $data['status'];
    }
    else {
        $status = "null";
    }
?>

<style>
    .profile-content {
        margin-top: 49px
    }

    #verify {
        color: blue;
        background-color: #E7E9F8;
        border-right: 3px solid blue;
    }

    .rotating-cog {
        display: none;
        font-size: 14px;
        animation: rotate 2s linear infinite;
    }

    @keyframes rotate {
        100% {
            transform: rotate(360deg);
        }
    }

    .drop-zone {
        border: 2px dashed #ccc;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: border-color 0.3s;
    }

    .drop-zone:hover {
        border-color: #343a40;
    }

    .drop-zone img {
        max-width: 100%;
        display: none;
    }

    .image-preview {
        width: 100%;
        height: 400px;
        object-fit: cover;
        display: none;
        margin-top: 20px;
    }

    #kycImageInput {
        display: none;
    }
</style>

<script>
    document.getElementById("title_title").innerHTML = "Verifications | Expert Capitals";

    function showVerificationModal(modalId) {
        var modal = new bootstrap.Modal(document.getElementById(modalId));
        modal.show();
    }

    function verifyEmail() {
        const cog = document.getElementById('rotatingCogEmail');
        cog.style.display = 'inline-block';
        setTimeout(() => {
            cog.style.display = 'none';
            showVerificationModal('verificationEmailModal');
        }, 2000); // Simulate a delay for the verification process
    }

    function verifyKYC() {
        const cog = document.getElementById('rotatingCogKYC');
        cog.style.display = 'inline-block';
        setTimeout(() => {
            cog.style.display = 'none';
            showVerificationModal('verificationKYCModal');
        }, 2000); // Simulate a delay for the verification process
    }

    function handleDrop(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('kycImagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
                document.getElementById('kycSubmitButton').disabled = false;
            };
            reader.readAsDataURL(file);
        }
    }

    function handleDragOver(event) {
        event.preventDefault();
    }

    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('kycImagePreview');
                preview.src = e.target.result;
                preview.style.display = 'block';
                document.getElementById('kycSubmitButton').disabled = false;
            };
            reader.readAsDataURL(file);
        }
    }

    function resendEmail() {
        const resendButton = document.getElementById('resendEmailButton');
        resendButton.disabled = true;
        resendButton.innerText = 'Resending...';

        // Make an AJAX request to send the email
        fetch('send-verification-email.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email: '<?= $email ?>' }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Verification email sent successfully!');
            } else {
                alert('Failed to send verification email. Please try again later.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });

        // Set a 40-second interval before enabling the button
        let countdown = 40;
        const interval = setInterval(() => {
            resendButton.innerText = `Resend Email (${countdown}s)`;
            countdown--;

            if (countdown < 0) {
                clearInterval(interval);
                resendButton.disabled = false;
                resendButton.innerText = 'Click to resend email';
            }
        }, 1000);
    }
</script>

<div class="container profile-content pb-4">
    <div class="row">
        <div class="col-md-10 col-12">
            <p class="fw-bold text-secondary mb-0">Verify Email</p>
            <p class="small mt-0">Click the verification button to activate your account</p>
        </div>
        <div class="col-md-2 pt-1">
            <?php
                $query = mysqli_query($connection, "SELECT * FROM users WHERE id= '$userId'");
                if (mysqli_num_rows($query) > 0) {
                    $data = mysqli_fetch_assoc($query);
                    $verify = $data['email_verify_track'];
                }
            ?>
            <?php if ($verify == 0): ?>
                <button type="button" class="btn btn-primary btn-sm" onclick="verifyEmail()">Verify Email <i id="rotatingCogEmail" class="fa fa-cog rotating-cog small"></i></button>
            <?php else: ?>
                <p class="text-success font-cursive">Verified <span class="fas fa-check text-success bounce-icon"></span></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-10 col-12">
            <p class="fw-bold text-secondary mb-0">Verify KYC</p>
            <p class="small mt-0">Click the verification button to verify your KYC</p>
        </div>
        <div class="col-md-2 pt-1">
            <!-- check status -->
            <?php if ($status == "declined"): ?>
                <button type="button" class="btn btn-primary btn-sm" onclick="verifyKYC()">Verify KYC <i id="rotatingCogKYC" class="fa fa-cog rotating-cog small"></i></button>
            <?php elseif ($status == "accepted"): ?>
                <p class="text-success font-cursive">Verified <span class="fas fa-check text-success bounce-icon"></span></p>
            <?php elseif ($status == "pending"): ?>
                <p class="text-warning font-cursive">Pending <span class="fas fa-exclamation-triangle bounce-icon"></span></p>
            <?php else: ?>
                <button type="button" class="btn btn-primary btn-sm" onclick="verifyKYC()">Verify KYC <i id="rotatingCogKYC" class="fa fa-cog rotating-cog small"></i></button>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Email Verification Modal -->
<div class="modal fade" id="verificationEmailModal" tabindex="-1" aria-labelledby="verificationEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationEmailModalLabel">Email Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-4">
                <div class="container pb-4 pt-2">
                    <p>An email has been sent to <span style="color: #EB7B54;"><?= $first . "*********@" . $end ?> </span></p>
                    <ul>
                        <li>Check your spam folder</li>
                        <li>Resend the verification email if you didn't receive it</li>
                    </ul>
                    <button id="resendEmailButton" class="btn btn-primary btn-sm" onclick="resendEmail()">Click to resend email</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- KYC Verification Modal -->
<div class="modal fade" id="verificationKYCModal" tabindex="-1" aria-labelledby="verificationKYCModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationKYCModalLabel">KYC Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pb-4">
                <div class="container pb-4 pt-2">
                    <p>Please upload a clear, high-quality image of your government-issued ID for KYC verification. Accepted IDs include:</p>
                    <ul>
                        <li class="small">Passport</li>
                        <li class="small">Driver's license</li>
                        <li class="small">National ID card</li>
                    </ul>
                    <form action="<?= URL ?>user/update-kyc.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="userId" value="<?= $userId ?>">
                        <div class="drop-zone" ondrop="handleDrop(event)" ondragover="handleDragOver(event)">
                            <p>Drag & drop an image here, or click to select one</p>
                            <input type="file" id="kycImageInput" name="image" accept="image/*" onchange="handleFileSelect(event)">
                            <label for="kycImageInput">Click to select image</label>
                        </div>
                        <img id="kycImagePreview" class="image-preview" src="#" alt="Image Preview">
                        <button type="submit" name="submit" id="kycSubmitButton" class="btn btn-primary w-100 mt-3 small" disabled>Upload KYC</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "./partials/footer.php";
?>