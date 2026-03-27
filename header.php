<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="<?php echo home_url(); ?>" class="logo d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">
            </a>
            <nav id="navbar" class="navbar">
                <?php wp_nav_menu(['theme_location' => 'main-menu', 'container' => false]); ?>
            </nav>
        </div>
    </header>