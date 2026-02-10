<?php
    if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Ajustes del Tema',
        'menu_title'    => 'Ajustes del Tema',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


// --- HOMEPAGE SETTINGS --- //
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array('key' => 'group_homepage_settings','title' => 'Homepage Settings','fields' => array(
    array('key' => 'field_tab_hero','label' => 'Hero Section','type' => 'tab'),
    array('key' => 'field_hero_title','label' => 'Hero Title','name' => 'hero_title','type' => 'text'),
    array('key' => 'field_hero_subtitle','label' => 'Hero Subtitle','name' => 'hero_subtitle','type' => 'textarea'),
    array('key' => 'field_hero_primary_button_text','label' => 'Hero Primary Button Text','name' => 'hero_primary_button_text','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_hero_primary_button_url','label' => 'Hero Primary Button URL','name' => 'hero_primary_button_url','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_hero_secondary_button_text','label' => 'Hero Secondary Button Text','name' => 'hero_secondary_button_text','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_hero_secondary_button_url','label' => 'Hero Secondary Button URL','name' => 'hero_secondary_button_url','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_tab_services','label' => 'Services Section','name' => '','type' => 'tab'),
    array('key' => 'field_services_title','label' => 'Services Title','name' => 'services_title','type' => 'text'),
    array('key' => 'field_services_subtitle','label' => 'Services Subtitle','name' => 'services_subtitle','type' => 'textarea'),
    
    // Service Cards
    array('key' => 'field_service_card_1', 'label' => 'Service Card 1', 'name' => 'service_card_1', 'type' => 'group', 'sub_fields' => array(
		array('key' => 'field_sc1_color', 'name' => 'color', 'type' => 'select', 'label' => 'Color Theme', 'choices' => array('blue' => 'Azul', 'purple' => 'Púrpura', 'green' => 'Verde', 'red' => 'Rojo'), 'default_value' => 'blue'),
        array('key' => 'field_sc1_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG)'),
        array('key' => 'field_sc1_title', 'name' => 'title', 'type' => 'text', 'label' => 'Titulo'),
        array('key' => 'field_sc1_desc', 'name' => 'description', 'type' => 'text', 'label' => 'Descripcion'),
        array('key' => 'field_sc1_link', 'name' => 'link', 'type' => 'text', 'label' => 'URL'),
    )),
    array('key' => 'field_service_card_2', 'label' => 'Service Card 2', 'name' => 'service_card_2', 'type' => 'group', 'sub_fields' => array(
		array('key' => 'field_sc2_color', 'name' => 'color', 'type' => 'select', 'label' => 'Color Theme', 'choices' => array('blue' => 'Azul', 'purple' => 'Púrpura', 'green' => 'Verde', 'red' => 'Rojo'), 'default_value' => 'red'),
        array('key' => 'field_sc2_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG)'),
        array('key' => 'field_sc2_title', 'name' => 'title', 'type' => 'text', 'label' => 'Titulo'),
        array('key' => 'field_sc2_desc', 'name' => 'description', 'type' => 'text', 'label' => 'Descripcion'),
        array('key' => 'field_sc2_link', 'name' => 'link', 'type' => 'text', 'label' => 'URL'),
    )),
    array('key' => 'field_service_card_3', 'label' => 'Service Card 3', 'name' => 'service_card_3', 'type' => 'group', 'sub_fields' => array(
		array('key' => 'field_sc3_color', 'name' => 'color', 'type' => 'select', 'label' => 'Color Theme', 'choices' => array('blue' => 'Azul', 'purple' => 'Púrpura', 'green' => 'Verde', 'red' => 'Rojo'), 'default_value' => 'purple'),
        array('key' => 'field_sc3_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG)'),
        array('key' => 'field_sc3_title', 'name' => 'title', 'type' => 'text', 'label' => 'Titulo'),
        array('key' => 'field_sc3_desc', 'name' => 'description', 'type' => 'text', 'label' => 'Descripcion'),
        array('key' => 'field_sc3_link', 'name' => 'link', 'type' => 'text', 'label' => 'URL'),
    )),
    array('key' => 'field_service_card_4', 'label' => 'Service Card 4', 'name' => 'service_card_4', 'type' => 'group', 'sub_fields' => array(
		array('key' => 'field_sc4_color', 'name' => 'color', 'type' => 'select', 'label' => 'Color Theme', 'choices' => array('blue' => 'Azul', 'purple' => 'Púrpura', 'green' => 'Verde', 'red' => 'Rojo'), 'default_value' => 'green'),
        array('key' => 'field_sc4_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG)'),
        array('key' => 'field_sc4_title', 'name' => 'title', 'type' => 'text', 'label' => 'Titulo'),
        array('key' => 'field_sc4_desc', 'name' => 'description', 'type' => 'text', 'label' => 'Descripcion'),
        array('key' => 'field_sc4_link', 'name' => 'link', 'type' => 'text', 'label' => 'URL'),
    )),
    
    array('key' => 'field_tab_stats','label' => 'Stats Section','name' => '','type' => 'tab'),
    array('key' => 'field_stat_clients','label' => 'Stat Clients','name' => 'stat_clients','type' => 'number','wrapper' => array('width' => '50')),
    array('key' => 'field_stat_clients_label','label' => 'Stat Clients Label','name' => 'stat_clients_label','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_stat_projects','label' => 'Stat Projects','name' => 'stat_projects','type' => 'number','wrapper' => array('width' => '50')),
    array('key' => 'field_stat_projects_label','label' => 'Stat Projects Label','name' => 'stat_projects_label','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_stat_hours','label' => 'Stat Hours','name' => 'stat_hours','type' => 'number','wrapper' => array('width' => '50')),
    array('key' => 'field_stat_hours_label','label' => 'Stat Hours Label','name' => 'stat_hours_label','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_tab_testimonials_main','label' => 'Testimonials Section','name' => '','type' => 'tab'),
    array('key' => 'field_testimonials_badge','label' => 'Testimonials Badge','name' => 'testimonials_badge','type' => 'text'),
    array('key' => 'field_testimonials_title','label' => 'Testimonials Title','name' => 'testimonials_title','type' => 'text'),
    array('key' => 'field_testimonials_button_text','label' => 'Testimonials Button Text','name' => 'testimonials_button_text','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_testimonials_button_url','label' => 'Testimonials Button URL','name' => 'testimonials_button_url','type' => 'text','wrapper' => array('width' => '50')),
    
    array('key' => 'field_tab_process_home','label' => 'Process Section','type' => 'tab'),
    array('key' => 'field_process_home_title','label' => 'Title','name' => 'process_home_title','type' => 'text'),
    array('key' => 'field_process_home_subtitle','label' => 'Subtitle','name' => 'process_home_subtitle','type' => 'textarea'),
    array('key' => 'field_process_home_step1','label' => 'Step 1','name' => 'process_home_step_1','type' => 'group', 'sub_fields' => array(array('key' => 'field_ph_s1_title', 'name' => 'title', 'type' => 'text'), array('key' => 'field_ph_s1_desc', 'name' => 'description', 'type' => 'textarea'))),
    array('key' => 'field_process_home_step2','label' => 'Step 2','name' => 'process_home_step_2','type' => 'group', 'sub_fields' => array(array('key' => 'field_ph_s2_title', 'name' => 'title', 'type' => 'text'), array('key' => 'field_ph_s2_desc', 'name' => 'description', 'type' => 'textarea'))),
    array('key' => 'field_process_home_step3','label' => 'Step 3','name' => 'process_home_step_3','type' => 'group', 'sub_fields' => array(array('key' => 'field_ph_s3_title', 'name' => 'title', 'type' => 'text'), array('key' => 'field_ph_s3_desc', 'name' => 'description', 'type' => 'textarea'))),

    array('key' => 'field_tab_faq_home','label' => 'FAQ Section','type' => 'tab'),
    array('key' => 'field_faq_home_title','label' => 'Title','name' => 'faq_home_title','type' => 'text'),
    array('key' => 'field_faq_home_subtitle','label' => 'Subtitle','name' => 'faq_home_subtitle','type' => 'textarea'),
    array('key' => 'field_faq_home_item1','label' => 'FAQ 1','name' => 'faq_home_item_1','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q1', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a1', 'name' => 'answer', 'type' => 'textarea'))),
    array('key' => 'field_faq_home_item2','label' => 'FAQ 2','name' => 'faq_home_item_2','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q2', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a2', 'name' => 'answer', 'type' => 'textarea'))),
    array('key' => 'field_faq_home_item3','label' => 'FAQ 3','name' => 'faq_home_item_3','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q3', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a3', 'name' => 'answer', 'type' => 'textarea'))),
    array('key' => 'field_faq_home_item4','label' => 'FAQ 4','name' => 'faq_home_item_4','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q4', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a4', 'name' => 'answer', 'type' => 'textarea'))),
    array('key' => 'field_faq_home_item5','label' => 'FAQ 5','name' => 'faq_home_item_5','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q5', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a5', 'name' => 'answer', 'type' => 'textarea'))),
    array('key' => 'field_faq_home_item6','label' => 'FAQ 6','name' => 'faq_home_item_6','type' => 'group', 'sub_fields' => array(array('key' => 'field_faqh_q6', 'name' => 'question', 'type' => 'text'), array('key' => 'field_faqh_a6', 'name' => 'answer', 'type' => 'textarea'))),
    
    array('key' => 'field_tab_cta','label' => 'CTA Section','name' => '','type' => 'tab'),
    array('key' => 'field_cta_title','label' => 'CTA Title','name' => 'cta_title','type' => 'text'),
    array('key' => 'field_cta_subtitle','label' => 'CTA Subtitle','name' => 'cta_subtitle','type' => 'textarea'),
    array('key' => 'field_cta_button_text','label' => 'CTA Button Text','name' => 'cta_button_text','type' => 'text','wrapper' => array('width' => '50')),
    array('key' => 'field_cta_button_url','label' => 'CTA Button URL','name' => 'cta_button_url','type' => 'text','wrapper' => array('width' => '50')),
),'location' => array(array(array('param' => 'page_type','operator' => '==','value' => 'front_page')),),'style' => 'default','hide_on_screen' => array('the_content'),));


// Grupo de Campos para Testimonios
acf_add_local_field_group(array('key' => 'group_testimonials','title' => 'Testimonial Details','fields' => array(array('key' => 'field_quote','label' => 'Cita del Cliente','name' => 'quote','type' => 'textarea'),array('key' => 'field_author_name','label' => 'Nombre del Autor','name' => 'author_name','type' => 'text'),array('key' => 'field_author_title','label' => 'Cargo del Autor','name' => 'author_title','type' => 'text'),),'location' => array(array(array('param' => 'post_type','operator' => '==','value' => 'testimonial')),),'position' => 'normal','style' => 'default',));

// Grupo de Campos para Plantilla de Servicios
acf_add_local_field_group(array(
    'key' => 'group_service_page',
    'title' => 'Service Page Settings',
    'fields' => array(
        array('key' => 'field_service_tab_header', 'label' => 'Header', 'type' => 'tab'),
        array('key' => 'field_service_title', 'label' => 'Service Title', 'name' => 'service_title', 'type' => 'text'),
        array('key' => 'field_service_subtitle', 'label' => 'Service Subtitle', 'name' => 'service_subtitle', 'type' => 'textarea'),
        
        array('key' => 'field_service_tab_benefits', 'label' => 'Benefits', 'type' => 'tab'),
        array('key' => 'field_benefits_title', 'label' => 'Benefits Title', 'name' => 'benefits_title', 'type' => 'text'),
        array('key' => 'field_benefits_subtitle', 'label' => 'Benefits Subtitle', 'name' => 'benefits_subtitle', 'type' => 'textarea'),
        array('key' => 'field_benefits_group_1', 'label' => 'Benefit 1', 'name' => 'benefit_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_benefit_icon_1', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG Code)'),
            array('key' => 'field_benefit_title_1', 'name' => 'title', 'type' => 'text', 'label' => 'Benefit Title'),
            array('key' => 'field_benefit_desc_1', 'name' => 'description', 'type' => 'textarea', 'label' => 'Benefit Description')
        )),
        array('key' => 'field_benefits_group_2', 'label' => 'Benefit 2', 'name' => 'benefit_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_benefit_icon_2', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG Code)'),
            array('key' => 'field_benefit_title_2', 'name' => 'title', 'type' => 'text', 'label' => 'Benefit Title'),
            array('key' => 'field_benefit_desc_2', 'name' => 'description', 'type' => 'textarea', 'label' => 'Benefit Description')
        )),
        array('key' => 'field_benefits_group_3', 'label' => 'Benefit 3', 'name' => 'benefit_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_benefit_icon_3', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icon (SVG Code)'),
            array('key' => 'field_benefit_title_3', 'name' => 'title', 'type' => 'text', 'label' => 'Benefit Title'),
            array('key' => 'field_benefit_desc_3', 'name' => 'description', 'type' => 'textarea', 'label' => 'Benefit Description')
        )),

        array('key' => 'field_service_tab_process', 'label' => 'Process', 'type' => 'tab'),
        array('key' => 'field_process_title', 'label' => 'Process Title', 'name' => 'process_title', 'type' => 'text'),
        array('key' => 'field_process_subtitle', 'label' => 'Process Subtitle', 'name' => 'process_subtitle', 'type' => 'textarea'),
        array('key' => 'field_process_group_1', 'label' => 'Step 1', 'name' => 'step_1', 'type' => 'group', 'sub_fields' => array(
             array('key' => 'field_step_title_1', 'name' => 'title', 'type' => 'text', 'label' => 'Step Title'),
             array('key' => 'field_step_desc_1', 'name' => 'description', 'type' => 'textarea', 'label' => 'Step Description'),
        )),
        array('key' => 'field_process_group_2', 'label' => 'Step 2', 'name' => 'step_2', 'type' => 'group', 'sub_fields' => array(
             array('key' => 'field_step_title_2', 'name' => 'title', 'type' => 'text', 'label' => 'Step Title'),
             array('key' => 'field_step_desc_2', 'name' => 'description', 'type' => 'textarea', 'label' => 'Step Description'),
        )),
        array('key' => 'field_process_group_3', 'label' => 'Step 3', 'name' => 'step_3', 'type' => 'group', 'sub_fields' => array(
             array('key' => 'field_step_title_3', 'name' => 'title', 'type' => 'text', 'label' => 'Step Title'),
             array('key' => 'field_step_desc_3', 'name' => 'description', 'type' => 'textarea', 'label' => 'Step Description'),
        )),
        
        array('key' => 'field_service_tab_results', 'label' => 'Results', 'type' => 'tab'),
        array('key' => 'field_results_title', 'label' => 'Results Title', 'name' => 'results_title', 'type' => 'text'),
        array('key' => 'field_results_subtitle', 'label' => 'Results Subtitle', 'name' => 'results_subtitle', 'type' => 'textarea'),
        array('key' => 'field_results_group_1', 'label' => 'Result Card 1', 'name' => 'result_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_res_logo_1', 'name' => 'logo', 'type' => 'image', 'return_format' => 'array'),
            array('key' => 'field_res_name_1', 'name' => 'name', 'type' => 'text'),
            array('key' => 'field_res_m1_val_1', 'name' => 'metric_1_value', 'type' => 'text'),
            array('key' => 'field_res_m1_lab_1', 'name' => 'metric_1_label', 'type' => 'text'),
            array('key' => 'field_res_m2_val_1', 'name' => 'metric_2_value', 'type' => 'text'),
            array('key' => 'field_res_m2_lab_1', 'name' => 'metric_2_label', 'type' => 'text'),
        )),
        array('key' => 'field_results_group_2', 'label' => 'Result Card 2', 'name' => 'result_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_res_logo_2', 'name' => 'logo', 'type' => 'image', 'return_format' => 'array'),
            array('key' => 'field_res_name_2', 'name' => 'name', 'type' => 'text'),
            array('key' => 'field_res_m1_val_2', 'name' => 'metric_1_value', 'type' => 'text'),
            array('key' => 'field_res_m1_lab_2', 'name' => 'metric_1_label', 'type' => 'text'),
            array('key' => 'field_res_m2_val_2', 'name' => 'metric_2_value', 'type' => 'text'),
            array('key' => 'field_res_m2_lab_2', 'name' => 'metric_2_label', 'type' => 'text'),
        )),

        array('key' => 'field_service_tab_trusted', 'label' => 'Trusted By', 'type' => 'tab'),
        array('key' => 'field_trusted_title', 'label' => 'Trusted By Title', 'name' => 'trusted_title', 'type' => 'text'),
        array('key' => 'field_trusted_logo_1', 'label' => 'Logo 1', 'name' => 'trusted_logo_1', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_trusted_logo_2', 'label' => 'Logo 2', 'name' => 'trusted_logo_2', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_trusted_logo_3', 'label' => 'Logo 3', 'name' => 'trusted_logo_3', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_trusted_logo_4', 'label' => 'Logo 4', 'name' => 'trusted_logo_4', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_trusted_logo_5', 'label' => 'Logo 5', 'name' => 'trusted_logo_5', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_trusted_logo_6', 'label' => 'Logo 6', 'name' => 'trusted_logo_6', 'type' => 'image', 'return_format' => 'array'),

        array('key' => 'field_service_tab_pricing', 'label' => 'Pricing', 'type' => 'tab'),
        array('key' => 'field_pricing_title', 'label' => 'Pricing Title', 'name' => 'pricing_title', 'type' => 'text'),
        array('key' => 'field_pricing_subtitle', 'label' => 'Pricing Subtitle', 'name' => 'pricing_subtitle', 'type' => 'textarea'),
        
        array(
            'key' => 'field_pricing_layout',
            'label' => 'Tipo de Vista de Precios',
            'name' => 'pricing_layout',
            'type' => 'select',
            'choices' => array(
                'cards' => 'Tarjetas de Planes (Estándar)',
                'table' => 'Tabla de Comparación (Social Media)',
            ),
            'default_value' => 'cards',
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
        ),

        // --- Campos para las Tarjetas (Estándar) ---
        array('key' => 'field_pricing_plan_1', 'label' => 'Plan 1', 'name' => 'plan_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_is_recommended_1', 'name' => 'is_recommended', 'type' => 'true_false'),
            array('key' => 'field_plan_name_1', 'name' => 'name', 'type' => 'text'),
            array('key' => 'field_plan_desc_1', 'name' => 'description', 'type' => 'text'),
            array('key' => 'field_plan_price_1', 'name' => 'price', 'type' => 'text'),
            array('key' => 'field_plan_period_1', 'name' => 'period', 'type' => 'text'),
            array('key' => 'field_plan_features_1', 'name' => 'features', 'type' => 'textarea', 'label' => 'Features (one per line)'),
            array('key' => 'field_plan_bonus_title_1', 'label' => 'Título de Bonus (Opcional)', 'name' => 'bonus_title', 'type' => 'text', 'instructions' => 'Puedes usar HTML. Ej: ¡<span class="text-green-500">Bonus!</span>'),
            array('key' => 'field_plan_bonus_text_1', 'label' => 'Texto de Bonus (Opcional)', 'name' => 'bonus_text', 'type' => 'textarea', 'instructions' => 'Escribe cada ítem del bonus en una línea separada.', 'rows' => 4),
            array('key' => 'field_plan_button_text_1', 'name' => 'button_text', 'type' => 'text'),
            array('key' => 'field_plan_button_url_1', 'name' => 'button_url', 'type' => 'text'),
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'cards')))),
         array('key' => 'field_pricing_plan_2', 'label' => 'Plan 2', 'name' => 'plan_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_is_recommended_2', 'name' => 'is_recommended', 'type' => 'true_false'),
            array('key' => 'field_plan_name_2', 'name' => 'name', 'type' => 'text'),
            array('key' => 'field_plan_desc_2', 'name' => 'description', 'type' => 'text'),
            array('key' => 'field_plan_price_2', 'name' => 'price', 'type' => 'text'),
            array('key' => 'field_plan_period_2', 'name' => 'period', 'type' => 'text'),
            array('key' => 'field_plan_features_2', 'name' => 'features', 'type' => 'textarea', 'label' => 'Features (one per line)'),
            array('key' => 'field_plan_bonus_title_2', 'label' => 'Título de Bonus (Opcional)', 'name' => 'bonus_title', 'type' => 'text', 'instructions' => 'Puedes usar HTML. Ej: ¡<span class="text-green-500">Bonus!</span>'),
            array('key' => 'field_plan_bonus_text_2', 'label' => 'Texto de Bonus (Opcional)', 'name' => 'bonus_text', 'type' => 'textarea', 'instructions' => 'Escribe cada ítem del bonus en una línea separada.', 'rows' => 4),
            array('key' => 'field_plan_button_text_2', 'name' => 'button_text', 'type' => 'text'),
            array('key' => 'field_plan_button_url_2', 'name' => 'button_url', 'type' => 'text'),
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'cards')))),
        array('key' => 'field_pricing_plan_3', 'label' => 'Plan 3', 'name' => 'plan_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_is_recommended_3', 'name' => 'is_recommended', 'type' => 'true_false'),
            array('key' => 'field_plan_name_3', 'name' => 'name', 'type' => 'text'),
            array('key' => 'field_plan_desc_3', 'name' => 'description', 'type' => 'text'),
            array('key' => 'field_plan_price_3', 'name' => 'price', 'type' => 'text'),
            array('key' => 'field_plan_period_3', 'name' => 'period', 'type' => 'text'),
            array('key' => 'field_plan_features_3', 'name' => 'features', 'type' => 'textarea', 'label' => 'Features (one per line)'),
            array('key' => 'field_plan_bonus_title_3', 'label' => 'Título de Bonus (Opcional)', 'name' => 'bonus_title', 'type' => 'text', 'instructions' => 'Puedes usar HTML. Ej: ¡<span class="text-green-500">Bonus!</span>'),
            array('key' => 'field_plan_bonus_text_3', 'label' => 'Texto de Bonus (Opcional)', 'name' => 'bonus_text', 'type' => 'textarea', 'instructions' => 'Escribe cada ítem del bonus en una línea separada.', 'rows' => 4),
            array('key' => 'field_plan_button_text_3', 'name' => 'button_text', 'type' => 'text'),
            array('key' => 'field_plan_button_url_3', 'name' => 'button_url', 'type' => 'text'),
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'cards')))),

        // --- Nuevos campos para la Tabla ---
        array('key' => 'field_price_table_headers', 'label' => 'Títulos de Paquetes', 'name' => 'table_headers', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_header_1_text','name'=>'header_1_text','type'=>'text','default_value'=>'Paquete Básico'),
            array('key'=>'field_header_2_text','name'=>'header_2_text','type'=>'text','default_value'=>'Paquete Pro'),
            array('key'=>'field_header_2_rec','name'=>'header_2_recommended','type'=>'true_false','label'=>'¿Es Recomendado?'),
            array('key'=>'field_header_3_text','name'=>'header_3_text','type'=>'text','default_value'=>'Paquete Premium'),
        ), 'layout' => 'table', 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        
        array('key' => 'field_feature_row_1', 'label' => 'Fila 1', 'name' => 'feature_row_1', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr1_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr1_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr1_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr1_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_2', 'label' => 'Fila 2', 'name' => 'feature_row_2', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr2_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr2_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr2_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr2_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_3', 'label' => 'Fila 3', 'name' => 'feature_row_3', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr3_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr3_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr3_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr3_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_4', 'label' => 'Fila 4', 'name' => 'feature_row_4', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr4_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr4_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr4_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr4_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_5', 'label' => 'Fila 5', 'name' => 'feature_row_5', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr5_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr5_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr5_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr5_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_6', 'label' => 'Fila 6', 'name' => 'feature_row_6', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr6_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr6_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr6_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr6_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_7', 'label' => 'Fila 7', 'name' => 'feature_row_7', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr7_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr7_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr7_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr7_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),
        array('key' => 'field_feature_row_8', 'label' => 'Fila 8', 'name' => 'feature_row_8', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_fr8_char','name'=>'characteristic','type'=>'text'), array('key'=>'field_fr8_v1','name'=>'value_1','type'=>'text'), array('key'=>'field_fr8_v2','name'=>'value_2','type'=>'text'), array('key'=>'field_fr8_v3','name'=>'value_3','type'=>'text')
        ), 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),

        array('key' => 'field_price_table_buttons', 'label' => 'Botones de la Tabla', 'name' => 'table_buttons', 'type' => 'group', 'sub_fields' => array(
            array('key'=>'field_btn_1_text','name'=>'btn_1_text','type'=>'text','default_value'=>'Solicitar Cotización'),
            array('key'=>'field_btn_1_url','name'=>'btn_1_url','type'=>'text'),
            array('key'=>'field_btn_2_text','name'=>'btn_2_text','type'=>'text','default_value'=>'Solicitar Cotización'),
            array('key'=>'field_btn_2_url','name'=>'btn_2_url','type'=>'text'),
            array('key'=>'field_btn_3_text','name'=>'btn_3_text','type'=>'text','default_value'=>'Solicitar Cotización'),
            array('key'=>'field_btn_3_url','name'=>'btn_3_url','type'=>'text'),
        ), 'layout' => 'table', 'conditional_logic' => array(array(array('field' => 'field_pricing_layout', 'operator' => '==', 'value' => 'table')))),

        array('key' => 'field_pricing_disclaimer', 'label' => 'Pricing Disclaimer', 'name' => 'pricing_disclaimer', 'type' => 'text'),

        array('key' => 'field_service_tab_faq', 'label' => 'FAQ', 'type' => 'tab'),
        array('key' => 'field_faq_title', 'label' => 'FAQ Title', 'name' => 'faq_title', 'type' => 'text'),
        array('key' => 'field_faq_subtitle', 'label' => 'FAQ Subtitle', 'name' => 'faq_subtitle', 'type' => 'textarea'),
        array('key' => 'field_faq_group_1', 'label' => 'FAQ 1', 'name' => 'faq_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_faq_question_1', 'name' => 'question', 'type' => 'text', 'label' => 'Question'),
            array('key' => 'field_faq_answer_1', 'name' => 'answer', 'type' => 'textarea', 'label' => 'Answer'),
        )),
        array('key' => 'field_faq_group_2', 'label' => 'FAQ 2', 'name' => 'faq_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_faq_question_2', 'name' => 'question', 'type' => 'text', 'label' => 'Question'),
            array('key' => 'field_faq_answer_2', 'name' => 'answer', 'type' => 'textarea', 'label' => 'Answer'),
        )),
        array('key' => 'field_faq_group_3', 'label' => 'FAQ 3', 'name' => 'faq_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_faq_question_3', 'name' => 'question', 'type' => 'text', 'label' => 'Question'),
            array('key' => 'field_faq_answer_3', 'name' => 'answer', 'type' => 'textarea', 'label' => 'Answer'),
        )),
        
        array('key' => 'field_service_tab_cta', 'label' => 'CTA', 'type' => 'tab'),
        array('key' => 'field_service_cta_title', 'label' => 'CTA Title', 'name' => 'service_cta_title', 'type' => 'text'),
        array('key' => 'field_service_cta_subtitle', 'label' => 'CTA Subtitle', 'name' => 'service_cta_subtitle', 'type' => 'textarea'),
        array('key' => 'field_service_cta_button_text', 'label' => 'Button Text', 'name' => 'service_cta_button_text', 'type' => 'text'),
        array('key' => 'field_service_cta_button_url', 'label' => 'Button URL', 'name' => 'service_cta_button_url', 'type' => 'text'),
    ),
    'location' => array(
        array(array('param' => 'page_template', 'operator' => '==', 'value' => 'template-servicios.php')),
    ),
    'style' => 'default',
    'hide_on_screen' => array('the_content'),
));

