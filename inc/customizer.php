<?php
/**
 * Adaptable Theme Customizer
 *
 * @package Adaptable
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function adaptable_customize_register( $wp_customize ) {

	/*class Color_Scheme_Custom_Control extends WP_Customize_Control {
		public function render_content() {
			?>
			<label>
	              <span class="customize-color-scheme-control"><?php echo esc_html( $this->label ); ?></span>
	              <ul>
	                <li><img src="<?php echo get_template_directory_uri() . '/images/eggplant.png' ?>" alt="Eggplant" /><input type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[style.css]" value="1" /></li>
	                <li><img src="<?php echo get_template_directory_uri() . '/images/silverblue.png' ?>" alt="Silver Blue" /><input type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id; ?>[bluewhitegray.css]" value="1" /></li>
	              </ul>
	        </label>
			<?php
		}
	}*/

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/* Adding a logo/image at the top of the sidebar */
	$wp_customize->add_section( 'adaptable_logo_section' , array (
		'title'			=> __( 'Logo/Sidebar Image', 'adaptable' ),
		'priority'		=> 30,
		'description'	=> 'Upload an image to appear at the top of the sidebar. Examples include a logo or blogger photo.',
		) );
	$wp_customize->add_setting('adaptable_logo');
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'adaptable_logo', array (
		'label'		=> __( 'Logo/Sidebar Image', 'adaptable'),
		'section'	=> 'adaptable_logo_section',
		'settings'	=> 'adaptable_logo',
		) ) );

	/* Add color scheme options */
	$wp_customize->add_setting('adaptable_color_scheme');
	$wp_customize->add_control( /*new Color_Scheme_Custom_Control($wp_customize,*/ 'adaptable_color_scheme', array (
		'label'	=> __('Color Scheme', 'adaptable'),
		'section'	=> 'colors',
		'settings'	=> 'adaptable_color_scheme',
		'type'	=> 'radio',
		'choices'	=> array (
			'style.css'	=> 'Eggplant (Default)',
			'bluewhitegray.css'	=>	"Blue/White/Gray",
			),
		)
	/*)*/);
}
add_action( 'customize_register', 'adaptable_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function adaptable_customize_preview_js() {
	wp_enqueue_script( 'adaptable_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'adaptable_customize_preview_js' );
?>