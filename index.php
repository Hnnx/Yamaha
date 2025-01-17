<?php get_header(); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <!-- Year Filter Form -->
            <form method="GET" class="mb-4 w-50">
                <label for="year-filter" class="form-label">Filtriraj po letu:</label>
                <select name="year" id="year-filter" class="form-select" onchange="this.form.submit()">
                    <option value="">Vse objave</option>
                    <?php 
                    // Get all years of published posts
                    $years = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY year DESC");
                    foreach ($years as $year) {
                        $selected = (isset($_GET['year']) && $_GET['year'] == $year->year) ? 'selected' : '';
                        echo '<option value="' . $year->year . '" ' . $selected . '>' . $year->year . '</option>';
                    }
                    ?>
                </select>
            </form>

            <?php if (have_posts()) :?>
                <div class="layout-grid-4">

                <?php while (have_posts()) : the_post();?>
                
                <?php
                     if (isset($_GET['year']) && $_GET['year'] != '' && get_the_date('Y') != $_GET['year']) {
                        continue;
                    }
                    get_template_part('template-loop/content', get_post_type());
                    ?>

                <?php endwhile; ?>

                </div>

                    

            <!-- Pagination -->
            <div class="pagination">
                <?php 
                the_posts_pagination(array(
                    'prev_text' => 'Prejšnja',
                    'next_text' => 'Naslednja',
                    'before_page_number' => '<span class="screen-reader-text">Stran</span>',
                ));
                ?>
            </div>
            
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
