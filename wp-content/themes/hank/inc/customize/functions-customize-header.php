<?php
defined( 'ABSPATH' ) or die();

add_filter( 'hank_customize_containers', 'hank_customize_header_containers' );
add_filter( 'hank_customize_controls', 'hank_customize_header_controls' );
add_filter( 'hank_customize_settings', 'hank_customize_header_settings' );

function hank_customize_header_containers( $containers ) {
	$containers['headerAndFooter'] = array(
		'type'        => 'panel',
		'title'       => _x( 'Header & Footer Builder', 'customize', 'hank' ),
		'description' => _x( 'Controls the settings for customizing the header and footer styles', 'customize', 'hank' )
	);

	$containers['headerGeneral'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General', 'customize', 'hank' ),
		'parent'      => _x( 'Header Settings', 'customize', 'hank' ),
		'description' => _x( 'Controls the general settings for the header.', 'customize', 'hank' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Settings', 'hank' ),
		)
	);
	$containers['headerTopbar'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Topbar Settings', 'customize', 'hank' ),
		'parent'      => _x( 'Header Settings', 'customize', 'hank' ),
		'description' => _x( 'Configure the settings for the header topbar area.', 'customize', 'hank' )
	);
	$containers['headerNavigator'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'hank' ),
		'parent'      => _x( 'Header Settings', 'customize', 'hank' ),
		'description' => _x( 'Configure the settings for the header navigation bar area.', 'customize', 'hank' )
	);

	$containers['headerTitle'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Title Bar', 'customize', 'hank' ),
		'parent'      => _x( 'Header Settings', 'customize', 'hank' )
	);

	$containers['headerSticky'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'General Settings', 'customize', 'hank' ),
		'description' => _x( 'Configure the settings for the sticky header.', 'customize', 'hank' ),
		'heading'     => array(
			'title'       => esc_html__( 'Header Sticky Setting', 'hank' ),
		)
	);
	$containers['headerStickyNav'] = array(
		'type'        => 'section',
		'panel'       => 'headerAndFooter',
		'title'       => _x( 'Navigation Bar', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);

	return $containers;
}

