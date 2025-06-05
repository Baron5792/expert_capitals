document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('multiStepForm');
    const steps = document.querySelectorAll('.form-step');
    const progressSteps = document.querySelectorAll('.progress-step');
    const nextButtons = document.querySelectorAll('.next-btn');
    const prevButtons = document.querySelectorAll('.prev-btn');
    let currentStep = 0;

    // Initialize form
    showStep(currentStep);

    // Dynamic Repayment Fields Setup
    const repaymentMethod = document.getElementById('repaymentMethod');
    const container = document.getElementById('repaymentFieldsContainer');
    const loanAmountInput = document.getElementById('loanAmount');
    
    // Add event listeners to all required fields for real-time validation
    document.querySelectorAll('[required]').forEach(input => {
        input.addEventListener('input', validateCurrentStep);
        if (input.type === 'checkbox' || input.type === 'radio') {
            input.addEventListener('change', validateCurrentStep);
        }
    });
    
    // Add event listener to loan amount
    loanAmountInput?.addEventListener('input', validateCurrentStep);
    
    repaymentMethod?.addEventListener('change', function() {
        updateRepaymentFields();
        validateCurrentStep();
    });

    // Next button functionality
    nextButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            if (!validateCurrentStep()) {
                e.preventDefault();
                highlightEmptyFields();
                return;
            }
            currentStep++;
            showStep(currentStep);
            updateProgress();
        });
    });

    // Previous button functionality
    prevButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
            updateProgress();
        });
    });

    // Enhanced validation function
    function validateCurrentStep() {
        const currentStepEl = steps[currentStep];
        const requiredInputs = currentStepEl.querySelectorAll('[required]');
        let isValid = true;

        requiredInputs.forEach(input => {
            // Reset error state
            input.classList.remove('error');
            const errorElement = document.getElementById(`${input.id}-error`);
            if (errorElement) {
                errorElement.textContent = '';
            }

            // Special handling for different input types
            if (input.type === 'checkbox' && !input.checked) {
                isValid = false;
            } 
            else if (input.type === 'radio') {
                const radioGroupName = input.name;
                const radioChecked = currentStepEl.querySelector(`input[name="${radioGroupName}"]:checked`);
                if (!radioChecked) {
                    isValid = false;
                }
            }
            else if (input.type === 'select-one' && input.value === '') {
                isValid = false;
            }
            else if (input.value.trim() === '') {
                isValid = false;
            }
            
            // Custom validation for specific fields
            if (input.id === 'loanAmount' && input.value) {
                const amount = parseFloat(input.value);
                if (isNaN(amount) || amount <= 0) {
                    isValid = false;
                    showError(input, 'Please enter a valid loan amount');
                }
            }
        });

        const nextBtn = currentStepEl.querySelector('.next-btn');
        if (nextBtn) {
            nextBtn.disabled = !isValid;
        }

        return isValid;
    }

    function highlightEmptyFields() {
        const currentStepEl = steps[currentStep];
        const requiredInputs = currentStepEl.querySelectorAll('[required]');
        
        requiredInputs.forEach(input => {
            let isEmpty = false;
            
            if (input.type === 'checkbox' && !input.checked) {
                isEmpty = true;
            } 
            else if (input.type === 'radio') {
                const radioGroupName = input.name;
                const radioChecked = currentStepEl.querySelector(`input[name="${radioGroupName}"]:checked`);
                if (!radioChecked) {
                    isEmpty = true;
                    // Only show error for the first radio in the group
                    const firstRadio = currentStepEl.querySelector(`input[name="${radioGroupName}"]`);
                    if (input === firstRadio) {
                        showError(firstRadio, 'This field is required');
                    }
                }
            }
            else if (input.value.trim() === '') {
                isEmpty = true;
                showError(input, 'This field is required');
            }
            
            if (isEmpty) {
                input.classList.add('error');
            }
        });
    }

    function showError(input, message) {
        input.classList.add('error');
        let errorElement = document.getElementById(`${input.id}-error`);
        
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.id = `${input.id}-error`;
            errorElement.className = 'error-message';
            input.insertAdjacentElement('afterend', errorElement);
        }
        
        errorElement.textContent = message;
    }

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            step.classList.toggle('active', index === stepIndex);
            // Validate when showing a new step
            if (index === stepIndex) {
                validateCurrentStep();
            }
        });
    }

    function updateProgress() {
        progressSteps.forEach((step, index) => {
            step.classList.remove('active', 'completed');
            if (index < currentStep) {
                step.classList.add('completed');
            } else if (index === currentStep) {
                step.classList.add('active');
            }
        });
    }

    function updateRepaymentFields() {
        // Your existing repayment fields update logic
        // Make sure to call validateCurrentStep() after updating fields
    }

    // Initialize dynamic fields if repayment method is already selected
    if (repaymentMethod?.value) {
        updateRepaymentFields();
    }
});