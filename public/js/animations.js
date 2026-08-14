document.addEventListener('DOMContentLoaded', () => {
    // Number Animation Observer
    const animateNumbers = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const text = el.getAttribute('data-value') || el.innerText.trim();
                if (!el.hasAttribute('data-value')) {
                    el.setAttribute('data-value', text);
                }
                
                // Parse number and suffix
                const match = text.match(/([0-9,.]+)(.*)/);
                if (!match) return;
                
                const targetStr = match[1].replace(/,/g, '');
                const target = parseFloat(targetStr);
                const suffix = match[2] || '';
                const hasComma = match[1].includes(',');
                
                let start = 0;
                const duration = 2000;
                const startTime = performance.now();
                
                const updateNumber = (currentTime) => {
                    const elapsedTime = currentTime - startTime;
                    const progress = Math.min(elapsedTime / duration, 1);
                    
                    // ease out quad
                    const easeOut = progress * (2 - progress);
                    
                    let current = Math.floor(easeOut * target);
                    
                    if (hasComma) {
                        current = current.toLocaleString();
                    }
                    
                    el.innerText = current + suffix;
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateNumber);
                    } else {
                        if (hasComma) {
                            el.innerText = target.toLocaleString() + suffix;
                        } else {
                            el.innerText = target + suffix;
                        }
                    }
                };
                
                requestAnimationFrame(updateNumber);
                observer.unobserve(el);
            }
        });
    };

    const numberObserver = new IntersectionObserver(animateNumbers, {
        threshold: 0.1
    });

    document.querySelectorAll('.animate-number').forEach(el => {
        numberObserver.observe(el);
    });

    // Generic Fade/Slide Animations Observer
    const animateElements = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    };

    const elementObserver = new IntersectionObserver(animateElements, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    document.querySelectorAll('.animate-fade-up, .animate-fade-in, .animate-slide-in').forEach(el => {
        elementObserver.observe(el);
    });
});
