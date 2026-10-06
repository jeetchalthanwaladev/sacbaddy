class VNavbar extends HTMLElement {
    connectedCallback() {
        fetch("../components/Vnavbar.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
                const nav = this.querySelector(".vnavbar");
                const toggle = this.querySelector(".nav-toggle");

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

                nav.querySelectorAll(".nav-links a").forEach(link => {
                    link.addEventListener("click", closeNavigation);
                });

                document.addEventListener("keydown", event => {
                    if (event.key === "Escape") closeNavigation();
                });

                window.matchMedia("(min-width: 641px)").addEventListener("change", event => {
                    if (event.matches) closeNavigation();
                });
            });
    }
}

customElements.define("v-navbar", VNavbar);

class Hero extends HTMLElement {
    connectedCallback() {
        fetch("../components/Hero.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
            });
    }
}

customElements.define("my-hero", Hero);

class About extends HTMLElement {
    connectedCallback() {
        fetch("../components/About.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
            });
    }
}

customElements.define("my-about", About);

class Skills extends HTMLElement {
    connectedCallback() {
        fetch("../components/Skills.html")
            .then(response => {
                if (!response.ok) throw new Error("Could not load component");
                return response.text();
            })
            .then(data => {
                this.innerHTML = data;
            })
            .catch(() => {
                this.innerHTML = SKILLS_TEMPLATE;
            });
    }
}

customElements.define("my-skills", Skills);

class Testimonials extends HTMLElement {
    connectedCallback() {
        fetch("../components/Testimonials.html")
            .then(response => {
                if (!response.ok) throw new Error("Could not load component");
                return response.text();
            })
            .then(data => {
                this.innerHTML = data;
                initTestimonialsSlider(this);
            })
            .catch(() => {
                this.innerHTML = TESTIMONIALS_TEMPLATE;
                initTestimonialsSlider(this);
            });
    }
}

customElements.define("my-testimonials", Testimonials);

function initTestimonialsSlider(root) {
    const track = root.querySelector("#testimonialsTrack");
    const dots = root.querySelector("#testimonialsDots");
    const cards = Array.from(track.querySelectorAll(".testimonial-card"));
    let activeIndex = 0;

    function updateSlider() {
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
            const isActive = index === activeIndex;
            dot.classList.toggle("active", isActive);
            dot.setAttribute("aria-pressed", String(isActive));
        });
    }

    window.addEventListener("resize", updateSlider);
    updateSlider();
}

class Portfolio extends HTMLElement {
    connectedCallback() {
        fetch("../components/My_portfolio.html")
            .then(response => {
                if (!response.ok) throw new Error("Could not load component");
                return response.text();
            })
            .then(data => {
                this.innerHTML = data;
                initPortfolio(this);
            })
            .catch(err => {
                console.error("Could not load portfolio component:", err);
            });
    }
}

customElements.define("my-portfolio", Portfolio);


class Contact extends HTMLElement {
    connectedCallback() {
        fetch("../components/Contact.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
            });
    }
}

customElements.define("my-contact", Contact);

class Header extends HTMLElement {
    connectedCallback() {
        fetch("../components/Header.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
            });
    }
}

customElements.define("my-header", Header);

class Footer extends HTMLElement {
    connectedCallback() {
        fetch("../components/Footer.html")
            .then(response => response.text())
            .then(data => {
                this.innerHTML = data;
            });
    }
}

customElements.define("my-footer", Footer);