// Grupo de Campos para Link in Bio
acf_add_local_field_group(array(
    'key' => 'group_linkinbio_page',
    'title' => 'Link in Bio Settings',
    'fields' => array(
        array('key' => 'field_linkbio_pic', 'label' => 'Imagen de Perfil o Logo', 'name' => 'linkbio_pic', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_linkbio_title', 'label' => 'Título (ej. @tuusuario)', 'name' => 'linkbio_title', 'type' => 'text'),
        array('key' => 'field_linkbio_desc', 'label' => 'Descripción Corta', 'name' => 'linkbio_desc', 'type' => 'textarea'),
        array('key' => 'field_linkbio_tab_links', 'label' => 'Enlaces', 'type' => 'tab'),
        array('key' => 'field_linkbio_l1', 'label' => 'Enlace 1', 'name' => 'link_1', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l1_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l1_title','name'=>'title','type'=>'text'), array('key'=>'field_l1_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l2', 'label' => 'Enlace 2', 'name' => 'link_2', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l2_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l2_title','name'=>'title','type'=>'text'), array('key'=>'field_l2_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l3', 'label' => 'Enlace 3', 'name' => 'link_3', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l3_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l3_title','name'=>'title','type'=>'text'), array('key'=>'field_l3_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l4', 'label' => 'Enlace 4', 'name' => 'link_4', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l4_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l4_title','name'=>'title','type'=>'text'), array('key'=>'field_l4_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l5', 'label' => 'Enlace 5', 'name' => 'link_5', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l5_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l5_title','name'=>'title','type'=>'text'), array('key'=>'field_l5_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l6', 'label' => 'Enlace 6', 'name' => 'link_6', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l6_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l6_title','name'=>'title','type'=>'text'), array('key'=>'field_l6_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l7', 'label' => 'Enlace 7', 'name' => 'link_7', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l7_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l7_title','name'=>'title','type'=>'text'), array('key'=>'field_l7_url','name'=>'url','type'=>'text') )),
        array('key' => 'field_linkbio_l8', 'label' => 'Enlace 8', 'name' => 'link_8', 'type' => 'group', 'sub_fields' => array( array('key'=>'field_l8_icon','name'=>'icon_svg','type'=>'textarea'), array('key'=>'field_l8_title','name'=>'title','type'=>'text'), array('key'=>'field_l8_url','name'=>'url','type'=>'text') )),
    
        // Pestaña para Lead Magnets (ACTUALIZADO para múltiples)
        array('key' => 'field_linkbio_tab_leadmagnets', 'label' => 'Lead Magnets', 'type' => 'tab'),
        array('key' => 'field_lm_1', 'label' => 'Lead Magnet 1', 'name' => 'lead_magnet_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_lm1_active', 'label' => '¿Mostrar?', 'name' => 'show', 'type' => 'true_false', 'ui' => 1),
            array('key' => 'field_lm1_title', 'label' => 'Título', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_lm1_desc', 'label' => 'Descripción', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2),
            array('key' => 'field_lm1_image', 'label' => 'Imagen', 'name' => 'image', 'type' => 'image', 'return_format' => 'array'),
            array('key' => 'field_lm1_btn_text', 'label' => 'Texto Botón', 'name' => 'btn_text', 'type' => 'text'),
            array('key' => 'field_lm1_btn_url', 'label' => 'URL Botón', 'name' => 'btn_url', 'type' => 'text'),
        )),
        array('key' => 'field_lm_2', 'label' => 'Lead Magnet 2', 'name' => 'lead_magnet_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_lm2_active', 'label' => '¿Mostrar?', 'name' => 'show', 'type' => 'true_false', 'ui' => 1),
            array('key' => 'field_lm2_title', 'label' => 'Título', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_lm2_desc', 'label' => 'Descripción', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2),
            array('key' => 'field_lm2_image', 'label' => 'Imagen', 'name' => 'image', 'type' => 'image', 'return_format' => 'array'),
            array('key' => 'field_lm2_btn_text', 'label' => 'Texto Botón', 'name' => 'btn_text', 'type' => 'text'),
            array('key' => 'field_lm2_btn_url', 'label' => 'URL Botón', 'name' => 'btn_url', 'type' => 'text'),
        )),
        array('key' => 'field_lm_3', 'label' => 'Lead Magnet 3', 'name' => 'lead_magnet_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_lm3_active', 'label' => '¿Mostrar?', 'name' => 'show', 'type' => 'true_false', 'ui' => 1),
            array('key' => 'field_lm3_title', 'label' => 'Título', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_lm3_desc', 'label' => 'Descripción', 'name' => 'desc', 'type' => 'textarea', 'rows' => 2),
            array('key' => 'field_lm3_image', 'label' => 'Imagen', 'name' => 'image', 'type' => 'image', 'return_format' => 'array'),
            array('key' => 'field_lm3_btn_text', 'label' => 'Texto Botón', 'name' => 'btn_text', 'type' => 'text'),
            array('key' => 'field_lm3_btn_url', 'label' => 'URL Botón', 'name' => 'btn_url', 'type' => 'text'),
        )),
    
    ),
    'location' => array(
        array(array('param' => 'page_template', 'operator' => '==', 'value' => 'template-linkinbio.php')),
    ),
    'style' => 'default',
    'hide_on_screen' => array('the_content'),
));

