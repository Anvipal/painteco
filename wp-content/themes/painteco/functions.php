<?php
/**
 * painteco functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package painteco
 */

if (!function_exists('painteco_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function painteco_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on painteco, use a find and replace
         * to change 'painteco' to the name of your theme in all the template files.
         */
        load_theme_textdomain('painteco', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Enable support for custom thumbnail sizes.
         */
        add_image_size('news-thumb', 120, 112, true);
        add_image_size('news-list-thumb', 260, 190, true);
        add_image_size('news-image', 450, 315, true);
        add_image_size('front-page-product', 262, 234, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'primary' => esc_html__('Galvenais', 'painteco'),
            'about_us' => esc_html__('Kājene: Par mums', 'painteco'),
            'about_us_submenu' => esc_html__('Apakšizvēlne: Par mums', 'painteco'),
            'products' => esc_html__('Kājene: Produkti', 'painteco'),
            'contacts' => esc_html__('Kājene: Kontakti', 'painteco'),
            'gallery' => esc_html__('Kājene: Galerija', 'painteco'),

        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('painteco_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }
endif;
add_action('after_setup_theme', 'painteco_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function painteco_content_width()
{
    $GLOBALS['content_width'] = apply_filters('painteco_content_width', 640);
}

add_action('after_setup_theme', 'painteco_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function painteco_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'painteco'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'painteco_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function painteco_scripts()
{

    wp_enqueue_style('painteco-style-slick', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css');
    wp_enqueue_style('painteco-style-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700,300&subset=latin,latin-ext');
    wp_enqueue_style('painteco-style-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_style('painteco-style-fancybox', get_template_directory_uri() . '/vendor/fancybox/jquery.fancybox.css');

    wp_enqueue_style('painteco-style', get_stylesheet_uri());
    wp_enqueue_style('painteco-style-site', get_template_directory_uri() . '/site.css', [], '4.5.6');

    wp_enqueue_script('painteco-mixitup', 'https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js', array('jquery'), '2.1.11', true);
    wp_enqueue_script('painteco-slick', 'https://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array('jquery'), '1.5.9', true);

    wp_enqueue_script('painteco-fancybox', get_template_directory_uri() . '/vendor/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);

    wp_enqueue_script('painteco-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('painteco-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
    wp_enqueue_script('painteco-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', array('jquery'), '20160808', true);
    wp_enqueue_script('painteco-language', get_template_directory_uri() . '/js/language-switch.js', array('jquery'), '20160319', true);
    wp_enqueue_script('painteco-calculator', get_template_directory_uri() . '/js/consumption-calculator.js', array('jquery'), '20160319', true);
    wp_enqueue_script('painteco-colorpicker', get_template_directory_uri() . '/js/color-picker.js', array('jquery'), '20160329', true);
    wp_enqueue_script('painteco-site', get_template_directory_uri() . '/js/site.js', array('jquery'), '20160808', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'painteco_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
    acf_add_options_sub_page('Vispārīgi');
    acf_add_options_sub_page('Sākuma lapa');
    acf_add_options_sub_page('Kāpēc PaintEco?');
    acf_add_options_sub_page('Komanda');
    acf_add_options_sub_page('Atsauksmes');
    acf_add_options_sub_page('Kontakti');
    acf_add_options_sub_page('Krāsu modelēšana');
    acf_add_options_sub_page('Krāsu palete');
    acf_add_options_sub_page('Produktu pielietojums');
    acf_add_options_sub_page('Sadarbības partneri');
    acf_add_options_sub_page('Titulbildes');
}

add_action('init', 'painteco_posttype');
function painteco_posttype()
{
    register_post_type('painteco_product',
        [
            'labels' => array(
                'name' => __('Produkti'),
                'singular_name' => __('Produkts'),
                'add_new' => __('Jauns produkts'),
                'add_new_item' => __('Pievienot jaunu produktu'),
                'edit_item' => __('Rediģēt produktu'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'products'],
            'menu_icon' => 'dashicons-cart',
            'supports' => ['title', 'editor', 'thumbnail']
        ]
    );
    register_post_type('painteco_color_model',
        [
            'labels' => array(
                'name' => __('Izkrāso pats'),
                'singular_name' => __('Krāsu modelis'),
                'add_new' => __('Jauns modelis'),
                'add_new_item' => __('Pievienot jaunu modeli'),
                'edit_item' => __('Rediģēt modeli'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'color-model'],
            'menu_icon' => 'dashicons-admin-customizer',
            'supports' => ['title']
        ]
    );
    register_post_type('painteco_galleries',
        [
            'labels' => array(
                'name' => __('Galerijas'),
                'singular_name' => __('Galerija'),
                'add_new' => __('Jauna galerija'),
                'add_new_item' => __('Pievienot jaunu galeriju'),
                'edit_item' => __('Rediģēt galeriju'),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'gallery'],
            'menu_icon' => 'dashicons-format-gallery',
            'supports' => ['title', 'thumbnail'],
            'page-attributes' => true,
            'hierarchical' => true,
        ]
    );
    register_taxonomy(
        'painteco_gallery_category',
        'painteco_galleries',
        array(
            'label' => __('Galeriju kategorijas'),
            'rewrite' => array('slug' => 'galleries'),
            'hierarchical' => true,
        )
    );
}

function painteco_lang_category_id($id)
{
    if (function_exists('icl_object_id')) {
        return icl_object_id($id, 'category', true);
    } else {
        return $id;
    }
}

function painteco_get_palette()
{
    $indexedPalette = [];
    foreach (get_field('palette', 'options') as $item) {
        $code = $item['palette_code'];
        $indexedPalette[$code] = $item;
    }

    return $indexedPalette;
}

add_action( 'admin_post_nopriv_contact_form', 'painteco_contact_form' );
add_action( 'admin_post_contact_form', 'painteco_contact_form' );
function painteco_contact_form(){
	$client_email = $_POST['subscribe_email'];
	$form_name = $_POST['form_name'];
	$return_url = $_POST['return_url'];
	$to = 'viznukalex06@gmail.com';
	wp_mail($to, "Jauns e-pasts no painteco.com", "Forma: {$form_name}\n<br\>Email: {$client_email}");
	wp_redirect($return_url);
}
