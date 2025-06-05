document.addEventListener('DOMContentLoaded', function() {
  // Set up for each file input
  setupFileInput('idProof');
  setupFileInput('addressProof');
  setupFileInput('incomeProof');
  
  function setupFileInput(inputId) {
    const input = document.getElementById(inputId);
    const previewContainer = document.getElementById(`${inputId}-preview`);
    
    input.addEventListener('change', function(e) {
      previewContainer.innerHTML = '';
      
      if (this.files && this.files.length > 0) {
        const file = this.files[0];
        const previewItem = createPreviewItem(file);
        previewContainer.appendChild(previewItem);
      }
    });
  }
  
  function createPreviewItem(file) {
    const previewItem = document.createElement('div');
    previewItem.className = 'preview-item';
    
    const previewInfo = document.createElement('div');
    previewInfo.className = 'preview-info';
    
    // Determine icon based on file type
    let iconClass = 'far fa-file';
    if (file.type.includes('image/')) {
      iconClass = 'far fa-image';
    } else if (file.type.includes('pdf')) {
      iconClass = 'far fa-file-pdf';
    }
    
    previewInfo.innerHTML = `
      <i class="${iconClass} preview-icon"></i>
      <span class="preview-name" title="${file.name}">${file.name}</span>
      <span class="preview-size">(${(file.size / 1024).toFixed(2)} KB)</span>
    `;
    
    const deleteBtn = document.createElement('button');
    deleteBtn.className = 'delete-btn';
    deleteBtn.innerHTML = '<i class="fas fa-times"></i>';
    deleteBtn.addEventListener('click', function() {
      previewItem.remove();
      // You might also want to clear the file input here
      // This requires additional handling as file inputs can't be cleared directly for security reasons
    });
    
    previewItem.appendChild(previewInfo);
    previewItem.appendChild(deleteBtn);
    
    return previewItem;
  }
});