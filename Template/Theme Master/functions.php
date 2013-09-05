<?php

/**
 * Functions
 *
 * Core functionality and initial theme setup
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 4.0
 */

/**
 * Initiate Foundation, for WordPress
 */

if ( ! function_exists( 'foundation_setup' ) ) :

function foundation_setup() {

	// Content Width
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Language Translations
	load_theme_textdomain( 'codingHat', get_template_directory() . '/languages' );

	// Custom Editor Style Support
	add_editor_style();

	// Support for Featured Images
	add_theme_support( 'post-thumbnails' ); 

	// Automatic Feed Links & Post Formats
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array( 'gallery', 'text' ) );

	// // Custom Background
	// add_theme_support( 'custom-background', array(
	// 	'default-color' => 'fff',
	// ) );

	// // Custom Header
	// add_theme_support( 'custom-header', array(
	// 	'default-text-color' => '#000',
	// 	'header-text'   => true,
	// 	'height'		=> '200',
	// 	'uploads'       => true,
	// ) );

}

add_action( 'after_setup_theme', 'foundation_setup' );

endif;

/**
 * Enqueue Scripts and Styles for Front-End
 */

if ( ! function_exists( 'codingHat_assets' ) ) :

function codingHat_assets() {

	if (!is_admin()) {

		/** 
		 * Deregister jQuery in favour of ZeptoJS
		 * jQuery will be used as a fallback if ZeptoJS is not compatible
		 * @see foundation_compatibility & http://foundation.zurb.com/docs/javascript.html
		 */
		//wp_deregister_script('jquery');
		// Load JavaScripts
		wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', null, '4.0', true );
		wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/vendor/custom.modernizr.js', null, '2.1.0');
		//wp_enqueue_script( 'zep', get_template_directory_uri().'/js/vendor/zepto.js', null, '2.1.0');
		//wp_enqueue_script( 'jquery', get_template_directory_uri().'/js/scripts/jquery-1.7.1.js', null, '1.0');
	
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
		wp_enqueue_script( 'bgStretch', get_template_directory_uri().'/js/scripts/bgStretch.js', null, '1.0', true);
		// Load Stylesheets
		wp_enqueue_style( 'normalize', get_template_directory_uri().'/css/normalize.css' );
		wp_enqueue_style( 'foundation', get_template_directory_uri().'/css/foundation.min.css' );
		wp_enqueue_style( 'reset', get_template_directory_uri().'/css/reset.css' );
		wp_enqueue_style( 'layout', get_template_directory_uri().'/css/layout.css' );
		wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css' );
		wp_enqueue_style( 'app', get_stylesheet_uri(), array('foundation') );

		// Load Google Fonts API
		wp_enqueue_style( 'google-fonts', 'http://fonts.googleapis.com/css?family=Open+Sans:600,400,300' );
		wp_enqueue_style( 'google-fonts2', 'http://fonts.googleapis.com/css?family=Droid+Sans:700,400,300' );
		wp_enqueue_style( 'google-fonts3', 'http://fonts.googleapis.com/css?family=Glegoo' );
	}

}
add_action( 'wp_enqueue_scripts', 'codingHat_assets' );

endif;
function add_scripts(){
		wp_enqueue_script( 'easing', get_template_directory_uri().'/js/scripts/jquery.easing.1.3.js', null, '1.0', true);
		wp_enqueue_script( 'custom', get_template_directory_uri().'/js/scripts/jquery-ui-1.8.11.custom.min.js', null, '1.0', true);
		wp_enqueue_script( 'transform', get_template_directory_uri().'/js/scripts/jquery.transform-0.9.3.min.js', null, '1.0', true);
		wp_enqueue_script( 'animate', get_template_directory_uri().'/js/scripts/jquery.animate-colors-min.js', null, '1.0', true);
		wp_enqueue_script( 'mathUtils', get_template_directory_uri().'/js/scripts/mathUtils.js', null, '1.0', true);
		wp_enqueue_script( 'superfish', get_template_directory_uri().'/js/scripts/superfish.js', null, '1.0', true);
		wp_enqueue_script( 'switcher', get_template_directory_uri().'/js/scripts/switcher.js', null, '1.0', true);
		wp_enqueue_script( 'mousewheel', get_template_directory_uri().'/js/scripts/jquery.mousewheel.js', null, '1.0', true);
		wp_enqueue_script( 'sprites', get_template_directory_uri().'/js/scripts/sprites.js', null, '1.0', true);
		wp_enqueue_script( 'forms', get_template_directory_uri().'/js/scripts/forms.js', null, '1.0', true);
		wp_enqueue_script( 'hoverSprite', get_template_directory_uri().'/js/scripts/hoverSprite.js', null, '1.0', true);
		wp_enqueue_script( 'slider', get_template_directory_uri().'/js/scripts/slider.js', null, '1.0', true);

		wp_enqueue_script( 'googleMap', get_template_directory_uri().'/js/scripts/googleMap.js', null, '1.0', true);
		wp_enqueue_script( 'vendor', get_template_directory_uri().'/js/vendor/scripts.js', null, '1.0', true);
		
}
add_action('wp_footer','add_scripts');
/**
 * Initialise codingHat JS
 * @see: http://foundation.zurb.com/docs/javascript.html
 */

