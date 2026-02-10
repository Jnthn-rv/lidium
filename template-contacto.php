<?php
/*
Template Name: Contact Page Template
*/
get_header(); 
?>

    <main>
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]"><?php the_field('contact_page_title'); ?></h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-700"><?php the_field('contact_page_subtitle'); ?></p>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-16 items-start max-w-6xl mx-auto">
                    <!-- Form Side -->
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                        <h2 class="text-2xl font-bold text-[#481262]"><?php the_field('form_title'); ?></h2>
                        <p class="mt-2 text-gray-600 mb-8"><?php the_field('form_subtitle'); ?></p>
                        
                        <?php
                        // El shortcode del formulario se inserta aquí desde el editor de WordPress
                        if ( have_posts() ) : while ( have_posts() ) : the_post();
                            echo do_shortcode( get_the_content() );
                        endwhile; endif;
                        ?>
                    </div>
                    
                    <!-- Info Side -->
                    <div class="pt-8">
                        <h3 class="text-2xl font-bold text-[#481262]"><?php the_field('contact_channels_title'); ?></h3>
                        <p class="mt-2 text-gray-600 mb-8"><?php the_field('contact_channels_subtitle'); ?></p>
                        <div class="space-y-4">
                            <!-- Email -->
                            <?php if( get_field('contact_page_email') ): ?>
                            <a href="mailto:<?php the_field('contact_page_email'); ?>" class="flex items-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-[#7732a8] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                <span class="text-gray-700 font-medium"><?php the_field('contact_page_email'); ?></span>
                            </a>
                            <?php endif; ?>
                            <!-- Phone -->
                            <?php if( get_field('contact_page_phone_link') ): ?>
                            <a href="tel:<?php the_field('contact_page_phone_link'); ?>" class="flex items-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-200">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-[#7732a8] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                <span class="text-gray-700 font-medium"><?php the_field('contact_page_phone_display'); ?></span>
                            </a>
                            <?php endif; ?>
                            <!-- WhatsApp -->
                            <?php if( get_field('contact_page_whatsapp_url') ): ?>
                             <a href="<?php the_field('contact_page_whatsapp_url'); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-4 text-[#7732a8] flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.894 11.892-1.99 0-3.903-.52-5.586-1.457l-6.354 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01s-.521.074-.792.372c-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                <span class="text-gray-700 font-medium"><?php the_field('contact_page_whatsapp_text'); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

