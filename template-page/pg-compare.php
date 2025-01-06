<?php
/**
 * Template Name: Primerjalnik
 * 
 * @package Yamaha
 */

get_header();
?>

<div id="content" tabindex="-1">

	<main class="site-main" id="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-2 p-0" style="margin-top: 253px;">

					<table>

						<tr><th> <b>TIP AGREGATA</b> </th></tr>
						<tr><td><?php echo isset($specifikacije['prostornina']) ? esc_html($specifikacije['prostornina']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['vrtina_x_gib']) ? esc_html($specifikacije['vrtina_x_gib']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['kompresijsko_razmerje']) ? esc_html($specifikacije['kompresijsko_razmerje']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['maksimalna_moc']) ? esc_html($specifikacije['maksimalna_moc']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['maksimalen_navor']) ? esc_html($specifikacije['maksimalen_navor']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['sistem_podmazovanja']) ? esc_html($specifikacije['sistem_podmazovanja']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['tip_sklopke']) ? esc_html($specifikacije['tip_sklopke']) : ' / '; ?></td></tr>
						<tr><td><?php echo isset($specifikacije['sistem_vziga']) ? esc_html($specifikacije['sistem_vziga']) : ' / '; ?></td></tr>

					</table>
				</div>
				<div class="col-12 col-lg-10 p-0">
					<div class="layout-grid-4">

					<div class="compare-item">
						<?php get_template_part('partials/partial', 'compare', ['unique_id' => 'compare_1']); ?>
					</div>
					<div class="compare-item">
						<?php get_template_part('partials/partial', 'compare', ['unique_id' => 'compare_2']); ?>
					</div>
					<div class="compare-item">
						<?php get_template_part('partials/partial', 'compare', ['unique_id' => 'compare_3']); ?>
					</div>
					<div class="compare-item">
						<?php get_template_part('partials/partial', 'compare', ['unique_id' => 'compare_4']); ?>
					</div>

					</div>
				</div>
			</div>
		</div>
	</main>

</div>

<?php get_footer();