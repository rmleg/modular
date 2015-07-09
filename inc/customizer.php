<?php
/**
 * A Dance With Mobile First Theme Customizer
 *
 * @package A Dance With Mobile First
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function a_dance_with_mobile_first_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Adding a logo/image at the top of the sidebar */
	$wp_customize->add_section( 'a_dance_with_mobile_first_logo_section' , array (
		'title'			=> __( 'Logo/Sidebar Image', 'a_dance_with_mobile_first' ),
		'priority'		=> 30,
		'description'	=> 'Upload an image to appear at the top of the sidebar. Examples include a logo or blogger photo.',
		) );
	$wp_customize->add_setting('a_dance_with_mobile_first_logo');
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'a_dance_with_mobile_first_logo', array (
		'label'		=> __( 'Logo/Sidebar Image', 'a_dance_with_mobile_first'),
		'section'	=> 'a_dance_with_mobile_first_logo_section',
		'settings'	=> 'a_dance_with_mobile_first_logo',
		) ) );
}
add_action( 'customize_register', 'a_dance_with_mobile_first_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function a_dance_with_mobile_first_customize_preview_js() {
	wp_enqueue_script( 'a_dance_with_mobile_first_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'a_dance_with_mobile_first_customize_preview_js' );