// Grupo de Campos para el Footer
acf_add_local_field_group(array(
    'key' => 'group_footer_settings',
    'title' => 'Footer Settings',
    'fields' => array(
        array('key' => 'field_footer_tab_contact', 'label' => 'Info de Contacto', 'type' => 'tab'),
        array('key' => 'field_footer_about_text', 'label' => 'Texto "Sobre Nosotros"', 'name' => 'footer_about_text', 'type' => 'textarea'),
        array('key' => 'field_contact_email', 'label' => 'Email de Contacto', 'name' => 'contact_email', 'type' => 'email'),
        array('key' => 'field_contact_phone_display', 'label' => 'Teléfono (Visible)', 'name' => 'contact_phone_display', 'type' => 'text'),
        array('key' => 'field_contact_phone', 'label' => 'Teléfono (Enlace tel:)', 'name' => 'contact_phone', 'type' => 'text'),
        array('key' => 'field_contact_whatsapp_url', 'label' => 'URL de WhatsApp', 'name' => 'contact_whatsapp_url', 'type' => 'url'),
        array('key' => 'field_contact_address', 'label' => 'Dirección', 'name' => 'contact_address', 'type' => 'textarea'),

        array('key' => 'field_footer_tab_social', 'label' => 'Redes Sociales', 'type' => 'tab'),
        array('key' => 'field_social_1', 'label' => 'Red Social 1', 'name' => 'social_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_social_1_url', 'name' => 'url', 'type' => 'url'),
            array('key' => 'field_social_1_icon', 'name' => 'icon_svg', 'type' => 'textarea', 'label' => 'Icono (código SVG)'),
        )),
        array('key' => 'field_social_2', 'label' => 'Red Social 2', 'name' => 'social_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_social_2_url', 'name' => 'url', 'type' => 'url'),
            array('key' => 'field_social_2_icon', 'name' => 'icon_svg', 'type' => 'textarea', 'label' => 'Icono (código SVG)'),
        )),
        array('key' => 'field_social_3', 'label' => 'Red Social 3', 'name' => 'social_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_social_3_url', 'name' => 'url', 'type' => 'url'),
            array('key' => 'field_social_3_icon', 'name' => 'icon_svg', 'type' => 'textarea', 'label' => 'Icono (código SVG)'),
        )),
        array('key' => 'field_social_4', 'label' => 'Red Social 4', 'name' => 'social_4', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_social_4_url', 'name' => 'url', 'type' => 'url'),
            array('key' => 'field_social_4_icon', 'name' => 'icon_svg', 'type' => 'textarea', 'label' => 'Icono (código SVG)'),
        )),
        array('key' => 'field_social_5', 'label' => 'Red Social 5', 'name' => 'social_5', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_social_5_url', 'name' => 'url', 'type' => 'url'),
            array('key' => 'field_social_5_icon', 'name' => 'icon_svg', 'type' => 'textarea', 'label' => 'Icono (código SVG)'),
        )),

        array('key' => 'field_footer_tab_legal', 'label' => 'Legal', 'type' => 'tab'),
        array('key' => 'field_copyright_line_1', 'label' => 'Copyright Línea 1', 'name' => 'copyright_line_1', 'type' => 'text'),
        array('key' => 'field_copyright_line_2', 'label' => 'Copyright Línea 2', 'name' => 'copyright_line_2', 'type' => 'text'),
        array('key' => 'field_terms_url', 'label' => 'URL Términos de Servicio', 'name' => 'terms_url', 'type' => 'url'),
        array('key' => 'field_privacy_url', 'label' => 'URL Política de Privacidad', 'name' => 'privacy_url', 'type' => 'url'),
        array('key' => 'field_cookies_url', 'label' => 'Cookies Policy URL', 'name' => 'cookies_url', 'type' => 'url'),
        array('key' => 'field_disclaimer_url', 'label' => 'Disclaimer URL', 'name' => 'disclaimer_url', 'type' => 'url'),
        
        array('key' => 'field_footer_tab_cookies', 'label' => 'Cookie Banner', 'type' => 'tab'),
        array('key' => 'field_cookie_banner_text', 'label' => 'Texto del Banner de Cookies', 'name' => 'cookie_banner_text', 'type' => 'textarea'),
        array('key' => 'field_cookie_banner_button', 'label' => 'Texto del Botón', 'name' => 'cookie_banner_button_text', 'type' => 'text'),
    ),
    'location' => array(
        array(array('param' => 'page', 'operator' => '==', 'value' => get_page_by_title('Ajustes Globales') ? get_page_by_title('Ajustes Globales')->ID : 'options')),
    ),
    'style' => 'default',
));

