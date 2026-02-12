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
   
  
        //Cargar el CSS compilado de Tailwind (Producción)
    $css_file_path = get_template_directory() . '/dist/output.css';
    $css_file_uri = get_template_directory_uri() . '/dist/output.css';
    
    if (file_exists($css_file_path)) {
        // Cargamos el CSS compilado. Nota que 'lidium-style' ya no es necesario si todo está aquí.
        wp_enqueue_style('lidium-tailwind', $css_file_uri, array(), filemtime($css_file_path));
    } else {
        // Fallback por si no has compilado: Cargar style.css normal
        wp_enqueue_style('lidium-style', get_stylesheet_uri(), array(), '1.0.0');
    }
    
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

/**
 * OPTIMIZACIÓN AGRESIVA PARA PÁGINAS LIGERAS (Bio & Landing)
 * Elimina scripts que bloquean el renderizado en páginas de alta conversión.
 */
function lidium_cleanup_lightweight_pages() {
    // Ejecutar si es Link in Bio O la Landing Page
    if ( is_page_template('template-linkinbio.php') || is_page_template('template-landing.php') ) {
        
        // 1. ELIMINAR EL CULPABLE (SureTriggers)
        wp_dequeue_script('st-trigger-button'); 
        wp_deregister_script('st-trigger-button');
        wp_dequeue_style('st-trigger-button');
        wp_deregister_style('st-trigger-button');

        // 2. Eliminar estilos de Bloques de Gutenberg (No necesarios aquí)
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('global-styles'); 
        
        // 3. Eliminar Contact Form 7 Scripts (si usas WPForms aquí, CF7 sobra)
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wp_dequeue_script('contact-form-7');
            wp_dequeue_style('contact-form-7');
        }
        
        // 4. Eliminar Emojis
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
}
// Prioridad 100 para asegurar que corre después de los plugins
add_action('wp_enqueue_scripts', 'lidium_cleanup_lightweight_pages', 100);

/**
 * Añadir atributo 'defer' a scripts no críticos para mejorar carga.
 */
function lidium_defer_scripts( $tag, $handle, $src ) {
    // Lista de scripts a diferir (custom.js y otros que no sean jQuery core si lo usas)
    $defer_scripts = array( 'lidium-custom-js' );

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . esc_url( $src ) . '" defer="defer"></script>';
    }
    
    return $tag;
}
add_filter( 'script_loader_tag', 'lidium_defer_scripts', 10, 3 );
