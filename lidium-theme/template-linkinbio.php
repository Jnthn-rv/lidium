<?php
/*
Template Name: Link in Bio Template
*/
?>
<!DOCTYPE html>
<html lang="es" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f7fa; color: #1f1f1f; }
        
        .link-button {
            display: grid; /* Usamos Grid para un control perfecto */
            grid-template-columns: 3.5rem 1fr 3.5rem; /* Columna Icono | Columna Texto | Columna Equilibrio */
            align-items: center;
            width: 100%;
            min-height: 4.5rem;
            padding: 0.75rem 0.5rem;
            border: 2px solid #481262;
            color: #481262;
            background-color: transparent;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .link-button:hover {
            background-color: #481262;
            color: #ffffff;
            transform: scale(1.02);
        }

        .link-button .link-icon {
            grid-column: 1; /* El icono siempre va en la primera columna */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem; /* 40px */
            height: 2.5rem; /* 40px */
            color: #481262;
        }

        .link-button:hover .link-icon {
            color: #ffffff;
        }

        .link-button .link-title {
            grid-column: 2; /* El texto siempre va en la columna central */
            text-align: center;
            white-space: normal; /* Permite que el texto baje de línea en móviles */
            line-height: 1.2;
            word-wrap: break-word;
        }

        /* Estilo para ajustar el SVG */
        .link-button .link-icon svg {
            width: 100% !important; 
            height: 100% !important;
            max-width: 2.5rem !important;
            max-height: 2.5rem !important;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class('antialiased'); ?>>

    <main class="py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            
            <div class="bg-white p-8 sm:p-10 rounded-2xl shadow-lg">
                <!-- Profile Section -->
                <div class="text-center">
                    <?php $image = get_field('linkbio_pic'); if($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="h-24 w-auto max-w-[150px] mx-auto object-contain">
                    <?php else: ?>
                        <img src="https://placehold.co/150x96/e0e0e0/481262?text=LIDIUM" class="h-24 w-auto mx-auto object-contain">
                    <?php endif; ?>
                    
                    <h1 class="text-2xl font-bold text-gray-900 mt-4"><?php the_field('linkbio_title'); ?></h1>
                    <p class="text-gray-600 mt-1"><?php the_field('linkbio_desc'); ?></p>
                </div>

                <!-- Links Section -->
                <div class="space-y-4 mt-8">
                    <?php 
                    for ($i = 1; $i <= 8; $i++):
                        $link = get_field('link_' . $i);
                        if( $link && !empty($link['url']) && !empty($link['title']) ): 
                    ?>
                        <a href="<?php echo esc_url($link['url']); ?>" class="link-button" target="_blank" rel="noopener noreferrer">
                            <?php if( !empty($link['icon_svg']) ): ?>
                                <span class="link-icon"><?php echo $link['icon_svg']; ?></span>
                            <?php else: ?>
                                <!-- Espaciador vacío si no hay icono para mantener el texto centrado -->
                                <span></span>
                            <?php endif; ?>
                            
                            <span class="link-title"><?php echo esc_html($link['title']); ?></span>
                        </a>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
                
               <!-- SECCIÓN: Lead Magnets Destacados (Múltiples) -->
                <div class="mt-8 mb-8 space-y-6">
                    <?php 
                    for ($i = 1; $i <= 3; $i++):
                        $lm = get_field('lead_magnet_' . $i);
                        if( $lm && $lm['show'] ):
                    ?>
                    <a href="<?php echo esc_url($lm['btn_url']); ?>" class="block group">
                        <div class="flex flex-col md:flex-row items-center bg-purple-50 rounded-xl p-4 border-2 border-[#7732a8] hover:shadow-md transition-all duration-300 transform hover:scale-[1.02]">
                            <?php if($lm['image']): ?>
                            <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                                <img src="<?php echo esc_url($lm['image']['url']); ?>" alt="<?php echo esc_attr($lm['image']['alt']); ?>" class="w-24 h-auto rounded-lg shadow-sm">
                            </div>
                            <?php endif; ?>
                            <div class="text-center md:text-left flex-grow">
                                <span class="inline-block bg-[#7732a8] text-white text-xs font-bold px-2 py-0.5 rounded-full mb-2">GRATIS</span>
                                <h3 class="text-lg font-bold text-[#481262] leading-tight group-hover:underline"><?php echo esc_html($lm['title']); ?></h3>
                                <p class="text-sm text-gray-600 mt-1"><?php echo esc_html($lm['desc']); ?></p>
                                <span class="mt-3 inline-block text-sm font-semibold text-[#7732a8] group-hover:text-[#481262]">
                                    <?php echo esc_html($lm['btn_text']); ?> →
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>

                <!-- Social Icons Section -->
                <?php $ajustes_globales_id = get_page_by_title('Ajustes Globales') ? get_page_by_title('Ajustes Globales')->ID : 0; ?>
                <div class="mt-12 flex justify-center space-x-6">
                    <?php 
                    for ($i = 1; $i <= 5; $i++):
                        $social = get_field('social_' . $i, $ajustes_globales_id);
                        if( $social && !empty($social['url']) && !empty($social['icon_svg']) ): 
                    ?>
                    <a href="<?php echo esc_url($social['url']); ?>" class="text-gray-400 hover:text-[#481262] transition-colors" target="_blank" rel="noopener noreferrer">
                        <div style="width: 24px; height: 24px;">
                            <?php echo $social['icon_svg']; ?>
                        </div>
                    </a>
                    <?php 
                        endif;
                    endfor; 
                    ?>
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