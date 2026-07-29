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
