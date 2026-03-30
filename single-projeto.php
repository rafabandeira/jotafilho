<?php
/**
 * Template para exibição de um Projeto Individual
 * Baseado no layout project-details.html
 */

get_header(); ?>

<main id="main">

    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php the_title(); ?></h2>
            <ol>
                <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link('projeto'); ?>">Projetos</a></li>
                <li><?php the_title(); ?></li>
            </ol>
        </div>
    </div>
    <section id="project-details" class="project-details" style="padding: 100px 0;">
        <div class="container">

            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <div class="position-relative h-100">
                        <div class="slides-1 portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">

                                <?php
                                // Verifica se existe uma galeria do ACF chamada 'galeria_projeto'
                                $galeria = get_field('galeria_projeto');
                                if ($galeria):
                                    foreach ($galeria as $imagem): ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo esc_url($imagem['url']); ?>"
                                                alt="<?php echo esc_attr($imagem['alt']); ?>"
                                                style="width: 100%; aspect-ratio: 16 / 9; object-fit: cover;">
                                        </div>
                                    <?php endforeach;
                                else:
                                    // Se não houver galeria, exibe apenas a imagem destacada
                                    if (has_post_thumbnail()): ?>
                                        <div class="swiper-slide">
                                            <?php the_post_thumbnail('full', ['style' => 'width: 100%; aspect-ratio: 16 / 9; object-fit: cover;']); ?>
                                        </div>
                                    <?php endif;
                                endif; ?>

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
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="portfolio-info">
                                <h3>Informações</h3>
                                <ul>
                                    <?php
                                    // Campos personalizados do ACF para a barra lateral
                                    $categoria = get_field('projeto_categoria');
                                    $cliente = get_field('projeto_cliente');
                                    $data = get_field('projeto_data');
                                    $url = get_field('projeto_url');
                                    ?>
                                    <li><strong>Categoria</strong>
                                        <span><?php echo $categoria ? esc_html($categoria) : 'Construção Civil'; ?></span>
                                    </li>
                                    <li><strong>Cliente</strong>
                                        <span><?php echo $cliente ? esc_html($cliente) : 'J Filho'; ?></span>
                                    </li>
                                    <li><strong>Data do projeto</strong>
                                        <span><?php echo $data ? esc_html($data) : get_the_date(); ?></span>
                                    </li>
                                    <li><strong>URL do projeto</strong> <a
                                            href="<?php echo $url ? esc_url($url) : '#'; ?>"><?php echo $url ? 'www.exemplo.com' : 'Privado'; ?></a>
                                    </li>
                                    <li><a href="<?php echo get_post_type_archive_link('projeto'); ?>"
                                            class="btn-visit align-self-start">Voltar para Projetos</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                <?php endwhile; endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>