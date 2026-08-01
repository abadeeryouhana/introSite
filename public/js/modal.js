function openModal(id) {
    const dataEl = document.getElementById('cs-data-' + id);
    if(!dataEl) return;

    const title = dataEl.querySelector('.data-title').innerHTML;
    const subtitle = dataEl.querySelector('.data-subtitle').innerHTML;
    const date = dataEl.querySelector('.data-date').innerHTML;
    const image = dataEl.querySelector('.data-image').innerHTML;
    const challenge = dataEl.querySelector('.data-challenge').innerHTML;
    const solution = dataEl.querySelector('.data-solution').innerHTML;
    const delivered = dataEl.querySelector('.data-delivered').innerHTML;
    const tools = dataEl.querySelector('.data-tools').innerHTML;

    document.getElementById('cs-modal-title').innerHTML = title;
    document.getElementById('cs-modal-subtitle').innerHTML = subtitle;
    
    const dateEl = document.getElementById('cs-modal-date');
    if (date.trim()) {
        dateEl.style.display = 'inline-block';
        dateEl.innerHTML = '<i class="fa-regular fa-calendar" style="margin-right: 5px;"></i>' + date;
    } else {
        dateEl.style.display = 'none';
    }
    
    const header = document.getElementById('cs-modal-header');
    if(image) {
        header.style.backgroundImage = `url('${image}')`;
    } else {
        header.style.backgroundImage = 'none';
        header.style.backgroundColor = '#22456E';
    }

    const sections = [
        { id: 'challenge', content: challenge },
        { id: 'solution', content: solution },
        { id: 'delivered', content: delivered },
        { id: 'tools', content: tools }
    ];

    sections.forEach(sec => {
        const el = document.getElementById('cs-section-' + sec.id);
        if(sec.content.trim()) {
            el.style.display = 'block';
            document.getElementById('cs-modal-' + sec.id).innerHTML = sec.content;
        } else {
            el.style.display = 'none';
        }
    });

    const modal = document.getElementById('cs-modal');
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeModal(event) {
    if(event) event.preventDefault();
    const modal = document.getElementById('cs-modal');
    if(modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') closeModal();
});
