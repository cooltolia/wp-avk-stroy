<?php



if ( !function_exists( 'avkstroy_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function avkstroy_setup()
    {
        load_theme_textdomain( 'avkstroy' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-logo', array( 'width' => 157, 'height' => 150, 'flex-height' => true ) );
        add_image_size( 'avkstroy-news-featured', 353, 180, TRUE );
        add_image_size( 'avkstroy-product-featured', 858, 540, TRUE );
        add_image_size( 'avkstroy-product-main', 485, 240, TRUE );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( [
            'top-menu'    => 'Top menu',
            'services'    => 'Services menu'
        ] );
    }
endif;
add_action( 'after_setup_theme', 'avkstroy_setup' );

/**
 * Enqueues scripts and styles.
 
 */
function avkstroy_scripts()
{
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap.min.css' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/libs/slick/slick.css' );
	wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.css' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_script( 'ya-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/libs/bootstrap.min.js' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/libs/slick/slick.min.js' );
	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/libs/fancybox/jquery.fancybox.min.js' );
    wp_enqueue_script( 'avkstroy-main', get_template_directory_uri() . '/assets/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'avkstroy_scripts' );

add_filter( 'nav_menu_link_attributes', function($atts) {
	$atts['class'] = "main-nav__link";
	return $atts;
}, 100, 1 );

add_filter( 'nav_menu_css_class', function($classes) {
    $classes[] = 'main-nav__item';
    return $classes;
}, 90, 1 );