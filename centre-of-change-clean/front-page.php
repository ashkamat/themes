<?php get_header()?>

<?php get_template_part( 'template-parts/hero/hero', 'home' ); ?>


<?php get_template_part( 'template-parts/cards/services-cards' ); ?>

<?php
/**
 * Homepage Media Text Sections
 *
 * Uses the same SCF repeater as the other page content sections:
 *
 * Repeater:
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

        /*
         * Homepage uses "media-text"
         * rather than "media-text-page".
         */
        $section_class = $is_reverse
            ? 'media-text media-text--reverse'
            : 'media-text';


        /*
         * Unique ID for accessibility.
         */
        $heading_id = 'media-text-' . ( $index + 1 ) . '-heading';


        /*
         * Image field.
         *
         * SCF image field should be set to return
         * the Image ID.
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


            <div class="media-text__content">

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
		<!-- <section class="media-text" aria-labelledby="media-text-1-heading">
			<div class="media-text__media">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/projects/junk-bin09.webp"
					alt="A counsellor writing notes during a client session">
			</div>

			<div class="media-text__content">
				<h2 id="media-text-1-heading">We bridge the gap between crisis and stability</h2>
				<h3 class="media-text__subheading">Professional BACP counselling with life-pathway mentoring</h3>
				<p>We stop"activities and start delivering preventative impact infrastructure. We are a local Charity at
					heart, using our years of experience combined with essential specialist delivery partner within the
					Croydon ecosystem</p>
				<a class="button" href="#">Full Details</a>
			</div>
		</section> -->
		<!-- content section 1 end -->


        
		<!-- content section 2 -->
		<!-- <section class="media-text media-text--reverse" aria-labelledby="media-text-2-heading">
			<div class="media-text__media">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sarah_diane_brown_bg.webp" alt="sarah and diane picture">
			</div>
			<div class="media-text__content">
				<h2 id="media-text-2-heading">18 Years of Community Transformation</h2>
				<h4 class="media-text__subheading">Founded by Sarah, a BACP-accredited counsellor with a background in
					Criminology, the Centre of Change began as a grassroots response to the welfare of young people in
					Croydon. </h4>
				<p>From our humble organic roots, we have grown into a trusted local institution that champions
					culturally competent, professional care for families in New Addington and beyond </p>
				<a class="button" href="#">Full Details</a>
			</div>
		</section> -->
		<!-- content sectin 2 end -->





<?php get_template_part( 'template-parts/featured-blog' ); ?>
<?php get_template_part( 'template-parts/testimonials' ); ?>
<?php get_template_part( 'template-parts/contact/contact-form' ); ?>




<?php get_template_part( 'template-parts/pre-footer' ); ?>

<?php get_footer()?>