function hank_customize_header_controls( $controls ) {
	$controls['header__position'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Position', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'top'   => _x( 'Top', 'customize', 'hank' ),
			'right' => _x( 'Right', 'customize', 'hank' ),
			'bottom' => _x( 'Bottom', 'customize', 'hank' ),
			'left' => _x( 'Left', 'customize', 'hank' )
		)
	);

	/**
	 * The logo profile
	 */
	$controls['header__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerGeneral',
		'label'       => _x( 'logo that will be shown', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'hank' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'hank' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'hank' )
		)
	);
	$controls['header__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Logo Alignment', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'hank' ),
			'center' => _x( 'Center', 'customize', 'hank' ),
			'right'  => _x( 'Right', 'customize', 'hank' )
		)
	);
	$controls[ 'header__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Logo Margin (px)', 'hank' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Height', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => _x( '100% Header Full Width', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Shadow', 'hank' ),
	);
	$controls['header__transparent'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Enable Header Transparent', 'hank' ),
	);

	$controls['header__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerGeneral',
		'label'       => esc_html__( 'Header Border', 'hank' ),
	);
	$controls[ 'header__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerGeneral',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);

	$controls['header__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Header Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__background'] = array(
		'type'        => 'background',
		'section'     => 'headerGeneral'
	);

	$controls['header__info__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerGeneral',
		'label'       => _x( 'Contact Info', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);


	/**
	 * Topbar Settings
	 */
	$controls['header__topbar'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Enable Topbar', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__topbar__height'] = array(
		'type'        => 'text',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Height', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);

	// Topbar content
	$controls['header__topbar__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Content', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);

	$controls['header__topbar__typoHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Font', 'hank' ),
	);
	$controls['header__topbar__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerTopbar'
	);
	$controls['header__topbar__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTopbar',
		'label'       => esc_html__( 'Topbar Link Colors', 'hank' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Link Color', 'hank' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'hank' ),
			'menu-active' => esc_html__( 'Active Color', 'hank' )
		)
	);

	$controls['header__topbar__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTopbar',
		'label'       => _x( 'Topbar Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__topbar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTopbar'
	);


	/**
	 * Navigation Bar Settings
	 */
	$controls['header__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Font', 'hank' ),
	);
	$controls['header__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Colors', 'hank' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'hank' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'hank' ),
			'menu-active' => esc_html__( 'Active Color', 'hank' )
		)
	);
	$controls[ 'header__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Margin', 'hank' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Menu Padding', 'hank' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'hank' ),
			'padding-right'  => esc_html__( 'Right', 'hank' ),
			'padding-bottom' => esc_html__( 'Bottom', 'hank' ),
			'padding-left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__nav__extras'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerNavigator',
		'label'       => esc_html__( 'Show Extra Items On The Header', 'hank' ),
		'choices'     => array(
			'cart'      => _x( 'Shopping Cart', 'customize', 'hank' ),
			'search'    => _x( 'Search Box', 'customize', 'hank' )
		)
	);

	$controls['header__nav__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerNavigator',
		'label'       => _x( 'Navigator Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__nav__background'] = array(
		'type'        => 'background',
		'section'     => 'headerNavigator'
	);

	$controls['header__nav__text'] = array(
		'type'        => 'textareafield',
		'section'     => 'headerNavigator',
		'label'       => _x( 'Navigator Info', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);

	/**
	 * Sticky Header Settings
	 */
	$controls['header__sticky'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'default'     => 'on'
	);
	$controls['header__sticky__logo'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerSticky',
		'label'       => _x( 'logo that will be shown', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'logoDefault' => _x( 'Logo Default', 'customize', 'hank' ),
			'logoDark'    => _x( 'Logo Dark', 'customize', 'hank' ),
			'logoLight'   => _x( 'Logo Light', 'customize', 'hank' )
		)
	);
	$controls['header__sticky__logoAlign'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerSticky',
		'label'       => _x( 'Logo Alignment', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'hank' ),
			'center' => _x( 'Center', 'customize', 'hank' ),
			'right'  => _x( 'Right', 'customize', 'hank' )
		)
	);
	$controls[ 'header__sticky__logoMargin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Logo Margin', 'hank' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);

	/**
	 * Header Settings
	 */
	$controls['header__sticky__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Height', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__sticky__width'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => _x( '100% Full Width', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	
	$controls['header__sticky__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Enable Shadow', 'hank' ),
	);

	$controls['header__sticky__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerSticky',
		'label'       => esc_html__( 'Header Sticky Border', 'hank' ),
	);
	$controls[ 'header__sticky__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerSticky',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);

	$controls['header__sticky__backgroundHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerSticky',
		'label'       => _x( 'Header Sticky Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__sticky__background'] = array(
		'type'        => 'background',
		'section'     => 'headerSticky'
	);

	$controls['header__sticky__nav__typography'] = array(
		'type'        => 'typography',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Font', 'hank' ),
	);
	$controls['header__sticky__nav__colors'] = array(
		'type'        => 'colors',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Colors', 'hank' ),
		'choices'     => array(
			'menu'        => esc_html__( 'Menu Color', 'hank' ),
			'menu-hover'  => esc_html__( 'Hover Color', 'hank' ),
			'menu-active' => esc_html__( 'Active Color', 'hank' )
		)
	);
	$controls[ 'header__sticky__nav__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Margin', 'hank' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__sticky__nav__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerStickyNav',
		'label'       => esc_html__( 'Menu Sticky Padding', 'hank' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'hank' ),
			'padding-right'  => esc_html__( 'Right', 'hank' ),
			'padding-bottom' => esc_html__( 'Bottom', 'hank' ),
			'padding-left'   => esc_html__( 'Left', 'hank' )
		)
	);


	/**
	 * Title bar
	 */
	$controls['header__titlebar'] = array(
		'type'        => 'dropdown',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Displays', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'both'        => _x( 'Page Title and Breadcrumbs', 'customize', 'hank' ),
			'title'       => _x( 'Page Title Only', 'customize', 'hank' ),
			'breadcrumbs' => _x( 'Breadcrumbs Only', 'customize', 'hank' ),
			'none'        => _x( 'None', 'customize', 'hank' )
		)
	);
	$controls['header__titlebar__align'] = array(
		'type'        => 'radio-buttons',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Alignment', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => array(
			'left'   => _x( 'Left', 'customize', 'hank' ),
			'center' => _x( 'Center', 'customize', 'hank' ),
			'right'  => _x( 'Right', 'customize', 'hank' ),
			'inline' => _x( 'Inline', 'customize', 'hank' )
		)
	);
	$controls['header__titlebar__height'] = array(
		'type'        => 'textfield',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Height', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__titlebar__full'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Title Bar Full Width', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__titlebar__home'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => _x( 'Display On The Homepage', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	
	$controls['header__titlebar__shadow'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Shadow', 'hank' ),
	);

	$controls['header__titlebar__scrolldown'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Scroll Down Button', 'hank' ),
	);

	$controls['header__titlebar__canvaseffect'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Enable Canvas Effect', 'hank' ),
	);

	$controls['header__titlebar__border'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Border', 'hank' ),
	);
	$controls[ 'header__titlebar__border__options'] = array(
		'type'        => 'border',
		'section'     => 'headerTitle',
		'choices'     => array(
			'top'    => esc_html__( 'Top', 'hank' ),
			'right'  => esc_html__( 'Right', 'hank' ),
			'bottom' => esc_html__( 'Bottom', 'hank' ),
			'left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__titlebar__background'] = array(
		'type'        => 'background',
		'section'     => 'headerTitle',
		'label'   => _x( 'Title Bar Background', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls[ 'header__titlebar__margin'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Margin', 'hank' ),
		'choices'     => array(
			'margin-top'    => esc_html__( 'Top', 'hank' ),
			'margin-right'  => esc_html__( 'Right', 'hank' ),
			'margin-bottom' => esc_html__( 'Bottom', 'hank' ),
			'margin-left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__titlebar__padding'] = array(
		'type'        => 'dimension',
		'section'     => 'headerTitle',
		'label'       => esc_html__( 'Title Bar Padding', 'hank' ),
		'choices'     => array(
			'padding-top'    => esc_html__( 'Top', 'hank' ),
			'padding-right'  => esc_html__( 'Right', 'hank' ),
			'padding-bottom' => esc_html__( 'Bottom', 'hank' ),
			'padding-left'   => esc_html__( 'Left', 'hank' )
		)
	);
	$controls['header__titlebar__backgroundFeatured'] = array(
		'type'        => 'checkboxes',
		'section'     => 'headerTitle',
		'label'       => _x( 'Use Featured Image As Background in', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' ),
		'choices'     => 'hank_customize_post_types_options'
	);

	$controls['header__titlebar__titleHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Page Title Font', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__titlebar__titleFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);

	$controls['header__titlebar__breadcrumbHeading'] = array(
		'type'        => 'heading',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Font', 'customize', 'hank' ),
		'description' => _x( '', 'customize', 'hank' )
	);
	$controls['header__titlebar__breadcrumbFont'] = array(
		'type'        => 'typography',
		'section'     => 'headerTitle'
	);
	$controls['header__titlebar__breadcrumbColors'] = array(
		'type'        => 'colors',
		'section'     => 'headerTitle',
		'label'       => _x( 'Breadcrumbs Link Color', 'customize', 'hank' ),
		'choices'     => array(
			'link' => _x( 'Link Color', 'customize', 'hank' ),
			'linkHover' => _x( 'Hover Color', 'customize', 'hank' )
		)
	);


	/**
	 * Sticky Header Settings
	 */
	$controls['header__widgets'] = array(
		'type'        => 'radio-onoff',
		'section'     => 'header__widgets',
		'label'       => _x( 'Enable Sticky Header', 'customize', 'hank' ),
		'description' => _x( 'Turn ON to enable the header widgets area', 'customize', 'hank' ),
		'default'     => 'on'
	);

	return $controls;
}



function hank_customize_header_settings( $settings ) {
	$border_default = array( 'size' => '0px', 'style' => 'none', 'color' => '#000000' );
	$settings = array_merge( $settings, array(
		'header__position'  => array( 'default' => 'top' ),
		'header__logo'       => array( 'default' => 'logoDefault' ),
		'header__logoAlign'  => array( 'default' => 'left' ),
		'header__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__width'      => array( 'default' => 'on' ),
		'header__height'     => array( 'default' => '80px' ),
		'header__background' => array( 'default' => array() ),
		'header__shadow'     => array( 'default' => 'off' ),
		'header__border'     => array( 'default' => 'off' ),
		'header__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__transparent' => array( 'default' => 'off' ),

		'header__topbar'             => array( 'default' => 'on' ),
		'header__topbar__width'      => array( 'default' => 'on' ),
		'header__topbar__height'     => array( 'default' => '40px' ),
		'header__topbar__text'       => array( 'default' => '' ),
		'header__topbar__icons'      => array( 'default' => '' ),
		'header__topbar__background' => array( 'default' => array() ),
		'header__topbar__typography' => array( 'default' => array() ),
		'header__topbar__colors'     => array( 'default' => array() ),

		'header__nav__typography' => array( 'default' => array() ),
		'header__nav__colors'     => array( 'default' => array() ),
		'header__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__nav__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__nav__background' => array( 'default' => array() ),
		'header__nav__extras'     => array( 'default' => array() ),


		'header__sticky__logo'       => array( 'default' => 'logoDefault' ),
		'header__sticky__logoAlign'  => array( 'default' => 'left' ),
		'header__sticky__logoMargin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right'  => '0px',
			'margin-bottom' => '0px', 'margin-left'   => '0px'
		) ),

		'header__sticky__width'      => array( 'default' => 'on' ),
		'header__sticky__height'     => array( 'default' => '80px' ),
		'header__sticky__background' => array( 'default' => array() ),
		'header__sticky__shadow'     => array( 'default' => 'off' ),
		'header__sticky__border'     => array( 'default' => 'off' ),
		'header__sticky__border__options'     => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__sticky__transparent' => array( 'default' => 'off' ),
		'header__sticky__nav__typography' => array( 'default' => array() ),
		'header__sticky__nav__colors'     => array( 'default' => array() ),
		'header__sticky__nav__margin'     => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__sticky__nav__padding'    => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),

		'header__titlebar'         => array( 'default' => 'both' ),
		'header__titlebar__home'   => array( 'default' => 'on' ),
		'header__titlebar__align'  => array( 'default' => 'left' ),
		'header__titlebar__full'   => array( 'default' => 'off' ),
		'header__titlebar__height' => array( 'default' => '80px' ),
		'header__titlebar__margin' => array( 'default' => array(
			'margin-top'    => '0px', 'margin-right' => '0px',
			'margin-bottom' => '0px', 'margin-left'  => '0px'
		) ),
		'header__titlebar__padding' => array( 'default' => array(
			'padding-top'    => '0px', 'padding-right' => '0px',
			'padding-bottom' => '0px', 'padding-left'  => '0px'
		) ),
		'header__titlebar__shadow' => array( 'default' => 'off' ),
		'header__titlebar__scrolldown' => array( 'default' => 'on' ),
		'header__titlebar__border' => array( 'default' => 'off' ),
		'header__titlebar__border__options' => array( 'default' => array(
			'all'  => $border_default, 'top'   => $border_default, 'bottom' => $border_default,
			'left' => $border_default, 'right' => $border_default
		) ),
		'header__titlebar__background'         => array( 'default' => array() ),
		'header__titlebar__backgroundFeatured' => array( 'default' => array() ),
		'header__titlebar__titleFont'          => array( 'default' => array() ),
		'header__titlebar__breadcrumbFont'     => array( 'default' => array() ),
		'header__titlebar__breadcrumbColors'   => array( 'default' => array() ),
	) );

	return $settings;
}
