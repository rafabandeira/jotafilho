<?php get_header(); ?>

<section id="hero" class="hero">

    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-1.jpg)">
        </div>
        <div class="carousel-item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-2.jpg)"></div>
        <div class="carousel-item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-3.jpg)"></div>
        <div class="carousel-item" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-4.jpg)"></div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

    <div class="info d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2>Bem vindo a<br><span>J Filho Engenharia</span></h2>
                    <p>Atuamos na prestação de serviços de engenharia e soluções integradas para os
                        setores de Infraestrutura, Construção Civil e Urbanismo.</p>
                    <a href="#get-started" class="btn-get-started"><i
                            class="bi bi-chevron-double-down"></i></a>
                </div>
            </div>
        </div>
    </div>

</section><!-- End Hero Section -->

<main id="main">

    
    <?php get_template_part('inc/section', 'get-started'); ?>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-header">
                <h2>Serviços</h2>
                <p>Especialistas em infraestrutura sob condições complexas: terraplenagem de larga escala, drenagem profunda e pavimentação industrial</p>
            </div>

            <div class="row gy-4">

                <?php
                $servicos_query = new WP_Query([
                    'post_type' => 'servico',
                    'posts_per_page' => 4
                ]);
                if ($servicos_query->have_posts()) :
                    while ($servicos_query->have_posts()) : $servicos_query->the_post();
                ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item  position-relative">
                                <div class="icon"><i class="fa-solid fa-road"></i></div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="readmore stretched-link">saiba mais <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div><!-- End Service Item -->
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects">
        <div class="container">

            <div class="section-header">
                <h2>Projetos</h2>
                <p>Viabilizamos o ciclo completo da engenharia, da regularização do solo à pavimentação final, com foco absoluto em segurança e precisão técnica</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <div class="row gy-4 portfolio-container">

                    <?php
                    $projetos_query = new WP_Query([
                        'post_type' => 'projeto',
                        'posts_per_page' => -1
                    ]);
                    if ($projetos_query->have_posts()) :
                        while ($projetos_query->have_posts()) : $projetos_query->the_post();
                    ?>
                            <div class="col-lg-4 col-md-6 portfolio-item">
                                <div class="portfolio-content h-100">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/obras/default.jpg" class="img-fluid" alt="">
                                    <?php endif; ?>
                                    <div class="portfolio-info">
                                        <h4><?php the_title(); ?></h4>
                                        <p><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                                        <a href="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" title="<?php the_title(); ?>"
                                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                                                class="bi bi-zoom-in"></i></a>
                                        <a href="<?php the_permalink(); ?>" title="More Details" class="details-link"><i
                                                class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                            </div><!-- End Projects Item -->
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>

                </div><!-- End Projects Container -->

            </div>

        </div>
    </section><!-- End Our Projects Section -->

    <!-- ======= Clientes Section ======= -->
    <section id="clientes" class="projects section-bg" style="opacity: 1 !important; visibility: visible !important; padding: 50px 0;">
        <div class="container">

            <div class="section-header">
                <h2>Clientes</h2>
                <p>Atendemos pequenas, médias e grandes empresas com o mesmo padrão de excelência.</p>
            </div>

            <div class="row gy-4">
                <?php
                $args = [
                    'post_type'      => 'cliente',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC'
                ];

                $clientes_query = new WP_Query($args);

                if ($clientes_query->have_posts()) :
                    while ($clientes_query->have_posts()) : $clientes_query->the_post();
                        $logo_id = get_post_thumbnail_id();
                        $logo_url = wp_get_attachment_image_url($logo_id, 'full');
                        
                        if ($logo_url) : 
                ?>
                        <div class="col-lg-3 col-md-4 col-6">
                            <div class="portfolio-content shadow-sm bg-white p-4 rounded d-flex align-items-center justify-content-center" 
                                 style="min-height: 250px; opacity: 1 !important; visibility: visible !important; transition: all 0.3s ease;">
                                
                                <img src="<?php echo esc_url($logo_url); ?>" class="img-fluid" alt="<?php the_title_attribute(); ?>" >
                                     
                            </div>
                        </div>
                <?php 
                        endif;
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p class="text-center">Nenhum cliente encontrado.</p>';
                endif;
                ?>
            </div>

        </div>
    </section><!-- End Clientes Section -->

</main><!-- End #main -->

<?php get_footer(); ?>