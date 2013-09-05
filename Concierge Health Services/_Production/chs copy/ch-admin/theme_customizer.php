<?php
function ch_get_theme_option($option){
	$content = get_theme_mod( $option );
	return $content;
}
function ch_theme_option($option){

		$content = ch_get_theme_option($option);
		echo $content;

}
/**
 * Adds the Customize page to the WordPress admin area
 */
function ch_customizer_menu() {
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'ch_customizer_menu' );

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function ch_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'ch_footer',
        array(
            'title' => 'Footer',
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );
    $wp_customize->add_setting(
	    'copyright_textbox',
	    array(
	        'default' => 'Default copyright text',
	        'transport' => 'postMessage',
	    )
	);
$wp_customize->get_setting('blogname')->transport='postMessage';
$wp_customize->get_setting('blogdescription')->transport='postMessage';
$wp_customize->get_setting('header_textcolor')->transport='postMessage';
    $wp_customize->add_control(
	    'copyright_textbox',
	    array(
	        'label' => 'Copyright text',
	        'section' => 'ch_footer',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting(
    	'hide_copyright'
	);
	$wp_customize->add_control(
	    'hide_copyright',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Hide copyright text',
	        'section' => 'ch_footer',
	    )
	);
	$wp_customize->add_section(
        'background',
        array(
            'title' => 'Background',
            'description' => 'This is a settings section.',
            'priority' => 31,
        )
    );
	$wp_customize->add_setting( 'bg_image' );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'bg_image',
	        array(
	            'label' => 'Upload Background Image',
	            'section' => 'background',
	            'settings' => 'bg_image'
	        )
	    )
	);
	$wp_customize->add_section(
        'header',
        array(
            'title' => 'Header',
            'description' => 'This is a settings section.',
            'priority' => 31,
        )
    );
	$wp_customize->add_setting( 'logo' );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'logo',
	        array(
	            'label' => 'Upload Logo',
	            'section' => 'header',
	            'settings' => 'logo'
	        )
	    )
	);
	if ( $wp_customize->is_preview() && ! is_admin() )
    add_action( 'wp_footer', 'ch_customize_preview', 21);
}
add_action( 'customize_register', 'ch_customizer' );
function ch_customize_preview() {
    ?>
    <script type="text/javascript">
    ( function( $ ){
    wp.customize('copyright_textbox',function( value ) {
        value.bind(function(to) {
            $('.textPrivacy').html(to);
        });
    });
    } )( jQuery )
    </script>
    <?php
}




?>