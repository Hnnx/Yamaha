<?php
/**
 * Default header - must include wp_head in <head> tags.
 * right after the opening <body> tag include wp_body_open
 *
 * @package Yamaha
 */

?>

<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://kit.fontawesome.com/deb1eca09a.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="body">

    <?php wp_body_open(); ?>

    <div id="search-wrapper" class="d-print-none pt-md-9 pt-5 px-md-6 pb-md-3 w-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-bar position-relative bg-white p-2 rounded-4">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="page" class="site">

        <header id="header" class="site-header">

            <div class="mobile-nav shadow-lg d-flex justify-content-between align-items-center position-fixed d-md-none p-2">
                <?php echo get_custom_logo();?>
                <div class="text-end" id="burger">
                    <i class="fa-solid fa-bars" aria-hidden="true"></i>
                </div>
            </div>

            <div id="nav" class="nav-wrapper bg-white">
                <div class="container-fluid px-md-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex flex-column align-items-center flex-md-row gap-5 py-3">
                                
                                <?php if ( has_custom_logo() ) : ?>
                                    <div class="desktop-logo d-none d-md-block">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex gap-3">
                                    <nav id="site-navigation" class="d-flex flex-column flex-md-row align-items-center gap-4">

                                        <?php get_template_part( 'partials/menu','aux' ) ;?>

                                        <?php wp_nav_menu(
                                            array(
                                                'theme_location'  => 'menu-main',
                                                'container_id'    => 'navbar',
                                                'menu_id'         => 'main-menu',
                                                'container_class'  => 'top-menu',
                                                'menu_class'      => 'navbar-nav align-items-center flex-column flex-md-row gap-4',
                                                'fallback_cb'     => '',
                                            )
                                        ); ?>
                                    </nav>

                                </div>

                                <div class="d-flex ms-md-auto align-items-center gap-3">
                                    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
                                        <div id="main-sidebar-area" class="widget-area">
                                            <?php dynamic_sidebar( 'main-sidebar' ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(is_front_page()){
                get_template_part( 'partials/header', 'hero');
            } elseif(is_archive()){
                get_template_part( 'partials/header', 'archive');
            } elseif(is_singular('parts')) {
                // get_template_part( 'partials/header', 'archive');
            }
            else {
                get_template_part( 'partials/header', 'single');

            }?>


        </header>

        <div id="site-content" role="main">