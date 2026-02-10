<?php
/**
 * LIDIUM Theme Functions
 * * Estructura modularizada para facilitar el mantenimiento.
 */

// Definir constantes para rutas (Mejora práctica)
define( 'LIDIUM_VERSION', '1.0.1' );
define( 'LIDIUM_DIR', get_template_directory() );
define( 'LIDIUM_URI', get_template_directory_uri() );

// 1. Cargar configuración de seguridad y limpieza (NUEVO)
require_once LIDIUM_DIR . '/inc/cleanup.php';

// 2. Cargar configuración de Scripts y Estilos
function lidium_theme_scripts() {
    // Tailwind CSS Play CDN (NOTA: Para producción real, se recomienda compilar el CSS)
    wp_enqueue_script('tailwindcss', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap', array(), null);
    
    // Estilos principales
    wp_enqueue_style('lidium-style', get_stylesheet_uri(), array(), LIDIUM_VERSION);
    
    // Script personalizado (En el footer para mejorar carga)
    wp_enqueue_script('lidium-custom-js', LIDIUM_URI . '/js/custom.js', array(), LIDIUM_VERSION, true);
}
add_action('wp_enqueue_scripts', 'lidium_theme_scripts');

// 3. Configuración del Tema (Soporte y Menús)
function lidium_setup() {
    // Habilitar imágenes destacadas
    add_theme_support( 'post-thumbnails' ); 
    
    // Título dinámico (Mejora SEO)
    add_theme_support( 'title-tag' );

    // Registrar menús
    register_nav_menus( array(
        'primary_menu' => __( 'Primary Menu', 'lidium-theme' ),
        'mobile_menu'  => __( 'Mobile Menu', 'lidium-theme' ),
        'footer_menu'  => __( 'Footer Menu', 'lidium-theme' ),
    ));
}
add_action( 'after_setup_theme', 'lidium_setup' );

// 4. Clases Walker para Menús (Mantengo tu código original, está bien)
class Walker_Nav_Primary extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { 
        $output .= '<li><a class="nav-link" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>'; 
    }
}
class Walker_Nav_Mobile extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) { 
        $output .= '<li><a class="block py-2 text-gray-700 hover:text-[#7732a8]" href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>'; 
    }
}

// 5. Cargar Custom Post Types (CPT)
require_once LIDIUM_DIR . '/inc/cpt.php';

// 6. Cargar Campos de ACF (Extraído para reducir tamaño)
require_once LIDIUM_DIR . '/inc/acf-fields.php';

// 7. Modificar Query Principal (Blog)
function lidium_exclude_featured_post_from_blog( $query ) {
    if ( !is_admin() && $query->is_home() && $query->is_main_query() ) {
        $latest_posts = get_posts( 'posts_per_page=1&fields=ids' );
        if(!empty($latest_posts)){
            $query->set( 'post__not_in', $latest_posts );
        }
    }
}
add_action( 'pre_get_posts', 'lidium_exclude_featured_post_from_blog' );

// 8. Opciones Globales (Theme Options)
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Ajustes del Tema',
        'menu_title'    => 'Ajustes del Tema',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}