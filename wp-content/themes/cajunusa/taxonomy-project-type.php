<?php
get_header();

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$banner_image = get_field('banner_image', $term->taxonomy .'_'. $term->term_id)['sizes']['type_banner_image_size'];

$project_type_slug_name = $term->slug;

// Get all terms of a taxonomy
$taxonomy = 'project-type';
$terms = get_terms(
            array(
                    'taxonomy'   => $taxonomy,
                    'orderby'    => 'count',
                    'order' => 'DESC',
                    'hide_empty' => false,
    ));

//Default banner image
$default_banner_image = get_field('default_banner_image', 'options')['sizes']['type_banner_image_size'];
?>

<section class="inner-banner basic" style="background-image: url(<?php echo $banner_image ? $banner_image : $default_banner_image; ?>);">

	<img src="<?php echo get_template_directory_uri()?>/images/value-banner-placeholder.png">
	<div class="container">
		<div class="inner-banner-container">
			<h1><?php echo $term->name; ?></h1>		
		</div>	
						
	</div>
</section>

<div class='toggle'>
	<div class="toggle-section-inner tabs">
		<p class="toggle-mobile">Areas of Expertise</p>
			<?php if( $terms && !is_wp_error($terms)) : ?>
			<div class="inner-block">
				<?php 
				$i = 1 ;
				foreach ( $terms as $term ):
					$term_id = $term->id;
					$term_name = $term->name; 
					$term_slug = $term->slug; 
					$term_link = esc_url( get_term_link( $term ) );
	                $icon = get_field('project_icon', $term->taxonomy .'_'. $term->term_id)['sizes']['type_icon_image_size'];

	                $default_icon_image = get_field('default_icon_image', 'options')['sizes']['icon_image_size'];

	                $banner_image = get_field('banner_image', $term->taxonomy .'_'. $term->term_id)['sizes']['type_banner_image_size'];


    			?>  
					<div class="block tab <?php echo $term_slug==$project_type_slug_name ? 'current' : ''; ?>" data-tab="tab<?php echo $i; ?>" data-title="<?php echo $term_name; ?>" data-image="<?php echo $banner_image ? $banner_image : $default_banner_image; ?>">
						<a href="#<?php echo $term_slug; ?>" class="icon"><img class="svg" src="<?php echo $icon ? $icon : $default_icon_image; ?>"></a>
						<p><?php echo $term_name; ?></p>
					</div>
				<?php 
					$i++; 
					endforeach; ?>
			</div>
			<?php endif; ?>

			<div class="accordian">
				<?php 
				$i = 1;
				foreach ( $terms as $term ): 
					$term_slug = $term->slug;
					$full_description = get_field('project_full_description', $term->taxonomy .'_'. $term->term_id);
			
					if($term_slug == $project_type_slug_name): ?>
					<div id="tab<?php echo $i; ?>" class="tab panel current">
							<?php echo do_shortcode($full_description);  ?>
						
					</div>	
				<?php 
				endif;  
				$i++;
				endforeach; ?>

				<?php 
				$i = 1;
				foreach ( $terms as $term ):
						$full_description = get_field('project_full_description', $term->taxonomy .'_'. $term->term_id);
						?>  
						
						<div id="tab<?php echo $i; ?>" class="tab panel">
								<?php echo do_shortcode($full_description);  ?>
							
						</div>	
				<?php 
				$i++;
				endforeach; ?>
			</div>
	</div>
</div>

<?php
get_footer();
