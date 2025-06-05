
document.getElementById('idProofUpload').addEventListener('change', function(e) {
    const preview = document.getElementById('idPreview');
    if (this.files.length > 0) {
    const file = this.files[0];
    preview.classList.remove('d-none');
    preview.querySelector('.filename').textContent = file.name;
    
    // For image preview (if image file)
    if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
        preview.querySelector('i').outerHTML = `
            <img src="${e.target.result}" class="preview-thumbnail me-3" 
                style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
        `;
        }
        reader.readAsDataURL(file);
    }
    }
});

// Delete functionality
document.querySelector('#idPreview button').addEventListener('click', function() {
    document.getElementById('idProofUpload').value = '';
    document.getElementById('idPreview').classList.add('d-none');
});