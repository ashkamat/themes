<!-- feature blog banner post -->
<section 
	class="single-hero-section" 
	style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');"
	aria-labelledby="hero-post-headline"
>
	<div class="single-hero-section-left">

		<?php 
		$hero_headline = get_field( 'hero_headline' );
		$hero_subheadline = get_field( 'hero_subheadline' );
		$hero_description = get_field( 'hero_description' );
		?>

		<?php if ( $hero_headline ) : ?>
			<h1 id="hero-post-headline" class="hero-post-headline">
				<?php echo esc_html( $hero_headline ); ?>
			</h1>
		<?php endif; ?>

		<?php if ( $hero_subheadline ) : ?>
			<h2>
				<?php echo esc_html( $hero_subheadline ); ?>
			</h2>
		<?php endif; ?>

		<?php if ( $hero_description ) : ?>
			<p>
				<?php echo esc_html( $hero_description ); ?>
			</p>
		<?php endif; ?>

	</div>

	<div class="single-hero-section-right">
	</div>

</section>
<!-- feature blog banner post end -->