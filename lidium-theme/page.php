<?php get_header(); ?>

    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]"><?php the_title(); ?></h1>
            </div>
        </section>

        <!-- Page Content -->
        <article class="py-20">
            <div class="container mx-auto px-6 max-w-3xl">
                <div class="prose lg:prose-lg max-w-none text-gray-700">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>

        <?php endwhile; endif; ?>
    </main>

<?php get_footer(); ?>

