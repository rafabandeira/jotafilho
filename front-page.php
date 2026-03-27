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

    <!-- ======= Get Started Section ======= -->
    <section id="get-started" class="get-started ">
        <div class="container">

            <div class="row justify-content-between gy-4">

                <div class="col-lg-6 d-flex align-items-center">
                    <div class="content">
                        <h3>Nossos valores</h3>
                        <br>
                        <h4>Missão</h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Ser reconhecida como centro de excelência em
                                    todas as suas atividades.</span></li>
                        </ul>
                        <br>
                        <h4>Visão</h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Fornecer aos nossos clientes soluções modernas
                                    e objetivas que agreguem valor ao projeto contratado.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Atuar em prol da satisfação dos
                                    clientes.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Promover atividades de alto padrão
                                    tecnológico.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Gerar resultados que criem vantagem competitiva
                                    aos clientes.</span></li>
                        </ul>
                        <br>
                        <h4>Valores</h4>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Os clientes são a nossa razão de ser.</span>
                            </li>
                            <li><i class="bi bi-check-circle"></i> <span>Excelência no serviço prestado.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Estabelecer alianças eficazes e duradouras com
                                    nossos fornecedores e empresas associadas.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Zelar pela imagem da empresa através de uma
                                    atuação ética, coerente e transparente em nossos relacionamentos.</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <form action="forms/quote.php" method="post" class="php-email-form">
                        <h3>Mande uma mensagem</h3>
                        <p>Aqui você nos envia um email de maneira rápida e fácil, basta preencher como seu nome, email,
                            celular e mensagem.</p>
                        <div class="row gy-3">

                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Nome" required>
                            </div>

                            <div class="col-md-12 ">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="phone" placeholder="Celular" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Mensagem"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Enviando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Sua mensagem foi enviada com sucesso. Obrigado, entraremos em
                                    contato!</div>

                                <button type="submit">Enviar mensagem</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Quote Form -->

            </div>

        </div>
    </section><!-- End Get Started Section -->

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