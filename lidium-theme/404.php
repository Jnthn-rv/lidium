<?php get_header(); ?>

    <main class="flex flex-col min-h-screen">
        <!-- 404 Content Section -->
        <section class="flex-grow flex items-center justify-center text-center py-20">
            <div class="container mx-auto px-6">
                <p class="text-9xl font-extrabold text-[#7732a8] opacity-50">404</p>
                <h1 class="text-4xl md:text-5xl font-bold text-[#481262] mt-4">Página No Encontrada</h1>
                <p class="mt-4 max-w-lg mx-auto text-lg text-gray-700">Ups... Parece que te has perdido. La página que buscas no existe o ha sido movida.</p>
                <div class="mt-10">
                    <a href="<?php echo home_url(); ?>" class="bg-[#7732a8] text-white font-semibold px-8 py-3 rounded-lg hover:bg-[#481262] transition-all shadow-lg">
                        Volver al Inicio
                    </a>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>

