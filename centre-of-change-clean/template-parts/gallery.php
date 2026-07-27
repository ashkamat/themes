  <?php
$gallery = get_field( 'gallery' );

if ( $gallery ) :
    $total_images = count( $gallery );
?>

    <section class="imageGallery" aria-labelledby="gallery-heading">

        <h2 id="gallery-heading">Gallery</h2>

        <p id="gallery-instructions" class="visually-hidden">
            Click any thumbnail to view a larger version in a popup viewer.
        </p>

        <div class="fsGalleryContainer" role="list">

            <?php foreach ( $gallery as $index => $image_id ) : ?>

                <?php
                // Full-size image for FSLightbox
                $full_image_url = wp_get_attachment_image_url(
                    $image_id,
                    'full'
                );

                // Get Alt Text from the WordPress Media Library
                $alt_text = get_post_meta(
                    $image_id,
                    '_wp_attachment_image_alt',
                    true
                );

                // Fallback if no Alt Text has been entered
                if ( ! $alt_text ) {
                    $alt_text = get_the_title( $image_id );
                }

                $image_number = $index + 1;
                ?>

                <a
                    data-fslightbox="gallery"
                    href="<?php echo esc_url( $full_image_url ); ?>"
                    role="listitem"
                    aria-describedby="gallery-instructions"
                    aria-label="<?php echo esc_attr(
                        'View larger image ' . $image_number . ' of ' . $total_images . ': ' . $alt_text
                    ); ?>"
                >

                    <div class="galleryThumb">

                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'medium',
                            false,
                            array(
                                'alt' => $alt_text,
                            )
                        );
                        ?>

                    </div>

                </a>

            <?php endforeach; ?>

        </div>
        <!-- gallery container -->


        <!-- FSLightbox -->
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/fslightbox.js"></script>

    </section>

<?php endif; ?>