<?php
/**
 * Optimización y limpieza del Header de WordPress
 */

// Eliminar Emojis de WordPress (JS y CSS innecesarios)
function lidium_disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
}
add_action( 'init', 'lidium_disable_emojis' );

// Limpieza general del head
function lidium_cleanup_head() {
    // Eliminar versión de WordPress (Seguridad)
    remove_action('wp_head', 'wp_generator');
    
    // Eliminar enlace a wlwmanifest (Windows Live Writer - Obsoleto)
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Eliminar enlace RSD (Editores externos)
    remove_action('wp_head', 'rsd_link');
    
    // Eliminar enlaces cortos (wp.me)
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('after_setup_theme', 'lidium_cleanup_head');

// Eliminar versión de estilos y scripts para dificultar enumeración de versiones
function lidium_remove_wp_version_strings( $src ) {
    global $wp_version;
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;
}
add_filter( 'script_loader_src', 'lidium_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'lidium_remove_wp_version_strings' );