<?php

$data = get_field('test_ride','options');

?>

<div class="colophon my-13" style="background:url('<?= $data['background']['url'] ;?>') center/cover no-repeat">
    <div class="container">

    <div class="row">
        <div class="col-12 col-lg-6">
            <div id="test-ride" class="test-ride-wrapper my-6 text-white position-relative">
                    <h1> <?php echo $data['title'];?> </h1>

                    <h4 class="fw-light my-3 lh-lg"> <?php echo $data['content'];?> </h4>

                    <form method="GET" action="<?php echo esc_url(site_url('/testna-voznja/')); ?>">

                    <input type="hidden" name="test-ride" value="<?php echo get_the_ID(); ?>">

                    <button type="submit" class="btn btn-primary mt-3">Prijavi se</button>
                    </form>
            </div>
        </div>
    </div>
    </div>

</div>
