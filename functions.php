<?php

// Define global theme variables
define('arfi_THEME_NAME', 'arfi');
$posts_per_page = get_option('posts_per_page');
global $posts_per_page;


// Set max content width
if (!isset($content_width)) {
	$content_width = 1170;
}

add_action( 'after_setup_theme', 'it_arfi_setup' );
function it_arfi_setup() {
	// Add theme support
	add_theme_support("menus");
	add_theme_support("post-thumbnails");
	add_theme_support("automatic-feed-links");
	add_theme_support("title-tag");

	define("ACF_LITE" , true);
	include_once( get_template_directory() . '/includes/advanced-custom-fields/acf.php');
    include_once(  get_template_directory() ."/includes/custom-fields.php");

	require_once( get_template_directory() . '/includes/tgm.php');

	// Add stylesheets and scripts
	add_action("wp_enqueue_scripts", "it_add_external_css");
	add_action("wp_enqueue_scripts", "it_add_external_js");


	// Register Menus
	register_nav_menus(
		array(
			"main-menu" => "Main Menu",
		)
	);

	// ACF Add-ons
	add_action('acf/register_fields', 'it_my_register_fields');
	function it_my_register_fields()
	{
		include_once( get_template_directory() . '/includes/add-ons/acf-repeater/repeater.php');
		include_once( get_template_directory() . '/includes/add-ons/acf-contact-form-7/acf_cf7.php');
		include_once( get_template_directory() . '/includes/add-ons/acf-font-awesome/font-awesome-v4.php');
		include_once( get_template_directory() . '/includes/add-ons/acf-flexible-content/flexible-content.php');
	}

	// Options Page
	include_once( get_template_directory() . '/includes/add-ons/acf-options-page/acf-options-page.php' );

	add_filter('acf/options_page/settings','it_register_options_page');
	function it_register_options_page($options)
	{
	   $options['title'] = __('arfi', arfi_THEME_NAME);
	   $options['pages'] = array('Theme Options','Help!');
	   return $options;
	}


	add_filter('nav_menu_css_class' , 'it_nav_class' , 10 , 2);
	function it_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


	add_action( 'tgmpa_register', 'it_theme_plugins' );
	function it_theme_plugins() {
		$plugins = array(
	        array(
	            'name'      => 'Contact Form 7',
	            'slug'      => 'contact-form-7',
	            'required'  => false,
	        )
	    );
		$config = array(
	        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
	        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
	        'menu'         => 'tgmpa-install-plugins', // Menu slug.
	        'has_notices'  => true,                    // Show admin notices or not.
	        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
	        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
	        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	        'message'      => '',                      // Message to output right before the plugins table.
	        'strings'      => array(
	            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
	            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
	            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
	            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
	            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
	            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
	            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
	            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
	            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
	            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
	            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
	            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
	        )
	    );
	    tgmpa( $plugins, $config );
	}

}


function it_add_external_css() {
	// Register
	wp_register_style("wp-style", get_stylesheet_uri(), false, "1.0");
	wp_register_style("bootstrap", get_template_directory_uri()."/assets/css/bootstrap.css", false, "1.0");
	wp_register_style("font-awesome", get_template_directory_uri()."/assets/css/font-awesome.css", false, "1.0");
	wp_register_style("main", get_template_directory_uri()."/assets/css/main.css", false, "1.0");
	wp_register_style("animate", get_template_directory_uri()."/assets/css/animate.css", false, "1.0");

	// Enqueue
	wp_enqueue_style("wp-style");
	wp_enqueue_style("bootstrap");
	wp_enqueue_style("font-awesome");
	wp_enqueue_style("main");
	wp_enqueue_style("animate");


    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style("karla", "$protocol://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic");
    wp_enqueue_style("montserrat", "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700");

}

function it_add_external_js() {
	if(!is_admin()) {
		// Register
		wp_register_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.js", array("jquery"), "1.0", TRUE);
		wp_register_script("isotope", get_template_directory_uri()."/assets/js/isotope.pkgd.js", array("jquery"), "1.0", TRUE);
		wp_register_script("main", get_template_directory_uri()."/assets/js/main.js", array("jquery"), "1.0", TRUE);
		wp_register_script("parallax", get_template_directory_uri()."/assets/js/parallax.min.js", array("jquery"), "1.0", TRUE);
		wp_register_script("wow", get_template_directory_uri()."/assets/js/wow.min.js", array("jquery"), "1.0", TRUE);

		// Enqueue
		wp_enqueue_script("jquery");
		wp_enqueue_script("bootstrap");
		wp_enqueue_script("isotope");
		wp_enqueue_script("parallax");
		wp_enqueue_script("wow");
		wp_enqueue_script("main");

		if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	}
}

// Include custom css
include( get_template_directory() . "/assets/css/custom.php");


if ( ! function_exists( 'wp_site_icon' ) || ! has_site_icon() ) {
	function it_arfi_favicon() {
		$favicon = get_field("arfi_favicon","option");
		echo "<link rel='shortcut icon' href='$favicon' />";
	}
	add_action('wp_head', 'it_arfi_favicon');
}

add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', arfi_THEME_NAME ),
        'id' => 'sidebar-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', arfi_THEME_NAME ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));
}



function arfi_social_sharing_buttons($arfi_share_buttons) {
	// Show this on post and page only. Add filter is_home() for home page
	if(is_single()){

		// Get current page URL
		$shortURL = get_permalink();

		// Get current page title
		$shortTitle = get_the_title();

		// Construct sharing URL without using any script
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shortURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$shortURL.'&amp;via=Crunchify';
		$googleURL = 'https://plus.google.com/share?url='.$shortURL;

		// Add sharing button at the end of page/page content
		$arfi_share_buttons .= '<div class="share-side">';
		$arfi_share_buttons .= '<h5>Share Via:</h5>';
		$arfi_share_buttons .= '<ul>';
		$arfi_share_buttons .= '<li><a class="" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		$arfi_share_buttons .= '<li><a class="" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		$arfi_share_buttons .= '<li><a class="" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
		$arfi_share_buttons .= '</ul>';
		$arfi_share_buttons .= '</div>';
		return $arfi_share_buttons;
	}
	else{
		return $arfi_share_buttons;
	}
};
add_filter( 'the_content', 'arfi_social_sharing_buttons');



function it_pagination($pages = '', $class = '', $range = 4) {
	 $showitems = ($range * 2)+1;

	 global $paged;
	 if(empty($paged)) $paged = 1;

	 if($pages == '')
	 {
		 global $wp_query;
		 $pages = $wp_query->max_num_pages;
		 if(!$pages)
		 {
			 $pages = 1;
		 }
	 }

	 if($class == '') {
	 	$pagination_class = 'pagination';
	 } else {
	 	$pagination_class = $class;
	 }

	 if(1 != $pages)
	 {
		 echo "<ul class=\"" . esc_attr($pagination_class)  . "\">";
		 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; ".__("First")."</a>";
		 if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; ".__("Previous")."</a></li>";

		 for ($i=1; $i <= $pages; $i++)
		 {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			 {
				 echo ($paged == $i)? "<li class=\"active\"><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
			 }
		 }

		 if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">".__("<i class='fa fa-long-arrow-right'></i>")." &rsaquo;</a>";
		 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>".__("<i class='fa fa-long-arrow-left'></i>")." &raquo;</a></li>";
		 echo "</ul>\n";
	 }
}