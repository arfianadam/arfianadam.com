<?php

function it_custom_css() {
	$it_arfi_transition_duration = get_field("arfi_transition_duration","option");
	$it_arfi_header_search = get_field("arfi_header_search", "option");
	$it_arfi_header_icons = get_field("arfi_header_icons_hide", "option");
	$it_arfi_bg_pattern = get_field("arfi_background_pattern","option");
	$it_arfi_bg_pattern_repeat = get_field("arfi_background_pattern_repeat","option");
	$it_arfi_custom_css = get_field("arfi_custom_css","option");
	$it_arfi_custom_css_large_devices = get_field("arfi_custom_css_large_devices","option");
	$it_arfi_custom_css_medium_devices = get_field("arfi_custom_css_medium_devices","option");
	$it_arfi_custom_css_small_devices = get_field("arfi_custom_css_small_devices","option");
	$it_arfi_custom_css_xsmall_devices = get_field("arfi_custom_css_xsmall_devices","option");
	$it_arfi_page_title_header_color = get_field("arfi_page_title_header_color","option");
	$it_arfi_page_title_content_color = get_field("arfi_page_title_content_color","option");

	if(get_field("arfi_transition_effect","option") == '1'){
		if($it_arfi_transition_duration){
			echo "
				<style>
					header .mobile-menu .line,
					header .mobile-menu .line:before,
					header .mobile-menu .line:after,
					header nav .menu li a,
					header nav .menu li a:after,
					.wrapper .portfolio .filters ul li:after,
					.wrapper .portfolio .item .overlay,
					.about .about-content .about-socials ul li,
					.blog .blog-post .post-content h3 a,
					.blog .blog-post .post-content .details a,
					.blog .blog-post .post-content .details span,
					.blog .blog-post .post-content .details a:after,
					.blog .blog-post .post-content h3 a:after,
					.blog .pagination-holder .pagination li a:after,
					.blog .sidebar .comments ul li a:after,
					.blog-single .share-side ul li a:after,
					.blog .blog-post .post-content .more-button a,
					.blog .sidebar .tags a,
					.blog .sidebar .comments ul li a,
					.blog .sidebar .posts ul li a,
					.blog-single .blog-post .post-content .tags a,
					.blog-single .comment-form input,
					.blog-single .comment-form textarea,
					.blog-single .comment-form .submit,
					.contact .contact-form input[type=submit],
					footer span a:after,
					.widget_categories ul li a:hover,
					.widget_recent_comments ul > li > a,
					.widget_recent_comments ul > li > a:after,
					.widget_recent_entries ul li a,
					.widget_pages ul li a,
					.widget_archive ul li a, 
					.widget_meta ul li a,
					.widget_rss ul li a,
					.widget_nav_menu ul li a  {
						-webkit-transition: " . $it_arfi_transition_duration . "s all;
					    -moz-transition: " . $it_arfi_transition_duration . "s all;
					    -ms-transition: " . $it_arfi_transition_duration . "s all;
					    -o-transition: " . $it_arfi_transition_duration . "s all;
					    transition: " . $it_arfi_transition_duration . "s all;
					}
				</style>
			";
		}
	}
	else {
		echo "
			<style>
				header .mobile-menu .line,
				header .mobile-menu .line:before,
				header .mobile-menu .line:after,
				header nav .menu li a,
				header nav .menu li a:after,
				.wrapper .portfolio .filters ul li:after,
				.wrapper .portfolio .item .overlay,
				.about .about-content .about-socials ul li,
				.blog .blog-post .post-content h3 a,
				.blog .blog-post .post-content .details a,
				.blog .blog-post .post-content .details span,
				.blog .blog-post .post-content .details a:after,
				.blog .blog-post .post-content h3 a:after,
				.blog .pagination-holder .pagination li a:after,
				.blog .sidebar .comments ul li a:after,
				.blog-single .share-side ul li a:after,
				.blog .blog-post .post-content .more-button a,
				.blog .sidebar .tags a,
				.blog .sidebar .comments ul li a,
				.blog .sidebar .posts ul li a,
				.blog-single .blog-post .post-content .tags a,
				.blog-single .comment-form input,
				.blog-single .comment-form textarea,
				.blog-single .comment-form .submit,
				.contact .contact-form input[type=submit],
				footer span a:after,
				.widget_categories ul li a:hover,
				.widget_recent_comments ul > li > a,
				.widget_recent_comments ul > li > a:after,
				.widget_recent_entries ul li a,
				.widget_pages ul li a,
				.widget_archive ul li a, 
				.widget_meta ul li a,
				.widget_rss ul li a,
				.widget_nav_menu ul li a  {
					-webkit-transition: 0s all;
				    -moz-transition: 0s all;
				    -ms-transition: 0s all;
				    -o-transition: 0s all;
				    transition: 0s all;
				}
			</style>
		";
	}

	if($it_arfi_header_search){
		echo "
		<style>
			#search-link {
					display: none;
				}
			header nav .menu #socials-link a {
				border-left: none; 
  				padding-left: 0;
			}
		</style>
		";
	}

	if($it_arfi_header_icons){
		echo "
		<style>
			#socials-link {
					display: none;
				}
		</style>
		";
	}

	if($it_arfi_bg_pattern){
		echo "
			<style>
				.wrapper .no-page-bg { background: url($it_arfi_bg_pattern); }
			</style>
		";
	}

	if($it_arfi_bg_pattern_repeat == 1){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat;}
			</style>
		";
	}

	else if($it_arfi_bg_pattern_repeat == 2){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat-x;}
			</style>
		";
	}

	else if($it_arfi_bg_pattern_repeat == 3){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat-y;}
			</style>
		";
	}

	else if($it_arfi_bg_pattern_repeat == 4){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: no-repeat;}
			</style>
		";
	}

	if($it_arfi_page_title_header_color){
		echo "
			<style>
				.wrapper .home-photography .page-title h2 {
					color: $it_arfi_page_title_header_color;
				}
			</style>
		";
	}

	if($it_arfi_page_title_content_color){
		echo "
			<style>
				.wrapper .home-photography .page-title span {
					color: $it_arfi_page_title_content_color;
				}
			</style>
		";		
	}

	if($it_arfi_custom_css){
		echo "
			<style>
				  ". $it_arfi_custom_css  ."
			</style>
		";
	}
	if($it_arfi_custom_css_large_devices){
		echo "
			<style>
				@media screen and (max-width: 1200px) { ". $it_arfi_custom_css_large_devices  ." }
			</style>
		";
	}
	if($it_arfi_custom_css_medium_devices){
		echo "
			<style>
				@media screen and (max-width: 992px) { ". $it_arfi_custom_css_medium_devices  ." }
			</style>
		";
	}
	if($it_arfi_custom_css_small_devices){
		echo "
			<style>
				@media screen and (max-width: 768px) { ". $it_arfi_custom_css_small_devices  ." }
			</style>
		";
	}
	if($it_arfi_custom_css_xsmall_devices){
		echo "
			<style>
				@media screen and (max-width: 480px) { ". $it_arfi_custom_css_xsmall_devices  ." }
			</style>
		";
	}	

}

add_action('wp_head', 'it_custom_css');

?>