document.addEventListener('DOMContentLoaded', function() {
    const loanAmountInput = document.getElementById('loanAmount');
    const repaymentMethod = document.getElementById('repaymentMethod');
    
    // Listen to all input changes
    [loanAmountInput, repaymentMethod].forEach(element => {
        element.addEventListener('change', calculateLoan);
    });
    
    // Also listen to dynamic field changes
    document.addEventListener('input', function(e) {
        if (e.target.matches('#fixedAmount, #flexibleTerm, #bulletTerm')) {
            calculateLoan();
        }
    });
});

function calculateLoan() {
    const principal = parseFloat(document.getElementById('loanAmount').value) || 0;
    const interestRate = 0.7 / 100; // 0.7%
    const method = document.getElementById('repaymentMethod').value;
    
    if (!principal || !method) return;
    
    let termMonths, totalInterest, totalRepayment;
    
    if (method === 'flexible') {
        const fixedAmount = parseFloat(document.getElementById('fixedAmount').value) || 0;
        termMonths = parseInt(document.getElementById('flexibleTerm').value) || 0;
        
        if (fixedAmount <= 0 || termMonths <= 0) return;
        
        totalInterest = principal * interestRate * (termMonths / 12);
        totalRepayment = principal + totalInterest;
        
    } else if (method === 'bullet') {
        termMonths = parseInt(document.getElementById('bulletTerm').value) || 0;
        
        if (termMonths <= 0) return;
        
        totalInterest = principal * interestRate * (termMonths / 12);
        totalRepayment = principal + totalInterest;
    }
    
    // Display results
    document.getElementById('displayPrincipal').textContent = `$${principal.toFixed(2)}`;
    document.getElementById('displayMethod').textContent = method === 'flexible' ? 'Flexible Repayment' : 'Bullet Repayment';
    document.getElementById('displayTerm').textContent = `${termMonths} months`;
    document.getElementById('displayTotalInterest').textContent = `$${totalInterest.toFixed(2)}`;
    document.getElementById('displayTotalRepayment').textContent = `$${totalRepayment.toFixed(2)}`;
    document.getElementById('displayLogicTrack').value = totalRepayment.toFixed(2);
    
    // Show results
    document.getElementById('calculationResults').style.display = 'block';
}