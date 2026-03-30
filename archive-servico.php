<?php
/**
 * Template para Archive de Serviços - J Filho Engenharia
 * Ajustado para alinhamento no topo e imagens quadradas.
 */

get_header(); ?>

<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/hero-carousel/hero-carousel-1.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php echo esc_html__('Serviços', 'jotafilho'); ?></h2>
            <ol>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><?php echo esc_html__('Serviços', 'jotafilho'); ?></li>
            </ol>
        </div>
    </div><?php
    // Query manual para garantir a entrega dos dados
    $args = array(
        'post_type'      => 'servico',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
    );
    
    $query_servicos = new WP_Query($args);

    if ($query_servicos->have_posts()) :
        $count = 0;
        while ($query_servicos->have_posts()) : $query_servicos->the_post();
            $count++;
            $is_even = ($count % 2 == 0);
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            // Fallback caso não tenha imagem de destaque
            if (!$image_url) {
                $image_url = get_template_directory_uri() . '/assets/img/obras/obra1_00034.jpg';
            }
    ?>

        <section id="servico-<?php the_ID(); ?>" class="alt-services <?php echo $is_even ? 'section-bg' : ''; ?>" style="padding: 100px 0; opacity: 1 !important; visibility: visible !important;">
            <div class="container">

                <div class="row justify-content-around gy-5">
                    
                    <?php if ($is_even) : ?>
                        <div class="col-lg-6">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid rounded shadow" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; display: block !important;">
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-5 d-flex flex-column justify-content-start pt-2">
                        <h3 class="mb-3" style="color: var(--color-secondary); font-weight: 700;"><?php the_title(); ?></h3>
                        
                        <div class="service-content mb-4" style="line-height: 1.6;">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Integração com ACF Repeater 'itens_do_servico'
                        if (function_exists('have_rows') && have_rows('itens_do_servico')) :
                            while (have_rows('itens_do_servico')) : the_row();
                                $item_titulo = get_sub_field('item_titulo');
                                $item_desc   = get_sub_field('item_descricao');
                                $item_icone  = get_sub_field('item_icone');
                        ?>
                                <div class="icon-box d-flex position-relative mb-4">
                                    <i class="<?php echo $item_icone ? esc_attr($item_icone) : 'bi bi-patch-check'; ?> flex-shrink-0 me-3" style="font-size: 28px; color: var(--color-primary);"></i>
                                    <div>
                                        <h4 style="font-size: 1.2rem; font-weight: 600; margin-bottom: 5px;"><?php echo esc_html($item_titulo); ?></h4>
                                        <p style="font-size: 0.95rem; color: #666;"><?php echo esc_html($item_desc); ?></p>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>

                    <?php if (!$is_even) : ?>
                        <div class="col-lg-6">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid rounded shadow" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; display: block !important;">
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </section>

    <?php
        endwhile;
        wp_reset_postdata();
    else :
        // Fallback caso não existam posts
        echo '<div class="container py-5 text-center"><p class="alert alert-info">Nenhum serviço cadastrado até ao momento.</p></div>';
    endif;
    ?>

</main>

<?php get_footer(); ?>