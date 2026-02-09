<?php
/*
Template Name: Service Page Template
*/
get_header(); 
?>

    <main>
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <a href="<?php echo home_url('/#servicios'); ?>" class="text-sm font-semibold text-[#7732a8] hover:text-[#481262]">‹ Volver a Servicios</a>
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262] mt-4"><?php the_field('service_title'); ?></h1>
                <p class="mt-4 max-w-3xl mx-auto text-lg text-gray-700"><?php the_field('service_subtitle'); ?></p>
            </div>
        </section>

        <!-- Benefits Section -->
        <?php if( get_field('benefits_title') ): ?>
        <section class="py-20">
            <div class="container mx-auto px-6">
                 <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('benefits_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('benefits_subtitle'); ?></p>
                </div>
                <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                    <?php 
                    for ($i = 1; $i <= 3; $i++):
                        $benefit = get_field('benefit_' . $i);
                        if( $benefit && !empty($benefit['title']) ): 
                    ?>
                    <div class="text-center p-6">
                        <div class="flex justify-center mb-4 h-12 w-12 mx-auto text-[#7732a8]">
                            <?php echo $benefit['icon']; ?>
                        </div>
                        <h3 class="text-xl font-bold text-[#481262]"><?php echo esc_html($benefit['title']); ?></h3>
                        <p class="mt-2 text-gray-600"><?php echo esc_html($benefit['description']); ?></p>
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        
        <!-- Process Section -->
        <?php if( get_field('process_title') ): ?>
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#481262]"><?php the_field('process_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('process_subtitle'); ?></p>
                </div>
                <div class="grid md:grid-cols-3 gap-16 max-w-6xl mx-auto text-center">
                    <?php 
                    for ($i = 1; $i <= 3; $i++):
                        $step = get_field('step_' . $i);
                        if( $step && !empty($step['title']) ): 
                    ?>
                    <div>
                        <span class="text-8xl font-extrabold text-gray-200"><?php echo $i; ?></span>
                        <div class="w-16 h-1 bg-[#7732a8] mx-auto my-4"></div>
                        <h3 class="text-2xl font-bold text-[#481262]"><?php echo esc_html($step['title']); ?></h3>
                        <p class="mt-4 text-gray-600"><?php echo esc_html($step['description']); ?></p>
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Real Results Section -->
        <?php if( get_field('results_title') ): ?>
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#481262]"><?php the_field('results_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-2xl mx-auto"><?php the_field('results_subtitle'); ?></p>
                </div>
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                   <?php 
                    for ($i = 1; $i <= 2; $i++):
                        $result = get_field('result_' . $i);
                        if( $result && !empty($result['name']) ): 
                        $client_logo = $result['logo'];
                    ?>
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 transform hover:scale-105 transition-transform duration-300">
                        <div class="flex items-center mb-6">
                            <?php if($client_logo): ?>
                                <img src="<?php echo esc_url($client_logo['url']); ?>" alt="<?php echo esc_attr($client_logo['alt']); ?>" class="h-10 w-10 rounded-full object-cover">
                            <?php endif; ?>
                            <span class="ml-4 font-bold text-gray-800 text-lg"><?php echo esc_html($result['name']); ?></span>
                        </div>
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div>
                                <p class="text-4xl lg:text-5xl font-extrabold text-[#7732a8]"><?php echo esc_html($result['metric_1_value']); ?></p>
                                <p class="text-sm text-gray-600 mt-1"><?php echo esc_html($result['metric_1_label']); ?></p>
                            </div>
                            <div>
                                <p class="text-4xl lg:text-5xl font-extrabold text-[#7732a8]"><?php echo esc_html($result['metric_2_value']); ?></p>
                                <p class="text-sm text-gray-600 mt-1"><?php echo esc_html($result['metric_2_label']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>
        
        <!-- Trusted By Section -->
        <?php if( get_field('trusted_title') ): ?>
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-6 logo-fade-container">
                <h4 class="text-center text-sm font-bold uppercase text-gray-500 tracking-widest">
                    <?php the_field('trusted_title'); ?>
                </h4>
                <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-x-4 gap-y-10 items-center">
                    <?php 
                    for ($i = 1; $i <= 6; $i++):
                        $logo_image = get_field('trusted_logo_' . $i);
                        if( $logo_image ): 
                    ?>
                    <div class="flex justify-center grayscale hover:grayscale-0 transition duration-300">
                        <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>" class="h-10 w-auto object-contain">
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- Pricing Section -->
        <?php if( get_field('pricing_title') ): ?>
        <section id="planes" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('pricing_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('pricing_subtitle'); ?></p>
                </div>
                
                <?php
                // Elige qué diseño mostrar
                $pricing_layout = get_field('pricing_layout');

                if ($pricing_layout == 'table'):
                    $headers = get_field('table_headers');
                    $buttons = get_field('table_buttons');
                    $is_pro_recommended = $headers['header_2_recommended'] ?? false;
                ?>
                    <!-- NUEVA TABLA DE COMPARACIÓN -->
                    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-200 pt-2">
                        <table class="w-full text-left pricing-table rounded-2xl">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="p-6 text-lg font-bold text-[#481262]">Característica</th>
                                    <th class="p-6 text-center text-lg font-bold text-[#481262]"><?php echo esc_html($headers['header_1_text']); ?></th>
                                    <th class="p-6 text-center text-lg font-bold <?php echo $is_pro_recommended ? 'text-[#7732a8]' : 'text-[#481262]'; ?> relative">
                                        <?php if($is_pro_recommended): ?>
                                            <span class="table-recommended-badge absolute -top-7 left-1/2 -translate-x-1/2">RECOMENDADO</span>
                                        <?php endif; ?>
                                        <?php echo esc_html($headers['header_2_text']); ?>
                                    </th>
                                    <th class="p-6 text-center text-lg font-bold text-[#481262]"><?php echo esc_html($headers['header_3_text']); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                for ($i = 1; $i <= 8; $i++):
                                    $row = get_field('feature_row_' . $i);
                                    if( $row && !empty($row['characteristic']) ): 
                                ?>
                                <tr class="border-t border-gray-200">
                                    <td class="p-4 md:p-6 font-semibold text-gray-800"><?php echo esc_html($row['characteristic']); ?></td>
                                    <?php for ($j = 1; $j <= 3; $j++):
                                        $value = $row['value_' . $j];
                                        $is_pro_col = ($j == 2 && $is_pro_recommended);
                                    ?>
                                    <td class="p-4 md:p-6 text-center font-medium <?php if($is_pro_col) echo 'border-x-2 border-x-[#7732a8]'; ?>">
                                        <?php if( strtolower(trim($value)) == 'check' ): ?>
                                            <svg class="h-6 w-6 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        <?php elseif( trim($value) == '-' ): ?>
                                            <span class="text-gray-400 text-xl font-bold">–</span>
                                        <?php else: ?>
                                            <span class="text-gray-700"><?php echo esc_html($value); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php endfor; ?>
                                </tr>
                                <?php 
                                    endif;
                                endfor; 
                                ?>
                                <!-- Fila de Botones -->
                                <tr class="border-t border-gray-200">
                                    <td class="p-6"></td>
                                    <td class="p-6 text-center">
                                        <a href="<?php echo esc_url($buttons['btn_1_url']); ?>" class="table-btn"><?php echo esc_html($buttons['btn_1_text']); ?></a>
                                    </td>
                                    <td class="p-6 text-center <?php if($is_pro_recommended) echo 'border-x-2 border-x-[#7732a8]'; ?>">
                                        <a href="<?php echo esc_url($buttons['btn_2_url']); ?>" class="table-btn-recommended"><?php echo esc_html($buttons['btn_2_text']); ?></a>
                                    </td>
                                    <td class="p-6 text-center">
                                        <a href="<?php echo esc_url($buttons['btn_3_url']); ?>" class="table-btn"><?php echo esc_html($buttons['btn_3_text']); ?></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                <?php else: ?>
                
                    <!-- DISEÑO DE TARJETAS (ESTÁNDAR) -->
                    <div class="grid lg:grid-cols-3 gap-8 max-w-6xl mx-auto items-start">
                        <?php 
                        for ($i = 1; $i <= 3; $i++):
                            $plan = get_field('plan_' . $i);
                            if( $plan && !empty($plan['name']) ): 
                            $is_recommended = isset($plan['is_recommended']) && $plan['is_recommended'];
                            $bonus_title = $plan['bonus_title'] ?? '';
                            $bonus_text_list = $plan['bonus_text'] ?? '';
                        ?>
                        <div class="bg-white p-8 rounded-xl shadow-md border <?php if($is_recommended){ echo 'border-2 border-[#7732a8] relative shadow-2xl'; } else { echo 'border-gray-200';} ?> flex flex-col h-full">
                            <div class="flex-grow">
                                <?php if($is_recommended): ?>
                                    <span class="absolute top-0 -translate-y-1/2 bg-[#7732a8] text-white text-xs font-bold px-3 py-1 rounded-full">RECOMENDADO</span>
                                <?php endif; ?>
                                <h3 class="text-xl font-bold text-[#481262]"><?php echo esc_html($plan['name']); ?></h3>
                                <p class="mt-2 text-gray-600"><?php echo esc_html($plan['description']); ?></p>
                                
                                <p class="text-4xl font-extrabold my-6"><?php echo esc_html($plan['price']); ?><?php if($plan['period']): ?><span class="text-base font-normal text-gray-500"><?php echo esc_html($plan['period']); ?></span><?php endif; ?></p>
                                
                                <?php if( !empty($plan['features']) ): ?>
                                    <ul class="space-y-3 text-gray-700">
                                        <?php 
                                        $features = explode("\n", $plan['features']); 
                                        foreach($features as $feature): 
                                            $trimmed_feature = trim($feature);
                                            if(empty($trimmed_feature)) continue;
                                            
                                            $allowed_html = array(
                                                'span' => array( 'style' => array(), 'class' => array() ),
                                                'a' => array( 'href' => array(), 'class' => array(), 'style' => array() ),
                                            );
                                        ?>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-green-500 mr-2 flex-shrink-0 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            <span><?php echo wp_kses( $trimmed_feature, $allowed_html ); ?></span>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                
                                <?php if($bonus_title || $bonus_text_list): ?>
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <?php if($bonus_title): ?>
                                    <h4 class="font-semibold text-center text-green-700">
                                        <?php 
                                        $allowed_html_title = array( 'span' => array('class' => array(), 'style' => array()) );
                                        echo wp_kses( $bonus_title, $allowed_html_title ); 
                                        ?>
                                    </h4>
                                    <?php endif; ?>
                                    
                                    <?php if( !empty($bonus_text_list) ): ?>
                                        <ul class="space-y-2 text-gray-600 text-sm mt-4">
                                            <?php 
                                            $bonus_items = explode("\n", $bonus_text_list); 
                                            foreach($bonus_items as $item): 
                                                $trimmed_item = trim($item);
                                                if(empty($trimmed_item)) continue;
                                            ?>
                                            <li class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-green-500 mr-2 flex-shrink-0">
                                                    <rect width="18" height="18" x="3" y="3" rx="2"/><path d="M8 12h8"/><path d="M12 8v8"/>
                                                </svg>
                                                <span><?php echo esc_html($trimmed_item); ?></span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                            </div>
                            <a href="<?php echo esc_url($plan['button_url']); ?>" class="block w-full text-center mt-8 font-semibold px-6 py-3 rounded-lg transition-all <?php if($is_recommended){ echo 'bg-[#7732a8] text-white hover:bg-[#481262]'; } else { echo 'bg-white text-[#7732a8] border border-[#7732a8] hover:bg-gray-50';} ?>"><?php echo esc_html($plan['button_text']); ?></a>
                        </div>
                        <?php 
                            endif;
                        endfor; 
                        ?>
                    </div>

                <?php endif; ?>

                <?php if( get_field('pricing_disclaimer') ): ?>
                <p class="text-center text-sm text-gray-500 mt-8 max-w-2xl mx-auto"><?php echo wp_kses_post(get_field('pricing_disclaimer')); ?></p>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>

        <!-- FAQ Section -->
        <?php if( get_field('faq_title') ): ?>
        <section id="faq" class="py-20 bg-[#1f1f1f] text-white">
            <div class="container mx-auto px-6 max-w-3xl">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold"><?php echo get_field('faq_title'); ?></h2>
                    <p class="mt-4 text-gray-400"><?php the_field('faq_subtitle'); ?></p>
                </div>
                <div class="space-y-4">
                     <?php 
                    for ($i = 1; $i <= 3; $i++):
                        $faq_item = get_field('faq_' . $i);
                        if( $faq_item && !empty($faq_item['question']) ): 
                    ?>
                    <div class="bg-[#2a2a2a] rounded-xl border border-gray-800">
                        <button class="accordion-header w-full flex justify-between items-center text-left p-5 font-semibold text-white">
                            <span><?php echo esc_html($faq_item['question']); ?></span>
                            <svg class="accordion-icon h-6 w-6 transform transition-transform text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                        </button>
                        <div class="accordion-content">
                            <div class="px-5 pb-5 text-gray-400">
                                <p><?php echo esc_html($faq_item['answer']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
            </div>
        </section>
        <?php endif; ?>

        <!-- CTA Section -->
        <section class="cta-gradient text-white">
            <div class="container mx-auto px-6 py-20 text-center">
                <h2 class="text-3xl md:text-4xl font-bold"><?php the_field('service_cta_title'); ?></h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg opacity-90"><?php the_field('service_cta_subtitle'); ?></p>
                <div class="mt-8">
                    <a href="<?php the_field('service_cta_button_url'); ?>" class="bg-white text-[#481262] font-bold px-8 py-4 rounded-lg hover:bg-gray-200 transition-all text-lg">
                        <?php the_field('service_cta_button_text'); ?>
                    </a>
                </div>
            </div>
        </section>

    </main>

<?php get_footer(); ?>