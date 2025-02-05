<?php 
/**
 * 
 *  Online Shop + Service CTA
 */

 $footer_data = get_field('footer_data', 'options');

?>

<div class="container mt-13 footer-cta-wrapper">
    <div class="row gap-md-0 gap-4">
        <div class="col-12 col-lg-6">

            <div class="footer-cta text-white shadow rounded-1 d-block" style="background:url('<?php echo $footer_data['servis_slika'] ;?>') center/cover no-repeat">
                <div class="cta-content p-3 p-md-4">
                    <p> <?php echo $footer_data['servis_text'] ?? ''; ?></p>
                    <a href="<?php echo $footer_data['servis_povezava'] ?? '';?>" class="btn btn-primary d-block fit-content mt-5">
                        Naroči se
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">

        <div class="footer-cta text-white shadow rounded-1 d-block" style="background:url('<?php echo $footer_data['prodaja_slika'] ;?>') center/cover no-repeat">
                <div class="cta-content p-3 p-md-4">
                    <p> <?php echo $footer_data['prodaja_text'] ?? ''; ?></p>
                    <a href="<?php echo $footer_data['prodaja_povezava'] ?? '';?>" class="btn btn-primary d-block fit-content mt-5">
                        Preglej ponudbo
                    </a>
                </div>
            </div>

            
        </div>
    </div>
</div>
