<?php
/**
 * Registro de Custom Post Types (CPT)
 */

function lidium_create_custom_post_types() {
    // --- Testimonios ---
    $labels_testimonial = array( 
        'name' => _x( 'Testimonios', 'Post Type General Name', 'lidium-theme' ), 
        'singular_name' => _x( 'Testimonio', 'Post Type Singular Name', 'lidium-theme' ), 
        'menu_name' => __( 'Testimonios', 'lidium-theme' ), 
        'all_items' => __( 'Todos los Testimonios', 'lidium-theme' ),
        'add_new_item' => __( 'Añadir Nuevo Testimonio', 'lidium-theme' ),
    );
    $args_testimonial = array(
        'label' => __( 'Testimonio', 'lidium-theme' ), 
        'description' => __( 'Testimonios de clientes', 'lidium-theme' ), 
        'labels' => $labels_testimonial, 
        'supports' => array( 'title', 'thumbnail' ), // Eliminado 'editor' si solo usas ACF
        'hierarchical' => false, 
        'public' => true, 
        'show_ui' => true, 
        'show_in_menu' => true, 
        'menu_position' => 5, 
        'menu_icon' => 'dashicons-format-quote', 
        'show_in_nav_menus' => false, // No suele necesitarse en menús
        'can_export' => true, 
        'has_archive' => false, 
        'exclude_from_search' => true, 
        'publicly_queryable' => false, // No necesita página individual (single-testimonial)
        'capability_type' => 'post',
    );
    register_post_type( 'testimonial', $args_testimonial );

    // --- Proyectos ---
    $labels_project = array(
        'name' => _x( 'Proyectos', 'Post Type General Name', 'lidium-theme' ), 
        'singular_name' => _x( 'Proyecto', 'Post Type Singular Name', 'lidium-theme' ), 
        'menu_name' => __( 'Proyectos', 'lidium-theme' ), 
        'all_items' => __( 'Todos los Proyectos', 'lidium-theme' ),
        'add_new_item' => __( 'Añadir Nuevo Proyecto', 'lidium-theme' ),
    );
    $args_project = array(
        'label' => __( 'Proyecto', 'lidium-theme' ), 
        'description' => __( 'Proyectos del portafolio', 'lidium-theme' ), 
        'labels' => $labels_project, 
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ), 
        'hierarchical' => false, 
        'public' => true, 
        'show_ui' => true, 
        'show_in_menu' => true, 
        'menu_position' => 6, 
        'menu_icon' => 'dashicons-portfolio', 
        'show_in_nav_menus' => true, 
        'can_export' => true, 
        'has_archive' => true, 
        'exclude_from_search' => false, 
        'publicly_queryable' => true, 
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'proyectos'), // URL amigable: midominio.com/proyectos/mi-proyecto
    );
    register_post_type( 'project', $args_project );
}
add_action( 'init', 'lidium_create_custom_post_types', 0 );