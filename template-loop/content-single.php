<?php
/**
 * Template for displaying single posts
 *
 * @package Yamaha
 */



?>


<article id="post-<?php the_ID(); ?>" <?php post_class('content-single'); ?>>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">                


                <!-- Post Meta -->
                <div class="entry-meta mb-3 text-muted">
					<div class="d-flex justify-content-between align-items-center">

					<div class="meta">

					<span class="post-date me-3">
                        <i class="fa fa-calendar-alt"></i>
                        <?php echo get_the_date(); ?>
                    </span>
                    <span class="post-author">
                        <i class="fa fa-user"></i>
                        <?php the_author(); ?>
                    </span>

					</div>

					<a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary">
						<i class="fa fa-arrow-left me-2"></i>Vse novice
					</a>

					</div>           
                </div>

                <!-- Post Content -->
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</article>


		




			