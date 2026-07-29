<?php
/**
 * Team Member fields (SCF) — attached to the User profile screen.
 * Required by functions.php.
 */

/**
 * Register the SCF field group on the Edit User / Add User screens.
 */
add_action( 'acf/init', 'coc_register_team_member_fields' );
function coc_register_team_member_fields() {

	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'      => 'group_coc_team_member',
		'title'    => 'Team Member Details',
		'fields'   => array(
			array(
				'key'   => 'field_coc_team_live',
				'label' => 'Show on website',
				'name'  => 'team_live',
				'type'  => 'true_false',
				'ui'    => 1,
				'instructions' => 'Tick to make this person appear on the public Team page.',
			),
			array(
				'key'   => 'field_coc_team_order',
				'label' => 'Display order',
				'name'  => 'team_order',
				'type'  => 'number',
				'instructions' => 'Lower numbers appear first. Leave blank to sort last.',
			),
			array(
				'key'           => 'field_coc_team_photo',
				'label'         => 'Photo',
				'name'          => 'team_photo',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'thumbnail',
			),
			array(
				'key'   => 'field_coc_team_title',
				'label' => 'Job title',
				'name'  => 'team_title',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_coc_team_experience',
				'label' => 'Experience',
				'name'  => 'team_experience',
				'type'  => 'text',
			),
			array(
				'key'   => 'field_coc_team_specialisms',
				'label' => 'Specialisms',
				'name'  => 'team_specialisms',
				'type'  => 'text',
				'instructions' => 'Separate items with a bullet, e.g. Anxiety • Trauma • Relationships',
			),
			array(
				'key'   => 'field_coc_team_approach',
				'label' => 'Approach',
				'name'  => 'team_approach',
				'type'  => 'text',
			),
			array(
				'key'     => 'field_coc_team_badges',
				'label'   => 'Accreditations and qualifications',
				'name'    => 'team_badges',
				'type'    => 'checkbox',
				'choices' => array(
					'bacp'        => 'BACP accredited',
					'cpd'         => 'CPD registered',
					'dbs'         => 'DBS certified',
					'supervision' => 'Clinical supervision qualified',
					'integrative' => 'Integrative therapy practitioner',
					'training'    => 'Training qualified',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'user_form',
					'operator' => '==',
					'value'    => 'all',
				),
			),
		),
	) );
}

/**
 * Source-of-truth map for badge icon + alt text.
 */
function coc_team_badges() {
	return array(
		'bacp'        => array(
			'icon' => 'assets/images/team-badges/bacp_badge.svg',
			'alt'  => 'BACP accredited',
		),
		'cpd'         => array(
			'icon' => 'assets/images/team-badges/cpd_badge.svg',
			'alt'  => 'CPD registered',
		),
		'dbs'         => array(
			'icon' => 'assets/images/team-badges/dbs_badge.svg',
			'alt'  => 'DBS certified',
		),
		'supervision' => array(
			'icon' => 'assets/images/team-badges/confidential_badge.svg',
			'alt'  => 'Clinical supervision qualified',
		),
		'integrative' => array(
			'icon' => 'assets/images/team-badges/trainee_badge.svg',
			'alt'  => 'Integrative therapy practitioner',
		),
		'training'    => array(
			'icon' => 'assets/images/team-badges/supervise-badge.svg',
			'alt'  => 'Training qualified',
		),
	);
}