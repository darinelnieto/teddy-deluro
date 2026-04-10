<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

/**
 * Register Theme Scripts
 * https://developer.wordpress.org/reference/hooks/wp_enqueue_scripts/
 */
function sajo_scripts() {
  wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/css/main.bundle.css' );
  wp_enqueue_style( 'bootstrap.css', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style('owl-carousel.css', get_template_directory_uri() . '/css/owl.carousel.min.css');
  wp_enqueue_style('font-awesome.css', get_template_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_style('flatpickr-css', 'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css');
  wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');

  wp_enqueue_script('jquery.js', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', true);
  wp_enqueue_script('aos.js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', true);
  wp_enqueue_script('flatpickr-js', 'https://cdn.jsdelivr.net/npm/flatpickr', array(), null, true);
  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/main.bundle.js', array( 'jquery' ), '', true );
  wp_enqueue_script('font-awesome.js', get_template_directory_uri() . '/js/font-awesome.min.js');
  wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '', true );
  wp_enqueue_script('owl-carousel.js', get_template_directory_uri() . '/js/owl.carousel.min.js');
}
add_action( 'wp_enqueue_scripts', 'sajo_scripts');

// Partials scripts
function sajo_register_partial_script($file) {
    $partial = basename($file, '.php');
    $js_file = get_template_directory() . "/js/partials/{$partial}.min.js";
    $js_url  = get_template_directory_uri() . "/js/partials/{$partial}.min.js";

    if (file_exists($js_file)) {
        // Cargar siempre en el footer
        add_action('wp_footer', function() use ($partial, $js_url) {
            wp_enqueue_script("partial-{$partial}", $js_url, [], null, true);
        });
    }
}
/**
 * Register Navigation Menus
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 */
function sajo_navigation_menus() {
  $locations = array(
    'main_menu' => __( 'Main Menu', 'text_domain' )
  );
  register_nav_menus( $locations );
}
add_action( 'init', 'sajo_navigation_menus' );

/**
 * Theme support
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 */
add_theme_support( 'custom-logo' );

// Options page
add_action('acf/init', function() {
  if (function_exists('acf_add_options_page')){
    acf_add_options_page(array(
      'page_title'    => 'Theme Settings',
      'menu_title'    => 'Theme Settings',
      'menu_slug'     => 'theme-settings',
      'capability'    => 'edit_posts',
      'redirect'      =>  true
      ));
    acf_add_options_sub_page(array(
      'page_title'     => 'Header',
      'menu_title'     => 'Header',
      'parent_slug'   => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'     => 'Globals styles',
      'menu_title'     => 'Globals styles',
      'parent_slug'   => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
      'page_title'     => 'Footer',
      'menu_title'     => 'Footer',
      'parent_slug'   => 'theme-settings',
    ));
  }
});

class Sajo_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $output .= $indent . '<li class="menu-item">';
        
        $atts = array(
            'href'        => ! empty( $item->url ) ? $item->url : '#',
            'title'       => ! empty( $item->attr_title ) ? $item->attr_title : 'Scroll link',
            'target'      => ! empty( $item->target ) ? $item->target : '_self',
            'rel'         => ! empty( $item->xfn ) ? $item->xfn : 'noopener noreferrer',
            'area-label'  => ! empty( $item->attr_title ) ? $item->attr_title : 'Scroll link',
            'class'       => 'menu-link',
        );
        
        // Add ARIA attributes para submenus
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $atts['aria-haspopup'] = 'true';
            $atts['aria-expanded'] = 'false';
        }
        
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        
        $html_atts = '';
        foreach ( $atts as $key => $value ) {
            if ( ! empty( $value ) ) {
                $html_atts .= ' ' . $key . '="' . esc_attr( $value ) . '"';
            }
        }
        
        $title = apply_filters( 'nav_menu_item_title', $item->title, $item, $args, $depth );
        $output .= '<a' . $html_atts . '>' . $title . '</a>';
    }
}
/*======== Evens post ========*/ 
add_theme_support('post-thumbnails');
add_post_type_support( 'services', 'thumbnail' );
function services_post(){
  /*====== Argument post type =====*/
  $services = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Services',
    'menu_icon' => 'dashicons-megaphone',
    'supports' => ['title', 'editor', 'thumbnail'],
  );
  /*============ Register post type ============*/
  register_post_type('services', $services);
}
add_action('init', 'services_post', 3);

/*======= Reviews =======*/
add_theme_support('post-thumbnails');
add_post_type_support( 'reviews', 'thumbnail' );
function reviews_post(){
  /*====== Argument post type =====*/
  $services = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Reviews',
    'menu_icon' => 'dashicons-format-status',
    'supports' => ['title', 'editor', 'thumbnail'],
  );
  /*============ Register post type ============*/
  register_post_type('reviews', $services);
}
add_action('init', 'reviews_post', 4);

/*======= Faqs =======*/
add_theme_support('post-thumbnails');
add_post_type_support( 'faqs', 'thumbnail' );
function faqs_post(){
  /*====== Argument post type =====*/
  $services = array(
    'public' => true,
    'has_archive' => true,
    'label'  => 'Faqs',
    'menu_icon' => 'dashicons-editor-ul',
    'supports' => ['title', 'editor', 'thumbnail'],
  );
  /*============ Register post type ============*/
  register_post_type('faqs', $services);
}
add_action('init', 'faqs_post', 5);