// Grupo de Campos para la Página de Contacto
acf_add_local_field_group(array(
    'key' => 'group_contact_page_settings',
    'title' => 'Contact Page Settings',
    'fields' => array(
    array('key' => 'field_contact_tab_main', 'label' => 'Contenido Principal', 'type' => 'tab'),
        array('key' => 'field_contact_page_title', 'label' => 'Title', 'name' => 'contact_page_title', 'type' => 'text'),
        array('key' => 'field_contact_page_subtitle', 'label' => 'Subtitle', 'name' => 'contact_page_subtitle', 'type' => 'textarea'),
        array('key' => 'field_contact_form_title', 'label' => 'Form Title', 'name' => 'form_title', 'type' => 'text'),
        array('key' => 'field_contact_form_subtitle', 'label' => 'Form Subtitle', 'name' => 'form_subtitle', 'type' => 'text'),

        array('key' => 'field_contact_tab_channels', 'label' => 'Otros Canales', 'type' => 'tab'),
        array('key' => 'field_contact_channels_title', 'label' => 'Título de Canales', 'name' => 'contact_channels_title', 'type' => 'text', 'default_value' => 'Otros Canales de Contacto'),
        array('key' => 'field_contact_channels_subtitle', 'label' => 'Subtítulo de Canales', 'name' => 'contact_channels_subtitle', 'type' => 'text', 'default_value' => 'Si prefieres, también puedes encontrarnos aquí:'),
        array('key' => 'field_contact_page_email', 'label' => 'Email', 'name' => 'contact_page_email', 'type' => 'email'),
        array('key' => 'field_contact_page_phone_display', 'label' => 'Teléfono (Visible)', 'name' => 'contact_page_phone_display', 'type' => 'text'),
        array('key' => 'field_contact_page_phone_link', 'label' => 'Teléfono (Enlace tel:)', 'name' => 'contact_page_phone_link', 'type' => 'text'),
        array('key' => 'field_contact_page_whatsapp_text', 'label' => 'Texto de WhatsApp', 'name' => 'contact_page_whatsapp_text', 'type' => 'text'),
        array('key' => 'field_contact_page_whatsapp_url', 'label' => 'URL de WhatsApp', 'name' => 'contact_page_whatsapp_url', 'type' => 'url'),
    ),
    'location' => array(
        array(array('param' => 'page_template', 'operator' => '==', 'value' => 'template-contacto.php')),
    ),
    'style' => 'default',
    'hide_on_screen' => array('excerpt'),
));

