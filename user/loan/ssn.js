// Format SSN with dashes
function formatSsn(input) {
    // Get cursor position before modification
    const cursorPos = input.selectionStart;
    const originalLength = input.value.length;
    
    // Remove all non-digits
    let val = input.value.replace(/\D/g, '');
    
    // Add dashes at correct positions
    if (val.length > 3) {
        val = val.slice(0, 3) + '-' + val.slice(3);
    }
    if (val.length > 5) {
        val = val.slice(0, 6) + '-' + val.slice(6);
    }
    
    // Limit to 9 digits (XXX-XX-XXXX format)
    val = val.slice(0, 11);
    
    // Update value only if changed
    if (input.value !== val) {
        input.value = val;
        
        // Adjust cursor position
        let newCursorPos = cursorPos;
        if (originalLength < input.value.length) { // Added characters
            if (cursorPos === 3 || cursorPos === 6) newCursorPos++;
        } else if (originalLength > input.value.length) { // Removed characters
            if (cursorPos === 4 || cursorPos === 7) newCursorPos--;
        }
        input.setSelectionRange(newCursorPos, newCursorPos);
    }
}

// Toggle visibility
document.getElementById('toggleSsnVisibility').addEventListener('click', function(e) {
    e.preventDefault();
    const input = document.getElementById('userSsn');
    const icon = document.getElementById('eye-icon');
    
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    icon.classList.toggle('bi-eye', !isPassword);
    icon.classList.toggle('bi-eye-slash', isPassword);
});