<?php
get_header();
?>

<div class="container" role="main">
    <div class="row">
        <div class="col-12">

            <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content();?>
            <?php endwhile; ?>
            
        </div>
    </div>
</div>

<?php
get_footer();