// Grupo de Campos para Proyectos
acf_add_local_field_group(array(
    'key' => 'group_projects',
    'title' => 'Project Details',
    'fields' => array(
        array('key' => 'field_project_category','label' => 'Categoría del Proyecto','name' => 'project_category','type' => 'text'),
        array('key' => 'field_project_show_featured_in_modal', 'label' => '¿Mostrar Imagen Destacada en Modal?', 'name' => 'show_featured_in_modal', 'type' => 'true_false', 'default_value' => 1, 'ui' => 1),
        array('key' => 'field_project_tab_gallery', 'label' => 'Galería', 'type' => 'tab'),
        array('key' => 'field_project_image_1', 'label' => 'Imagen 1', 'name' => 'project_image_1', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_project_image_2', 'label' => 'Imagen 2', 'name' => 'project_image_2', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_project_image_3', 'label' => 'Imagen 3', 'name' => 'project_image_3', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_project_image_4', 'label' => 'Imagen 4', 'name' => 'project_image_4', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_project_image_5', 'label' => 'Imagen 5', 'name' => 'project_image_5', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_project_tab_outro', 'label' => 'Enlaces y Cierre', 'type' => 'tab'),
        array('key' => 'field_project_website_url', 'label' => 'Sitio Web del Cliente', 'name' => 'project_website_url', 'type' => 'url'),
        array('key' => 'field_project_instagram_url', 'label' => 'Instagram', 'name' => 'project_instagram_url', 'type' => 'url'),
        array('key' => 'field_project_facebook_url', 'label' => 'Facebook', 'name' => 'project_facebook_url', 'type' => 'url'),
        array('key' => 'field_project_outro_content', 'label' => 'Contenido Final Adicional', 'name' => 'project_outro_content', 'type' => 'wysiwyg', 'instructions' => 'Añade un texto de cierre o cualquier otra información relevante.', 'tabs' => 'visual', 'toolbar' => 'basic', 'media_upload' => 0),
    ),
    'location' => array(
        array(array('param' => 'post_type','operator' => '==','value' => 'project')),
    ),
    'position' => 'normal',
    'style' => 'default',
));

// Grupo de Campos para Página de Nosotros
acf_add_local_field_group(array('key' => 'group_about_page','title' => 'About Page Settings','fields' => array(
    array('key' => 'field_about_tab_header','label' => 'Header','type' => 'tab'),
    array('key' => 'field_about_title','name' => 'about_title','type' => 'text'),
    array('key' => 'field_about_subtitle','name' => 'about_subtitle','type' => 'textarea'),
    array('key' => 'field_about_tab_story','label' => 'Nuestra Historia','type' => 'tab'),
    array('key' => 'field_story_title','name' => 'story_title','type' => 'text'),
    array('key' => 'field_story_text_1','name' => 'story_text_1','type' => 'textarea'),
    array('key' => 'field_story_text_2','name' => 'story_text_2','type' => 'textarea'),
    array('key' => 'field_story_image','name' => 'story_image','type' => 'image','return_format' => 'array'),
    array('key' => 'field_about_tab_team','label' => 'Equipo','type' => 'tab'),
    array('key' => 'field_team_title','name' => 'team_title','type' => 'text'),
    array('key' => 'field_team_subtitle','name' => 'team_subtitle','type' => 'textarea'),
    array('key' => 'field_team_member_1','label' => 'Fundador 1','name' => 'team_member_1','type' => 'group','sub_fields' => array(
        array('key' => 'field_member_1_image','name' => 'image','type' => 'image','return_format' => 'array'),
        array('key' => 'field_member_1_name','name' => 'name','type' => 'text'),
        array('key' => 'field_member_1_title','name' => 'title','type' => 'text'),
        array('key' => 'field_member_1_desc','name' => 'description','type' => 'textarea'))),
    array('key' => 'field_team_member_2','label' => 'Fundador 2','name' => 'team_member_2','type' => 'group','sub_fields' => array(
        array('key' => 'field_member_2_image','name' => 'image','type' => 'image','return_format' => 'array'),
        array('key' => 'field_member_2_name','name' => 'name','type' => 'text'),
        array('key' => 'field_member_2_title','name' => 'title','type' => 'text'),
        array('key' => 'field_member_2_desc','name' => 'description','type' => 'textarea'))),
    array('key' => 'field_team_boss','label' => 'La Jefa','name' => 'the_boss','type' => 'group','sub_fields' => array(
        array('key' => 'field_boss_image','name' => 'image','type' => 'image','return_format' => 'array'),
        array('key' => 'field_boss_name','name' => 'name','type' => 'text'),
        array('key' => 'field_boss_title','name' => 'title','type' => 'text'),
        array('key' => 'field_boss_desc','name' => 'description','type' => 'textarea'))),

    array('key' => 'field_about_tab_philosophy','label' => 'Filosofía','type' => 'tab'),
        array('key' => 'field_philosophy_title','name' => 'philosophy_title','type' => 'text'),
        array('key' => 'field_philosophy_quote','name' => 'philosophy_quote','type' => 'textarea'),
    
        array('key' => 'field_philosophy_item_1','name' => 'philosophy_item_1','type' => 'group', 'sub_fields' => array(array('key'=>'fpi1_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi1_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi1_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
    	array('key' => 'field_philosophy_item_2','name' => 'philosophy_item_2','type' => 'group', 'sub_fields' => array(array('key'=>'fpi2_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi2_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi2_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
    	array('key' => 'field_philosophy_item_3','name' => 'philosophy_item_3','type' => 'group', 'sub_fields' => array(array('key'=>'fpi3_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi3_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi3_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
    	array('key' => 'field_philosophy_item_4','name' => 'philosophy_item_4','type' => 'group', 'sub_fields' => array(array('key'=>'fpi4_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi4_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi4_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
    	array('key' => 'field_philosophy_item_5','name' => 'philosophy_item_5','type' => 'group', 'sub_fields' => array(array('key'=>'fpi5_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi5_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi5_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
    	array('key' => 'field_philosophy_item_6','name' => 'philosophy_item_6','type' => 'group', 'sub_fields' => array(array('key'=>'fpi6_icon','name'=>'icon','type'=>'textarea','label' => 'SVG'),array('key'=>'fpi6_title','name'=>'title','type'=>'text','label' => 'Titulo'),array('key'=>'fpi6_desc','name'=>'description','type'=>'textarea','label' => 'Descripcion'))),
            
    array('key' => 'field_about_tab_specialties', 'label' => 'Especialidades', 'type' => 'tab'),
        array('key' => 'field_specialties_title', 'name' => 'specialties_title', 'type' => 'text', 'default_value' => 'Nos especializamos en:'),
        array('key' => 'field_specialty_1', 'label' => 'Especialidad 1', 'name' => 'specialty_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_spec1_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_spec1_text', 'name' => 'text', 'type' => 'text'),
        )),
        array('key' => 'field_specialty_2', 'label' => 'Especialidad 2', 'name' => 'specialty_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_spec2_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_spec2_text', 'name' => 'text', 'type' => 'text'),
        )),
        array('key' => 'field_specialty_3', 'label' => 'Especialidad 3', 'name' => 'specialty_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_spec3_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_spec3_text', 'name' => 'text', 'type' => 'text'),
        )),
        array('key' => 'field_specialty_4', 'label' => 'Especialidad 4', 'name' => 'specialty_4', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_spec4_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_spec4_text', 'name' => 'text', 'type' => 'text'),
        )),
        array('key' => 'field_specialties_paragraph', 'name' => 'specialties_paragraph', 'type' => 'textarea', 'label' => 'Párrafo Final'),
    
    array('key' => 'field_about_tab_cta', 'label' => 'CTA', 'type' => 'tab'),
        array('key' => 'field_about_cta_title', 'label' => 'CTA Title', 'name' => 'about_cta_title', 'type' => 'text'),
        array('key' => 'field_about_cta_subtitle', 'label' => 'CTA Subtitle', 'name' => 'about_cta_subtitle', 'type' => 'textarea'),
        array('key' => 'field_about_cta_button_text', 'label' => 'Button Text', 'name' => 'about_cta_button_text', 'type' => 'text'),
        array('key' => 'field_about_cta_button_url', 'label' => 'Button URL', 'name' => 'about_cta_button_url', 'type' => 'text'),
    ),                             
                                'location' => array(array(array('param' => 'page_template','operator' => '==','value' => 'template-nosotros.php')),),'style' => 'default','hide_on_screen' => array('the_content'),));

// Grupo de Campos para Landing Page
acf_add_local_field_group(array(
    'key' => 'group_landing_page_v2',
    'title' => 'Landing Page Settings',
    'fields' => array(
        array('key' => 'field_landing_v2_title', 'label' => 'Título Principal', 'name' => 'landing_title', 'type' => 'text'),
        array('key' => 'field_landing_v2_subtitle', 'label' => 'Subtítulo', 'name' => 'landing_subtitle', 'type' => 'textarea'),
        array('key' => 'field_landing_v2_image', 'label' => 'Imagen del Lead Magnet', 'name' => 'landing_image', 'type' => 'image', 'return_format' => 'array'),
        array('key' => 'field_landing_v2_benefit_1', 'label' => 'Beneficio 1', 'name' => 'benefit_1', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_landing_v2_benefit_1_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_landing_v2_benefit_1_title', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_landing_v2_benefit_1_desc', 'name' => 'description', 'type' => 'text'),
        )),
        array('key' => 'field_landing_v2_benefit_2', 'label' => 'Beneficio 2', 'name' => 'benefit_2', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_landing_v2_benefit_2_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_landing_v2_benefit_2_title', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_landing_v2_benefit_2_desc', 'name' => 'description', 'type' => 'text'),
        )),
        array('key' => 'field_landing_v2_benefit_3', 'label' => 'Beneficio 3', 'name' => 'benefit_3', 'type' => 'group', 'sub_fields' => array(
            array('key' => 'field_landing_v2_benefit_3_icon', 'name' => 'icon', 'type' => 'textarea', 'label' => 'Icono (SVG)'),
            array('key' => 'field_landing_v2_benefit_3_title', 'name' => 'title', 'type' => 'text'),
            array('key' => 'field_landing_v2_benefit_3_desc', 'name' => 'description', 'type' => 'text'),
        )),
        array('key' => 'field_landing_v2_form_title', 'label' => 'Título del Formulario', 'name' => 'landing_form_title', 'type' => 'text'),
        array('key' => 'field_landing_v2_form_subtitle', 'label' => 'Subtítulo del Formulario', 'name' => 'landing_form_subtitle', 'type' => 'text'),
    ),
    'location' => array(
        array(array('param' => 'page_template', 'operator' => '==', 'value' => 'template-landing.php')),
    ),
));

// Grupo de Campos para Página de Agradecimiento
acf_add_local_field_group(array(
    'key' => 'group_thank_you_page',
    'title' => 'Thank You Page Settings',
    'fields' => array(
        array('key' => 'field_thank_you_title', 'label' => 'Título', 'name' => 'thank_you_title', 'type' => 'text'),
        array('key' => 'field_thank_you_subtitle', 'label' => 'Subtítulo', 'name' => 'thank_you_subtitle', 'type' => 'textarea'),
        array('key' => 'field_thank_you_button_text', 'label' => 'Texto del Botón', 'name' => 'thank_you_button_text', 'type' => 'text'),
        array('key' => 'field_thank_you_button_url', 'label' => 'URL del Archivo', 'name' => 'thank_you_button_url', 'type' => 'file', 'return_format' => 'url'),
    ),
    'location' => array(
        array(array('param' => 'page_template', 'operator' => '==', 'value' => 'template-gracias.php')),
    ),
    'hide_on_screen' => array('the_content'),
));

// Grupo de Campos para Plantilla de Calculadora
acf_add_local_field_group(array(
    'key' => 'group_calculator_page_settings',
    'title' => 'Calculator Page Settings',
    'fields' => array(
        array(
            'key' => 'field_calculator_page_title',
            'label' => 'Title',
            'name' => 'calculator_page_title',
            'type' => 'text',
            'default_value' => 'Calculadora de Inversión Mínima Viable',
        ),
        array(
            'key' => 'field_calculator_page_subtitle',
            'label' => 'Subtitle',
            'name' => 'calculator_page_subtitle',
            'type' => 'textarea',
            'default_value' => 'Define tus objetivos y descubre la inversión necesaria para alcanzarlos.',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'template-calculadora.php',
            ),
        ),
    ),
    'style' => 'default',
    'hide_on_screen' => array('the_content'),
));

endif;