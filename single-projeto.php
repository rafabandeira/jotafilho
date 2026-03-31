<?php
/**
 * Template para exibição de um Projeto Individual
 * Correção de proporção da imagem e layout de texto em largura total
 */

get_header(); ?>

<main id="main">

    <div class="breadcrumbs d-flex align-items-center"
        style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">
            <h2><?php the_title(); ?></h2>
            <ol>
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo get_post_type_archive_link('projeto'); ?>">Projetos</a></li>
                <li><?php the_title(); ?></li>
            </ol>
        </div>
    </div>

    <section id="project-details" class="project-details">
        <div class="container">

            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>

                    <div class="row gy-4">

                        <div class="col-lg-8">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">
                                    <?php
                                    $galeria = get_field('galeria_projeto');
                                    if ($galeria):
                                        foreach ($galeria as $imagem): ?>
                                            <div class="swiper-slide">
                                                <img src="<?php echo esc_url($imagem['url']); ?>"
                                                    alt="<?php echo esc_attr($imagem['alt']); ?>" class="img-fluid rounded"
                                                    style="width: 100%; height: auto; object-fit: contain;">
                                            </div>
                                        <?php endforeach;
                                    else: ?>
                                        <div class="swiper-slide">
                                            <?php if (has_post_thumbnail()):
                                                the_post_thumbnail('full', [
                                                    'class' => 'img-fluid rounded',
                                                    'style' => 'width: 100%; height: auto;'
                                                ]);
                                            endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="portfolio-info">
                                <h3>Informações do projeto</h3>
                                <ul>
                                    <?php
                                    $categoria = get_field('projeto_categoria');
                                    $cliente = get_field('projeto_cliente');
                                    $data = get_field('projeto_data');
                                    $url = get_field('projeto_url');
                                    ?>
                                    <li><strong>Categoria</strong> <span>
                                            <?php echo $categoria ? esc_html($categoria) : 'Construção Civil'; ?>
                                        </span></li>
                                    <li><strong>Cliente</strong> <span>
                                            <?php echo $cliente ? esc_html($cliente) : 'J Filho Engenharia'; ?>
                                        </span></li>
                                    <li><strong>Data do projeto</strong> <span>
                                            <?php echo $data ? esc_html($data) : get_the_date(); ?>
                                        </span></li>
                                    <li><strong>URL do projeto</strong> <a href="<?php echo $url ? esc_url($url) : '#'; ?>">
                                            <?php echo $url ? esc_url($url) : 'Privado'; ?>
                                        </a></li>
                                    <li><a href="<?php echo $url ? esc_url($url) : '#'; ?>"
                                            class="btn-visit align-self-start">Visitar Site</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="portfolio-description">
                                <h2>Descrição Detalhada</h2>
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endwhile; endif; ?>

        </div>
    </section>
</main>

<?php get_footer(); ?>