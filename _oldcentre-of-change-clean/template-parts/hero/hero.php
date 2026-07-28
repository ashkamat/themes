<?php

$poster = get_theme_mod( 'hero_poster' );
$video  = get_theme_mod( 'hero_video' );
$enable = get_theme_mod( 'hero_enable_video', true );

$video_url = '';

if ( $video ) {
    $video_url = wp_get_attachment_url( $video );
}

?>

<section
    id="hero"
    class="hero-section"

    <?php if ( $poster ) : ?>

        style="background-image:url('<?php echo esc_url( $poster ); ?>');"

    <?php else : ?>

        style="background:#000;"

    <?php endif; ?>

    aria-label="Hero Banner">

    <?php if ( $enable && $video_url ) : ?>

        <video
            class="hero-video"
            autoplay
            muted
            loop
            playsinline

            <?php if ( $poster ) : ?>
                poster="<?php echo esc_url( $poster ); ?>"
            <?php endif; ?>

        >

            <source
                src="<?php echo esc_url( $video_url ); ?>"
                type="video/mp4">

        </video>

    <?php endif; ?>

    <div class="hero-content">

 <h3><?php echo esc_html( get_theme_mod( 'hero_h3', 'Early Intervention & Economic Prevention' ) ); ?></h3>

    <h1><?php echo esc_html( get_theme_mod( 'hero_h1', 'Counselling' ) ); ?></h1>

    <h2><?php echo esc_html( get_theme_mod( 'hero_h2', 'Helping young people and families in Croydon to overcome emotional barriers' ) ); ?></h2>

    <a class="button hero-cta"
       href="<?php echo esc_url( get_theme_mod( 'hero_button1_url', '#' ) ); ?>">
        <?php echo esc_html( get_theme_mod( 'hero_button1_text', 'Counselling' ) ); ?>
    </a>

    <a class="button hero-cta"
       href="<?php echo esc_url( get_theme_mod( 'hero_button2_url', '#' ) ); ?>">
        <?php echo esc_html( get_theme_mod( 'hero_button2_text', 'Impact Report' ) ); ?>
    </a>
    </div>

</section>