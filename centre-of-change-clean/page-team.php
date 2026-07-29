page-team.php

<?php get_header()?>

<!-- page bannder comes from parts-->
<?php get_template_part( 'template-parts/page-banner'); ?>



<?php
/**
 * Team members grid — pulled from User accounts via SCF.
 * Only users with 'team_live' checked are shown, sorted by 'team_order'.
 */

$team_members = get_users( array(
	'meta_query' => array(
		array(
			'key'   => 'team_live',
			'value' => '1',
			'compare' => '=',
		),
	),
	'meta_key' => 'team_order',
	'orderby'  => 'meta_value_num',
	'order'    => 'ASC',
) );

if ( $team_members ) : ?>

	<section class="team-members-section" aria-labelledby="team-members-heading">
		<h2 id="team-members-heading" class="screen-reader-text">Our Team</h2>

		<ul class="team-grid">
			<?php foreach ( $team_members as $user ) :

				$user_id      = $user->ID;
				$name         = $user->display_name;
				$title        = get_field( 'team_title', 'user_' . $user_id );
				$photo        = get_field( 'team_photo', 'user_' . $user_id );
				$experience   = get_field( 'team_experience', 'user_' . $user_id );
				$specialisms  = get_field( 'team_specialisms', 'user_' . $user_id );
				$approach     = get_field( 'team_approach', 'user_' . $user_id );
				$badge_keys   = get_field( 'team_badges', 'user_' . $user_id );
				$card_id      = 'team-card-' . $user_id . '-name';
				?>

				<li>
					<article class="team-card" aria-labelledby="<?php echo esc_attr( $card_id ); ?>">

						<?php if ( $photo ) : ?>
							<img
								class="team-card__photo"
								src="<?php echo esc_url( $photo['sizes']['medium'] ?? $photo['url'] ); ?>"
								alt="Photo of <?php echo esc_attr( $name ); ?>"
								width="140"
								height="140"
							/>
						<?php endif; ?>

						<h3 id="<?php echo esc_attr( $card_id ); ?>" class="team-card__name">
							<?php echo esc_html( $name ); ?>
						</h3>

						<?php if ( $title ) : ?>
							<p class="team-card__title"><?php echo esc_html( $title ); ?></p>
						<?php endif; ?>

						<?php if ( $experience || $specialisms || $approach ) : ?>
							<dl class="team-card__details">
								<?php if ( $experience ) : ?>
									<dt>Experience</dt>
									<dd><?php echo esc_html( $experience ); ?></dd>
								<?php endif; ?>

								<?php if ( $specialisms ) : ?>
									<dt>Specialisms</dt>
									<dd><?php echo esc_html( $specialisms ); ?></dd>
								<?php endif; ?>

								<?php if ( $approach ) : ?>
									<dt>Approach</dt>
									<dd><?php echo esc_html( $approach ); ?></dd>
								<?php endif; ?>
							</dl>
						<?php endif; ?>

						<?php if ( ! empty( $badge_keys ) ) :
							$badge_map = coc_team_badges();
							?>
							<ul class="team-card__badges" aria-label="Accreditations and qualifications">
								<?php foreach ( $badge_keys as $key ) :
									if ( empty( $badge_map[ $key ] ) ) {
										continue;
									}
									$badge = $badge_map[ $key ];
									?>
									<li>
										<img
											src="<?php echo esc_url( get_template_directory_uri() . '/' . $badge['icon'] ); ?>"
											alt="<?php echo esc_attr( $badge['alt'] ); ?>"
											width="24"
											height="24"
										/>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

					</article>
				</li>

			<?php endforeach; ?>
		</ul>
	</section>

