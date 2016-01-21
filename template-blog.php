<?php 
	/* Template Name: Blog */
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
		<?php 
			if(get_field('arfi_blog_layout') == '1'){
	            $it_arfi_blog_content = "col-md-9 col-sm-9 col-xs-12";
	            $it_arfi_blog_sidebar = "col-md-3 col-sm-3 col-xs-12";
	            $it_arfi_blog_masonry = "row";
	            $it_arfi_blog_post = "blog-post";
	        }

	        elseif(get_field('arfi_blog_layout') == '2'){
	        	$it_arfi_blog_content = "col-md-offset-1 col-md-10 col-sm-12 col-xs-12";
	        	$it_arfi_blog_sidebar = "display-none";
	        	$it_arfi_blog_masonry = "row";
	        	$it_arfi_blog_post = "blog-post";
	        }

	        elseif(get_field('arfi_blog_layout') == '3'){
	        	$it_arfi_blog_content = "row";
	        	$it_arfi_blog_sidebar = "display-none";
	        	$it_arfi_blog_masonry = "blog-masonry";
	        	$it_arfi_blog_post = "blog-post col-md-4";	
	        }

	        elseif(get_field('arfi_blog_layout') == '4'){
	        	$it_arfi_blog_content = "row";
	        	$it_arfi_blog_sidebar = "display-none";
	        	$it_arfi_blog_masonry = "blog-masonry2";
	        	$it_arfi_blog_post = "blog-post col-md-6";
	        }
		?>
		<div class="blog" style="padding-top: 50px;">
			<div class="container">
				<div class="<?php echo esc_attr($it_arfi_blog_masonry); ?>">
					<div class="<?php echo esc_attr($it_arfi_blog_content); ?>">
						<?php 
							if ( get_query_var('paged') ) {
		                        $paged = get_query_var('paged');
		                    } 
		                    elseif ( get_query_var('page') ) {
		                        $paged = get_query_var('page');
		                    } 
		                    else {
		                        $paged = 1;
		                    }

		                    $it_arfi_blog_category = get_field("arfi_blog_category");
		                    $it_arfi_blog_postperpage = get_field("arfi_blog_postperpage");

		                    if($it_arfi_blog_postperpage){
		                    	$it_arfi_blog_ppp = $it_arfi_blog_postperpage;
		                    }
		                    else {
		                    	$it_arfi_blog_ppp = "5";
		                    }

		                    if(!empty($it_arfi_blog_category)) :

		                    $args = array(
								"post_type" => "post",
								"cat" => $it_arfi_blog_category,
								"posts_per_page" => $it_arfi_blog_ppp,
		                    	'paged' => $paged
							);

		               		$query = new WP_Query($args);

							if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
						?>
						<div id="post-<?php the_ID(); ?>" <?php post_class($it_arfi_blog_post); ?>>
							<div class="post-img">
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}
									?>
								</a>
							</div>
							<div class="post-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="details">
									<a href="#"><?php the_author(); ?></a>
									<span><?php the_time('F j, Y') ?></span>
									<div class="category">
										<?php the_category(', '); ?>
									</div>
								</div>
								<?php the_excerpt(); ?>
								<div class="more-button">
									<a href="<?php the_permalink(); ?>">read more</a>
								</div>
							</div>
						</div>
						<?php endwhile; endif; wp_reset_postdata(); endif; ?>
					</div>
					<div class="<?php echo esc_attr("$it_arfi_blog_sidebar"); ?>">
						<?php get_sidebar(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 pagination-holder">
						<?php it_pagination($query->max_num_pages, "pagination"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>