if ( ! function_exists( 'foundation_js_init' ) ) :

function foundation_js_init () {
    echo '<script>$(document).foundation();</script>';
}

add_action('wp_footer', 'foundation_js_init', 50);

endif;

/**
 * ZeptoJS and jQuery Fallback
 * @see: http://foundation.zurb.com/docs/javascript.html
 */
if(function_exists("register_options_page"))
{
	if( current_user_can('level_10') ) :
		register_options_page('Admin Panel');
		register_options_page('Social Media');
	endif;
    register_options_page('General');
    register_options_page('Contact Information');
    
 }
 if(!function_exists('codingHat_init')):
	function codingHat_init(){
		get_template_part('ch-admin/theme_customizer');
		get_template_part('custom/section');
		get_template_part('custom/custom_fields');
		get_template_part('ch-admin/dashboard-options');
		get_template_part('ch-admin/footer-scripts');
		get_template_part('ch-admin/ch_fields');
	}
add_action( 'init', 'codingHat_init' );
endif;

if ( ! function_exists( 'foundation_comptability' ) ) :

function foundation_comptability () {

echo "<script>";
echo "document.write('<script src=' +";
echo "('__proto__' in {} ? '" . get_template_directory_uri() . "/js/vendor/zepto" . "' : '" . get_template_directory_uri() . "/js/vendor/jquery" . "') +";
echo "'.js><\/script>')";
echo "</script>";

}

//add_action('wp_footer', 'foundation_comptability', 10);

endif;

/**
 * Register Navigation Menus
 */

if ( ! function_exists( 'foundation_menus' ) ) :

// Register wp_nav_menus
function foundation_menus() {

	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu', 'foundation' )
		)
	);
	
}

//add_action( 'init', 'foundation_menus' );

endif;

function my_acf_load_field( $field )
{
	// reset choices
	$field['choices'] = array();
 
	// load repeater from the options page
	if(get_field('my_select_values', 'option'))
	{
		// loop through the repeater and use the sub fields "value" and "label"
		while(has_sub_field('my_select_values', 'option'))
		{
			$value = get_sub_field('value');
			$label = get_sub_field('label');
 
			$field['choices'][ $value ] = $label;
		}
	}
 
    // Important: return the field
    return $field;
}
 
// v3.5.8.2 and below
add_filter('acf_load_field-color', 'my_acf_load_field');
 
// v4.0.0 and above
add_filter('acf/load_field/name=color', 'my_acf_load_field');
function the_slug($echo=true){
  $slug = basename(get_permalink());
  do_action('before_slug', $slug);
  $slug = apply_filters('slug_filter', $slug);
  if( $echo ) echo $slug;
  do_action('after_slug', $slug);
  return $slug;
}
function clean_custom_menus() {
	$menu_name = 'nav'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '<nav>' ."\n";
		$menu_list .= "\t\t\t\t". '<ul>' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'"><div class="picPlane"><img class="pic" src="<?php echo get_template_directory_uri(); ?>/images/splashPic1.jpg" alt=""></div>' ."\n";
			$menu_list .= "\t\t\t\t\t". '<div class="textHolder"><span class="mText">' . $title . '</span></div></a></li>' ."\n";
		}
		$menu_list .= "\t\t\t\t". '</ul>' ."\n";
		$menu_list .= "\t\t\t". '</nav>' ."\n";
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}
if ( ! function_exists( 'foundation_page_menu' ) ) :

function foundation_page_menu() {

	$args = array(
	'sort_column' => 'menu_order, post_title',
	'menu_class'  => 'large-12 columns',
	'include'     => '',
	'exclude'     => '',
	'echo'        => true,
	'show_home'   => false,
	'link_before' => '',
	'link_after'  => ''
	);

	wp_page_menu($args);

}

endif;

/**
 * Navigation Menu Adjustments
 */

