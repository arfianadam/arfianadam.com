<?php
	get_header();
	$it_arfi_pagetitle_bg = get_field("arfi_pagetitle_background_image");
	$it_arfi_pagetitle_title = get_field("arfi_pagetitle_title");
	$it_arfi_pagetitle_desc = get_field("arfi_pagetitle_description");

	if(have_posts()) : while(have_posts()) : the_post();

	if(get_field("post_type") == '1') :
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
			<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
		</div>
		<div class="blog blog-single" style="padding-top: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
						<div class="col-md-12">
							<div class="blog-post ">
								<div class="post-content">
									<div class="details">
										<a href="<?php echo esc_attr(get_the_author_link()); ?>"><?php the_author(); ?></a>
										<span><?php the_time('F j, Y'); ?></span>
										<div class="category">
											<?php the_category(', '); ?>
										</div>
									</div>
									<?php the_content(); ?>
									<div class="tags">
										<?php
											$before = '';
											$seperator = ' ';
											$after = '';
											the_tags( $before, $seperator, $after );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="comments">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php elseif(get_field('post_type') == '2') : ?>

		<?php if(get_field("arfi_portfolio_single_layout") == '1') :  ?>

			<div class="wrapper">
				<div class="<?php echo esc_attr(($it_arfi_pagetitle_bg) ? 'home-photography' : 'home-photography no-page-bg'); ?>">
					<div class="head-overlay"></div>
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
					<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
				</div>
				<div class="project-single">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="project-content">
									<div class="text-content">
										<h2><?php the_title(); ?></h2>
										<p><?php the_content(); ?></p>
									</div>
									<div class="details-holder">
										<?php
											$link = get_field('link');
											if ( $link != '' ) :
										?>
										<div class="details">
											<h4>Link</h4>
											<span><a href="<?php echo get_field('link'); ?>"><?php echo get_field('link'); ?></a></span>
										</div>
									<?php endif; ?>
										<div class="details categories">
											<h4>Categories</h4>
											<ul><?php the_category(' ') ?></ul>
										</div>
										<div class="details">
											<h4>Author</h4>
											<span><?php the_author(); ?></span>
										</div>
										<div class="details">
											<h4>Date & Time</h4>
											<span><?php the_time('F j, Y'); ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-1 col-sm-offset-1">
								<div class="project-photos">
									<ul>
									<?php if(have_rows("arfi_portfolio_single_gallery")) : while(have_rows("arfi_portfolio_single_gallery")) : the_row(); ?>
										<li><img src="<?php echo esc_url(the_sub_field("arfi_portfolio_single_gallery_image")); ?>" alt=""></li>
									<?php endwhile; endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php elseif(get_field("arfi_portfolio_single_layout") == '2') :  ?>

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
					<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
				</div>
				<div class="project-single project-single2">
					<div class="container">
						<div class="row">
							<div class="project-content">
								<div class="text-content col-md-8">
									<h2><?php the_title(); ?></h2>
									<p><?php the_content(); ?></p>
								</div>
								<div class="details-holder col-md-offset-1 col-md-3">
									<div class="details categories">
										<h4>Categories</h4>
										<ul><?php the_category(' ') ?></ul>
									</div>
									<div class="details">
										<h4>Author</h4>
										<span><?php the_author(); ?></span>
									</div>
									<div class="details">
										<h4>Date & Time</h4>
										<span><?php the_time('F j, Y'); ?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="project-photos">
							<div class="row">
								<ul>
								<?php if(have_rows("arfi_portfolio_single_gallery")) : while(have_rows("arfi_portfolio_single_gallery")) : the_row(); ?>
									<li class="col-md-6"><img src="<?php echo esc_url(the_sub_field("arfi_portfolio_single_gallery_image")); ?>" alt=""></li>
								<?php endwhile; endif; ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php elseif(get_field("arfi_portfolio_single_layout") == '3') :  ?>

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
					<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
				</div>
				<div class="project-single">
					<div class="container">
						<div class="row">
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="project-photos">
									<ul>
									<?php if(have_rows("arfi_portfolio_single_gallery")) : while(have_rows("arfi_portfolio_single_gallery")) : the_row(); ?>
										<li><img src="<?php echo esc_url(the_sub_field("arfi_portfolio_single_gallery_image")); ?>" alt=""></li>
									<?php endwhile; endif; ?>
									</ul>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="project-content">
									<div class="text-content">
										<h2><?php the_title(); ?></h2>
										<p><?php the_content(); ?></p>
									</div>
									<div class="details-holder">
										<div class="details categories">
											<h4>Categories</h4>
											<ul><?php the_category(' ') ?></ul>
										</div>
										<div class="details">
											<h4>Author</h4>
											<span><?php the_author(); ?></span>
										</div>
										<div class="details">
											<h4>Date & Time</h4>
											<span><?php the_time('F j, Y'); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php elseif(get_field("arfi_portfolio_single_layout") == '4') :  ?>

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
					<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
				</div>
				<div class="project-single project-single4">
					<div class="container">
						<div class="project-photos">
							<div class="row">
								<ul>
								<?php if(have_rows("arfi_portfolio_single_gallery")) : while(have_rows("arfi_portfolio_single_gallery")) : the_row(); ?>
									<li class="col-md-12"><img src="<?php echo esc_url(the_sub_field("arfi_portfolio_single_gallery_image")); ?>" alt=""></li>
								<?php endwhile; endif; ?>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="project-content">
								<div class="text-content col-md-8">
									<h2><?php the_title(); ?></h2>
									<p><?php the_content(); ?></p>
								</div>
								<div class="details-holder col-md-offset-1 col-md-3">
									<div class="details categories">
										<h4>Categories</h4>
										<ul><?php the_category(' ') ?></ul>
									</div>
									<div class="details">
										<h4>Author</h4>
										<span><?php the_author(); ?></span>
									</div>
									<div class="details">
										<h4>Date & Time</h4>
										<span><?php the_time('F j, Y'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endif; ?>

	<?php else :  ?>

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
			<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
		</div>
		<div class="blog blog-single" style="padding-top: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
						<div class="col-md-12">
							<div class="blog-post ">
								<div class="post-content">
									<div class="details">
										<a href="<?php echo esc_attr(get_the_author_link()); ?>"><?php the_author(); ?></a>
										<span><?php the_time('F j, Y'); ?></span>
										<div class="category">
											<?php the_category(', '); ?>
										</div>
									</div>
									<?php the_content(); ?>
									<div class="tags">
										<?php
											$before = '';
											$seperator = ' ';
											$after = '';
											the_tags( $before, $seperator, $after );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="comments">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<script>
		!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
	</script>
	<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script type="text/javascript">
	  (function() {
	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/platform.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	  })();
	</script>

<?php
	endif; endwhile; endif;
	get_footer();
?>
