<?php
	/* Template Name: Contact */
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
								echo esc_attr(the_title());
							}
						?>
					</h2>
					<span><?php echo esc_attr($it_arfi_pagetitle_desc); ?></span>
				</div>
			</div>
			<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil-black.png'; ?>" alt="" />			</div>
		</div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="contact-info adress">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="contact-form">
							<?php echo esc_attr(the_field("arfi_contact_form")); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>
