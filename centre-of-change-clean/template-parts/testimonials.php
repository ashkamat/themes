

<!-- ///////swiper testimonials start//////// -->
		<section class="testimonials-section" aria-labelledby="testimonials-heading">
			<h2 id="testimonials-heading">testimonials</h2>

			<!-- Slider main container -->
			<div class="swiper">
				<!-- Additional required wrapper -->

<?php if( have_rows('testimonials') ): ?>
<div class="swiper-wrapper">
    <?php while( have_rows('testimonials') ): the_row();
        $avatar = get_sub_field('avatar');
        $name   = get_sub_field('name');
        $title  = get_sub_field('title');
        $quote  = get_sub_field('quote');
    ?>
    <div class="swiper-slide">
        <article class="testimonial-card">
            <?php if( $avatar ): ?>
                <img class="testimonial-card__avatar" src="<?php echo esc_url($avatar['url']); ?>" alt="">
            <?php endif; ?>
            <h3 class="testimonial-card__name"><?php echo esc_html($name); ?></h3>
            <p class="testimonial-card__title"><?php echo esc_html($title); ?></p>
            <blockquote class="testimonial-card__quote">
                <i class="ri-double-quotes-l" aria-hidden="true"></i>
                <p><?php echo esc_html($quote); ?></p>
                <i class="ri-double-quotes-r" aria-hidden="true"></i>
            </blockquote>
        </article>
    </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>		

				<!-- <div class="swiper-wrapper"> -->
					<!-- Slides hard -->
					<!-- <div class="swiper-slide">			
						<article class="testimonial-card">
							<img class="testimonial-card__avatar" src="<?php echo get_template_directory_uri(); ?>/assets/images/profile_pic_1.png" alt="">
							<h3 class="testimonial-card__name">Young Person</h3>
							<p class="testimonial-card__title">(At-Risk Youth)</p>
							<blockquote class="testimonial-card__quote">
								<i class="ri-double-quotes-l" aria-hidden="true"></i>
								<p>Before coming here, I didn't really talk to anyone about what was going on. I used to
									get angry a lot and didn't understand why. Having someone who actually listened and
									didn't judge me made a big difference.</p>
								<i class="ri-double-quotes-r" aria-hidden="true"></i>
							</blockquote>
						</article>
					</div> -->
				<!-- </div> -->


				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>

				<!-- If we need scrollbar -->
				<div class="swiper-scrollbar"></div>
			</div>


		</section>
