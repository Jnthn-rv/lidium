<?php
/*
Template Name: About Page Template
*/
get_header(); 
?>

    <main>
        <!-- Page Header -->
        <section class="bg-gray-100 pt-32 pb-16 md:pt-40 md:pb-24">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#481262]"><?php the_field('about_title'); ?></h1>
                <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-700"><?php the_field('about_subtitle'); ?></p>
            </div>
        </section>

        <!-- Our Story Section -->
        <section class="py-20">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-2 gap-16 items-center max-w-6xl mx-auto">
                    <div class="prose max-w-none text-gray-700">
                        <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('story_title'); ?></h2>
                        <p><?php the_field('story_text_1'); ?></p>
                        <p><?php the_field('story_text_2'); ?></p>
                    </div>
                    <div>
                        <?php $story_image = get_field('story_image'); if($story_image): ?>
                        <img src="<?php echo esc_url($story_image['url']); ?>" alt="<?php echo esc_attr($story_image['alt']); ?>" class="rounded-xl shadow-lg w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('team_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-xl mx-auto"><?php the_field('team_subtitle'); ?></p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-4xl mx-auto">
                    <?php $member1 = get_field('team_member_1'); if($member1): ?>
                    <div class="text-center">
                        <img src="<?php echo esc_url($member1['image']['url']); ?>" alt="<?php echo esc_attr($member1['image']['alt']); ?>" class="w-48 h-48 mx-auto rounded-full shadow-lg">
                        <h3 class="mt-6 text-xl font-bold text-[#481262]"><?php echo $member1['name']; ?></h3>
                        <p class="text-[#7732a8] font-semibold"><?php echo $member1['title']; ?></p>
                        <p class="mt-2 text-gray-600 max-w-xs mx-auto"><?php echo $member1['description']; ?></p>
                    </div>
                    <?php endif; ?>
                     <?php $member2 = get_field('team_member_2'); if($member2): ?>
                     <div class="text-center">
                        <img src="<?php echo esc_url($member2['image']['url']); ?>" alt="<?php echo esc_attr($member2['image']['alt']); ?>" class="w-48 h-48 mx-auto rounded-full shadow-lg">
                        <h3 class="mt-6 text-xl font-bold text-[#481262]"><?php echo $member2['name']; ?></h3>
                        <p class="text-[#7732a8] font-semibold"><?php echo $member2['title']; ?></p>
                        <p class="mt-2 text-gray-600 max-w-xs mx-auto"><?php echo $member2['description']; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <?php $boss = get_field('the_boss'); if($boss): ?>
                <div class="mt-20 text-center border-t border-gray-300 pt-12 max-w-lg mx-auto">
                    <img src="<?php echo esc_url($boss['image']['url']); ?>" alt="<?php echo esc_attr($boss['image']['alt']); ?>" class="w-32 h-32 mx-auto rounded-full shadow-lg">
                    <h3 class="mt-6 text-xl font-bold text-[#481262]"><?php echo $boss['name']; ?></h3>
                    <p class="text-[#7732a8] font-semibold"><?php echo $boss['title']; ?></p>
                    <p class="mt-2 text-sm text-gray-600 max-w-xs mx-auto"><?php echo $boss['description']; ?></p>
                </div>
                <?php endif; ?>
            </div>
        </section>

        <!-- Philosophy Section -->
        <section class="py-20">
             <div class="container mx-auto px-6">
                 <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-[#481262]"><?php the_field('philosophy_title'); ?></h2>
                    <p class="mt-4 text-gray-700 max-w-2xl mx-auto italic"><?php echo get_field('philosophy_quote'); ?></p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-12 max-w-6xl mx-auto">
                   <?php for($i = 1; $i <= 6; $i++): 
                        $item = get_field('philosophy_item_' . $i);
                        if( $item && !empty($item['title']) ):
                    ?>
                   <div class="text-center p-4">
                       <div class="flex justify-center mb-4 h-12 w-12 mx-auto text-[#7732a8]"><?php echo $item['icon']; ?></div>
                       <h3 class="text-2xl font-bold text-[#481262]"><?php echo $item['title']; ?></h3>
                       <p class="mt-2 text-gray-600"><?php echo $item['description']; ?></p>
                   </div>
                   <?php endif; endfor; ?>
               </div>
            </div>
        </section>
        
        <!-- Specialties Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#481262]"><?php the_field('specialties_title'); ?></h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4 max-w-2xl mx-auto">
                    <?php 
                    for ($i = 1; $i <= 4; $i++):
                        $specialty = get_field('specialty_' . $i);
                        if( $specialty && !empty($specialty['text']) ): 
                    ?>
                    <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 flex items-center">
                        <div class="flex-shrink-0 text-green-500">
                            <?php echo $specialty['icon']; ?>
                        </div>
                        <p class="ml-4 text-lg font-semibold text-gray-800"><?php echo esc_html($specialty['text']); ?></p>
                    </div>
                    <?php 
                        endif;
                    endfor; 
                    ?>
                </div>
                <p class="mt-12 text-lg text-gray-600 max-w-3xl mx-auto text-center"><?php the_field('specialties_paragraph'); ?></p>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-gradient text-white">
            <div class="container mx-auto px-6 py-20 text-center">
                <h2 class="text-3xl md:text-4xl font-bold"><?php the_field('about_cta_title'); ?></h2>
                <p class="mt-4 max-w-2xl mx-auto text-lg opacity-90"><?php the_field('about_cta_subtitle'); ?></p>
                <div class="mt-8">
                    <a href="<?php the_field('about_cta_button_url'); ?>" class="bg-white text-[#481262] font-bold px-8 py-4 rounded-lg hover:bg-gray-200 transition-all text-lg">
                        <?php the_field('about_cta_button_text'); ?>
                    </a>
                </div>
            </div>
        </section>
        
    </main>

<?php get_footer(); ?>
