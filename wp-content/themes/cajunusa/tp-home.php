<?php
/**
 * The Template Name: Home Page
*/
get_header();

//Slider section
$slides = get_field('slides');

//Column content section
$left_background_image = get_field('left_background_image')['sizes']['column_content_image_size'];
$right_content = get_field('right_content');

//Area Expertise Section
$areas_expertise_title = get_field('areas_expertise_title');

// Get all terms of a taxonomy
$taxonomy = 'project-type';
$terms = get_terms(
            array(
                    'taxonomy'   => $taxonomy,
                    'orderby'    => 'count',
                    'order' => 'DESC',
                    'hide_empty' => false,
    ));
?>

<?php if(!empty($slides)): ?>
<section class="banner-section owl-carousel owl-theme slider-icon">
	<?php foreach($slides as $slide): 
		$heading = $slide['heading'];
		$description = $slide['description'];
		$read_more_button = $slide['read_more_button'];
		$background_image = $slide['background_image']['sizes']['home_banner_image_size'];
		$mobile_background_image = $slide['mobile_background_image']['sizes']['mobile_home_banner_image_size'];

		if(wp_is_mobile()):
			$banner_image = $mobile_background_image;
		else:
			$banner_image = $background_image;
		endif;	

	if(!empty($banner_image)): ?>
	<div class="item" style="background-image: url(<?php echo $banner_image; ?>);">
		<div class="item-inner">
			<img src="<?php echo get_template_directory_uri()?>/images/banner-placeholder.png">
			
			<a href="#cajun-engeering-section" class="down-arrow" id="cajun-engeering-section">
				<span class="dot-list">
				<span class="dot"></span>
				<span class="dot"></span>
				<span class="dot"></span>
				</span>
				<svg xmlns="http://www.w3.org/2000/svg" width="21" height="79" viewBox="0 0 19.1 71.05">
					<path fill="#fff" d="M7.85 70.3c1 1 2.6 1 3.5 0l7-7c1-1 1-2.6 0-3.5-.5-.5-1.1-.7-1.8-.7s-1.3.2-1.8.7L9.55 65l-5.2-5.2c-.5-.5-1.101-.7-1.8-.7-.7 0-1.301.2-1.801.7-1 1-1 2.6 0 3.5l7.101 7zM9.65 15c4.1 0 7.5-3.4 7.5-7.5S13.75 0 9.65 0s-7.5 3.4-7.5 7.5 3.4 7.5 7.5 7.5m0-10c1.4 0 2.5 1.1 2.5 2.5s-1.1 2.5-2.5 2.5-2.5-1.1-2.5-2.5S8.25 5 9.65 5"></path></svg> 

					<svg class="mobile" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-chevron-down fa-w-14 fa-7x"><path fill="#fff" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" class=""></path></svg>
			</a>

			<div class="banner-descreption">
				<div class="container">
				<div class="banner-descreption-inner">	
					<?php if(!empty($heading)): ?>
						<h1><?php echo $heading; ?></h1>
					<?php endif;
					if(!empty($description)): ?>
						<p><?php echo $description; ?></p>
					<?php endif;
					if(!empty($read_more_button)):
						echo button_group($read_more_button, 'button green');
					endif; ?>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endforeach; ?>
</section>
<?php endif; ?>

<div id="cajun-engeering-section" class="cajun-engeering-section">
	<?php if(!empty($left_background_image)): ?>
	<div class="cajun-engeering-left">
		<a href="#"><img src="<?php echo $left_background_image; ?>"></a>
	</div>
	<?php endif;
	if(!empty($right_content)): ?>
	<div class="cajun-engeering-right">
		<?php echo $right_content; ?>
	</div>
	<?php endif; ?>
</div>

<?php if( $terms && !is_wp_error( $terms )) : ?>
<div class="areas-expertise">
	<?php if(!empty($areas_expertise_title)): ?>
	<div class="heading">
		<h4><?php echo $areas_expertise_title; ?></h4>
	</div>
	<?php endif; ?>

	<div class="item-main owl-carousel owl-theme">
		<?php foreach ( $terms as $term ):
				$term_id = $term->id;
				$term_name = $term->name;
				$term_description = $term->description;
				$term_description = substr($term_description, 0); 
				
				$term_link = esc_url( get_term_link( $term ) );
			
                $icon = get_field('project_icon', $term->taxonomy .'_'. $term->term_id)['sizes']['icon_image_size'];

                $default_icon_image = get_field('default_icon_image', 'options')['sizes']['icon_image_size'];

        ?>
		<div class="item">
			<a href="#" class="icon"><img src="<?php echo $icon ? $icon : $default_icon_image; ?>"></a></br>
			

			<p><?php echo $term_name; ?></p>
			<div class="item-desreption">
				<h5><?php echo $term_name; ?></h5>

				<?php if(!empty($term_description)): ?>
				<p><?php echo $term_description; ?></p>
				<?php endif; ?>

				<a href="<?php echo $term_link; ?>" class="read-more">Read more</a>
			</div>
		</div>
		<?php endforeach; ?>
		

	</div>
</div>
<?php endif; ?>


<?php
get_footer();