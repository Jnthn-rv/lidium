document.addEventListener('DOMContentLoaded', function () {

    // --- Variables --- //
    const header = document.getElementById('header');
    const darkSections = document.querySelectorAll('#proyectos, #faq, .cta-gradient');
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const counters = document.querySelectorAll('.counter');
    const statsSection = document.getElementById('stats');
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    const cookieBanner = document.getElementById('cookie-consent-banner');
    const acceptCookiesBtn = document.getElementById('accept-cookies-btn');
    const projectGrid = document.getElementById('project-grid');
    const projectModal = document.getElementById('project-modal');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const modalBody = document.getElementById('modal-body');
    const modalContent = document.getElementById('modal-content');


    // --- Functions --- //

    function handleNavColor() {
        if (!header || darkSections.length === 0) return;
        let onDark = false;
        const headerRect = header.getBoundingClientRect();
        darkSections.forEach(section => {
            const sectionRect = section.getBoundingClientRect();
            if (headerRect.bottom > sectionRect.top && headerRect.top < sectionRect.bottom) {
                onDark = true;
            }
        });
        if (onDark) {
            header.classList.add('nav-on-dark');
        } else {
            header.classList.remove('nav-on-dark');
        }
    }

    function handleHeaderScroll() {
        if (header && window.scrollY > 50) {
            header.classList.add('nav-scrolled');
        } else if (header) {
            header.classList.remove('nav-scrolled');
        }
    }
    
    function handleScrollTopButton() {
        if (scrollTopBtn) {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('hidden');
            } else {
                scrollTopBtn.classList.add('hidden');
            }
        }
    }

    window.addEventListener('scroll', () => {
        handleHeaderScroll();
        handleNavColor();
        handleScrollTopButton();
    });

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // --- Counter Animation --- //
    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const duration = 2000;
        let stepTime = Math.abs(Math.floor(duration / target));
        if (target === 0) stepTime = duration;
        let current = 0;
        
        const timer = setInterval(() => {
            const increment = Math.ceil(target / (duration / (stepTime < 1 ? 1 : stepTime)));
            current += increment;
            if (current > target) {
                current = target;
            }
            counter.innerText = current;
            if (current == target) {
                clearInterval(timer);
            }
        }, stepTime < 1 ? 1 : stepTime);
    };

    if (statsSection && counters.length > 0) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    counters.forEach(counter => {
                        counter.innerText = '0';
                        startCounter(counter);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        observer.observe(statsSection);
    }
    
    // --- Accordion Logic --- //
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const content = header.nextElementSibling;
            const icon = header.querySelector('.accordion-icon');
            const isAlreadyOpen = content.style.maxHeight && content.style.maxHeight !== '0px';

            accordionHeaders.forEach(otherHeader => {
                if (otherHeader !== header) {
                    otherHeader.nextElementSibling.style.maxHeight = null;
                    otherHeader.querySelector('.accordion-icon').classList.remove('rotate-45');
                }
            });

            if (isAlreadyOpen) {
                content.style.maxHeight = null;
                icon.classList.remove('rotate-45');
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add('rotate-45');
            }
        });
    });

    // --- Cookie Consent Logic --- //
    if (cookieBanner && acceptCookiesBtn) {
        if (!localStorage.getItem('lidium_cookies_accepted')) {
            cookieBanner.classList.remove('hidden');
            cookieBanner.style.display = 'block';
        }

        acceptCookiesBtn.addEventListener('click', () => {
            cookieBanner.style.display = 'none';
            localStorage.setItem('lidium_cookies_accepted', 'true');
        });
    }

// - // --- Project Modal Logic (CORREGIDO) --- //
    if (projectGrid && projectModal && modalBody && closeModalBtn) {
        
        const openModal = (e) => {
            const card = e.target.closest('.project-card');
            if (!card) return;

            e.preventDefault();

            // 1. Obtener datos
            const title = card.dataset.title;
            const category = card.dataset.category;
            // const featuredImage = card.dataset.featuredImage; // No se usa por petición del usuario
            const content = card.dataset.content.replace(/\n/g, '<br>');
            let gallery = [];
            try { gallery = JSON.parse(card.dataset.gallery); } catch(e) {}
            
            const websiteUrl = card.dataset.websiteUrl;
            const instagramUrl = card.dataset.instagramUrl;
            const facebookUrl = card.dataset.facebookUrl;
            const outro = card.dataset.outro;

            // 2. Construir HTML de Galería
            let galleryHTML = '';
            if (gallery.length > 0) {
                gallery.forEach(url => {
                    galleryHTML += `<img src="${url}" alt="${title}" class="w-full h-auto rounded-lg mb-8 shadow-md">`;
                });
            }

            // 3. Construir HTML de Cierre (Texto + Redes)
            let finalContentHTML = '';
            if (outro || websiteUrl || instagramUrl || facebookUrl) {
                finalContentHTML += '<div class="mt-12 pt-8 border-t space-y-8">';
                
                // Texto de cierre primero
                if (outro) {
                    finalContentHTML += `<div class="prose lg:prose-xl max-w-none mx-auto text-gray-700">${outro}</div>`;
                }

                // Redes sociales después (centradas y grandes)
                if (websiteUrl || instagramUrl || facebookUrl) {
                    finalContentHTML += '<div class="flex items-center justify-center space-x-8">';
                    if (websiteUrl) { finalContentHTML += `<a href="${websiteUrl}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-[#7732a8] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg></a>`; }
                    if (instagramUrl) { finalContentHTML += `<a href="${instagramUrl}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-[#7732a8] transition-colors"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg></a>`; }
                    if (facebookUrl) { finalContentHTML += `<a href="${facebookUrl}" target="_blank" rel="noopener noreferrer" class="text-gray-500 hover:text-[#7732a8] transition-colors"><svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>`; }
                    finalContentHTML += '</div>';
                }
                finalContentHTML += '</div>';
            }

            // 4. Inyectar contenido (Sin imagen destacada)
            modalBody.innerHTML = `
                <p class="text-sm font-bold uppercase text-[#7732a8] tracking-wider">${category}</p>
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#481262] mt-2 mb-8">${title}</h2>
                <div class="prose lg:prose-xl max-w-none mx-auto text-gray-700 mb-12">
                    ${content}
                </div>
                ${galleryHTML}
                ${finalContentHTML}
            `;
            
            // 5. Mostrar modal con animación
            projectModal.classList.remove('hidden');
            // Forzar reflow para que la transición funcione
            void projectModal.offsetWidth;
            projectModal.classList.remove('opacity-0');
            if (modalContent) {
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }
            document.body.style.overflow = 'hidden';
        };

        const closeModal = () => {
            projectModal.classList.add('opacity-0');
            if (modalContent) {
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
            }
            
            // Esperar a que termine la transición para ocultar el elemento por completo
            setTimeout(() => {
                projectModal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300); // 300ms coincide con la duración en CSS
        };

        projectGrid.addEventListener('click', openModal);
        
        closeModalBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            closeModal();
        });

        projectModal.addEventListener('click', function(e) {
            if (e.target === projectModal) { 
                closeModal();
            }
        });

        // Cerrar con tecla ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !projectModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    }


    // --- Footer Year --- //
    const yearSpan = document.getElementById('year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }
});

