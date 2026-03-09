<?php

function gamestore_styles() {
	wp_enqueue_style('gamestore-general', get_template_directory_uri(). '/assets/css/gamestore.css', [], wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script('gamestore-theme-related', get_template_directory_uri(). '/assets/js/gamestore-theme-related.js', [], wp_get_theme()->get('Version'), true);
	wp_localize_script('gamestore-theme-related','gamestore_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
      ));

	// Swiper Slider
	wp_enqueue_style('swiper-bundle', get_template_directory_uri(). '/assets/css/swiper-bundle.min.css', [], wp_get_theme()->get( 'Version' ) );
	wp_enqueue_script('swiper-bundle', get_template_directory_uri(). '/assets/js/swiper-bundle.min.js', [], wp_get_theme()->get('Version'), true);

}
add_action( 'wp_enqueue_scripts', 'gamestore_styles' );

function gamestore_google_font(){
    $font_url = '';
    $font = 'Urbanist';
    $font_extra = 'ital,wght@0,400;0,700;1,400;1,700';

    if('off' !== _x('on','Google font: on or off','gamestore')){
        $query_args = array(
            'family' => urldecode($font.':'.$font_extra),
            'subset' => urldecode('latin,latin-ext'),
            'display' => urldecode('swap'),
        );
        $font_url = add_query_arg($query_args, '//fonts.googleapis.com/css2');
    }

    return $font_url;
}

function gamestore_google_font_script(){
    wp_enqueue_style('gamestore-google-font', gamestore_google_font(), [], '1.0.0' );
}
add_action('wp_enqueue_scripts', 'gamestore_google_font_script');

// Load assets in Gutenberg
function gamestore_gutenberg_styles(){
    wp_enqueue_style('gamestore-google-font', gamestore_google_font(), [], '1.0.0' );

    add_editor_style('assets/css/editor-style.css');
}

add_action('enqueue_block_editor_assets', 'gamestore_gutenberg_styles');
