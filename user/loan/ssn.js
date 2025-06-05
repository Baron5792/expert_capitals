    // for ssn display
    // Auto-format SSN with dashes
document.getElementById('userSsn').addEventListener('input', function(e) {
    // Get cursor position before modification
    const cursorPos = e.target.selectionStart;
    
    let val = e.target.value.replace(/\D/g, '');
    
    // Add dashes at correct positions
    if (val.length > 3) {
        val = val.slice(0, 3) + '-' + val.slice(3);
    }
    if (val.length > 6) {
        val = val.slice(0, 6) + '-' + val.slice(6);
    }
    
    // Limit to 9 digits (XXX-XX-XXXX)
    val = val.slice(0, 11);
    
    // Update value
    e.target.value = val;
    
    // Restore cursor position (adjusting for added dashes)
    let newCursorPos = cursorPos;
    if (cursorPos === 4 && val.length > 3) newCursorPos++;
    if (cursorPos === 7 && val.length > 6) newCursorPos++;
    e.target.setSelectionRange(newCursorPos, newCursorPos);
});

// Toggle visibility - improved version
document.getElementById('toggleSsnVisibility').addEventListener('click', function(e) {
    e.preventDefault();
    const input = document.getElementById('userSsn');
    const icon = document.getElementById('eye-icon');
    
    if (!input || !icon) {
        console.error("SSN input or icon element not found");
        return;
    }
    
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    icon.classList.toggle('bi-eye', !isPassword);
    icon.classList.toggle('bi-eye-slash', isPassword);
});
