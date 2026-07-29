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