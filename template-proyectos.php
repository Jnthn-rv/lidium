<?php
/*
Template Name: Projects Page Template
*/
get_header(); 
?>

    <main>
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]"><?php the_field('project_page_title'); ?></h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-700"><?php the_field('project_page_subtitle'); ?></p>
            </div>
        </section>

        <!-- Projects Grid -->
        <section class="py-20">
            <div id="project-grid" class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => -1,
                    );
                    $projects_query = new WP_Query( $args );
                    if ( $projects_query->have_posts() ) :
                        while ( $projects_query->have_posts() ) : $projects_query->the_post();
                            // Preparamos la galería para los data attributes
                            $gallery_urls = [];
                            for ($i = 1; $i <= 5; $i++) {
                                $image = get_field('project_image_' . $i);
                                if ($image) {
                                    $gallery_urls[] = $image['url'];
                                }
                            }
                            // Obtenemos el valor del interruptor (si no existe, asumimos true por compatibilidad)
                            $show_featured = get_field('show_featured_in_modal');
                            if ($show_featured === null) $show_featured = true;
                    ?>
                    <div class="project-card group block bg-white rounded-xl shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 cursor-pointer"
                        data-title="<?php echo esc_attr(get_the_title()); ?>"
                        data-category="<?php echo esc_attr(get_field('project_category')); ?>"
                        data-featured-image="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                        data-content="<?php echo esc_attr(get_the_content()); ?>"
                        data-gallery="<?php echo esc_attr(json_encode($gallery_urls)); ?>"
                        data-website-url="<?php echo esc_url(get_field('project_website_url')); ?>"
                        data-instagram-url="<?php echo esc_url(get_field('project_instagram_url')); ?>"
                        data-facebook-url="<?php echo esc_url(get_field('project_facebook_url')); ?>"
                        data-outro="<?php echo esc_attr(get_field('project_outro_content')); ?>">
                        
                        <div class="relative">
                            <?php if(has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="w-full h-80 object-cover">
                            <?php else: ?>
                                <img src="https://placehold.co/600x800/e0e0e0/481262?text=LIDIUM" alt="<?php the_title(); ?>" class="w-full h-80 object-cover">
                            <?php endif; ?>

                            <!-- Overlay que aparece al hacer hover -->
                            <div class="project-info-overlay absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition-all duration-300 flex flex-col items-center justify-center text-center p-4">
                                <h3 class="text-2xl font-bold text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300"><?php the_title(); ?></h3>
                                <p class="text-sm font-semibold uppercase text-gray-200 tracking-wider mt-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300"><?php the_field('project_category'); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </section>
        
    </main>

    <!-- Project Modal -->
    <div id="project-modal" class="project-modal fixed inset-0 bg-black bg-opacity-70 z-[100] flex items-center justify-center p-4 hidden">
        <div id="modal-content" class="bg-white w-full max-w-6xl h-[90vh] rounded-2xl overflow-y-auto relative shadow-2xl">
            <button id="close-modal-btn" class="sticky top-4 right-4 z-10 float-right bg-white rounded-full p-2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <div id="modal-body" class="p-8 md:p-5">
                <!-- Content will be injected here by JavaScript -->
            </div>
        </div>
    </div>

<?php get_footer(); ?>

