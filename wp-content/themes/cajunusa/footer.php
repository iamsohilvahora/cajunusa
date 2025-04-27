<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cajunusa
 */

$footer_logo = get_field('footer_logo','options')['sizes']['footer_logo_image_size'];
$address = get_field('address','options');
$phone_number = get_field('phone_number','options');
$fax_number = get_field('fax_number','options');
$toll_free_number = get_field('toll_free_number','options');
$social_media_links = get_field('social_media_link','options');
$cajun_industries_corporate = get_field('cajun_industries_corporate','options');
$download_brochure = get_field('download_brochure','options');

?>

	<footer class="footer">
		<div class="container">
			<div class="footer-inner">
				<?php if(!empty($footer_logo)): ?>
				<div class="logo-footer footer-block">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo $footer_logo; ?>">
					</a>
				</div>
				<?php endif; ?>

				<div class="footer-menu footer-block">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
					?>
				</div>

				<div class="address footer-block">
					<address>
						<p>Address</p>					
						<?php if(!empty($address)): ?>
						<?php echo $address;
						endif; ?>
						<ul class="contact-detail">
							<?php if(!empty($phone_number)): 
								$replace = array('(', ')');
								$phone_number = str_replace($replace , '', $phone_number);
							?>
							<li>Ph: <a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li>
							<?php endif;
							if(!empty($fax_number)): ?>
							<li>Fx: <a href="fax:<?php echo $fax_number; ?>"><?php echo $fax_number; ?></a></li>
							<?php endif;
							if(!empty($toll_free_number)): ?>
							<li>TF: <a href="tel:<?php echo $toll_free_number; ?>"><?php echo $toll_free_number; ?></a></li>
							<?php endif; ?>
						</ul>
					
					</address>
				</div>
				<div class="social footer-block">
					<?php if(!empty($social_media_links)): ?>
					<div class="socila-icon-section">
						<ul>
							<?php foreach($social_media_links as $social_link): 
								$social_icon = $social_link['social_icon']['url'];
								$social_link = $social_link['social_link'];
							
							if(!empty($social_link) && !empty($social_icon)): ?>
							<li>
								<a href="<?php echo $social_link; ?>" target="_blank">
									<img class="svg" class="" src="<?php echo $social_icon; ?>">
								</a>
							</li>
							<?php endif;
							endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
					
					<?php 
					$cajun_industries_corporate = button_group($cajun_industries_corporate ,'button');

					if(!empty($cajun_industries_corporate)): ?>
					<div class="button-section">
						<?php echo $cajun_industries_corporate; ?>
					</div>
					<?php endif;

					if(!empty($download_brochure)): ?>
					<div class="button-section bottom-button">
						<a href="<?php echo $download_brochure; ?>" target="_blank" class="button footer-bottom-button" download>Download Brochure</a>
					</div>
					<?php endif; ?>

						
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