// Add class to navigation sub-menu
class foundation_navigation extends Walker_Nav_Menu {

function start_lvl(&$output, $depth) {
	$indent = str_repeat("\t", $depth);
	$output .= "\n$indent<ul class=\"dropdown\">\n";
}

function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
	$id_field = $this->db_fields['id'];
	if ( !empty( $children_elements[ $element->$id_field ] ) ) {
		$element->classes[] = 'has-dropdown';
	}
		Walker_Nav_Menu::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

/**
 * Create pagination
 */

if ( ! function_exists( 'foundation_pagination' ) ) :

function foundation_pagination() {

global $wp_query;

$big = 999999999;

$links = paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'prev_next' => true,
	'prev_text' => '&laquo;',
	'next_text' => '&raquo;',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
	'type' => 'list'
)
);

$pagination = str_replace('page-numbers','pagination',$links);

echo $pagination;

}

endif;

/**
 * Register Sidebars
 */

if ( ! function_exists( 'foundation_widgets' ) ) :

function foundation_widgets() {

	// Sidebar Right
	register_sidebar( array(
			'id' => 'foundation_sidebar_right',
			'name' => __( 'Sidebar Right', 'foundation' ),
			'description' => __( 'This sidebar is located on the right-hand side of each page.', 'foundation' ),
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column One
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_one',
			'name' => __( 'Sidebar Footer One', 'foundation' ),
			'description' => __( 'This sidebar is located in column one of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Two
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_two',
			'name' => __( 'Sidebar Footer Two', 'foundation' ),
			'description' => __( 'This sidebar is located in column two of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Three
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_three',
			'name' => __( 'Sidebar Footer Three', 'foundation' ),
			'description' => __( 'This sidebar is located in column three of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	// Sidebar Footer Column Four
	register_sidebar( array(
			'id' => 'foundation_sidebar_footer_four',
			'name' => __( 'Sidebar Footer Four', 'foundation' ),
			'description' => __( 'This sidebar is located in column four of your theme footer.', 'foundation' ),
			'before_widget' => '<div class="large-3 columns">',
			'after_widget' => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		) );

	}

add_action( 'widgets_init', 'foundation_widgets' );

endif;

/**
 * Custom Avatar Classes
 */

if ( ! function_exists( 'foundation_avatar_css' ) ) :

function foundation_avatar_css($class) {
	$class = str_replace("class='avatar", "class='author_gravatar left ", $class) ;
	return $class;
}

add_filter('get_avatar','foundation_avatar_css');

endif;

/**
 * Custom Post Excerpt
 */

if ( ! function_exists( 'foundation_excerpt' ) ) :

function foundation_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $excerpt_length = 80;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '<br><br><a href="'.get_permalink($post->ID) .'" class="button secondary small">' . __('Continue Reading', 'foundation') . '</a>');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'foundation_excerpt');

endif;

/** 
 * Comments Template
 */

if ( ! function_exists( 'foundation_comment' ) ) :

function foundation_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'foundation' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'foundation' ), '<span>', '</span>' ); ?></p>
	<?php
		break;
		default :
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header>
				<?php
					echo "<span class='th alignleft' style='margin-right:1rem;'>";
					echo get_avatar( $comment, 44 );
					echo "</span>";
					printf( '%2$s %1$s',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span class="label">' . __( 'Post Author', 'foundation' ) . '</span>' : ''
					);
					printf( '<br><a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						sprintf( __( '%1$s at %2$s', 'foundation' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header>

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p><?php _e( 'Your comment is awaiting moderation.', 'foundation' ); ?></p>
			<?php endif; ?>

			<section>
				<?php comment_text(); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'foundation' ), 'after' => ' &darr; <br><br>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

			</div>
		</article>
	<?php
		break;
	endswitch;
}
endif;

/**
 * Remove Class from Sticky Post
 */

if ( ! function_exists( 'foundation_remove_sticky' ) ) :

function foundation_remove_sticky($classes) {
  $classes = array_diff($classes, array("sticky"));
  return $classes;
}

add_filter('post_class','foundation_remove_sticky');

endif;

/**
 * Custom Foundation Title Tag
 * @see http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
 */

function foundation_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'foundation' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'foundation_title', 10, 2 );

/**
 * Retrieve Shortcodes
 * @see: http://fwp.drewsymo.com/shortcodes/
 */

$foundation_shortcodes = trailingslashit( get_template_directory() ) . 'inc/shortcodes.php';

if (file_exists($foundation_shortcodes)) {
	require( $foundation_shortcodes );
}

?>