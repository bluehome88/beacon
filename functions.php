<?php
/**
 * Beacon functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, beacon_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'beacon_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Beacon 1.0
 */

require __DIR__ . '/inc/helpers.php';

// Increase this number every time you upload changes to live site!
define('SCRIPTS_VER', '6.0.0');

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

error_reporting(0);
if (WP_DEBUG) {
	error_reporting(E_ALL);
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 584;

/**
 * Tell WordPress to run beacon_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'beacon_setup' );

if ( ! function_exists( 'beacon_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override beacon_setup() in a child theme, add your own beacon_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, custom headers
 * 	and backgrounds, and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Beacon 1.0
 */
function mailTemplateContactUs($arrTemplateHeader,$arrContactData,$arrTemplateFooter,$templateFile)
{
	global $config;
		$content="";
		
		$PATH = $arrTemplateHeader['livePath'];
		if(!empty($arrTemplateHeader['logoImagePath']))
		{
			$SITE_LOGO="<img src='".$arrTemplateHeader['logoImagePath']."'   style='margin-bottom:10px;' border='0' width='".$arrTemplateHeader['logoImageWidth']."' height='".$arrTemplateHeader['logoImageHeight']."'/>";
			$HEADER_HIDE = '';				
		}	
		else
		{
			$SITE_LOGO = "";
			$HEADER_HIDE = "none";				
		}
		
		$HEADER = $arrTemplateHeader['headerText'];
		$contactData="";		
		foreach($arrContactData as $key => $value)
		{
			if(!empty($value))
			{
			$contactData .= "<tr>
			                    <td width='25%' height='25' align='left' valign='top' ><strong>".ucwords($key)." :</strong></td>
               				    <td width='75%' align='left' valign='top' >".stripslashes($value)."</td>
			                  </tr>";
			}
			else
			{
				$contactData .= "<tr>
				                    <td width='25%' colspan='2' height='25' align='left' valign='top' ><strong>".ucwords($key)." :</strong></td>									 				                
								 </tr>";
			}
		}
		$BODY_CONTENT = $contactData;
		$FOOTER = $arrTemplateFooter['footerText'];
		$content=file_get_contents($templateFile);
		$content = addslashes($content);
		eval("\$content = \"$content\";");
		//echo $content;exit;
		return stripslashes($content);
}

function beacon_setup() {

	/* Make Beacon available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Beacon, use a find and replace
	 * to change 'beacon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'beacon', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Load up our theme options page and related code.
	require( get_template_directory() . '/inc/theme-options.php' );

	// Grab Beacon's Ephemera widget.
	require( get_template_directory() . '/inc/widgets.php' );

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'beacon' ) );
	register_nav_menu( 'about_us', __( 'About Us Menu', 'beacon' ) );
	register_nav_menu( 'top_nav', __( 'Top Navigation Menu', 'beacon' ) );
	register_nav_menu( 'top_nav_1', __( 'Top Navigation Menu1', 'beacon' ) ); // this menu is without event page.
	 
	register_nav_menu( 'product', __( 'Product Menu', 'beacon' ) );
	register_nav_menu( 'sub_product', __( 'Sub Product Menu', 'beacon' ) );
	register_nav_menu( 'motor_product', __( 'Motor Product', 'beacon' ) );
	register_nav_menu( 'property_product', __( 'Property Product', 'beacon' ) );
	register_nav_menu( 'engineering_product', __( 'Engineering Product', 'beacon' ) );
	register_nav_menu( 'bonding_product', __( 'Bonding Product', 'beacon' ) );
	register_nav_menu( 'benefits_product', __( 'Benefits Product', 'beacon' ) );
	register_nav_menu( 'marine_product', __( 'Marine Product', 'beacon' ) );
	register_nav_menu( 'casualty_product', __( 'Casualty Product', 'beacon' ) );
	register_nav_menu( 'miscellaneous_product', __( 'Miscellaneous Product', 'beacon' ) );
	register_nav_menu( 'groupHealth_product', __( 'Group Health Product', 'beacon' ) );
	register_nav_menu( 'groupHealth_be_better_plan_product', __( 'Group Health', 'beacon' ) );

	register_nav_menu( 'corporate_profile_menu', __( 'Corporate Profile Menu', 'beacon' ) );
	register_nav_menu( 'meet_beacon_menu', __( 'Meet Beacon Menu', 'beacon' ) );
	register_nav_menu( 'corp_social_menu', __( 'Corp Social Menu', 'beacon' ) );
	register_nav_menu( 'careers_menu', __( 'Careers Menu', 'beacon' ) );
	register_nav_menu( 'location_menu', __( 'Location Menu', 'beacon' ) );
	register_nav_menu( 'claims_menu', __( 'Claims Menu', 'beacon' ) );
	
	register_nav_menu( 'claims_product', __( 'Claims Product Menu', 'beacon' ) );
	
	register_nav_menu( 'faq_menu', __( 'FAQ Menu', 'beacon' ) );
	register_nav_menu( 'quotes', __( 'Quotes Menu', 'beacon' ) );


	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

	$theme_options = beacon_get_theme_options();
	if ( 'dark' == $theme_options['color_scheme'] )
		$default_background_color = '1d1d1d';
	else
		$default_background_color = 'f1f1f1';

	// Add support for custom backgrounds.
	add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		// This is dependent on our current color scheme.
		'default-color' => $default_background_color,
	) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

	// Add support for custom headers.
	$custom_header_support = array(
		// The default header text color.
		'default-text-color' => '000',
		// The height and width of our custom header.
		'width' => apply_filters( 'beacon_header_image_width', 1000 ),
		'height' => apply_filters( 'beacon_header_image_height', 288 ),
		// Support flexible heights.
		'flex-height' => true,
		// Random image rotation by default.
		'random-default' => true,
		// Callback for styling the header.
		'wp-head-callback' => 'beacon_header_style',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'beacon_admin_header_style',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => 'beacon_admin_header_image',
	);
	
	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR', $custom_header_support['default-text-color'] );
		define( 'HEADER_IMAGE', '' );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( $custom_header_support['wp-head-callback'], $custom_header_support['admin-head-callback'], $custom_header_support['admin-preview-callback'] );
		add_custom_background();
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be the size of the header image that we just defined
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// Add Beacon's custom image sizes.
	// Used for large feature (header) images.
	add_image_size( 'large-feature', $custom_header_support['width'], $custom_header_support['height'], true );
	// Used for featured posts if a large-feature doesn't exist.
	add_image_size( 'small-feature', 500, 300 );

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'wheel' => array(
			'url' => '%s/images/headers/wheel.jpg',
			'thumbnail_url' => '%s/images/headers/wheel-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Wheel', 'beacon' )
		),
		'shore' => array(
			'url' => '%s/images/headers/shore.jpg',
			'thumbnail_url' => '%s/images/headers/shore-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Shore', 'beacon' )
		),
		'trolley' => array(
			'url' => '%s/images/headers/trolley.jpg',
			'thumbnail_url' => '%s/images/headers/trolley-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Trolley', 'beacon' )
		),
		'pine-cone' => array(
			'url' => '%s/images/headers/pine-cone.jpg',
			'thumbnail_url' => '%s/images/headers/pine-cone-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Pine Cone', 'beacon' )
		),
		'chessboard' => array(
			'url' => '%s/images/headers/chessboard.jpg',
			'thumbnail_url' => '%s/images/headers/chessboard-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Chessboard', 'beacon' )
		),
		'lanterns' => array(
			'url' => '%s/images/headers/lanterns.jpg',
			'thumbnail_url' => '%s/images/headers/lanterns-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Lanterns', 'beacon' )
		),
		'willow' => array(
			'url' => '%s/images/headers/willow.jpg',
			'thumbnail_url' => '%s/images/headers/willow-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Willow', 'beacon' )
		),
		'hanoi' => array(
			'url' => '%s/images/headers/hanoi.jpg',
			'thumbnail_url' => '%s/images/headers/hanoi-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Hanoi Plant', 'beacon' )
		)
	) );
}
endif; // beacon_setup

if ( ! function_exists( 'beacon_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Beacon 1.0
 */
function beacon_header_style() {
	$text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( $text_color == HEADER_TEXTCOLOR )
		return;
		
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $text_color ) :
	?>
		#site-title,
		#site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo $text_color; ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // beacon_header_style

if ( ! function_exists( 'beacon_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_theme_support('custom-header') in beacon_setup().
 *
 * @since Beacon 1.0
 */
function beacon_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg h1,
	#desc {
		font-family: "Helvetica Neue", Arial, Helvetica, "Nimbus Sans L", sans-serif;
	}
	#headimg h1 {
		margin: 0;
	}
	#headimg h1 a {
		font-size: 32px;
		line-height: 36px;
		text-decoration: none;
	}
	#desc {
		font-size: 14px;
		line-height: 23px;
		padding: 0 0 3em;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 1000px;
		height: auto;
		width: 100%;
	}
	</style>
