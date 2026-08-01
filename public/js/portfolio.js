function filterPortfolio(event, sectorId, element) {
    event.preventDefault();
    
    // Update pills
    document.querySelectorAll('.sb-nav-pill').forEach(pill => pill.classList.remove('active'));
    element.classList.add('active');
    
    // Update cards visibility
    const cards = document.querySelectorAll('.portfolio-card');
    cards.forEach(card => {
        if (sectorId === 'all') {
            card.style.display = 'flex';
        } else {
            if (card.dataset.sectorId === sectorId) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        }
    });
}
