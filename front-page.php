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
                <p>Identificar as melhores soluções e atender cada demanda de forma personalizada são nossos
                    diferenciais.</p>
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
                <h2>Obras</h2>
                <p>Elabora e viabiliza projetos adotando técnicas de engenharia e gerenciamento em todo o ciclo
                    produtivo</p>
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
    <section id="clientes" class="projects section-bg">
        <div class="container">

            <div class="section-header">
                <h2>Clientes</h2>
                <p>Atendemos pequenas, médias e grandes empresas com o mesmo padrão de excelência e preços super
                    competitivos.</p>
            </div>

            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                <div class="row gy-4 portfolio-container">

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-01.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-02.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-03.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-04.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-05.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-06.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item">
                        <div class="portfolio-content h-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/clientes/clientes-07.jpg" class="img-fluid" alt="">
                        </div>
                    </div><!-- End Clientes Item -->

                </div><!-- End Projects Container -->

            </div>

        </div>
    </section><!-- End Clientes Section -->

</main><!-- End #main -->

<?php get_footer(); ?>