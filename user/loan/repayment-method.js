document.addEventListener('DOMContentLoaded', function() {
  const repaymentMethod = document.getElementById('repaymentMethod');
  const container = document.getElementById('repaymentFieldsContainer');
  let currentMethod = null;

  repaymentMethod.addEventListener('change', function() {
    // Remove required attributes from previous fields
    if (currentMethod === 'flexible') {
      const fields = container.querySelectorAll('[required]');
      fields.forEach(field => field.removeAttribute('required'));
    }
    
    container.innerHTML = ''; // Clear previous fields
    currentMethod = this.value;
    
    if (this.value === 'flexible') {
        container.innerHTML = `
            <div class="form-group col-md-6 col-12 mt-3">
                <label for="duration">Choose your duration <span class="text-danger">*</span></label>
                <select class="form-control" id="duration" required>
                    <option value="" selected disabled>Select duration</option>
                    <option value="weekly">Weekly</option>
                    <option value="monthly">Monthly</option>
                    <option value="yearly">Yearly</option>
                </select>
            </div>
            <div class="form-group col-md-6 col-12 mt-3">
                <label for="fixedAmount">Fixed amount per payment <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="fixedAmount" min="1" required>
                </div>
            </div>
            <div class="form-group col-md-6 col-12 mt-3">
                <label for="flexibleTerm">Loan term (in months) <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="flexibleTerm" min="1" required>
            </div>
        `;
    } 
    else if (this.value === 'bullet') {
        container.innerHTML = `
            <div class="form-group col-md-6 col-12 mt-3">
                <label for="bulletTerm">Loan term (in months) <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="bulletTerm" min="1" required>
            </div>
        `;
    }
  });
});

// Custom form submission handler
document.querySelector('form').addEventListener('submit', function(e) {
  const method = document.getElementById('repaymentMethod').value;
  
  if (method === 'flexible') {
    if (!document.getElementById('duration').value || 
        !document.getElementById('fixedAmount').value || 
        !document.getElementById('flexibleTerm').value) {
      e.preventDefault();
      alert('Please fill all flexible repayment fields');
    }
  } 
  else if (method === 'bullet') {
    if (!document.getElementById('bulletTerm').value) {
      e.preventDefault();
      alert('Please enter the loan term');
    }
  }
});