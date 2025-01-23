<?php
/**
 * Various theme functionalities.
 *
 * @package Yamaha
 */

 function mytheme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Socialna omrežja', 'mytheme' ),
        'id'            => 'main-sidebar',
        'description'   => __( 'Widgets in this area will be shown on the sidebar.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer drugi stolpec', 'mytheme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this area will be shown on the sidebar.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer tretji stolpec', 'mytheme' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets in this area will be shown on the sidebar.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer četrti stolpec', 'mytheme' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets in this area will be shown on the sidebar.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'mytheme_widgets_init' );