document.getElementById('multiStepForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const form = this; // declare the form's variable

    let allStepsValid = true;
    const steps = document.querySelectorAll('.form-step');
    
    steps.forEach(step => {
        const requiredInputs = step.querySelectorAll('[required]');
        requiredInputs.forEach(input => {
            if (input.type === 'checkbox' && !input.checked) {
                allStepsValid = false;
            } 
            else if (input.type === 'radio') {
                const radioGroupName = input.name;
                const radioChecked = document.querySelector(`input[name="${radioGroupName}"]:checked`);
                if (!radioChecked) {
                    allStepsValid = false;
                }
            }
            else if (input.value.trim() === '') {
                allStepsValid = false;
            }
        });
    });

    if (!allStepsValid) {
        // Show error if any required fields are missing
        Swal.fire({
            title: 'Incomplete Application',
            icon: 'error',
            text: 'Please complete all required fields before submitting.',
            confirmButtonColor: '#3085d6',
        });
        return;
    }

    // If all valid, show confirmation
    Swal.fire({
        title: 'Confirm Loan Application',
        icon: 'warning',
        html: `<p class="small text-secondary">Please review your details before submitting. Once submitted, your application will be processed within 2-3 business days. Do you wish to proceed?</p>`,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Yes, submit!',
        cancelButtonText: 'Not yet!',
        cancelButtonColor: 'grey'
    }).then((result) => {
        if (result.isConfirmed) {
            // Use the stored form reference
            form.submit();
        }
    });
});