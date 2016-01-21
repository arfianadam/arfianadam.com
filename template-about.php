<?php 
	/* Template Name: About */
	get_header();
	$it_arfi_pagetitle_bg = get_field("arfi_pagetitle_background_image");
	$it_arfi_pagetitle_title = get_field("arfi_pagetitle_title");
	$it_arfi_pagetitle_desc = get_field("arfi_pagetitle_description");
?>

	<div class="wrapper">
		<div class="<?php echo esc_attr(($it_arfi_pagetitle_bg) ? 'home-photography' : 'home-photography no-page-bg'); ?>">
			<div class="head-photo" style="background-image: url(<?php echo esc_url($it_arfi_pagetitle_bg); ?>);"></div>
			<div class="title-holder">
				<div class="page-title">
					<h2>
						<?php
							if($it_arfi_pagetitle_title){
								echo esc_attr($it_arfi_pagetitle_title);
							}
							else {
								echo the_title();
							}
						?>
					</h2>
					<span><?php echo esc_attr($it_arfi_pagetitle_desc); ?></span>
				</div>
			</div>
			<div class="<?php echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div>
		</div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="about">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 about-info">
						<h3><?php the_title(); ?></h3>
						<p><?php the_content(); ?></p>
					</div>
				</div>
				<div class="about-content">
				<?php if(have_rows("arfi_about_content")) : while(have_rows("arfi_about_content")) : the_row(); ?>
					<?php if(get_row_layout() == "arfi_about_content_skills") : ?>
					<div class="about-progress col-md-6 col-sm-6 col-xs-12">
						<h3>Skills</h3>
						<?php if(have_rows("arfi_about_content_skills_loop")) : while(have_rows("arfi_about_content_skills_loop")) : the_row(); ?>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo esc_attr(the_sub_field("arfi_about_content_skills_loop_percentage")); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo esc_attr(the_sub_field("arfi_about_content_skills_loop_percentage")); ?>%;">
								<?php echo esc_attr(the_sub_field("arfi_about_content_skills_loop_percentage")); ?>%
							</div>
							<span><?php echo esc_attr(the_sub_field("arfi_about_content_skills_loop_name")); ?></span>
						</div>
						<?php endwhile; endif; ?>
					</div>
					<?php elseif(get_row_layout() == "arfi_about_content_socials") : ?>
					<div class="col-md-6 col-sm-6 col-xs-12 about-socials">
						<h3>Social</h3>
						<ul>
						<?php if(have_rows("arfi_about_content_socials_loop")) : while(have_rows("arfi_about_content_socials_loop")) : the_row(); ?>
							<li><a href="<?php echo esc_attr(the_sub_field("arfi_about_content_socials_loop_link")); ?>"><i class="fa <?php echo esc_attr(the_sub_field("arfi_about_content_socials_loop_icon")); ?>"></i></a></li>
						<?php endwhile; endif; ?>
						</ul>
					</div>
					<?php elseif(get_row_layout() == "arfi_about_content_clients") : ?>
						<div class="col-md-12 col-sm-12 col-xs-12 clients">
							<h3>Clients</h3>
							<?php if(have_rows("arfi_about_content_clients_loop")) : while(have_rows("arfi_about_content_clients_loop")) : the_row(); ?>
								<div class="col-md-2 col-sm-4 col-xs-6 clients-logo"><img src="<?php echo esc_url(the_sub_field("arfi_about_content_socials_loop_image")); ?>" alt=""></div>
							<?php endwhile; endif; ?>
						</div>
					<?php endif; ?>
			    <?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>


<?php get_footer(); ?>