<?php
/**
 * The template for displaying single posts of 'projeto' CPT.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jotafilho
 */

get_header(); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-1.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php the_title(); ?></h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>Detalhes do Projeto</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Pegar imagens anexadas ou do ACF
            $featured_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            // Sugestão: Se você quiser mais fotos no slider, use um campo de galeria do ACF chamado 'galeria_do_projeto'
            $galeria = function_exists('get_field') ? get_field('galeria_do_projeto') : false;
    ?>

            <!-- ======= Project Details Section ======= -->
            <section id="project-details" class="project-details">
                <div class="container">

                    <div class="position-relative h-100">
                        <div class="slides-1 portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <?php if ($featured_img) : ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $featured_img; ?>" alt="">
                                    </div>
                                <?php endif; ?>

                                <?php 
                                if ($galeria) :
                                    foreach ($galeria as $image) :
                                ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        </div>
                                <?php 
                                    endforeach;
                                endif; 
                                ?>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>

                    </div>

                    <div class="row justify-content-between gy-4 mt-4">

                        <div class="col-lg-8">
                            <div class="portfolio-description">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="portfolio-info">
                                <h3>Informações do Projeto</h3>
                                <ul>
                                    <li><strong>Categoria</strong> <span><?php echo get_post_type_labels(get_post_type_object('projeto'))->singular_name; ?></span></li>
                                    <li><strong>Cliente</strong> <span><?php echo function_exists('get_field') ? get_field('cliente_projeto') : 'J Filho Engenharia'; ?></span></li>
                                    <li><strong>Data do projeto</strong> <span><?php the_date(); ?></span></li>
                                    <li><strong>Local</strong> <span><?php echo function_exists('get_field') ? get_field('local_projeto') : 'Salvador / BA'; ?></span></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Projet Details Section -->

    <?php
        endwhile;
    endif;
    ?>

</main><!-- End #main -->

<?php get_footer(); ?>
