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
            aria-labelledby="<?php echo esc_attr( $heading_id ); ?>" >

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
