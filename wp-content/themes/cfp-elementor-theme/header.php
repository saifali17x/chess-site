<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'cfp-elementor-theme'); ?></a>

    <!-- Header -->
    <header id="masthead" class="header site-header">
        <nav class="navbar">
            <div class="container">
                <div class="nav-brand">
                    <?php if (has_custom_logo()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                            <?php the_custom_logo(); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-chess.jpg" alt="<?php bloginfo('name'); ?>" class="logo-img">
                            <div class="logo-text">
                                <h1><?php bloginfo('name'); ?></h1>
                                <span><?php bloginfo('description'); ?></span>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="nav-menu" id="nav-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'nav-list',
                        'container' => false,
                        'fallback_cb' => 'cfp_fallback_menu',
                    ));
                    ?>
                </div>

                <div class="nav-toggle" id="nav-toggle">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>
    </header>

    <div id="content" class="site-content">
