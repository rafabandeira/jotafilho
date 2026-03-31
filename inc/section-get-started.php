<?php
/**
 * Template part for displaying the Get Started (Quem Somos) section
 * Gerenciado via Options API - Padrão BandeiraGroup
 */

// Recuperação dos dados com os textos originais como Fallback
$gs_title = get_option('jf_gs_title', 'Nossos valores');

// Missão
$gs_missao_title = get_option('jf_gs_missao_title', 'Missão');
$gs_missao_text = get_option('jf_gs_missao_text', 'Ser reconhecida como centro de excelência em todas as suas atividades.');

// Visão
$gs_visao_title = get_option('jf_gs_visao_title', 'Visão');
$gs_visao_text = get_option('jf_gs_visao_text', "Fornecer aos nossos clientes soluções modernas e objetivas que agreguem valor ao projeto contratado.\nAtuar em prol da satisfação dos clientes.\nPromover atividades de alto padrão tecnológico.\nGerar resultados que criem vantagem competitiva aos clientes.");

// Valores
$gs_valores_title = get_option('jf_gs_valores_title', 'Valores');
$gs_valores_text = get_option('jf_gs_valores_text', "Os clientes são a nossa razão de ser.\nExcelência no serviço prestado.\nEstabelecer alianças eficazes e duradouras com nossos fornecedores e empresas associadas.\nZelar pela imagem da empresa através de uma atuação ética, coerente e transparente em nossos relacionamentos.");
?>

<section id="get-started" class="get-started">
    <div class="container">
        <div class="row justify-content-between gy-4">

            <div class="col-lg-6 d-flex align-items-center">
                <div class="content">
                    <h3><?php echo esc_html($gs_title); ?></h3>

                    <br>
                    <h4><?php echo esc_html($gs_missao_title); ?></h4>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html($gs_missao_text); ?></span>
                        </li>
                    </ul>

                    <br>
                    <h4><?php echo esc_html($gs_visao_title); ?></h4>
                    <ul>
                        <?php
                        $visao_items = explode("\n", $gs_visao_text);
                        foreach ($visao_items as $item):
                            if (trim($item)): ?>
                                <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html(trim($item)); ?></span></li>
                            <?php endif; endforeach; ?>
                    </ul>

                    <br>
                    <h4><?php echo esc_html($gs_valores_title); ?></h4>
                    <ul>
                        <?php
                        $valores_items = explode("\n", $gs_valores_text);
                        foreach ($valores_items as $item):
                            if (trim($item)): ?>
                                <li><i class="bi bi-check-circle"></i> <span><?php echo esc_html(trim($item)); ?></span></li>
                            <?php endif; endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-lg-5">
                <form action="<?php echo esc_url(admin_url('admin-ajax.php')); ?>" method="post"
                    class="php-email-form-wp">
                    <h3>Mande uma mensagem</h3>
                    <p>Preencha os dados abaixo e entraremos em contato rapidamente.</p>

                    <?php wp_nonce_field('jf_contact_form', 'jf_contact_nonce'); ?>
                    <input type="hidden" name="action" value="enviar_contato">

                    <div class="row gy-3">
                        <div class="col-md-12">
                            <input type="text" name="name" class="form-control" placeholder="Nome" required>
                        </div>
                        <div class="col-md-12">
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
                            <div class="loading" style="display:none;">Enviando...</div>
                            <div class="error-message"
                                style="display:none; color:#fff; background:#df1529; padding:15px; margin-bottom:15px;">
                            </div>
                            <div class="sent-message"
                                style="display:none; color:#fff; background:#059652; padding:15px; margin-bottom:15px;">
                                Sua mensagem foi enviada com sucesso!</div>
                            <button type="submit" class="btn-enviar-custom">Enviar mensagem</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>