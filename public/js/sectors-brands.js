function setActiveSector(event, sectorId, element) {
    event.preventDefault();
    
    // Update pills
    document.querySelectorAll('.sb-nav-pill').forEach(pill => pill.classList.remove('active'));
    element.classList.add('active');
    
    // Update content visibility
    document.querySelectorAll('.sb-sector-section').forEach(section => {
        if (sectorId === 'all') {
            section.style.display = 'block';
        } else {
            if (section.id === sectorId) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }
    });
}
