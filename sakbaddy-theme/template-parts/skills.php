<?php
$education_items = array_filter( array_map( 'trim', explode( "\n", (string) sakbaddy_get_option( 'education_items' ) ) ) );
$skill_items     = array_filter( array_map( 'trim', explode( "\n", (string) sakbaddy_get_option( 'skill_items' ) ) ) );
?>
<section class="skills-section" id="resume">
	<div class="skills-container">
		<h2 class="section-tag skills-tag"><?php esc_html_e( 'Education & Skills', 'sakbaddy' ); ?></h2>
		<div class="skills-grid">
			<div class="edu-card">
				<?php foreach ( $education_items as $item ) : $parts = array_map( 'trim', explode( '|', $item ) ); ?>
					<div class="edu-item">
						<span class="edu-year"><?php echo esc_html( isset( $parts[0] ) ? $parts[0] : '' ); ?></span>
						<h3 class="edu-title"><?php echo esc_html( isset( $parts[1] ) ? $parts[1] : '' ); ?></h3>
						<p class="edu-school"><?php echo esc_html( isset( $parts[2] ) ? $parts[2] : '' ); ?></p>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="skills-list">
				<?php foreach ( $skill_items as $item ) : $parts = array_map( 'trim', explode( '|', $item ) ); $level = isset( $parts[1] ) ? min( 100, max( 0, absint( $parts[1] ) ) ) : 0; ?>
					<div class="skill-row">
						<div class="skill-percent" data-value="<?php echo esc_attr( $level ); ?>"><?php echo esc_html( $level ); ?>%</div>
						<div class="skill-content">
							<span class="skill-name"><?php echo esc_html( isset( $parts[0] ) ? $parts[0] : '' ); ?></span>
							<div class="skill-track"><div class="skill-bar" style="width: <?php echo esc_attr( $level ); ?>%;"></div></div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
