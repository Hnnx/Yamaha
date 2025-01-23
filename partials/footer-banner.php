<?php 
/**
 * 
 *  Get pinned posts
 */

 ?>

 <div class="py-6 px-3 colophon" style="background:url('<?= get_static_dir().'/img/footer.webp';?>') center/cover no-repeat">

    <div class="layout-grid-4 position-relative">


           <!-- MENI  -->
        <div class="text-white text-center">
            <div class="heading">
            <i class="fa-solid fa-compass"></i> <h1>Meni</h1>
            <hr>
            </div>
            <div class="content d-flex flex-column">
                <?php get_template_part( 'partials/menu','footer' ) ;?>
            </div>
        </div>

        <!-- Urnik  -->
        <div class="text-white text-center">
            <div class="heading">
            <i class="fa-solid fa-clock"></i> <h1>Urnik</h1>
                <hr>
            </div>
            <div class="content d-flex flex-column">
                <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>						
                    <?php dynamic_sidebar( 'footer-1' ); ?>						
                <?php endif; ?>
            </div>
        </div>

        <!-- KONTAKT -->
        <div class="text-white text-center">
            
            <div class="heading">
                <i class="fa-solid fa-phone-volume"></i> <h1>Kontakt</h1>
                <hr>
            </div>
            <div class="content">
                <?php if ( is_active_sidebar( 'footer-2' ) ) : ?>						
                    <?php dynamic_sidebar( 'footer-2' ); ?>						
                <?php endif; ?>
            </div>

        </div>

        <!-- NASLOV -->

        <div class="text-white text-center">
            <div class="heading">
                <i class="fa-solid fa-location-dot"></i> <h1>Naslov</h1>
                <hr>
            </div>
            <div class="content">
                <?php if ( is_active_sidebar( 'footer-3' ) ) : ?>						
                    <?php dynamic_sidebar( 'footer-3' ); ?>						
                <?php endif; ?>
            </div>
        </div>
        
    </div>

 </div>


