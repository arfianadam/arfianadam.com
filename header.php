<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Document Settings -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="loader"></div>
		<header>
			<div class="container">
				<div class="header-holder">
					<div class="logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
						<?php
							$it_arfi_logo = get_field("arfi_logo","option");

							if($it_arfi_logo) : ?>

							<!-- <img src="<?php echo esc_url($it_arfi_logo); ?>" alt=""> -->							<img src="http://arfianadam.com/wp-content/uploads/2015/10/adam.png" alt="" style="max-height:16px;">

							<?php else : ?>

							<h3><?php echo esc_attr(bloginfo('name')); ?></h3>
						<?php endif; ?>
						</a>
					</div>
					<div class="mobile-menu">
						<div class="line"></div>
					</div>
					<nav>
					<?php
						$args = array(
							'theme_location' => 'main-menu',
							'container' => false,
							'menu_class' => 'menu'
						);

						if(has_nav_menu('main-menu')) {
							wp_nav_menu($args);
						}
					?>
					<div class="menu right-side">
						<li id="search-link"><a href="#"><i class="fa fa-search"></i></a></li>
						<li id="socials-link"><a href="#"><i class="fa fa-share-alt"></i></a></li>
					</div>
					</nav>
					<div class="clear"></div>
				</div>
				<div class="search-overlay">
					<?php get_search_form(); ?>
				</div>
				<div class="socials-overlay">
					<div id="close-socials"><i class="fa fa-times"></i></div>
					<div class="inner-socials">
						<ul>
							<?php if(have_rows("arfi_header_icons","option")) : while(have_rows("arfi_header_icons","option")) : the_row(); ?>
								<li><a target="_BLANK" href="<?php echo esc_url(the_sub_field("arfi_header_icons_link","option")); ?>"><i class="fa <?php echo esc_url(the_sub_field("arfi_header_icons_icon","option")); ?>"></i></a></li>
							<?php endwhile; endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
