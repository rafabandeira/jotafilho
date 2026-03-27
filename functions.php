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

// Carregamento de CSS e JS originais (Assets que subiste)
function jotafilho_enqueue_assets()
{
    $uri = get_template_directory_uri();

    // CSS
    wp_enqueue_style('bootstrap', $uri . '/assets/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', $uri . '/assets/vendor/bootstrap-icons/bootstrap-icons.css');
    wp_enqueue_style('fontawesome', $uri . '/assets/vendor/fontawesome-free/css/all.min.css');
    wp_enqueue_style('aos', $uri . '/assets/vendor/aos/aos.css');
    wp_enqueue_style('main-style', $uri . '/assets/css/main.css');

    // JS no footer para velocidade
    wp_enqueue_script('bootstrap', $uri . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('aos', $uri . '/assets/vendor/aos/aos.js', [], null, true);
    wp_enqueue_script('isotope', $uri . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', [], null, true);
    wp_enqueue_script('main-js', $uri . '/assets/js/main.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'jotafilho_enqueue_assets');

// Registo dos tipos de dados (Projetos e Serviços)
function jotafilho_cpts()
{
    register_post_type('projeto', [
        'labels' => ['name' => 'Projetos', 'singular_name' => 'Projeto'],
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ]);
    register_post_type('servico', [
        'labels' => ['name' => 'Serviços', 'singular_name' => 'Serviço'],
        'public' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ]);
}
add_action('init', 'jotafilho_cpts');