<?php
}
endif; // beacon_admin_header_style

if ( ! function_exists( 'beacon_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_theme_support('custom-header') in beacon_setup().
 *
 * @since Beacon 1.0
 */
function beacon_admin_header_image() { ?>
	<div id="headimg">
		<?php
		$color = get_header_textcolor();
		$image = get_header_image();
		if ( $color && $color != 'blank' )
			$style = ' style="color:#' . $color . '"';
		else
			$style = ' style="display:none"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image ); ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }
endif; // beacon_admin_header_image

/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function beacon_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'beacon_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function beacon_continue_reading_link() {
	return '</p><a href="'. esc_url( get_permalink() ) . '">'. '<img src="'.get_template_directory_uri() .'/images/read_more.png" /><div class="seprator"></div>' . '</a>'; 
}

function beacon_continue_reading_link_1() {
	return '</p><a href="'. esc_url( get_permalink() ) . '" class="search_descA">'. '<img src="'.get_template_directory_uri().'/images/view_details.png"/>' . '</a>'; 
}
add_filter( 'beacon_reading_link', 'beacon_continue_reading_link_1' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and beacon_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function beacon_auto_excerpt_more( $more ) {
	//return ' &hellip;' . beacon_continue_reading_link();
	
}
add_filter( 'excerpt_more', 'beacon_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function beacon_custom_excerpt_more( $output ) {
	
	global $post;
	
	$post_type  = get_post_type();
	
	if($post_type == 'event')
	{
		if ( has_excerpt() && ! is_attachment() ) 
		{
			$output .= beacon_continue_reading_link_1();
		}
		else
		{
			$output .= beacon_continue_reading_link_1();
		}	
	}
	else
	{
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= beacon_continue_reading_link();
		}
		else
		{
			$output .= beacon_continue_reading_link();
		}
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'beacon_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function beacon_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'beacon_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Beacon 1.0
 */
function beacon_widgets_init() {

	register_widget( 'Twenty_Eleven_Ephemera_Widget' );

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'beacon' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'beacon' ),
		'id' => 'sidebar-1222',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="h3-1 text-bordered-full">',
		'after_title' => ':</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'beacon' ),
		'id' => 'sidebar-111',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Left Sidebar Claim Quotations', 'beacon' ),
		'id' => 'sidebar-quotations',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/*register_sidebar( array(
		'name' => __( 'Showcase Sidebar', 'beacon' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Showcase Template', 'beacon' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/

	register_sidebar( array(
		'name' => __( 'Social Connect', 'beacon' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer', 'beacon' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	/*register_sidebar( array(
		'name' => __( 'Footer Area Two', 'beacon' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer', 'beacon' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'beacon' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer', 'beacon' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/
}
add_action( 'widgets_init', 'beacon_widgets_init' );

if ( ! function_exists( 'beacon_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function beacon_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'beacon' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'beacon' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'beacon' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // beacon_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @since Beacon 1.0
 * @return string|bool URL or false when no link is present.
 */
function beacon_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 */
function beacon_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

if ( ! function_exists( 'beacon_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own beacon_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Beacon 1.0
 */
function beacon_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'beacon' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'beacon' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 68;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s on %2$s <span class="says">said:</span>', 'beacon' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'beacon' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( 'Edit', 'beacon' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'beacon' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'beacon' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for beacon_comment()

if ( ! function_exists( 'beacon_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own beacon_posted_on to override in a child theme
 *
 * @since Beacon 1.0
 */
function beacon_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'beacon' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'beacon' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since Beacon 1.0
 */
function beacon_body_classes( $classes ) {

	if ( function_exists( 'is_multi_author' ) && ! is_multi_author() )
		$classes[] = 'single-author';

	if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' ) && ! is_page_template( 'sidebar-page.php' ) ) 
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'beacon_body_classes' ); 

function custom_excerpt_more() {
    global $post;
	$output = get_the_excerpt();
    return $output;
}
add_filter('custom_excerpt_more', 'custom_excerpt_more');



function get_countries() {
   
	global $wpdb;
	$table_countries     = $wpdb->prefix . 'countries';

	$result = $wpdb->get_results( "SELECT * FROM {$table_countries} ORDER BY countryID ASC" );
    return $result;
	
}
add_filter('get_countries', 'get_countries');


if(isset($_REQUEST['feedbackrequest_form']) && $_REQUEST['feedbackrequest_form']=='feedbackrequest_form_yes') {

include("postmark.php");
	
	$objpostmark = new Postmark("2d469872-76b2-489e-b516-21ab69833158","website@beacon.co.tt","info@beacon.co.tt");
	
$mail_to="website@beacon.co.tt";
$subject="Feedback &amp; Requests";

$question=$_REQUEST['question'];
$title=$_REQUEST['title'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$country=$_REQUEST['country'];
$occupation=$_REQUEST['occupation'];
$customer=$_REQUEST['customer'];
$comment=$_REQUEST['comment'];

$html='<table style="line-height: 30px; width: 100%;" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td height="45">How can we help?</td>
<td>'.$question.'</td>
  </tr>
<tr>
<td width="34%" height="32">Title</td>
<td width="66%">'.$title.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="43">First Name</td>
<td>'.$fname.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="44">Last Name</td>
<td>'.$lname.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="44">Email</td>
<td>'.$email.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="44">Phone</td>
<td>'.$phone.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="45">Where are you located?</td>
<td>'.$country.'</td>
</tr>
<tr>
<td style="padding-bottom: 15px;" height="40">Occupation</td>
<td>'.$occupation.'</td>
</tr>
<tr>
<td height="26">Are you a Beacon customer?</td>
<td>'.$customer.'</td>
</tr>
<tr>
<td colspan="2" height="40">Enter your question, request, or comment in detail below:</td>
</tr>
<tr>
<td colspan="2">'.$comment.'</td>
</tr>
</tbody>
</table>';	

$headers = "From: " . strip_tags($email) . "\r\n";
$headers .= "Reply-To: ". strip_tags($email) . "\r\n";
$headers .= "CC: \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
/*$result = @mail( $mail_to, $subject, $html, $headers );

			if( $result === true ) { //uploding online
				$msg = "<span style='color:#0000ff;'>Your Details have been sent successfully</span>";		
				}
			else { 
				$msg = "<span style='color:#ff0000;'>Error in sending mail</span>";	
			}*/

$result = $objpostmark->to($mail_to)
								->subject($subject)
								->html_message($html)
								->send();
			if( $result === true ) { //uploding online
echo '<script type="text/javascript">
	alert("Form sent successfully!");
</script>';				
				}
			else { 
echo '<script type="text/javascript">
	alert("Please try again there is any Error!");
</script>';					
			}			
		
	}


//add actions after private motor and homeowner quotation form submit
add_action("gform_after_submission_1", "private_motor_quote_form_submit", 10, 2);
add_action("gform_after_submission_5", "homeowner_quote_form_submit", 10, 2);


function private_motor_quote_form_submit($entry, $form){

	$params = array();
	$primaryDriver = array('age' => $entry['21'], 'claimsHistory' => $entry['5'], 'drivingExperience' => $entry['4'], 'name' => $entry['3']);
	$params['primaryDriver'] = $primaryDriver;
	$params['additionalDriver'] = array();
	for($i=0;$i<=3;$i++){
		$entryID = 26+$i*5;
		if(trim($entry[strval($entryID)])!=""){
			$key = array('age','name','drivingExperience','claimsHistory');
			$ind=0;
			for($j=$entryID-1;$j<$entryID+3;$j++){
				$additionalDriver[$key[$ind++]] = $entry[strval($j)];
			}
			$params['additionalDriver'][] = $additionalDriver;
		}
	}

	$params['vehicleSumInsured'] = $entry['8'];
	$params['windscreenCoverExcess'] = $entry['9'];
	$params['privateUse'] = $entry['10'];
	$params['sportCar'] = $entry['11'];
	$params['leftHandDrive'] = $entry['12'];
	$params['newVehicleOrRegistration'] = $entry['13'];
	$params['insuredHasDealerInvoice'] = $entry['14'];
	$params['vehicleOverOneYearOld'] = $entry['15'];
	$params['valuationPerformed'] = $entry['16'];
	$params['insuredHasFullTimeOccupation'] = $entry['17'];
	$params['insuredIsFirstTimeVehicleOwner'] = $entry['18'];
	if ($entry['20.1'] != '' || $entry['20.3'] != '')
		$params['antiTheftDevice'] = 'ANTIIMMO';
	else if ($entry['20.2'] != '' || $entry['20.4'] != '')
		$params['antiTheftDevice'] = 'ANTISRCH';
	else
		$params['antiTheftDevice'] = 'NONE';
	$params['multiVehicleDiscount'] = 'NONE';
	$params['referralReferenceNumber'] = $entry['id'];

	$params['result'] = get_private_motor_quotation($params);

	session_start();
	$_SESSION['pm_quot_param']=$params;
}

function get_private_motor_quotation($params){	
	$client = new SoapClient(home_url()."/MarketingService_1.wsdl",array('trace'=>1,'exceptions'=>0));
	$result = $client->__soapCall('getAutoQuote',array('getAutoQuote'=>$params));
	return $result->getAutoQuoteReturn->netAnnualPremiumIncludingTax;
}

function homeowner_quote_form_submit($entry, $form){

	$params = array();
	for($i=7;$i<17;$i++){
		$params['building_history'][] = $entry[(string)$i];
	}
	$params['sum_insured'][] = $entry['3'];
	$params['sum_insured'][] = $entry['4'];
	$params['sum_insured'][] = $entry['5'];
	$params['referralReferenceNumber'] = $entry['id'];

	session_start();
	$_SESSION['ho_quot_param']=$params;	
}

add_action( 'after_setup_theme', function () {
  add_image_size( 'header-nav-posts-thumb', 132, 120 );
  add_image_size( 'blog-post-thumbnails', 400, 400, true );

  register_sidebar([
		'name'          => 'Blog Sidebar'
  ]);
});
