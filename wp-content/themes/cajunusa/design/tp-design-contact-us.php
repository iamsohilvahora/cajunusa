<?php
/**
 * The Template Name: design-contact-us Page - Design
 */

get_header();
?>
<section class="inner-banner contact-us">
	<div class="container">
		<div class="inner-banner-container">
			<h1>Contact us.</h1>
		</div>
	</div>
</section>
<section class="contact-form-section">
	<div class="inquiry">
		<h4>General
		Inquiry
		Form</h4>
	</div>
	<div class="contact-form">
		<?php echo do_shortcode( '[contact-form-7 id="19" title="contact-form"]' ); ?>
	</div>
</section>
<section class="map-section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d220148.0396912898!2d-91.25150376644972!3d30.441399195388318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x86243867325f74cb%3A0x2123f1db91579a1d!2sBaton%20Rouge%2C%20LA%2C%20USA!5e0!3m2!1sen!2sin!4v1608017004555!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>
<section class="find-us">
	<div class="container">
		<div class="find-us-inner">
			<h3>Find us</h3>
			<div class="address-block owl-carousel owl-theme">
			<div class="address">
				<p><strong>Corporate Physical
				Address</strong></p>
				<p>15635 Airline Highway
				Baton Rouge, LA 70817</p>
				<p>
				<span>Phone:<a href="tel:800-944-5857">800-944-5857</a></span>
				<span>Phone:<a href="tel:225-753-5857">225-753-5857</a></span>
				<span>Fax:<a href="tel:225-751-9777">225-751-9777</a></span>
			</p>
			</div>
			<div class="address">
				<p><strong>Corporate Mailing
				Address
				</strong></p>
				<p>Post Office Box 104
				Baton Rouge, LA 70821- 
				0104</p>
			</div>
			<div class="address">
				<p><strong>Houston Office</strong></p>
				<p>2105 S. Battleground Road
				LaPorte, TX 77571</p>
			</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
