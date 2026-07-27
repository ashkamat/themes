single.php

<?php get_header()?>


<!-- the big image with white text on top -->
<?php get_template_part('template-parts/single-post-banner'); ?>


<!-- dymanic scf single blog content -->

<?php if ( have_rows( 'blog_content_sections' ) ) : ?>

	<?php $section_number = 1; ?>

	<?php while ( have_rows( 'blog_content_sections' ) ) : the_row(); ?>

		<?php
		$image_id          = get_sub_field( 'section_image' );
		$section_heading   = get_sub_field( 'section_heading' );
		$section_subheading = get_sub_field( 'section_subheading' );
		$section_content   = get_sub_field( 'section_content' );
		$button_text       = get_sub_field( 'section_button_text' );
		$button_link       = get_sub_field( 'section_button_link' );

		// Get image information from WordPress Media Library
		$image_url     = $image_id ? wp_get_attachment_image_url( $image_id, 'large' ) : '';
		$image_alt     = $image_id ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
		$image_caption = $image_id ? wp_get_attachment_caption( $image_id ) : '';

		// Create a unique heading ID for accessibility
		$heading_id = 'media-text-' . $section_number . '-heading';
		?>

		<section 
			class="media-text-blog <?php echo ( $section_number % 2 === 0 ) ? 'media-text--reverse' : ''; ?>"
			aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
		>

			<?php if ( $image_url ) : ?>

				<figure class="media-text__media">

					<img 
						src="<?php echo esc_url( $image_url ); ?>" 
						alt="<?php echo esc_attr( $image_alt ); ?>"
					>

					<?php if ( $image_caption ) : ?>
						<figcaption class="media-text__caption smallText">
							<?php echo esc_html( $image_caption ); ?>
						</figcaption>
					<?php endif; ?>

				</figure>

			<?php endif; ?>


			<div class="media-text-blog__content">

				<?php if ( $section_heading ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>">
						<?php echo esc_html( $section_heading ); ?>
					</h2>
				<?php endif; ?>


				<?php if ( $section_subheading ) : ?>
					<h4 class="media-text__subheading">
						<?php echo esc_html( $section_subheading ); ?>
					</h4>
				<?php endif; ?>


				<?php if ( $section_content ) : ?>
					<p>
						<?php echo esc_html( $section_content ); ?>
					</p>
				<?php endif; ?>


				<?php if ( $button_text && $button_link ) : ?>
					<a 
						class="button" 
						href="<?php echo esc_url( $button_link ); ?>"
					>
						<?php echo esc_html( $button_text ); ?>
					</a>
				<?php endif; ?>

			</div>

		</section>

		<?php $section_number++; ?>

	<?php endwhile; ?>

<?php endif; ?>



<?php get_template_part( 'template-parts/single', 'content'); ?>

<?php get_template_part( 'template-parts/gallery'); ?>


<?php get_template_part( 'template-parts/pre-footer', 'no-logos' ); ?>
<?php get_footer()?>