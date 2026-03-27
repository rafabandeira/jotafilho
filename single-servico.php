<?php get_header(); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-1.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2><?php the_title(); ?></h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>Serviços</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <?php if (have_posts()):
        while (have_posts()):
            the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
            <!-- ======= Alt Services Section ======= -->
            <section id="alt-services-<?php the_ID(); ?>" class="alt-services">
                <div class="container" data-aos="fade-up">

                    <div class="row justify-content-around gy-4">
                        <div class="col-lg-5 d-flex flex-column justify-content-center">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>

                            <?php
                            // Loop para sub-itens via ACF (se você cadastrou como post_imagem_1, etc.)
                            // Ou se quiser manter os exemplos do HTML fixos, eu deixo aqui:
                            ?>
                            <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-easel flex-shrink-0"></i>
                                <div>
                                    <h4><a href="" class="stretched-link">Drenagem</a></h4>
                                    <p>Reconhecimento e delimitação da área afetada...</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <!-- Outros icon-boxes seguindo o seu layout... -->

                        </div>

                        <div class="col-lg-6 img-bg" style="background-image: url(<?php echo $image_url; ?>);"
                            data-aos="zoom-in" data-aos-delay="100"></div>
                    </div>

                </div>
            </section>
        <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>