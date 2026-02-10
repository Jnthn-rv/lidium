<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <!-- Article Header -->
    <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
        <div class="container mx-auto px-6 max-w-3xl text-center">
            <?php 
            $blog_page_url = get_permalink( get_option( 'page_for_posts' ) );
            if ($blog_page_url):
            ?>
            <a href="<?php echo esc_url($blog_page_url); ?>" class="text-sm font-semibold text-[#7732a8] hover:text-[#481262]">‹ Volver al Blog</a>
            <?php endif; ?>
            <div class="mt-4 text-sm font-bold uppercase text-[#7732a8]">
                <?php the_category(', '); ?>
            </div>
            <h1 class="text-3xl md:text-5xl font-extrabold text-[#481262] mt-2"><?php the_title(); ?></h1>
            <div class="mt-6 flex justify-center items-center text-sm text-gray-500">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', 'Autor', array('class' => 'h-10 w-10 rounded-full') ); ?>
                <div class="ml-3 text-left">
                    <p class="font-semibold text-gray-800">Por <?php the_author(); ?></p>
                    <p>Publicado <?php echo get_the_date(); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Article Body -->
    <article class="py-20">
        <div class="container mx-auto px-6 max-w-3xl">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="w-full overflow-hidden rounded-xl shadow-lg mb-12">
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto">
                </div>
            <?php endif; ?>

            <div class="prose lg:prose-xl max-w-none mx-auto text-gray-700">
                <?php the_content(); ?>
            </div>

            <!-- Share Buttons -->
            <div class="mt-16 pt-8 border-t border-gray-200 text-center">
                <p class="font-bold text-gray-800 mb-4">¡Comparte este artículo!</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="text-gray-500 hover:text-[#7732a8] transition-colors" aria-label="Share on X">
                        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="text-gray-500 hover:text-[#7732a8] transition-colors" aria-label="Share on Facebook"><svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" class="text-gray-500 hover:text-[#7732a8] transition-colors" aria-label="Share on LinkedIn"><svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                </div>
            </div>
        </article>

    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>

