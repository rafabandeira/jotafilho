<?php
/**
 * The template for displaying single posts of 'servico' CPT.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jotafilho
 */

get_header(); ?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/hero-carousel/hero-carousel-1.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php the_title(); ?></h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link('servico'); ?>">Serviços</a></li>
                <li><?php the_title(); ?></li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>

            <!-- ======= Alt Services Section ======= -->
            <section id="alt-services" class="alt-services">
                <div class="container">

                    <div class="row justify-content-around gy-4">

                        <div class="col-lg-5 d-flex flex-column justify-content-center">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>

                        <?php if ($image_url): ?>
                            <div class="col-lg-6 img-bg" style="background-image: url(<?php echo $image_url; ?>);"></div>
                        <?php endif; ?>

                    </div>

                </div>
            </section><!-- End Alt Services Section -->

            <?php
        endwhile;
    endif;
    ?>

</main><!-- End #main -->

<?php get_footer(); ?>