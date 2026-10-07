# Sakbaddy - Custom WordPress Theme & CMS

A high-performance, responsive WordPress theme converted from the Sakbaddy static portfolio website. Preserves 100% of the original frontend aesthetics, typography, color palette, animations, and layouts while introducing a full-featured WordPress CMS backend.

---

## 📁 Theme Structure

```
sakbaddy/
├── style.css                  # Theme declaration, core resets, WP alignment & utility styles
├── functions.php              # Theme setup, assets enqueue, helpers & module loader
├── index.php                  # Fallback WordPress blog template loop
├── header.php                 # Dynamic header (<head>, wp_head, vertical navbar & subpage topbar)
├── footer.php                 # Dynamic footer (wp_footer, editable brand, quick links, copyright)
├── front-page.php             # Homepage assembling all portfolio sections
├── page.php                   # Default page template
├── single.php                 # Single post template
├── single-project.php         # Dedicated Project Case Study template
├── archive.php                # Category and taxonomy archive template
├── archive-project.php        # Dedicated Projects archive template
├── 404.php                    # Styled 404 error page
│
├── page-about.php             # Dedicated About page template
├── page-contact.php           # Dedicated Contact page template
├── page-portfolio.php         # Dedicated Portfolio page template
├── page-education.php         # Dedicated Education & Skills page template
│
├── template-parts/
│   ├── navbar.php             # Fixed vertical navigation bar with SVG icons & mobile drawer
│   ├── header-bar.php         # Top brand header for inner pages
│   ├── hero.php               # Hero section with greeting, roles, CTA, and banner image
│   ├── about.php              # About section with circular photo, bio, and personal info grid
│   ├── skills.php             # Education timeline & animated skill progress bars
│   ├── portfolio.php          # Filterable project gallery with lightbox modal
│   ├── testimonials.php       # Touch-enabled testimonial card carousel with dot pagination
│   └── contact.php            # Contact info, AJAX contact form, and Google Maps embed
│
├── inc/
│   ├── customizer.php         # Complete Customizer panels & controls for all CMS sections
│   ├── cpt.php                # Custom Post Types (Projects, Testimonials, Skills, Education)
│   ├── ajax.php               # Secure AJAX contact form handler with nonce verification & wp_mail
│   ├── seo.php                # Native Open Graph, Twitter cards, and canonical URL engine
│   ├── analytics.php          # Clean Google Analytics 4 (GA4) integration
│   └── sample-data.php        # Automatic sample data seeder on theme activation
│
├── assets/
│   ├── css/                   # Modular stylesheets (style, hero, about, skills, portfolio, etc.)
│   └── js/
│       └── main.js            # Vanilla JS navigation, slider, filter, modal & AJAX form handler
│
├── src/                       # Original high-resolution images, icons, and portfolio assets
└── languages/
    └── sakbaddy.pot           # Translation template
```

---

## 🚀 Installation Instructions

### Method 1: Direct Folder Copy (Local Development or FTP)
1. Copy or clone this `sakbaddy` folder into your WordPress installation directory:
   `wp-content/themes/sakbaddy/`
2. Log in to your **WordPress Admin Dashboard**.
3. Navigate to **Appearance → Themes**.
4. Locate **Sakbaddy** and click **Activate**.

### Method 2: Zip Upload via WordPress Admin
1. Compress the `sakbaddy` folder into a `.zip` archive (e.g., `sakbaddy.zip`).
2. Log in to your **WordPress Admin Dashboard**.
3. Navigate to **Appearance → Themes → Add New → Upload Theme**.
4. Choose `sakbaddy.zip` and click **Install Now**.
5. Click **Activate**.

> **Note on Activation:** Upon activating the theme, the built-in **Sample Data Seeder** (`inc/sample-data.php`) will automatically populate the original 9 projects, 3 testimonials, 4 skills, and 3 education items if none exist in your database. The website will look and function 100% identically to the original static site right out of the box!

---

## 🔌 Required & Optional Plugins

- **Required Plugins:** **NONE**. The theme is lightweight, zero-dependency, and built entirely using native WordPress APIs.
- **Optional SEO Plugin:** **Rank Math** OR **Yoast SEO** (choose only one). The theme includes built-in SEO and Open Graph metadata that automatically defers to Rank Math or Yoast SEO if either is installed, preventing duplicate tags.
- **Optional Form Service:** **Formspree** (optional). If you prefer not using WordPress `wp_mail()`, you can enter your Formspree endpoint in the Customizer.

---

## 🛠️ CMS Admin Usage Guide

