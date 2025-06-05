document.addEventListener('DOMContentLoaded', function() {
    const loanTextElements = document.querySelectorAll('.loan-text');
    let timeout;
    
    function checkVisibility() {
        const windowHeight = window.innerHeight;
        const isMobile = window.innerWidth < 768;
        
        loanTextElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            // More sensitive trigger on mobile (80% of screen)
            const triggerPoint = windowHeight * (isMobile ? 0.8 : 1) - 150;
            
            if (elementTop < triggerPoint) {
                element.classList.add('visible');
            }
        });
    }
    
    // Initial check
    checkVisibility();
    
    // Optimized scroll listener
    window.addEventListener('scroll', () => {
        clearTimeout(timeout);
        timeout = setTimeout(checkVisibility, 50);
    }, { passive: true });
    
    // Handle orientation changes
    window.addEventListener('resize', checkVisibility);
});