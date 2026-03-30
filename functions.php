<?php
if (!defined('ABSPATH'))
    exit;

// Forçar ativação das Imagens de Destaque
add_theme_support('post-thumbnails');

// Suporte básico do tema
function jotafilho_setup()
{
    add_theme_support('title-tag');
    register_nav_menus(['main-menu' => 'Menu Principal']);
}
add_action('after_setup_theme', 'jotafilho_setup');

// Carregamento de CSS e JS
function jotafilho_enqueue_assets()
{
    $uri = get_template_directory_uri();

    // CSS
    wp_enqueue_style('bootstrap', $uri . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', $uri . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('fontawesome', $uri . '/assets/vendor/fontawesome-free/css/all.min.css');
    wp_enqueue_style('aos', $uri . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('main-style', $uri . '/assets/css/main.css');

    // JS
    // AJUSTE 1: Forçar o carregamento do jQuery nativo do WordPress
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap', $uri . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array('jquery'), null, true);
    wp_enqueue_script('aos', $uri . '/assets/vendor/aos/aos.js', array('jquery'), null, true);
    wp_enqueue_script('isotope', $uri . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array('jquery'), null, true);

    // AJUSTE 2: Definir que o main.js depende do jquery
    wp_enqueue_script('main-js', $uri . '/assets/js/main.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'jotafilho_enqueue_assets');

// Registro dos CPTs
function jotafilho_cpts()
{
    register_post_type('projeto', [
        'labels' => ['name' => 'Projetos', 'singular_name' => 'Projeto'],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'projetos'],
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ]);

    register_post_type('servico', [
        'labels' => ['name' => 'Serviços', 'singular_name' => 'Serviço'],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'servicos'],
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ]);

    // AJUSTE 3: Adicionado 'publicly_queryable' e 'query_var' para garantir que o WP encontre os posts
    register_post_type('cliente', [
        'labels' => [
            'name' => 'Clientes',
            'singular_name' => 'Cliente',
            'menu_name' => 'Clientes',
            'add_new' => 'Adicionar Novo',
            'add_new_item' => 'Adicionar Novo Cliente',
        ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'jotafilho_cpts');

/**
 * Registro de todas as opções da Home (Gerenciar Home)
 */
function jf_register_settings()
{
    $settings = [
        'jf_gs_title',
        'jf_gs_missao_title',
        'jf_gs_missao_text',
        'jf_gs_visao_title',
        'jf_gs_visao_text',
        'jf_gs_valores_title',
        'jf_gs_valores_text'
    ];
    foreach ($settings as $setting) {
        register_setting('jf_home_group', $setting);
    }
}
add_action('admin_init', 'jf_register_settings');

function jf_create_menu()
{
    add_menu_page('Gerenciar Home', 'Gerenciar Home', 'manage_options', 'jf-home-settings', 'jf_home_page_html', 'dashicons-admin-home', 2);
}
add_action('admin_menu', 'jf_create_menu');

function jf_home_page_html()
{
    ?>
    <div class="wrap">
        <h1>Gerenciar Seção: Quem Somos / Valores</h1>
        <hr>
        <form method="post" action="options.php">
            <?php settings_fields('jf_home_group'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Título da Seção</th>
                    <td><input type="text" name="jf_gs_title"
                            value="<?php echo esc_attr(get_option('jf_gs_title', 'Nossos valores')); ?>"
                            class="regular-text"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>Missão</h2>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Título Missão</th>
                    <td><input type="text" name="jf_gs_missao_title"
                            value="<?php echo esc_attr(get_option('jf_gs_missao_title', 'Missão')); ?>"
                            class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Texto Missão</th>
                    <td><textarea name="jf_gs_missao_text" rows="3"
                            class="large-text"><?php echo esc_textarea(get_option('jf_gs_missao_text', 'Ser reconhecida como centro de excelência em todas as suas atividades.')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>Visão</h2>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Título Visão</th>
                    <td><input type="text" name="jf_gs_visao_title"
                            value="<?php echo esc_attr(get_option('jf_gs_visao_title', 'Visão')); ?>" class="regular-text">
                    </td>
                </tr>
                <tr>
                    <th scope="row">Itens da Visão (um por linha)</th>
                    <td><textarea name="jf_gs_visao_text" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('jf_gs_visao_text', "Fornecer aos nossos clientes soluções modernas e objetivas que agreguem valor ao projeto contratado.\nAtuar em prol da satisfação dos clientes.\nPromover atividades de alto padrão tecnológico.\nGerar resultados que criem vantagem competitiva aos clientes.")); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>Valores</h2>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Título Valores</th>
                    <td><input type="text" name="jf_gs_valores_title"
                            value="<?php echo esc_attr(get_option('jf_gs_valores_title', 'Valores')); ?>"
                            class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Itens dos Valores (um por linha)</th>
                    <td><textarea name="jf_gs_valores_text" rows="5"
                            class="large-text"><?php echo esc_textarea(get_option('jf_gs_valores_text', "Os clientes são a nossa razão de ser.\nExcelência no serviço prestado.\nEstabelecer alianças eficazes e duradouras com nossos fornecedores e empresas associadas.\nZelar pela imagem da empresa através de uma atuação ética, coerente e transparente em nossos relacionamentos.")); ?></textarea>
                    </td>
                </tr>
            </table>
            <?php submit_button('Salvar Alterações'); ?>
        </form>
    </div>
    <?php
}

/**
 * Processamento de Formulário de Contato via AJAX
 */
function jf_processar_contato()
{
    if (!isset($_POST['jf_contact_nonce']) || !wp_verify_nonce($_POST['jf_contact_nonce'], 'jf_contact_form')) {
        wp_send_json_error('Falha na verificação de segurança.');
    }

    $nome = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $mensagem = sanitize_textarea_field($_POST['message']);

    $to = get_option('admin_email');
    $subject = 'Novo Contato: ' . $nome;
    $body = "Nome: $nome \nE-mail: $email \nTelefone: $phone \n\nMensagem: \n$mensagem";
    $headers = ['Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $nome . ' <' . $email . '>'];

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success('Mensagem enviada com sucesso!');
    } else {
        wp_send_json_error('Erro ao enviar e-mail. Verifique o servidor SMTP.');
    }
}
add_action('wp_ajax_enviar_contato', 'jf_processar_contato');
add_action('wp_ajax_nopriv_enviar_contato', 'jf_processar_contato');