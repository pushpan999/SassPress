<?php
/**
 * Enqueue scripts and styles.
 */


function jquery_cdn()   
{  
    if (!is_admin())   
    {  
        wp_deregister_script('jquery');  
  
        // Load a copy of jQuery from the Google API CDN  
        // The last parameter set to TRUE states that it should be loaded  
        // in the footer.  
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', FALSE, '1.11.3', TRUE);  
  
        wp_enqueue_script('jquery');  
    }  
}  
add_action('init', 'jquery_cdn');  


/**
 * Enqueue scripts and styles.
 */
function ltb_scripts() {
	wp_enqueue_style( 'ltb-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ltb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'ltb-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ltb_scripts' );

//Enqueue Google Fonts
function google_fonts() {
	$query_args = array(
		'family' => 'Raleway:400,500,700|Work+Sans:400,600',
		'subset' => 'latin',
	);
	wp_enqueue_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'google_fonts');