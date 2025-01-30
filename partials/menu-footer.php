<?php footer_helper_menu('Prodajni program', 'vehicle-type');?>
<?php footer_helper_menu('Oprema', 'equipment');?>
<?php footer_helper_menu('Nadomestni deli', 'parts-type');?>

<?php wp_nav_menu(
    array(
        'theme_location'  => 'menu-main',
        'container_id'    => 'navbar',
        'menu_id'         => 'footer-menu',
        'container_class'  => 'footer-menu',
        'menu_class'      => 'navbar-nav align-items-center flex-column',
        'fallback_cb'     => '',
    )
); ?>