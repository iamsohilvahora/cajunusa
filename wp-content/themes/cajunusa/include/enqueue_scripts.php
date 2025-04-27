<?php
/**
 * Enqueue scripts and styles.
 */
function cajunusa_scripts() {
	wp_enqueue_style( 'cajunusa-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cajunusa-style', 'rtl', 'replace' );

	wp_enqueue_style( 'cajunusa-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );

	wp_enqueue_style( 'cajunusa-resposnsive', get_template_directory_uri() . '/css/resposnsive.css' );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'cajunusa-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'cajunusa-owl-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'cajunusa-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cajunusa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cajunusa_content_width', 640 );
}

?>