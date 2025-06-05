// income preview 
document.getElementById('incomeProof').addEventListener('change', function(e) {
    const preview = document.getElementById('incomePreview');
    preview.innerHTML = '';
    preview.classList.remove('d-none');
    
    if (this.files.length > 0) {
    const file = this.files[0];
    const previewItem = document.createElement('div');
    previewItem.className = 'd-flex align-items-center justify-content-between bg-light p-2 rounded';
    previewItem.innerHTML = `
        <div>
        <i class="bi bi-file-earmark-text me-2"></i>
        <span>${file.name}</span>
        </div>
        <button class="btn btn-sm btn-outline-danger" onclick="this.parentNode.remove()">
        <i class="bi bi-trash"></i>
        </button>
    `;
    preview.appendChild(previewItem);
    }
});