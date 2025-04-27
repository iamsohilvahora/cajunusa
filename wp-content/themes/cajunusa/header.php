<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cajunusa
 */

$header_logo = get_field('header_logo','options')['sizes']['header_logo_image_size'];
$contact_us_link = get_field('contact_us_link','options');
$phone_number = get_field('phone_number','options');

$team_portal_link = get_field('team_portal_link','options');
$open_position_link = get_field('open_position_link','options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/images/favicon.ico" />


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cajunusa' ); ?></a>

	<header class="header">
		<div class="container">
			<div class="inner-header">
				<?php if(!empty($header_logo)): ?>
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $header_logo; ?>"></a>
				</div>
				<?php endif; ?>
				<div class="right-side-top">
					<ul>
						<?php 
						$contact_us_link = button_group($contact_us_link,'');
						if(!empty($contact_us_link)): ?>
						<li>
							<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comment" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-comment fa-w-16 fa-7x"><path fill="#5f8d99" d="M256 32C114.6 32 0 125.1 0 240c0 49.6 21.4 95 57 130.7C44.5 421.1 2.7 466 2.2 466.5c-2.2 2.3-2.8 5.7-1.5 8.7S4.8 480 8 480c66.3 0 116-31.8 140.6-51.4 32.7 12.3 69 19.4 107.4 19.4 141.4 0 256-93.1 256-208S397.4 32 256 32z" class=""></path></svg>
							<?php echo $contact_us_link; ?>
						</li>
						<?php endif;
						if(!empty($phone_number)): ?>
						<li><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></li>
						<?php endif;
						$team_portal_link = button_group($team_portal_link,''); 
						if(!empty($team_portal_link)): ?>
						<li>
							<a href="#"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="19" viewBox="0 0 54.88 53.443"><defs><path id="a" d="M0 0h54.88v53.443H0z"></path></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"></use></clipPath><path clip-path="url(#b)" fill-rule="evenodd" clip-rule="evenodd" fill="#5f8d99" d="M51.096 42.152c-4.838-3.441-12.258-1.613-16.882-7.742 0 0-1.721-1.936 2.151-6.667 3.871-4.732 4.193-12.259 3.225-18.066C38.623 3.871 33.139 0 27.44 0S16.256 3.871 15.289 9.677c-.967 5.807-.645 13.334 3.226 18.066 3.871 4.731 2.15 6.667 2.15 6.667-4.624 6.129-12.043 4.301-16.882 7.742C-1.055 45.592.127 53.443.127 53.443h54.625s1.183-7.851-3.656-11.291"></path></svg><?php echo $team_portal_link; ?></a>
						</li>
						<?php endif; 
						$open_position_link = button_group($open_position_link,''); 
						if(!empty($open_position_link)): ?>
						<li>
							<?php echo $open_position_link; ?>
						</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
