<?php
/*
Template Name: Landing Page Template
*/
?>
<!DOCTYPE html>
<html lang="es" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    
    <!-- 1. PRELOADS CRÍTICOS (CSS y Fuentes) -->
    <?php 
    $css_path = get_template_directory() . '/dist/output.css';
    $css_ver = file_exists($css_path) ? filemtime($css_path) : '1.0';
    ?>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/dist/output.css?ver=<?php echo $css_ver; ?>" as="style">
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/inter-v20-latin-800.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/inter-v20-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/fonts/inter-v20-latin-regular.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Estilos críticos para evitar FOUC y WPForms -->
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f7fa; color: #1f1f1f; }
        .logo-svg .cls-1 { fill: #c0c1c1; }
        .logo-svg .cls-2 { fill: #7b378b; }
        
        /* WPForms styles */
        div.wpforms-container-full .wpforms-form .wpforms-field-label { display: none !important; }
        div.wpforms-container-full .wpforms-form .wpforms-field input[type=text],
        div.wpforms-container-full .wpforms-form .wpforms-field input[type=email] {
            border-radius: 0.5rem !important; border: 1px solid #d1d5db !important; background-color: #ffffff !important; padding: 0.75rem 1rem !important;
        }
        div.wpforms-container-full .wpforms-form .wpforms-field input:focus { border-color: #7732a8 !important; box-shadow: 0 0 0 3px rgba(119, 50, 168, 0.2) !important; outline: none !important; }
        div.wpforms-container-full .wpforms-form .wpforms-submit {
            width: 100% !important; background-color: #7732a8 !important; color: white !important; font-weight: 600 !important;
            padding: 0.75rem 1.5rem !important; border-radius: 0.5rem !important; border: none !important;
        }
        div.wpforms-container-full .wpforms-form .wpforms-submit:hover { background-color: #481262 !important; }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>

    <header class="py-8">
        <div class="container mx-auto text-center">
            <div class="inline-block">
                 <svg id="Capa_2" data-name="Capa 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1101.92 312.23" class="h-8 w-auto mx-auto logo-svg">
                  <defs><style>.cls-1{fill:#c0c1c1;}.cls-2{fill:#7b378b;}</style></defs>
                  <g id="IMAGOTIPO"><g id="IMAGOTIPO2"><g id="LOGO"><path class="cls-2" d="M1093.72,137.01c-5.47-10.23-13.03-17.83-22.7-22.8-9.66-4.97-20.75-7.45-33.24-7.45-15.23,0-28.61,3.65-40.12,10.96-6.53,4.14-12.05,9.06-16.58,14.74-3.7-5.98-8.42-10.89-14.17-14.74-10.94-7.31-23.63-10.96-38.07-10.96-12.69,0-24.12,2.78-34.27,8.33-5.77,3.16-10.74,7.16-14.94,11.99h0c0-11.22-9.1-20.32-20.32-20.32h-19.64c-2.03,0-3.68,1.65-3.68,3.68v152.23c0,2.03,1.65,3.68,3.68,3.68h38.33c2.03,0,3.68-1.65,3.68-3.68v-75.24c0-9.55,1.47-17.29,4.39-23.24,2.93-5.94,7.03-10.42,12.3-13.45,5.27-3.02,11.23-4.53,17.87-4.53,9.76,0,17.23,3.02,22.4,9.06,5.17,6.04,7.76,15.4,7.76,28.06v79.33c0,2.03,1.65,3.68,3.68,3.68h38.33c2.03,0,3.68-1.65,3.68-3.68v-75.24c0-9.55,1.41-17.29,4.25-23.24,2.83-5.94,6.88-10.42,12.15-13.45,5.27-3.02,11.32-4.53,18.16-4.53,9.37,0,16.64,3.02,21.82,9.06,5.17,6.04,7.76,15.4,7.76,28.06v79.33c0,2.03,1.65,3.68,3.68,3.68h38.33c2.03,0,3.68-1.65,3.68-3.68v-86.35c0-15.98-2.74-29.08-8.2-39.31Z"/><path class="cls-2" d="M732.16,266.35c-44.57-.43-80.16-32.62-80.16-77.19v-78.4c0-2.21,1.79-4,4-4h38c2.21,0,4,1.79,4,4v78.78c0,19.09,15.03,35.15,34.12,35.61,19.66.46,35.8-15.39,35.8-34.95v-79.43c0-2.21,1.79-4,4-4h38c2.21,0,4,1.79,4,4v79.43c0,44.91-36.75,76.59-81.76,76.16Z"/><path class="cls-2" d="M606.6,87.6c-6.99,0-12.62-1.98-16.91-5.94-4.29-3.96-6.43-8.87-6.43-14.73s2.14-10.77,6.43-14.73c4.29-3.96,9.92-5.94,16.91-5.94s12.42,1.86,16.79,5.58c4.36,3.72,6.55,8.52,6.55,14.38,0,6.18-2.14,11.29-6.43,15.33-4.29,4.04-9.92,6.06-16.91,6.06ZM583.42,262.35V110.76c0-2.21,1.79-4,4-4h38.37c2.21,0,4,1.79,4,4v151.59c0,2.21-1.79,4-4,4h-38.37c-2.21,0-4-1.79-4-4Z"/><path class="cls-2" d="M557.39,46.25h-38.37c-2.21,0-4,1.79-4,4v74.99c-3.68-3.91-7.84-7.19-12.48-9.84-10.11-5.76-21.9-8.64-35.37-8.64-15.06,0-28.64,3.31-40.72,9.94-12.09,6.63-21.6,15.89-28.53,27.8-6.94,11.91-10.4,25.93-10.4,42.06s3.46,30.15,10.4,42.06c6.93,11.91,16.44,21.17,28.53,27.8,12.08,6.63,25.66,9.94,40.72,9.94,14.07,0,26.11-2.83,36.11-8.5,5.25-2.97,9.85-6.81,13.82-11.5h0c0,11.05,8.95,20,20,20h20.29c2.21,0,4-1.79,4-4V50.25c0-2.21-1.79-4-4-4ZM510.41,210.29c-3.67,6.73-8.57,11.82-14.71,15.28-6.14,3.46-13.08,5.19-20.81,5.19s-14.37-1.73-20.51-5.19c-6.14-3.46-11.05-8.55-14.71-15.28-3.67-6.72-5.5-14.63-5.5-23.73s1.83-17.2,5.5-23.73c3.66-6.53,8.57-11.52,14.71-14.98,6.14,3.46,12.98-5.19,20.51-5.19s14.66,1.73,20.81,5.19c6.14,3.46,11.04,8.45,14.71,14.98,3.66,6.53,5.5,14.44,5.5,23.73s-1.83,17.01-5.5,23.73Z"/><path class="cls-2" d="M342.29,87.28c-6.93,0-12.52-1.96-16.77-5.9-4.25-3.93-6.38-8.8-6.38-14.62s2.13-10.69,6.38-14.62c4.25-3.93,9.84-5.9,16.77-5.9s12.32,1.85,16.66,5.54c4.33,3.7,6.5,8.45,6.5,14.27,0,6.13-2.13,11.2-6.38,15.21-4.25,4.01-9.85,6.01-16.77,6.01ZM319.11,262.35V110.76c0-2.21,1.79-4,4-4h38.37c2.21,0,4,1.79,4,4v151.59c0,2.21-1.79,4-4,4h-38.37c-2.21,0-4-1.79-4-4Z"/><path class="cls-2" d="M250.71,262.35V50.25c0-2.21,1.79-4,4-4h38.37c2.21,0,4,1.79,4,4v212.1c0,2.21-1.79,4-4,4h-38.37c-2.21,0-4-1.79-4-4Z"/></g><g id="ISO_copia_4" data-name="ISO copia 4"><path id="ESTRELLA" class="cls-2" d="M154.42,136.13l-12.1,1.22c-20.23,2.05-39.91-7.34-51.05-24.35l-6.66-10.17c-1.03-1.58-3.49-.71-3.3,1.17l1.22,12.1c2.05,20.23-7.34,39.91-24.35,51.05l-10.17,6.66c-1.58,1.03-.71,3.49,1.17,3.3l12.1-1.23c20.23-2.05,39.91,7.34,51.05,24.35l6.66,10.17c1.03,1.58,3.49.71,3.3-1.17l-1.23-12.1c-2.05-20.23,7.34-39.91,24.35-51.05l10.17-6.66c1.58-1.03.71-3.49-1.17-3.3Z"/><path class="cls-1" d="M138.24,205.6h61.29c2.69,0,4.87-2.18,4.87-4.87V4.88c0-2.7-2.19-4.88-4.88-4.88H69.93C31.31,0,0,31.3,0,69.92v12.7c0,2.7,2.19,4.88,4.88,4.88h60.89c2.7,0,4.88-2.19,4.88-4.88v-12c0-5.52,4.47-9.99,9.99-9.99h52.71v66.71c1.15.09,2.3.15,3.46.15,1.49,0,2.99-.08,4.48-.23l12.1-1.22c.41-.04,.82-.06,1.23-.06,5.31,0,9.9,3.43,11.43,8.54,1.52,5.1-.45,10.49-4.91,13.4l-10.17,6.66c-8.4,5.5-14.47,13.5-17.61,22.61v23.53c0,2.69,2.18,4.87,4.87,4.87Z"/><path class="cls-1" d="M62.31,185.98l-12.1,1.23c-.41.04-.82.06-1.23.06-5.31,0-9.9-3.43-11.43-8.54-1.52-5.1,.45-10.49-4.91-13.4l10.17-6.66c9.17-6.01,15.57-14.99,18.4-25.15v-22.01c0-2.69-2.18-4.87-4.87-4.87H4.87c-2.69,0-4.87,2.18-4.87,4.87v195.84c0,2.7,2.19,4.88,4.88,4.88h129.59c38.61,0,69.92-31.3,69.92-69.92v-12.7c0-2.7-2.19-4.88-4.88-4.88h-60.89c-2.7,0-4.88,2.19-4.88,4.88v12c0-5.52-4.47-9.99-9.99-9.99h-52.71v-65.62c-1.41-.13-2.82-.22-4.25-.22s-2.99.08-4.48.23Z"/></g></g></g>
                </svg>
            </div>
        </div>
    </header>

    <main class="py-12">
        <div class="container mx-auto px-4">
            <div class="rounded-2xl shadow-2xl max-w-5xl mx-auto overflow-hidden grid md:grid-cols-2 items-center">
                
                <!-- Left Side: Content -->
                <div class="bg-gray-50 p-8 sm:p-12 h-full flex flex-col justify-center">
                    <!-- OPTIMIZACIÓN LCP: 
                         Estilos inline para evitar esperar al CSS externo. 
                         'content-visibility: auto' mejora el renderizado.
                    -->
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-[#1f1f1f] leading-tight"
                        style="color: #1f1f1f; font-family: 'Inter', sans-serif; font-weight: 800; visibility: visible;">
                        <?php echo get_field('landing_title'); ?>
                    </h1>
                    <p class="mt-4 text-lg text-gray-600"><?php the_field('landing_subtitle'); ?></p>
                    
                    <ul class="mt-8 space-y-6">
                        <?php 
                        for ($i = 1; $i <= 3; $i++):
                            $benefit = get_field('benefit_' . $i);
                            if( $benefit && !empty($benefit['title']) ): 
                        ?>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 bg-purple-100 rounded-lg p-2 text-[#7732a8]">
                                <!-- Asegurar que el SVG no se rompa -->
                                <div style="width: 24px; height: 24px;">
                                    <?php echo $benefit['icon']; ?>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-[#1f1f1f]"><?php echo esc_html($benefit['title']); ?></h4>
                                <p class="text-gray-600"><?php echo esc_html($benefit['description']); ?></p>
                            </div>
                        </li>
                        <?php 
                            endif;
                        endfor; 
                        ?>
                    </ul>
                </div>

                <!-- Right Side: Form & Image -->
                <div id="form-wrapper" class="bg-white p-8 sm:p-12 h-full flex flex-col justify-center">
                    <div id="form-container">
                        <?php $landing_image = get_field('landing_image'); if($landing_image): ?>
                            <!-- Prioridad Alta para la imagen (LCP en móvil) -->
                            <img src="<?php echo esc_url($landing_image['url']); ?>" 
                                 alt="<?php echo esc_attr($landing_image['alt']); ?>" 
                                 class="w-full h-auto rounded-lg shadow-md mb-8"
                                 fetchpriority="high"
                                 loading="eager">
                        <?php endif; ?>
                       
                        <h3 class="text-2xl font-bold text-[#1f1f1f] text-center mt-8"><?php the_field('landing_form_title'); ?></h3>
                        <p class="text-gray-600 text-center mt-2"><?php the_field('landing_form_subtitle'); ?></p>
                        
                        <div class="mt-6">
                             <?php
                            if ( have_posts() ) : while ( have_posts() ) : the_post();
                                echo do_shortcode( get_the_content() );
                            endwhile; endif;
                            ?>
                             <p class="text-xs text-gray-500 text-center mt-4">
                               <svg class="inline-block h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" /></svg>
                               Tu información está 100% segura.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="text-center py-8 text-sm text-gray-500">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
    </footer>
    
    <?php wp_footer(); ?>
</body>
</html>