### 1. How to Edit Homepage Content
1. Navigate to **Appearance → Customize → Sakbaddy CMS Options**.
2. Here you will find dedicated sections:
   - **Hero Section:** Edit greeting ("Hello, My name is"), title ("Sakshi Shah"), roles ("Web Developer", "Freelancer"), bio paragraph, CV button text/URL, top bar phone, email, and upload a custom hero banner image.
   - **About Section:** Edit "Biography" tag, full name, role, biography description, circular profile image, and the 8 personal info fields (Phone, Birthday, Email, Age, Skype, Address, Freelance status).
   - **Section Headings:** Customize the headings for Education & Skills, Portfolio, and Testimonials.

### 2. How to Manage Projects (Portfolio)
1. Go to **WordPress Admin → Projects**.
2. **Add New Project:**
   - **Title:** Project name (e.g., *Curology Skincare*).
   - **Featured Image:** Set the high-resolution project cover image.
   - **Content:** Detailed project case study description.
   - **Project Categories:** Assign categories (e.g., *Branding*, *Photography*, *Fashion*, *Product*). The filter buttons on the frontend will automatically adapt!
   - **Project Details & Links (Meta Box):**
     - *Display Category / Subtitle:* (e.g. *Fashion / Photography*).
     - *Live Project URL:* External project URL.
     - *GitHub Repository URL:* Source code repository.
     - *Technologies Used:* Tech stack list.
   - **Page Attributes → Order:** Control the display order (1, 2, 3...).
3. Click **Publish**.

### 3. How to Manage Testimonials
1. Go to **WordPress Admin → Testimonials**.
2. **Add New Testimonial:**
   - **Title:** Client name (e.g., *Nancy Byers*).
   - **Featured Image:** Client profile picture.
   - **Content:** Testimonial quote.
   - **Author Details (Meta Box):**
     - *Person Role / Designation:* (e.g., *CEO at ib-themes*).
     - *Star Rating:* 1 to 5 stars.
   - **Page Attributes → Order:** Display order in the slider.
3. Click **Publish**.

### 4. How to Manage Skills & Education
1. **Skills:**
   - Go to **WordPress Admin → Skills → Add New Skill**.
   - Enter Skill Title (e.g., *HTML5*).
   - In **Skill Level & Percentage (Meta Box)**, set the percentage (e.g., *92*).
   - The frontend will render the percentage and animate the orange progress bar.
2. **Education:**
   - Go to **WordPress Admin → Education → Add New Item**.
   - Enter Degree / Title (e.g., *Bsc. in Computer Science*).
   - In **Education Details (Meta Box)**, enter Year Range (e.g., *2013-2016*) and Institution (e.g., *World University*).

### 5. How to Edit Contact Information & Form
1. Navigate to **Appearance → Customize → Sakbaddy CMS Options → Contact Section & Form**.
2. Edit:
   - Main headings (*"What's your story?"* & *"Get in touch"*).
   - Subtitle text.
   - Display address, email, and phone.
   - Google Maps iframe embed URL.
   - **Form Submission Mode:**
     - Select **Native WordPress Email (wp_mail)** for direct server email delivery.
     - Or select **Formspree Service Endpoint** and enter your Formspree endpoint URL.
   - Notification Recipient Email for incoming messages.

### 6. How to Edit Social Media Links
1. Navigate to **Appearance → Customize → Sakbaddy CMS Options → Social Media Links**.
2. Enter your URLs for Facebook, Twitter/X, Instagram, LinkedIn, Pinterest, GitHub, and YouTube.
3. Social icons in the About photo circle, Footer, and Header will automatically link to these profiles.

### 7. How to Configure Google Analytics 4 (GA4)
1. Navigate to **Appearance → Customize → Sakbaddy CMS Options → SEO & Google Analytics**.
2. Enter your **Google Analytics 4 Measurement ID** (format: `G-XXXXXXXXXX`).
3. The theme will automatically load the official `gtag.js` asynchronously with IP anonymization and event tracking for CTA clicks and contact form leads.

### 8. How to Configure SEO & Social Sharing
1. Navigate to **Appearance → Customize → Sakbaddy CMS Options → SEO & Google Analytics**.
2. Set default meta description and upload an Open Graph social sharing image.
3. If **Rank Math** or **Yoast SEO** is installed in the future, the theme detects it and automatically prevents duplicate tags.

---

## 🔒 Security & Performance Features

- **Input Sanitization & Output Escaping:** Every dynamic string is escaped with `esc_html()`, `esc_attr()`, `esc_url()`, or `wp_kses_post()`.
- **CSRF Protection:** Form submissions and admin settings use WordPress cryptographic nonces (`wp_nonce_field` and `check_ajax_referer`).
- **Capability Verification:** Meta box saves verify `current_user_can('edit_post')`.
- **Zero Third-Party JS Bloat:** Pure vanilla JavaScript replaces heavy slider/component libraries for 100/100 Lighthouse performance.
- **Responsive & Accessible:** Fully tested across 320px, 375px, 768px, 1024px, and desktop displays with WCAG-compliant ARIA attributes.
