<?php
	/* Template Name: Portfolio */
	get_header();
	$it_arfi_pagetitle_bg = get_field("arfi_pagetitle_background_image");
	$it_arfi_pagetitle_title = get_field("arfi_pagetitle_title");
	$it_arfi_pagetitle_desc = get_field("arfi_pagetitle_description");
?>
	<div class="wrapper">
		<div class="<?php echo esc_attr(($it_arfi_pagetitle_bg) ? 'home-photography' : 'home-photography no-page-bg'); ?>">
			<div class="head-photo" data-parallax="scroll" data-image-src="<?php echo esc_url($it_arfi_pagetitle_bg); ?>" data-speed="0.1"></div>
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
			<!-- <div class="<?php // echo esc_attr(($it_arfi_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div> -->			<div class="icon-middle">					<img src="<?php echo get_template_directory_uri() . '/assets/images/pencil.png'; ?>" alt="" />			</div>
		</div>
		<?php
			if(get_field("arfi_portfolio_layout") == '1'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry3 two-columns-grid";
				$it_arfi_portfolio_item = "col-md-6 col-sm-6 col-xs-12";
			}

			else if(get_field("arfi_portfolio_layout") == '2'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry2 three-columns-grid";
				$it_arfi_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else if(get_field("arfi_portfolio_layout") == '3'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry four-columns-grid";
				$it_arfi_portfolio_item = "col-md-3 col-sm-4 col-xs-12";
			}

			else if(get_field("arfi_portfolio_layout") == '4'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry3";
				$it_arfi_portfolio_item = "col-md-6 col-sm-6 col-xs-12";
			}

			else if(get_field("arfi_portfolio_layout") == '5'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry";
				$it_arfi_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else if(get_field("arfi_portfolio_layout") == '5'){
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry";
				$it_arfi_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else {
				$it_arfi_portfolio_content = "portfolio";
				$it_arfi_portfolio_row = "row portfolio-masonry2";
				$it_arfi_portfolio_item = "col-md-3 col-sm-4 col-xs-12";
			}

			if(have_posts()) : while(have_posts()) : the_post();
		?>

		<div class="<?php echo esc_attr($it_arfi_portfolio_content); ?>">
			<section id="bio" class="wow fadeInUp">
				<div class="container">
					<div class="col-md-4 text-center">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/adam.jpg'; ?>" alt="" class="img-circle">
					</div>
					<div class="col-md-8 profil">
						<div class="big-title">ARFIAN ADAM</div>
						<div></div>
						<div class="sub-title">Front End Web Developer</div>
						<div class="sub-title">UX Designer</div>
						<div></div>
						<p class="text-medium">I am a <span class="text-highlight">self-educated</span> front end developer. I love learning something new and I can do it fast. Problem solving and fast learning are my main perks. Not the smartest man in the room but that's the point of learning, right? I can do web development, wordpress development, ux design, and pretty much anything with some html, css, and javascript.</p>
						<!-- <div class="basic-information">
							<h2>Some basic information</h2>
							<div class="row text-medium">
								<div class="col-md-6">
									<div><strong>Fullname</strong></div>
									<p>Arfian Adam Urfi</p>
									<div><strong>Birth</strong></div>
									<p>January 30, 1995</p>
									<div><strong>Address</strong></div>
									<p>Surabaya, Indonesia</p>
								</div>
								<div class="col-md-6">
									<div><strong>Hobby</strong></div>
									<p>Daydreaming, reading, playing games, taking a nap</p>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</section>
			<section id="skill" data-parallax="scroll" data-image-src="<?php echo esc_url($it_arfi_pagetitle_bg); ?>" data-speed="0.1">
				<div class="container skill-container wow fadeInUp">
					<div class="col-md-12">
						<div class="big-title">Things I can do</div>
					</div>
					<div></div>
					<div class="col-md-6">
						<ul class="skilltag">
							<li>HTML5</li>
							<li class="animated">CSS3</li>
							<li>Javascript</li>
							<li>Bootstrap</li>
							<li>Foundation</li>
							<li>Jquery</li>
							<li>Grunt</li>
							<li>Bower</li>
							<li>SASS</li>
							<li>Git</li>
							<li>Responsive Design</li>
							<li>Cross Browser Compatibility</li>
							<li>Photoshop</li>
							<li>Illustrator</li>
							<li>Semantic</li>
							<li>Wordpress</li>
							<li>Woocommerce</li>
							<li>Twig</li>
							<li>Blade</li>
							<li>UI/UX</li>
							<li>Web Development</li>
						</ul>
					</div>
					<div class="col-md-6 text-medium skill-graph">
						<span>HTML</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						    80%
						  </div>
						</div>
						<span>CSS</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
						    80%
						  </div>
						</div>
						<span>Javascript</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
						    70%
						  </div>
						</div>
						<span>Responsive Design</span>
						<div class="progress">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
						    90%
						  </div>
						</div>
					</div>
				</div>
			</section>
			<section id="feature">
				<div class="container">
					<div class="col-md-3 col-sm-6 feature-list wow zoomIn pixel-perfect">
						<div class="feature-logo"><span class="flaticon-tool401"></span></div>
						<div class="feature-desc">I deliver <span class="text-highlight">pixel-perfect</span> design and front end development. You need that text 1px to the left? You got it.</div>
					</div>
					<div class="col-md-3 col-sm-6 feature-list wow zoomIn ideas">
						<div class="feature-logo"><span class="flaticon-tool400"></span></div>
						<div class="feature-desc">Great ideas make great products. I don't mind spending hours of <span class="text-highlight">brainstorming</span> and <span class="text-highlight">wireframing</span> a concept until it's perfectly aligned with what you want.</div>
					</div>
					<div class="col-md-3 col-sm-6 feature-list wow zoomIn experiment">
						<div class="feature-logo"><span class="flaticon-tool403"></span></div>
						<div class="feature-desc">Blow something off! <span class="text-highlight">Experimenting</span> is a part of developing. The outcome doesn't matter, at least we figure something out!</div>
					</div>
					<div class="col-md-3 col-sm-6 feature-list wow zoomIn human">
						<div class="feature-logo"><span class="flaticon-drama1"></span></div>
						<div class="feature-desc">I am a human too, let's hang around sometimes here and there, <span class="text-highlight">talking nonsense</span> and <span class="text-highlight">playing some games</span> together. Tips: I am good at Dota :P</div>
					</div>
				</div>
			</section>
			<section id="works" class="text-center">
				<div class="wow fadeInUp">My Works</div>
			</section>
			<div class="container wow fadeInUp" id="portfolio">
				<?php

					$enable_filters = get_field("arfi_portfolio_filters");
					$filters = get_field("arfi_portfolio_filter_tags");

					if($enable_filters && $filters) :

				?>
				<div class="filters">
					<ul id="filters">
						<li class="active" data-filter="*">All</li>
						<?php foreach($filters as $filter) : ?>
							<li data-filter=".<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr("$it_arfi_portfolio_row"); ?>">
					<?php

						$it_arfi_portfolio_category = get_field("arfi_portfolio_category");


			            $args = array(
							"post_type" => "post",
							"cat" => $it_arfi_portfolio_category,
							"posts_per_page" => -1,
			            	'paged' => $paged
						);

			       		$query = new WP_Query($args);

						if ( get_query_var('paged') ) {
	                        $paged = get_query_var('paged');
	                    }
	                    elseif ( get_query_var('page') ) {
	                        $paged = get_query_var('page');
	                    }
	                    else {
	                        $paged = 1;
	                    }

	                    if(!empty($it_arfi_portfolio_category)) :

						if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

	                    $post_tags = get_the_tags();
					?>
					<div class="<?php echo esc_attr($it_arfi_portfolio_item ); ?> <?php if($post_tags) { foreach($post_tags as $tag) { echo esc_attr($tag->slug . ' '); } }  ?>">
						<div class="item">
							<div class="overlay">
								<div class="overlay-inner">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<span><?php the_category(' '); ?></span>
								</div>
							</div>
							<?php
	                            if(has_post_thumbnail()){
	                                the_post_thumbnail();
	                            }
	                            else {
	                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/default.png" />';
	                            }
	                        ?>
						</div>
					</div>
					<?php endwhile; endif; wp_reset_postdata(); endif; ?>
				</div>
			</div>
			<section id="contact" class="text-center">
				<div class="wow fadeInUp">Contact Me!</div>
			</section>
			<section id="contactform">
				<div class="contact wow fadeInUp">
					<div class="container">
						<div class="row">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<div class="contact-info adress">
									<h3>Contact me:</h3>
									<p>contact@arfianadam.com</p>
									<p><a href="http://www.arfianadam.com/" target="_blank">http://www.arfianadam.com/</a></p>
									<p>(+62) 838 5746 1060</p>
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
			</section>
		</div>
		<div class="display-none">
			<?php wp_link_pages( $args ); ?>
			<?php previous_posts_link(); ?>
			<?php posts_nav_link(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>
