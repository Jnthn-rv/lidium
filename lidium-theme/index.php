<?php get_header(); ?>

    <main>
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]">Desde Nuestro Blog</h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-700">Ideas, estrategias y reflexiones sobre el mundo del diseño, la tecnología y el marketing digital.</p>
            </div>
        </section>

        <!-- Blog Posts Section -->
        <section class="py-20">
            <div class="container mx-auto px-6">
                
                <?php
                // Query for the Featured Post (the latest one)
                $featured_post_query = new WP_Query( 'posts_per_page=1' );
                if ( $featured_post_query->have_posts() ) :
                    while ( $featured_post_query->have_posts() ) : $featured_post_query->the_post();
                ?>
                <!-- Featured Post -->
                <div class="group md:grid md:grid-cols-2 gap-8 lg:gap-12 items-center mb-16">
                    <a href="<?php the_permalink(); ?>" class="block overflow-hidden rounded-xl">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <?php else: ?>
                            <img src="https://placehold.co/800x600/7732a8/fcfcfc?text=Artículo+Destacado" alt="Imagen de artículo destacado" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <?php endif; ?>
                    </a>
                    <div>
                        <p class="text-sm font-bold uppercase text-[#7732a8]"><?php the_category(', '); ?></p>
                        <h2 class="mt-2 text-3xl font-bold text-[#481262] transition-colors">
                             <a href="<?php the_permalink(); ?>" class="group-hover:text-[#7732a8]"><?php the_title(); ?></a>
                        </h2>
                        <div class="mt-4 text-gray-600">
                           <?php the_excerpt(); ?>
                        </div>
                        <div class="mt-6 flex items-center text-sm text-gray-500">
                            <span>Por <?php the_author(); ?></span>
                            <span class="mx-2">&bull;</span>
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

                <!-- Posts Grid (Uses the main query, modified by pre_get_posts) -->
                <?php if ( have_posts() ) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <div class="group flex flex-col bg-white rounded-xl shadow-md overflow-hidden transform hover:-translate-y-2 transition-transform duration-300">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-56 object-cover">
                                <?php else : ?>
                                     <img src="https://placehold.co/600x400/cccccc/1f1f1f?text=LIDIUM" alt="Imagen de artículo" class="w-full h-56 object-cover">
                                <?php endif; ?>
                            </a>
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="text-sm font-bold uppercase text-[#7732a8]"><?php the_category(', '); ?></p>
                                <h3 class="mt-1 text-xl font-bold text-[#481262] transition-colors flex-grow">
                                    <a href="<?php the_permalink(); ?>" class="group-hover:text-[#7732a8]"><?php the_title(); ?></a>
                                </h3>
                                <p class="mt-2 text-gray-600 text-sm"><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
                            </div>
                        </div>
                    <?php 
                        endwhile;
                    ?>
                </div>
                
                <!-- Pagination -->
                <div class="mt-16">
                    <div class="pagination-container">
                        <?php
                            the_posts_pagination( array(
                                'prev_text' => __(''),
                                'next_text' => __('Siguiente →'),
                                'type'     => 'list',
                            ) );
                        ?>
                    </div>
                </div>

                <?php 
                else : 
                ?>
                    <p class="text-center text-lg text-gray-600">No se encontraron más artículos.</p>
                <?php endif; ?>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-gradient text-white">
            <div class="container mx-auto px-6 py-20 text-center">
                <h2 class="text-3xl md:text-4xl font-bold">¿Tienes un proyecto en mente?</h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg opacity-90">Hablemos de cómo podemos ayudarte a alcanzar tus objetivos. Nos encantaría ser parte de tu próximo gran proyecto.</p>
                <div class="mt-8">
                    <a href="/contacto" class="bg-white text-[#481262] font-bold px-8 py-4 rounded-lg hover:bg-gray-200 transition-all text-lg">
                        Contáctanos Ahora
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

