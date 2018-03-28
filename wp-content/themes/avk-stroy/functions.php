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
        add_image_size( 'avkstroy-service-image', 316, 177, TRUE );
        add_image_size( 'avkstroy-license-image', 320, 452, TRUE );
        add_image_size( 'avkstroy-object-thumb', 700, 700, TRUE );

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus( [
            'main-menu'    => 'Main menu',
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

function add_class_to_href( $classes, $item ) {
    if ( in_array('current_page_item', $item->classes) ) {
        $classes['class'] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );

/**
 *
 * The page content surrounding the settings fields. Usually you use this to instruct non-techy people what to do.
 *
 */
function avkstroy_settings_page() {
    wp_enqueue_media();
    ?>
  <div class="wrap">
    <h1>Информация о компании</h1>
    <p>Изменения в форме обновят соответсвующие данные на сайте</p>
    <form method="post" action="options.php">
        <?php
        settings_fields( "section" );
        do_settings_sections( "avkstroy-theme-options" );
        submit_button();
        ?>
    </form>
  </div>

<?php }
/**
 *
 * Next comes the settings fields to display. Use anything from inputs and textareas, to checkboxes multi-selects.
 *
 */
// Phone
function avkstroy_display_company_phone_element() { ?>

  <input type="tel" required name="company_phone" placeholder="Введите номер телефеона"
         value="<?php echo get_option( 'company_phone' ); ?>" size="35">

<?php }
//Название
function avkstroy_display_company_name_element() { ?>

    <input type="text" required name="company_name" placeholder="Введите номер телефеона"
           value="<?php echo get_option( 'company_name' ); ?>" size="35">
  
<?php }

// ИНН
function avkstroy_display_company_inn_element() { ?>

    <input type="text" required name="company_inn" placeholder="Введите номер телефеона"
           value="<?php echo get_option( 'company_inn' ); ?>" size="35">
  
<?php }
// ОГРН
function avkstroy_display_company_ogrn_element() { ?>

    <input type="text" required name="company_ogrn" placeholder="Введите номер телефеона"
           value="<?php echo get_option( 'company_ogrn' ); ?>" size="35">
  
<?php }
// address
function avkstroy_company_address_element() { 
    wp_editor( get_option( 'company_address' ), "company_address", $settings = [] );
}
// Email
function avkstroy_company_email_element() { ?>

  <input type="email" required name="company_email" placeholder="Введите email"
         value="<?php echo get_option( 'company_email' );
         ?>" size="35">

<?php }
// Copyright
function avkstroy_company_copyright_element() {
    wp_editor( html_entity_decode( get_option( 'company_copyright' ) ), "company_copyright", $settings = [] );
}

/**
 *
 * Here you tell WP what to enqueue into the <form> area. You need:
 *
 * 1. add_settings_section
 * 2. add_settings_field
 * 3. register_setting
 *
 */

function avkstroy_custom_info_fields() {
    // Добавляем поле секции
    add_settings_section( "section", "Информация о компании", NULL, "avkstroy-theme-options" );
    add_settings_field( "company_name", "Название компании", "avkstroy_display_company_name_element", "avkstroy-theme-options","section" );
    add_settings_field( "company_phone", "Телефон компании", "avkstroy_display_company_phone_element", "avkstroy-theme-options","section" );
    add_settings_field( "company_inn", "ИНН компании", "avkstroy_display_company_inn_element", "avkstroy-theme-options","section" );
    add_settings_field( "company_ogrn", "ОГРН компании", "avkstroy_display_company_ogrn_element", "avkstroy-theme-options","section" );
    add_settings_field( "company_address", "Адрес компании", "avkstroy_company_address_element", "avkstroy-theme-options", "section" );
    add_settings_field( "company_email", "Email", "avkstroy_company_email_element", "avkstroy-theme-options", "section" );
    add_settings_field( "company_copyright", "Копирайт", "avkstroy_company_copyright_element", "avkstroy-theme-options", "section" );
    // Регистрируем дефаулты
    if ( ! get_option( "company_phone" ) ) {
        update_option( 'company_phone', '+7(812) 240-20-68' );
    }
    if ( ! get_option( "company_name" ) ) {
        update_option( 'company_name', 'ООО “AВК-Строй”' );
    }
    if ( ! get_option( "company_inn" ) ) {
        update_option( 'company_inn', '7811523780' );
    }
    if ( ! get_option( "company_ogrn" ) ) {
        update_option( 'company_ogrn', '1127847312163 193091' );
    }
    if ( ! get_option( "company_address" ) ) {
        update_option( 'company_address', 'город Санкт-петербург, Октябрьская набережная,<br> 
        дом 6, литер В, помещение 11-Н' );
    }
    if ( ! get_option( "company_email" ) ) {
        update_option( 'company_email', 'mail@avk-stroy.spb.ru' );
    }
    if ( ! get_option( "company_copyright" ) ) {
        update_option( 'company_copyright', '2018 © ООО “AВК-Строй”' );
    }
    
    // Регистрируем настройки
    register_setting( "section", "company_phone" );
    register_setting( "section", "company_name" );
    register_setting( "section", "company_inn" );
    register_setting( "section", "company_ogrn" );
    register_setting( "section", "company_address" );
    register_setting( "section", "company_email" );
    register_setting( "section", "company_copyright" );
}

add_action( "admin_init", "avkstroy_custom_info_fields" );

/**
 *
 * Tie it all together by adding the settings page to wherever you like. For this example it will appear
 * in Settings > Contact Info
 *
 */
function avkstroy_add_custom_info_menu_item() {
    add_options_page( "Информация о компании", "Информация о компании", "manage_options", "contact-info", "avkstroy_settings_page" );
}

add_action( "admin_menu", "avkstroy_add_custom_info_menu_item" );

function my_pre_get_posts( $query ) {
	
	// do not modify queries in the admin
	if( is_admin() ) {
		
		return $query;
		
	}
	
	
	// only modify queries for 'event' post type
	if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'object' ) {
		
		// allow the url to alter the query
		if( isset($_GET['status']) ) {
			
    		$query->set('meta_key', 'object-active');
			$query->set('meta_value', $_GET['status']);
			
    	} 
		
	}
	
	
	// return
	return $query;

}

add_action('pre_get_posts', 'my_pre_get_posts');