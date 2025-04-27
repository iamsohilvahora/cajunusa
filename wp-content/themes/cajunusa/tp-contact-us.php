<?php
/**
 * The Template Name: Contact Us
 */

get_header();

//Contactg form section
$contact_us_title = get_field('contact_us_title');
$form_title = get_field('form_title');

//Google map section
$map_address = get_field('address');
$address = $map_address['address'];    
$lat = $map_address['lat'];    
$lng = $map_address['lng'];  
$mapid = 'map_canvas'; 

//Location area section
$title = get_field('title');
$locations = get_field('locations');
?>

<?php if(!empty($contact_us_title)): ?>
<section class="inner-banner contact-us">
	<div class="container">
		<div class="inner-banner-container">
			<h1><?php echo $contact_us_title; ?></h1>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="contact-form-section">
	<?php if(!empty($form_title)): ?>
	<div class="inquiry">
		<h4><?php echo $form_title; ?></h4>
	</div>
	<?php endif; ?>

	<div class="contact-form">
		<?php echo do_shortcode( '[contact-form-7 id="19" title="contact-form"]' ); ?>
	</div>
</section>

<section>
	<!-- Google map section -->
    <?php radius_google_map($lat, $lng, $zoom=20, $mapid, $address, '');  ?>
    
    <div id="map_canvas" class="map-section"></div> 
    <!-- End google map section -->
</section>

<?php if(!empty($locations)): ?>
<section class="find-us">
	<div class="container">
		<div class="find-us-inner">
			<?php if(!empty($title)): ?>
			<h3><?php echo $title; ?></h3>
			<?php endif; ?>
			<div class="address-block owl-carousel owl-theme">
				<?php foreach($locations as $location): 
						$location_name = $location['name'];
						$contact_details = $location['contact_details'];
				
				if(!empty($location_name) && !empty($contact_details)): ?>
				<div class="address">
					<p><strong><?php echo $location_name; ?></strong></p>
					<?php echo $contact_details;  ?>
				</div>
				<?php 
				endif;
				endforeach; ?>

			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
