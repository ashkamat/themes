page.php

<?php get_header()?>

	<!-- page bannder -->
		<section class="page-hero-section" aria-labelledby="page-heading">

			<div class="page-hero-content">
			<h2 class="page-heading"><?php echo esc_html( get_the_title() ); ?></h2>
			<p><?php echo esc_html( get_field( 'short_introduction' ) ); ?></p>
        
			</div>


			<?php if ( has_post_thumbnail() ) : ?>

    <div class="page-banner">

        <?php
        $thumbnail_id = get_post_thumbnail_id();
        $alt_text     = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true );
        ?>

        <img
            src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>"
            alt="<?php echo esc_attr( $alt_text ); ?>"
        >

    </div>

<?php endif; ?>

			
			
		</section>



        <?php
/**
 * Media Text Sections
 *
 * SCF Repeater:
 * media_text_sections
 *
 * Sub-fields:
 * image
 * heading
 * subheading
 * content
 * button_text
 * button_url
 */

$media_text_sections = get_field( 'media_text_sections' );

if ( $media_text_sections ) :

    foreach ( $media_text_sections as $index => $section ) :

        /*
         * Alternate the layout automatically.
         *
         * Section 1 = normal
         * Section 2 = reverse
         * Section 3 = normal
         * Section 4 = reverse
         */

        $is_reverse = ( $index % 2 === 1 );

        $section_class = $is_reverse
            ? 'media-text-page media-text--reverse'
            : 'media-text-page';

        /*
         * Unique heading ID for accessibility
         */
        $heading_id = 'media-text-' . ( $index + 1 ) . '-heading';

        /*
         * Get image ID
         */
        $image_id = $section['image'] ?? '';

?>

        <section
            class="<?php echo esc_attr( $section_class ); ?>"
            aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
        >

            <?php if ( $image_id ) : ?>

                <div class="media-text__media">

                    <?php
                    echo wp_get_attachment_image(
                        $image_id,
                        'full',
                        false,
                        array(
                            'class' => 'media-text__image',
                        )
                    );
                    ?>

                </div>

            <?php endif; ?>


            <div class="media-text-page__content">

                <?php if ( ! empty( $section['heading'] ) ) : ?>

                    <h2 id="<?php echo esc_attr( $heading_id ); ?>">
                        <?php echo esc_html( $section['heading'] ); ?>
                    </h2>

                <?php endif; ?>


                <?php if ( ! empty( $section['subheading'] ) ) : ?>

                    <h3 class="media-text__subheading">
                        <?php echo esc_html( $section['subheading'] ); ?>
                    </h3>

                <?php endif; ?>


                <?php if ( ! empty( $section['content'] ) ) : ?>

                    <p>
                        <?php echo esc_html( $section['content'] ); ?>
                    </p>

                <?php endif; ?>


                <?php if ( ! empty( $section['button_text'] ) && ! empty( $section['button_url'] ) ) : ?>

                    <a
                        class="button"
                        href="<?php echo esc_url( $section['button_url'] ); ?>"
                    >
                        <?php echo esc_html( $section['button_text'] ); ?>
                    </a>

                <?php endif; ?>

            </div>

        </section>

<?php

    endforeach;

endif;
?>





















        	<!-- ////////////content section 1 //////////-->
		<!-- <section class="media-text-page" aria-labelledby="media-text-1-heading">
			<div class="media-text__media">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/projects/junk-bin11.webp"
					alt="A counsellor writing notes during a client session">
			</div>

			<div class="media-text-page__content">
				<h2 id="media-text-1-heading">We bridge the gap between crisis and stability</h2>
				<h3 class="media-text__subheading">Professional BACP counselling with life-pathway mentoring</h3>
				<p>We stop"activities and start delivering preventative impact infrastructure. We are a local Charity at
					heart, using our years of experience combined with essential specialist delivery partner within the
					Croydon ecosystem</p>
				
		</section> -->
		<!-- content section 1 end -->


        <!-- content section 2 -->
		<!-- <section class="media-text-page media-text--reverse" aria-labelledby="media-text-2-heading">
			<div class="media-text__media">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/projects/junk-bin06.webp" alt="...">
			</div>
			<div class="media-text-page__content">
				<h2 id="media-text-2-heading">26 Years of Community Transformation</h2>
				<h4 class="media-text__subheading">Founded by Sarah, a BACP-accredited counsellor with a background in
					Criminology, the Centre of Change began as a grassroots response to the welfare of young people in
					Croydon. </h4>
				<p>From our humble organic roots, we have grown into a trusted local institution that champions
					culturally competent, professional care for families in New Addington and beyond </p>
				<a class="button" href="#">Full Details</a>
			</div>
		</section> -->
		<!-- content sectin 2 end -->



  <?php get_template_part( 'template-parts/gallery'); ?>
	
     

<?php get_template_part( 'template-parts/pre-footer', 'no-logos' ); ?>
<?php get_footer()?>