<?php
/**
 * Template para Archive de Projetos - J Filho Engenharia
 * Baseado no padrão de sucesso do archive-servico.
 */

get_header(); ?>

<main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php echo esc_html__('Nossos Projetos', 'jotafilho'); ?></h2>
            <ol>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><?php echo esc_html__('Projetos', 'jotafilho'); ?></li>
            </ol>
        </div>
    </div><?php
    // Query para Projetos
    $args = array(
        'post_type'      => 'projeto',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC'
    );
    
    $query_projetos = new WP_Query($args);

    if ($query_projetos->have_posts()) :
        $count = 0;
        while ($query_projetos->have_posts()) : $query_projetos->the_post();
            $count++;
            $is_even = ($count % 2 == 0);
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            // Fallback para Projetos
            if (!$image_url) {
                $image_url = get_template_directory_uri() . '/assets/img/projects/construction-1.jpg';
            }
    ?>

        <section id="projeto-<?php the_ID(); ?>" class="alt-services <?php echo $is_even ? 'section-bg' : ''; ?>" style="padding: 100px 0; opacity: 1 !important; visibility: visible !important;">
            <div class="container">

                <div class="row justify-content-around gy-5">
                    
                    <?php if ($is_even) : ?>
                        <div class="col-lg-6">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid rounded shadow" style="width: 100%; aspect-ratio: 1 / 1; object-fit: cover; display: block !important;">
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-5 d-flex flex-column justify-content-start">
                        <h3 class="mb-4" style="color: var(--color-secondary); font-weight: 700; font-size: 2.2rem;"><?php the_title(); ?></h3>
                        
                        <div class="project-content mb-4" style="line-height: 1.8; color: #444;">
                            <?php the_content(); ?>
                        </div>

                        <div class="mt-3">
                            <a href="<?php the_permalink(); ?>" class="btn-get-started" style="background: var(--color-primary); color: #fff; padding: 12px 30px; border-radius: 4px; text-decoration: none; display: inline-block;">Ver Detalhes do Projeto</a>
                        </div>
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
        echo '<div class="container py-5 text-center"><p class="alert alert-info">Nenhum projeto cadastrado no momento.</p></div>';
    endif;
    ?>

</main>

<?php get_footer(); ?>