<?php get_header(); ?>

    <!-- Hero Section -->
    <section class="hero-gradient pt-32 pb-20 md:pt-48 md:pb-32 text-center">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-6xl font-extrabold text-[#481262] leading-tight">
                <?php the_field('hero_title'); ?>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg text-gray-700">
                <?php the_field('hero_subtitle'); ?>
            </p>
            <?php if( get_field('hero_primary_button_text') && get_field('hero_primary_button_url') ): ?>
            <div class="mt-10 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="<?php the_field('hero_primary_button_url'); ?>" class="bg-[#7732a8] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#481262] transition-all shadow-lg">
                    <?php the_field('hero_primary_button_text'); ?>
                </a>
                <a href="<?php the_field('hero_secondary_button_url'); ?>" class="bg-white text-[#7732a8] font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 transition-all shadow-lg border border-gray-200">
                    <?php the_field('hero_secondary_button_text'); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="py-20 bg-[#fcfcfc]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-[#481262]"><?php the_field('services_title'); ?></h2>
                <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('services_subtitle'); ?></p>
            </div>
            
            <?php
            // Contar cuántas tarjetas de servicio están rellenas
            $service_cards = [];
            for ($i = 1; $i <= 4; $i++) {
                $card = get_field('service_card_' . $i);
                if ($card && !empty($card['title'])) {
                    $service_cards[] = $card;
                }
            }
            $service_count = count($service_cards);

            // Definir las clases de la cuadrícula dinámicamente
            $grid_classes = 'grid-cols-1 md:grid-cols-2'; // Clases por defecto para móvil y tablet
            $max_width_class = 'max-w-none'; // Ancho máximo por defecto

            if ($service_count == 1) {
                $grid_classes .= ' lg:grid-cols-1';
                $max_width_class = 'max-w-xs mx-auto'; // Centra una sola tarjeta
            } elseif ($service_count == 2) {
                $grid_classes .= ' lg:grid-cols-2';
                $max_width_class = 'max-w-3xl mx-auto'; // Centra dos tarjetas
            } elseif ($service_count == 3) {
                $grid_classes .= ' lg:grid-cols-3';
                $max_width_class = 'max-w-5xl mx-auto'; // Centra tres tarjetas
            } else { // 4 o 0 tarjetas
                $grid_classes .= ' lg:grid-cols-4';
            }
            ?>

            <div class="grid <?php echo $grid_classes; ?> gap-8 <?php echo $max_width_class; ?>">
                <?php 
                // Iterar sobre las tarjetas que SÍ existen
                foreach ($service_cards as $card):
                    // Define color classes based on ACF field
                    $color_theme = $card['color'];
                    $bg_color_class = 'bg-gray-100';
                    $text_color_class = 'text-gray-600';

                    switch ($color_theme) {
                        case 'blue':
                            $bg_color_class = 'bg-blue-100';
                            $text_color_class = 'text-blue-600';
                            break;
                        case 'purple':
                            $bg_color_class = 'bg-purple-100';
                            $text_color_class = 'text-purple-600';
                            break;
                        case 'green':
                            $bg_color_class = 'bg-green-100';
                            $text_color_class = 'text-green-600';
                            break;
                        case 'red':
                            $bg_color_class = 'bg-red-100';
                            $text_color_class = 'text-red-600';
                            break;
                    }
                ?>
                <a href="<?php echo esc_url($card['link']); ?>" class="block bg-white p-8 rounded-xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-100 group">
                    <div class="<?php echo $bg_color_class . ' ' . $text_color_class; ?> rounded-full h-12 w-12 flex items-center justify-center mb-5 transition-transform duration-300 group-hover:scale-110">
                        <?php echo $card['icon']; ?>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-[#481262]"><?php echo esc_html($card['title']); ?></h3>
                    <p class="text-gray-700"><?php echo esc_html($card['description']); ?></p>
                </a>
                <?php 
                endforeach; 
                ?>
            </div>
        </div>
    </section>

    <!-- Stats Counter Section -->
    <section id="stats" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="bg-[#fcfcfc] border border-gray-200 rounded-xl shadow-lg p-8 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                    <!-- Stat 1 -->
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#481262] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        <span class="text-4xl font-extrabold text-[#1f1f1f] counter" data-target="<?php the_field('stat_clients'); ?>">0</span>
                        <p class="text-gray-600 mt-1"><?php the_field('stat_clients_label'); ?></p>
                    </div>
                    <!-- Stat 2 -->
                    <div class="flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#481262] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-4xl font-extrabold text-[#1f1f1f] counter" data-target="<?php the_field('stat_projects'); ?>">0</span>
                        <p class="text-gray-600 mt-1"><?php the_field('stat_projects_label'); ?></p>
                    </div>
                    <!-- Stat 3 -->
                    <div class="flex flex-col items-center">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#481262] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-4xl font-extrabold text-[#1f1f1f] counter" data-target="<?php the_field('stat_hours'); ?>">0</span>
                        <p class="text-gray-600 mt-1"><?php the_field('stat_hours_label'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section id="proyectos" class="py-20 bg-[#1f1f1f] text-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <span class="inline-block border border-gray-700 rounded-full px-4 py-1 text-sm font-bold uppercase text-gray-400 tracking-widest"><?php the_field('testimonials_badge'); ?></span>
                <h2 class="text-3xl md:text-4xl font-bold mt-4"><?php echo get_field('testimonials_title'); ?></h2>
            </div>
            
            <?php
            $args = array( 'post_type' => 'testimonial', 'posts_per_page' => 3 );
            $testimonials = new WP_Query( $args );
            if ( $testimonials->have_posts() ) :
            ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                    <div class="bg-[#2a2a2a] p-8 rounded-2xl border border-gray-800 shadow-lg flex flex-col justify-between h-full">
                        <p class="text-gray-300 italic flex-grow">“<?php the_field('quote'); ?>”</p>
                        <div class="flex items-center mt-6 pt-6 border-t border-gray-700">
                           <?php if ( has_post_thumbnail() ) : ?>
                                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="h-12 w-12 rounded-full object-cover" alt="<?php the_field('author_name'); ?>">
                            <?php else: ?>
                                <img src="https://placehold.co/40x40/cccccc/1f1f1f?text=L" class="h-12 w-12 rounded-full" alt="Avatar">
                            <?php endif; ?>
                            <div class="ml-4">
                                <p class="font-bold text-white"><?php the_field('author_name'); ?></p>
                                <p class="text-sm text-gray-400"><?php the_field('author_title'); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php 
            wp_reset_postdata(); 
            endif;
            ?>

            <div class="text-center mt-16">
                <a href="<?php the_field('testimonials_button_url'); ?>" class="inline-block bg-[#7732a8] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#481262] transition-all shadow-md">
                    <?php the_field('testimonials_button_text'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#481262]"><?php the_field('process_home_title'); ?></h2>
                <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('process_home_subtitle'); ?></p>
            </div>
            <div class="grid md:grid-cols-3 gap-16 max-w-6xl mx-auto text-center">
                <?php for($i = 1; $i <= 3; $i++): $step = get_field('process_home_step_' . $i); if($step): ?>
                <div>
                    <span class="text-8xl font-extrabold text-gray-200"><?php echo $i; ?></span>
                    <div class="w-16 h-1 bg-[#7732a8] mx-auto my-4"></div>
                    <h3 class="text-2xl font-bold text-[#481262]"><?php echo $step['title']; ?></h3>
                    <p class="mt-4 text-gray-600"><?php echo $step['description']; ?></p>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>
    
    <!-- FAQ Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6 max-w-3xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('faq_home_title'); ?></h2>
                <p class="mt-4 text-gray-700"><?php the_field('faq_home_subtitle'); ?></p>
            </div>
            <div class="space-y-4">
                <?php for($i = 1; $i <= 6; $i++): $faq = get_field('faq_home_item_' . $i); if($faq && !empty($faq['question'])): ?>
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
                    <button class="accordion-header w-full flex justify-between items-center text-left p-5 font-semibold text-gray-800">
                        <span><?php echo $faq['question']; ?></span>
                        <svg class="accordion-icon h-6 w-6 transform transition-transform text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    </button>
                    <div class="accordion-content">
                        <div class="px-5 pb-5 text-gray-600">
                            <p><?php echo $faq['answer']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; endfor; ?>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section id="nosotros" class="cta-gradient text-white">
        <div class="container mx-auto px-6 py-20 text-center">
            <h2 class="text-3xl md:text-4xl font-bold"><?php the_field('cta_title'); ?></h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg opacity-90"><?php the_field('cta_subtitle'); ?></p>
            <div class="mt-8">
                <a href="<?php the_field('cta_button_url'); ?>" class="bg-white text-[#481262] font-bold px-8 py-4 rounded-lg hover:bg-gray-200 transition-all text-lg">
                    <?php the_field('cta_button_text'); ?>
                </a>
            </div>
        </div>
    </section>

<?php get_footer(); ?>