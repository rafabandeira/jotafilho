<?php
/**
 * The template for displaying archive pages for 'servico' CPT.
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
            <h2>Serviços</h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li>Serviços</li>
            </ol>
        </div>
    </div><!-- End Breadcrumbs -->

    <?php
    $count = 0;
    if (have_posts()) :
        while (have_posts()) : the_post();
            $count++;
            $is_even = ($count % 2 == 0);
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            if (!$image_url) {
                $image_url = get_template_directory_uri() . '/assets/img/obras/obra1_00034.jpg'; // Fallback
            }
    ?>

            <!-- ======= Alt Services Section ======= -->
            <section id="servico-<?php the_ID(); ?>" class="alt-services <?php echo $is_even ? 'section-bg' : ''; ?>">
                <div class="container">

                    <div class="row justify-content-around gy-4">
                        
                        <?php if ($is_even) : ?>
                            <!-- Image on Left for even items -->
                            <div class="col-lg-6 img-bg" style="background-image: url(<?php echo $image_url; ?>);"></div>
                        <?php endif; ?>

                        <div class="col-lg-5 d-flex flex-column justify-content-center">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>

                            <?php
                            // Se estiver usando ACF para sub-itens
                            if (function_exists('have_rows') && have_rows('itens_do_servico')) :
                                while (have_rows('itens_do_servico')) : the_row();
                                    $item_titulo = get_sub_field('item_titulo');
                                    $item_desc = get_sub_field('item_descricao');
                                    $item_icone = get_sub_field('item_icone');
                            ?>
                                    <div class="icon-box d-flex position-relative">
                                        <i class="<?php echo $item_icone ? esc_attr($item_icone) : 'bi bi-patch-check'; ?> flex-shrink-0"></i>
                                        <div>
                                            <h4><a href="" class="stretched-link"><?php echo esc_html($item_titulo); ?></a></h4>
                                            <p><?php echo esc_html($item_desc); ?></p>
                                        </div>
                                    </div><!-- End Icon Box -->
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>

                        <?php if (!$is_even) : ?>
                            <!-- Image on Right for odd items -->
                            <div class="col-lg-6 img-bg" style="background-image: url(<?php echo $image_url; ?>);"></div>
                        <?php endif; ?>

                    </div>

                </div>
            </section><!-- End Alt Services Section -->

    <?php
        endwhile;
        the_posts_navigation();
    else :
        echo '<div class="container py-5 text-center"><p>Nenhum serviço encontrado.</p></div>';
    endif;
    ?>

</main><!-- End #main -->

<?php get_footer(); ?>
