(function () {
    "use strict";

    const toggle = document.querySelector(".nav-toggle");
    const nav = document.querySelector(".vnavbar");

    if (toggle && nav) {
        const closeNavigation = () => {
            nav.classList.remove("is-open");
            toggle.setAttribute("aria-expanded", "false");
            toggle.setAttribute("aria-label", "Open navigation");
        };

        toggle.addEventListener("click", () => {
            const isOpen = nav.classList.toggle("is-open");
            toggle.setAttribute("aria-expanded", String(isOpen));
            toggle.setAttribute("aria-label", isOpen ? "Close navigation" : "Open navigation");
        });
        nav.querySelectorAll(".nav-links a").forEach((link) => link.addEventListener("click", closeNavigation));
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") closeNavigation();
        });
        window.matchMedia("(min-width: 641px)").addEventListener("change", (event) => {
            if (event.matches) closeNavigation();
        });
    }

    const filterButtons = Array.from(document.querySelectorAll(".filter-btn"));
    const projectCards = Array.from(document.querySelectorAll(".portfolio-card[data-category]"));
    filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const category = button.dataset.filter;
            filterButtons.forEach((item) => {
                const selected = item === button;
                item.classList.toggle("active", selected);
                item.setAttribute("aria-selected", String(selected));
            });
            projectCards.forEach((card) => {
                const categories = card.dataset.category.split(/\s+/);
                card.hidden = category !== "all" && !categories.includes(category);
            });
        });
    });

    const track = document.querySelector("#testimonialsTrack");
    const dots = document.querySelector("#testimonialsDots");
    if (track && dots) {
        const cards = Array.from(track.querySelectorAll(".testimonial-card"));
        let activeIndex = 0;

        const updateSlider = () => {
            if (!cards.length) return;
            const visibleCards = window.matchMedia("(max-width: 980px)").matches ? 1 : 2;
            const lastIndex = Math.max(0, cards.length - visibleCards);
            activeIndex = Math.min(activeIndex, lastIndex);
            track.style.transform = `translateX(-${cards[activeIndex].offsetLeft}px)`;

            if (dots.children.length !== lastIndex + 1) {
                dots.replaceChildren(...Array.from({ length: lastIndex + 1 }, (_, index) => {
                    const dot = document.createElement("button");
                    dot.type = "button";
                    dot.className = "slider-dot";
                    dot.setAttribute("aria-label", `Show testimonial ${index + 1}`);
                    dot.addEventListener("click", () => {
                        activeIndex = index;
                        updateSlider();
                    });
                    return dot;
                }));
            }
            Array.from(dots.children).forEach((dot, index) => {
                dot.classList.toggle("active", index === activeIndex);
                dot.setAttribute("aria-pressed", String(index === activeIndex));
            });
        };

        window.addEventListener("resize", updateSlider);
        updateSlider();
    }

    document.querySelectorAll(".contact-form").forEach((form) => {
        form.addEventListener("submit", () => {
            const button = form.querySelector('button[type="submit"]');
            if (button) {
                button.disabled = true;
                button.textContent = "Sending…";
            }
        });
    });
})();
