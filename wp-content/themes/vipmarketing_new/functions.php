<?php
/**
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

function vipmarketing_setup() {

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'vipmarketingmenu', __( 'Vip Marketing Menu', 'twentytwelve' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop

}
add_action( 'after_setup_theme', 'vipmarketing_setup' );

function vipmarketing_scripts_styles() {
	global $wp_styles;

	wp_enqueue_style( 'vipmarketing-style', get_stylesheet_uri() );
	wp_enqueue_style( 'vipmarketing-style1', 'http://fonts.googleapis.com/css?family=Sansita+One' );
	wp_enqueue_style( 'vipmarketing-style2', 'http://fonts.googleapis.com/css?family=Dawning+of+a+New+Day');

	wp_enqueue_style( 'vipmarketing-skslidercss', get_template_directory_uri().'/css/skdslider.css' );
	wp_enqueue_style( 'vipmarketing-jscarouselcss', get_template_directory_uri().'/css/jsCarousel-2.0.0.css' );
	wp_enqueue_style( 'vipmarketing-fancyboxcss', get_template_directory_uri().'/css/jquery.fancybox.css' );

	wp_enqueue_script( 'vipmarketing-jquery', get_template_directory_uri() . '/js/jquery.js');
	wp_enqueue_script( 'vipmarketing-sksliderjs', get_template_directory_uri() . '/js/skdslider.js');
	wp_enqueue_script( 'vipmarketing-jscarouseljs', get_template_directory_uri() . '/js/jsCarousel-2.0.0.js');
	wp_enqueue_script( 'vipmarketing-fancyboxjs', get_template_directory_uri() . '/js/jquery.fancybox.js');
	wp_enqueue_script( 'vipmarketing-custom', get_template_directory_uri() . '/js/custom.js');
}
add_action( 'wp_enqueue_scripts', 'vipmarketing_scripts_styles' );

/***********************************************************************************************************
										Fetch Title from Page
************************************************************************************************************/
function vipmarketing_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'vipmarketing_wp_title', 10, 2 );
//--------------------------------------------------------//
add_action( 'admin_menu', 'header_footer_plugin_menu' );
function header_footer_plugin_menu() {
add_menu_page( 'Theme Options', 'Theme Options', 'manage_options', 'header-footer', 'header_footer_setting' );
//add_menu_page( NutritionFacts, NutritionFacts, 'manage_options', 'nutrition-facts', 'nutrition_facts_setting' );
}

function header_footer_setting(){
	include_once("header_footer_setting.php");
}

function pagination($wp_query,$display=true,$ajax=false,$p_cur=1) {
	global $wp_rewrite;
	if($ajax)
		$current=$p_cur;
	else
		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	
	$pagination = array(
					'base' => @add_query_arg('page2','%#%'),
					'format' => '',
					'total' => $wp_query->max_num_pages,
					'current' => $current,
					'prev_text' => __('«'),
					'next_text' => __('»'),
					'type' => 'list'
				);
	//if( $wp_rewrite->using_permalinks() )
	//$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array( 's' => get_query_var( 's' ) );
	
	if(!$display)
		return paginate_links($pagination );
	else
		echo paginate_links( $pagination );
}
/*function nutrition_facts_setting(){
include_once("nutrition_facts_setting.php");
}*/