<?php endif; ?>












		<!-- team memberss -->
     <!-- hard code -->
	<!-- <section class="team-members-section" aria-labelledby="team-members-heading"> 
       <h2 id="team-members-heading" class="screen-reader-text">Our Team</h2>

      <ul class="team-grid">
    
            <li>
                <article class="team-card" aria-labelledby="team-card-diane-name">

                  <img
                    class="team-card__photo"
                    src="assets/images/profile_pic_1.png"
                    alt="Photo of Diane Roulion"
                    width="140"
                    height="140"
                  />

                  <h3 id="team-card-diane-name" class="team-card__name">Diane Roulion</h3>
                  <p class="team-card__title">Senior Counsellor &amp; Placement Supervisor</p>

                  <dl class="team-card__details">
                    <dt>Experience</dt>
                    <dd>15+ years counselling experience</dd>

                    <dt>Specialisms</dt>
                    <dd>Anxiety &bull; Trauma &bull; Relationships &bull; Self-esteem</dd>

                    <dt>Approach</dt>
                    <dd>Integrative, person-centred therapy</dd>
                  </dl>

                  <ul class="team-card__badges" aria-label="Accreditations and qualifications">
                    <li><img src="assets/images/team-badges/bacp_badge.svg" alt="BACP accredited" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/cpd_badge.svg" alt="CPD registered" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/dbs_badge.svg" alt="DBS certified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/confidential_badge.svg" alt="Clinical supervision qualified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/trainee_badge.svg" alt="Integrative therapy practitioner" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/supervise-badge.svg" alt="Training qualified" width="24" height="24"></li>
                  </ul>

                </article>
            </li>

            <li>
                <article class="team-card" aria-labelledby="team-card-diane-name">

                  <img
                    class="team-card__photo"
                    src="assets/images/profile/1594974121047.jpg"
                    alt="Photo of Diane Roulion"
                    width="140"
                    height="140"
                  />

                  <h3 id="team-card-diane-name" class="team-card__name">Diane Roulion</h3>
                  <p class="team-card__title">Senior Counsellor &amp; Placement Supervisor</p>

                  <dl class="team-card__details">
                    <dt>Experience</dt>
                    <dd>15+ years counselling experience</dd>

                    <dt>Specialisms</dt>
                    <dd>Anxiety &bull; Trauma &bull; Relationships &bull; Self-esteem</dd>

                    <dt>Approach</dt>
                    <dd>Integrative, person-centred therapy</dd>
                  </dl>

                  <ul class="team-card__badges" aria-label="Accreditations and qualifications">
                    <li><img src="assets/images/team-badges/bacp_badge.svg" alt="PGCB accredited" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/cpd_badge.svg" alt="CbD registered" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/dbs_badge.svg" alt="DB2 certified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/confidential_badge.svg" alt="Clinical supervision qualified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/trainee_badge.svg" alt="Integrative therapy practitioner" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/supervise-badge.svg" alt="Training qualified" width="24" height="24"></li>
                  </ul>

                </article>
            </li>

            <li>
                <article class="team-card" aria-labelledby="team-card-diane-name">

                  <img
                    class="team-card__photo"
                    src="assets/images/profile/faliquo.jpg"
                    alt="Photo of Diane Roulion"
                    width="140"
                    height="140"
                  />

                  <h3 id="team-card-diane-name" class="team-card__name">Diane Roulion</h3>
                  <p class="team-card__title">Senior Counsellor &amp; Placement Supervisor</p>

                  <dl class="team-card__details">
                    <dt>Experience</dt>
                    <dd>15+ years counselling experience</dd>

                    <dt>Specialisms</dt>
                    <dd>Anxiety &bull; Trauma &bull; Relationships &bull; Self-esteem</dd>

                    <dt>Approach</dt>
                    <dd>Integrative, person-centred therapy</dd>
                  </dl>

                  <ul class="team-card__badges" aria-label="Accreditations and qualifications">
                    <li><img src="assets/images/team-badges/bacp_badge.svg" alt="PGCB accredited" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/cpd_badge.svg" alt="CbD registered" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/dbs_badge.svg" alt="DB2 certified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/confidential_badge.svg" alt="Clinical supervision qualified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/trainee_badge.svg" alt="Integrative therapy practitioner" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/supervise-badge.svg" alt="Training qualified" width="24" height="24"></li>
                  </ul>

                </article>
            </li>

            <li>
                <article class="team-card" aria-labelledby="team-card-diane-name">

                  <img
                    class="team-card__photo"
                    src="assets/images/profile/Ashleigh-Management-Committe-Media-and-comms-300x200.jpg"
                    alt="Photo of Diane Roulion"
                    width="140"
                    height="140"
                  />

                  <h3 id="team-card-diane-name" class="team-card__name">Diane Roulion</h3>
                  <p class="team-card__title">Senior Counsellor &amp; Placement Supervisor</p>

                  <dl class="team-card__details">
                    <dt>Experience</dt>
                    <dd>15+ years counselling experience</dd>

                    <dt>Specialisms</dt>
                    <dd>Anxiety &bull; Trauma &bull; Relationships &bull; Self-esteem</dd>

                    <dt>Approach</dt>
                    <dd>Integrative, person-centred therapy</dd>
                  </dl>

                  <ul class="team-card__badges" aria-label="Accreditations and qualifications">
                    <li><img src="assets/images/team-badges/bacp_badge.svg" alt="PGCB accredited" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/cpd_badge.svg" alt="CbD registered" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/dbs_badge.svg" alt="DB2 certified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/confidential_badge.svg" alt="Clinical supervision qualified" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/trainee_badge.svg" alt="Integrative therapy practitioner" width="24" height="24"></li>
                    <li><img src="assets/images/team-badges/supervise-badge.svg" alt="Training qualified" width="24" height="24"></li>
                  </ul>

                </article>
            </li>

      </ul>
  </section> -->
    <!-- team cards end -->















<!-- gallery underneath -->
<?php get_template_part( 'template-parts/gallery'); ?>
	
  <!-- pre-footer -->
<?php get_template_part( 'template-parts/pre-footer', 'no-logos' ); ?>

<!-- footer -->
<?php get_footer()?>