<?php

new \Kirki\Panel(
	'portx_panel_id',
	[
		'priority'    => 10,
		'title'       => esc_html__( 'Portx Options', 'portx' ),
		'description' => esc_html__( 'My Options Description.', 'portx' ),
	]
);

function header_settings_section() {
	new \Kirki\Section(
		'header_settings_section',
		[
			'title'       => esc_html__( 'Header Settings', 'portx' ),
			'description' => esc_html__( 'My Header Topbar Description', 'portx' ),
			'panel'       => 'portx_panel_id',
			'priority'    => 160,
		]
	);

    new \Kirki\Field\Checkbox_Switch(
        [
            'settings'    => 'header_topbar',
            'label'       => esc_html__( 'Header Top Bar Switch', 'portx' ),
            'description' => esc_html__( 'Header topbar on/off switch', 'portx' ),
            'section'     => 'header_settings_section',
            'default'     => 'on',
            'choices'     => [
                'on'  => esc_html__( 'Enable', 'portx' ),
                'off' => esc_html__( 'Disable', 'portx' ),
            ],
        ]
    );

	new \Kirki\Field\Text(
		[
			'settings' => 'header_day_text',
			'label'    => esc_html__( 'Text Control', 'portx' ),
			'section'  => 'header_settings_section',
			'default'  => esc_html__( 'Sunday Closed', 'portx' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'header_day_time_text',
			'label'    => esc_html__( 'Text Control', 'portx' ),
			'section'  => 'header_settings_section',
			'default'  => esc_html__( 'Mon - Sat 9.00 - 18.00', 'portx' ),
			'priority' => 10,
		]
	);


	new \Kirki\Field\Text(
		[
			'settings'    => 'header_email',
			'label'       => esc_html__( 'Email Address', 'portx' ),
			'description' => esc_html__( 'Please enter your email address here', 'portx' ),
			'section'     => 'header_settings_section',
			'default'     => esc_html__( 'portxinfo@gmail.com', 'portx' ),
		]
	);

	new \Kirki\Field\Text(
		[
			'settings'    => 'header_phone',
			'label'       => esc_html__( 'Phone Number', 'portx' ),
			'description' => esc_html__( 'Please enter your phone number here', 'portx' ),
			'section'     => 'header_settings_section',
			'default'     => esc_html__( '(00) 122 456 789', 'portx' ),
		]
	);
	
    new \Kirki\Field\Text(
        [
            'settings' => 'header_btn_text',
            'label'    => esc_html__( 'Header Button', 'portx' ),
            'section'  => 'header_settings_section',
            'default'  => esc_html__( 'REQUEST A QUOTE', 'portx' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_btn_url',
            'label'    => esc_html__( 'Header Button URL', 'portx' ),
            'section'  => 'header_settings_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );
	
    new \Kirki\Field\Text(
        [
            'settings' => 'header_offcanvas_btn_text',
            'label'    => esc_html__( 'Header Offcanvas Button', 'portx' ),
            'section'  => 'header_settings_section',
            'default'  => esc_html__( 'Getting Started', 'portx' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'header_offcanvas_btn_url',
            'label'    => esc_html__( 'Header Offcanvas Button URL', 'portx' ),
            'section'  => 'header_settings_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );
}
header_settings_section();


function header_logo_section() {
	new \Kirki\Section(
		'header_logo_section',
		[
			'title'       => esc_html__( 'Header Logo', 'portx' ),
			'description' => esc_html__( 'My Header Logo Description', 'portx' ),
			'panel'       => 'portx_panel_id',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Image(
        [
            'settings'    => 'logo_url',
            'label'       => esc_html__( 'Logo', 'portx' ),
            'description' => esc_html__( 'Please upload your logo here', 'portx' ),
            'section'     => 'header_logo_section',
            'default'     => esc_url(get_template_directory_uri() . '/assets/img/logo/black-logo.png'),
        ]
    );

	new \Kirki\Field\Image(
        [
            'settings'    => 'logo_search',
            'label'       => esc_html__( 'Logo Search', 'portx' ),
            'description' => esc_html__( 'Please upload your search logo here', 'portx' ),
            'section'     => 'header_logo_section',
            'default'     => esc_url(get_template_directory_uri() . '/assets/img/logo/footer-logo.png'),
        ]
    );

}
header_logo_section();

//social media
function header_social_section() {
    new \Kirki\Section(
        'header_social_section',
        [
            'title'       => esc_html__( 'Header Social', 'portx' ),
            'description' => esc_html__( 'My Header Social Description.', 'portx' ),
            'panel'       => 'portx_panel_id',
            'priority'    => 160,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'fb_url',
            'label'    => esc_html__( 'Facebook URL', 'portx' ),
            'section'  => 'header_social_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'tw_url',
            'label'    => esc_html__( 'Twitter URL', 'portx' ),
            'section'  => 'header_social_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'ins_url',
            'label'    => esc_html__( 'Instagram URL', 'portx' ),
            'section'  => 'header_social_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );

    new \Kirki\Field\Text(
        [
            'settings' => 'pin_url',
            'label'    => esc_html__( 'Pinterest URL', 'portx' ),
            'section'  => 'header_social_section',
            'default'  => esc_html__( '#', 'portx' ),
            'priority' => 10,
        ]
    );
}
header_social_section();
