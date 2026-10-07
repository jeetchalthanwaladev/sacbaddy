<?php
/**
 * Template part: Vertical Navigation Bar
 * Preserves the fixed left navigation with SVG icons and mobile drawer toggle.
 *
 * @package Sakbaddy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$site_title = get_bloginfo( 'name' );
$logo_letter = ! empty( $site_title ) ? mb_substr( $site_title, 0, 1 ) : 'S';
$home_url = home_url( '/' );
$is_front = is_front_page();
$home_hash = $is_front ? '#home' : $home_url . '#home';
$about_hash = $is_front ? '#about' : $home_url . '#about';
$resume_hash = $is_front ? '#resume' : $home_url . '#resume';
$portfolio_hash = $is_front ? '#portfolio' : $home_url . '#portfolio';
$testimonials_hash = $is_front ? '#testimonials' : $home_url . '#testimonials';
$contact_hash = $is_front ? '#contact' : $home_url . '#contact';
?>
<nav class="vnavbar" id="site-navigation" aria-label="<?php esc_attr_e( 'Vertical Navigation', 'sakbaddy' ); ?>">
    <div class="container">
        <div class="logo">
            <?php if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url( $home_url ); ?>" aria-label="<?php echo esc_attr( $site_title ); ?>"><?php echo esc_html( $logo_letter ); ?></a>
            <?php endif; ?>
        </div>

        <ul class="nav-links">
            <li>
                <a href="<?php echo esc_url( $home_hash ); ?>" aria-label="<?php esc_attr_e( 'Home', 'sakbaddy' ); ?>" class="nav-home-icon active">
                    <svg viewBox="0 0 576 512" aria-hidden="true" focusable="false">
                        <path d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z" fill="currentColor" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( $about_hash ); ?>" aria-label="<?php esc_attr_e( 'About', 'sakbaddy' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <circle cx="12" cy="7" r="4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( $resume_hash ); ?>" aria-label="<?php esc_attr_e( 'Resume / Skills', 'sakbaddy' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <polyline points="14 2 14 8 20 8" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="16" y1="13" x2="8" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <line x1="16" y1="17" x2="8" y2="17" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <polyline points="10 9 9 9 8 9" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( $portfolio_hash ); ?>" aria-label="<?php esc_attr_e( 'Work / Portfolio', 'sakbaddy' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2" fill="none" stroke="currentColor" stroke-width="2" />
                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" fill="none" stroke="currentColor" stroke-width="2" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( $testimonials_hash ); ?>" aria-label="<?php esc_attr_e( 'Testimonials', 'sakbaddy' ); ?>">
                    <svg viewBox="0 0 512 512" aria-hidden="true" focusable="false">
                        <path d="M172.2 226.8c-14.6-2.9-28.2 8.9-28.2 23.8V301c0 10.2 7.1 18.4 16.7 22 18.2 6.8 31.3 24.4 31.3 45 0 26.5-21.5 48-48 48s-48-21.5-48-48V120c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v248c0 89.5 82.1 160.2 175 140.7 54.4-11.4 98.3-55.4 109.7-109.7 17.4-82.9-37-157.2-112.5-172.2zM209 0c-9.2-.5-17 6.8-17 16v31.6c0 8.5 6.6 15.5 15 15.9 129.4 7 233.4 112 240.9 241.5.5 8.4 7.5 15 15.9 15h32.1c9.2 0 16.5-7.8 16-17C503.4 139.8 372.2 8.6 209 0zm.3 96c-9.3-.7-17.3 6.7-17.3 16.1v32.1c0 8.4 6.5 15.3 14.8 15.9 76.8 6.3 138 68.2 144.9 145.2.8 8.3 7.6 14.7 15.9 14.7h32.2c9.3 0 16.8-8 16.1-17.3-8.4-110.1-96.5-198.2-206.6-206.7z" fill="currentColor" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="<?php echo esc_url( $contact_hash ); ?>" aria-label="<?php esc_attr_e( 'Contact', 'sakbaddy' ); ?>">
                    <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                        <polyline points="23 7 23 1 17 1" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <line x1="16" y1="8" x2="23" y2="1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
</nav>

<button class="nav-toggle" type="button" aria-label="<?php esc_attr_e( 'Open navigation', 'sakbaddy' ); ?>" aria-expanded="false" aria-controls="site-navigation">
    <span></span>
    <span></span>
    <span></span>
</button>
