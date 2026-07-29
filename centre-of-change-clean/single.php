single.php

<?php get_header()?>






<!-- the big image with white text on top -->
<?php get_template_part('template-parts/single-post-banner'); ?>





<?php if ( have_rows('media_text_repeater') ) : ?>

	<?php $i = 0; ?>
	<?php while ( have_rows('media_text_repeater') ) : the_row(); $i++; ?>

		<?php
		$image      = get_sub_field('media_text_image');
		$caption    = get_sub_field('media_text_caption');
		$heading    = get_sub_field('media_text_heading');
		$subheading = get_sub_field('media_text_subheading');
		$content    = get_sub_field('media_text_content');
		$button     = get_sub_field('media_text_button_link');
		$reverse    = get_sub_field('media_text_reverse');
		$heading_id = 'media-text-' . $i . '-heading';
		?>

		<!-- content section <?php echo $i; ?> -->
		<section class="media-text-blog<?php echo $reverse ? ' media-text--reverse' : ''; ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">

			<?php if ( $image ) : ?>
			<figure class="media-text__media">
				<img
					src="<?php echo esc_url( $image['url'] ); ?>"
					alt="<?php echo esc_attr( $image['alt'] ); ?>"
				>
				<?php if ( $caption ) : ?>
				<figcaption class="media-text__caption smallText">
					<?php echo esc_html( $caption ); ?>
				</figcaption>
				<?php endif; ?>
			</figure>
			<?php endif; ?>

			<div class="media-text-blog__content">
				<?php if ( $heading ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>

				<?php if ( $subheading ) : ?>
					<h4 class="media-text__subheading"><?php echo esc_html( $subheading ); ?></h4>
				<?php endif; ?>

				<?php if ( $content ) : ?>
					<?php echo wp_kses_post( $content ); ?>
				<?php endif; ?>

				<?php if ( $button && ! empty( $button['url'] ) ) : ?>
					<a class="button" href="<?php echo esc_url( $button['url'] ); ?>" <?php echo $button['target'] ? 'target="' . esc_attr( $button['target'] ) . '"' : ''; ?>>
						<?php echo esc_html( $button['title'] ?: 'Full Details' ); ?>
					</a>
				<?php endif; ?>
			</div>

		</section>
		<!-- content section <?php echo $i; ?> end -->

	<?php endwhile; ?>

<?php endif; ?>







<?php get_template_part( 'template-parts/gallery'); ?>


<?php get_template_part( 'template-parts/pre-footer', 'no-logos' ); ?>
<?php get_footer()?>