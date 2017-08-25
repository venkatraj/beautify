<?php
/**
 * beautify functions and definitions
 *
 * @package Beautify
 */

if ( ! function_exists( 'beautify_setup' ) ) :  
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function beautify_setup() { 

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on beautify, use a find and replace
	 * to change 'beautify' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'beautify', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery',  
	) );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'beautify' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-list', 'gallery', 'caption',
	) );


	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beautify_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    /**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 */
	$GLOBALS['content_width'] = apply_filters( 'beautify_content_width', 780 );


    /* 
    * Custom Logo 
    */
    add_theme_support( 'custom-logo' );

    
	/* Woocommerce support */

	add_theme_support('woocommerce');
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Add Additional image sizes
	 *
	 */
	add_image_size( 'beautify-recent-posts-img', 560, 310, true );
	add_image_size( 'beautify-service-img', 380, 180, true );
	add_image_size( 'beautify-service-center-img', 380, 380, true );
    add_image_size( 'beautify-blog-full-width', 380,350, true );
	add_image_size( 'beautify-small-featured-image-width', 450,300, true );
	add_image_size( 'beautify-blog-large-width', 800,300, true );     

    // Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
		
			'top-left' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => '<ul><li><i class="fa fa-building"></i>256 Interior the good, New York.</li><li><a href="#"><i class="fa fa-envelope"></i>supportyou@gmail.com</a></li></ul>'
					)
				)
			),

			// Put two core-defined widgets in the footer 2 area.
			'top-right' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array (
					  'text'  => '<ul><li><i class="fa fa-phone"></i>(+321) 2345 6789</li><li><ul><li><a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a></li><li><a href="https://www.skype.com"><i class="fa fa-skype"></i></a></li><li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li><li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li></ul></li></ul>'
					)
				),
			),

			'footer' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => __( '<h4 class="widget-title">About Us</h4>Interior personal participate in ethics training as part of our best practices program and each employee is provided with a skillset that help them makes the best decisions.','beautify')
					)
				)
			),
			'footer-2' => array(
				// Widget ID
			    'archives'
			),
			'footer-3' => array(
				// Widget ID
			    'my_text' => array(
					// Widget $id -> set when creating a Widget Class
		        	'text' , 
		        	// Widget $instance -> settings 
					array(
					  'text'  => __( '<h4 class="widget-title">Contact Details</h4><ul><li><i class="fa fa-map-marker"></i>14 Tottenham Court Road, London, English</li><li><i class="fa fa-phone"></i>(102) 6666 8888</li><li><i class="fa fa-envelope"></i>info@mail.com</li><li><i class="fa fa-fax"></i>(102) 8888 9999</li><li><i class="fa fa-clock-o"></i>Mon - Sat: 9:00 - 18:00</li></ul>','beautify')
					)
				)
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home' => array(
				'post_type' => 'page',
			),
			'blog' => array(
				'post_type' => 'page',
			),
			'service-section-title' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Who We Are', 'beautify'),
	        ),
			'slider-one' => array( 
	            'post_type' => 'post',
	            'post_title' => __( 'Post One', 'beautify'),
	            'post_content' => __( '<p>OUR EXPERTISE FOR</p><h1>INTERIOR DESIGN</h1><p><a href="#">OUR PORTFOLIO</a></p>', 'beautify'),
	            'thumbnail' => '{{post-featured-image}}',
	        ),
	        'slider-two' => array(
	            'post_type' => 'post',
	            'post_title' => __( 'Post Two', 'beautify'),
	            'post_content' => __( '<p>OUR EXPERTISE FOR</p><h1>INTERIOR DESIGN</h1><p><a href="#">OUR PORTFOLIO</a></p>', 'beautify'),
	            'thumbnail' => '{{post-featured-image}}',
	        ), 
			'service-one' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Commercial Design', 'beautify'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur.<p><a href="#">Read More</a></p>', 'beautify'),
				'thumbnail' => '{{page-images}}',
			),
			'service-two' => array(
				'post_type' => 'page',
				'post_title' => __( 'Official Design', 'beautify'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur.<p><a href="#">Read More</a></p>', 'beautify'),
				'thumbnail' => '{{page-images1}}',
			),
			'service-three' => array(
				'post_type' => 'page',
				'post_title' => __( 'Residential Design', 'beautify'),
	            'post_content' => __( 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur.<p><a href="#">Read More</a></p>', 'beautify'),
				'thumbnail' => '{{page-images2}}',
			),
			'recent-post-section-title' => array(  
				'post_type' => 'page',
				'post_title' => __( 'Our Blog', 'beautify'),
	        ),
			
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'post-featured-image' => array( 
				'post_title' => __( 'slider one', 'beautify' ),
				'file' => 'images/slider.png', // URL relative to the template directory.
			),
			'page-images' => array(
				'post_title' => __( 'Page Images', 'beautify' ),
				'file' => 'images/page1.png', // URL relative to the template directory.
			),
			'page-images1' => array(
				'post_title' => __( 'Page Images', 'beautify' ),
				'file' => 'images/page2.png', // URL relative to the template directory.
			),
			'page-images2' => array(
				'post_title' => __( 'Page Images', 'beautify' ),
				'file' => 'images/page3.png', // URL relative to the template directory.
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),  

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array( 
			'slider_cat' => '1',
			'service_1' => '{{service-one}}',
			'service_2' => '{{service-two}}',
			'service_3' => '{{service-three}}',
			'service_section_title' => '{{service-section-title}}',
			'recent_post_section_title' => '{{recent-post-section-title}}'
			
		),

	);

	$starter_content = apply_filters( 'beautify_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );

	     
}
endif; // beautify_setup
add_action( 'after_setup_theme', 'beautify_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function beautify_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'beautify' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );  
	register_sidebar( array(
		'name'          => __( 'Top Left', 'beautify' ),
		'id'            => 'top-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Top Right', 'beautify' ),
		'id'            => 'top-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebars( 3, array(
		'name'          => __( 'Footer %d', 'beautify' ),
		'id'            => 'footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'beautify_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/includes/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/includes/extras.php';
/**
 * Implement the Custom Header feature.
 */
require  get_template_directory()  . '/includes/custom-header.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/includes/jetpack.php';

/**
 * Load Theme Options Panel
 */
require get_template_directory() . '/includes/theme-options.php';

/* Woocommerce support */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content', 'beautify_output_content_wrapper');

function beautify_output_content_wrapper() {
	echo '<div class="container"><div class="row"><div id="primary" class="content-area eleven columns">';
}

remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
add_action( 'woocommerce_after_main_content', 'beautify_output_content_wrapper_end' );

function beautify_output_content_wrapper_end () {
	echo "</div>";
}

add_action( 'wp_head', 'beautify_remove_wc_breadcrumbs' );
function beautify_remove_wc_breadcrumbs() {
   	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}