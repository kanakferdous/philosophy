<?php
/*
* Required Theme File Load
*/
require_once(get_theme_file_path( "/inc/tgm.php" ));
require_once(get_theme_file_path( "/inc/attachments.php" ));

if ( ! isset( $content_width ) ) $content_width = 900;

/*
* After Setup Theme Action Hook
*/
function philosophy_theme_setup() {
  load_theme_textdomain( "philosophy" );
  add_theme_support( "post-thumbnails" );
  add_theme_support( "custom-logo" );
  add_theme_support( "title-tag" );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( "html5", array('search-form','comment-list'));
  add_theme_support( "post-formats", array('image','gallery','quote','audio','video','link'));
  remove_theme_support( 'widgets-block-editor' );
  add_editor_style( "/assets/css/editor-style.css" );

  register_nav_menus( array(
    "topmenu"  =>__("Top Menu", "philosophy"),
    "footer_left" =>__("Footer Left Menu", "philosophy"),
    "footer_middle" =>__("Footer Middle Menu", "philosophy"),
    "footer_right" =>__("Footer Right Menu", "philosophy"),
  ));
}
add_action( "after_setup_theme" , "philosophy_theme_setup" );


/*
* Load Theme Assets Action Hook
*/
function philosophy_assets() {

  // Enqueue Styles
  wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.1.0" );
  wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.1.0" );
  wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.1.0" );
  wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.1.0" );
  wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.1.0" );
  wp_enqueue_style( "philosophy-css", get_stylesheet_uri() );

  // Enqueue Script
  wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.1.0" );
  wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.1.0" );
  wp_enqueue_script( "plugin-js", get_theme_file_uri( "/assets/js/plugins.js" ),array("jquery"), "1.1.0", true );
  
  if ( is_singular() ) {
    wp_enqueue_script( "comment-reply" );
  }
  wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ),array("jquery"), "1.1.0", true );
}
add_action( "wp_enqueue_scripts", "philosophy_assets" );


/*
* Pagination Function
*/
function philosophy_pagination() {
  global $wp_query;
  $links = paginate_links( array(
    'current' => max(1, get_query_var( 'paged' )),
    'total' => $wp_query->max_num_pages,
    'type'  => 'list',
    'mid_size'  => 3
  ));
  $links = str_replace("page-numbers", "pgn__num", $links);
  $links = str_replace("<ul class='pgn__num'>", "<ul>", $links);
  $links = str_replace("next pgn__num", "pgn__next", $links);
  $links = str_replace("prev pgn__num", "pgn__prev", $links);
  echo wp_kses_post( $links );
}


/*
* Remove Autop Function
*/
remove_action( "term_description", "wpautop" );


/*
* All Widgets
*/
function philosophy_widgets() {
  register_sidebar( array(
    'name'          => __( 'About Us Page', 'philosophy' ),
    'id'            => 'about-us',
    'description'   => __( 'Widgets in this area will be shown on About Us Page.', 'philosophy' ),
    'before_widget' => '<div class="col-block">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="quarter-top-margin">',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Contact Us Page', 'philosophy' ),
    'id'            => 'contact-us',
    'description'   => __( 'Widgets in this area will be shown on Contact Us Page.', 'philosophy' ),
    'before_widget' => '<div class="col-six tab-full">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Contact Us Page Google Map', 'philosophy' ),
    'id'            => 'google-map',
    'description'   => __( 'Widgets in this area will be shown on Contact Us Page Google Map.', 'philosophy' ),
    'before_widget' => '<div class="map-wrap">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Before Footer Right', 'philosophy' ),
    'id'            => 'before-footer-right',
    'description'   => __( 'Widgets in this area will be shown on Before Footer Right.', 'philosophy' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  register_sidebar( array(
    'name'          => __( 'Newsletter Widget', 'philosophy' ),
    'id'            => 'newsletter-widget',
    'description'   => __( 'Widgets in this area will be shown on Newsletter Widget.', 'philosophy' ),
    'before_widget' => '<div class="col-five md-full end s-footer__subscribe">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));

  register_sidebar( array(
    'name'          => __( 'Copyright Widget', 'philosophy' ),
    'id'            => 'copyright-widget',
    'description'   => __( 'Widgets in this area will be shown on Copyright Widget.', 'philosophy' ),
    'before_widget' => '<div class="s-footer__copyright">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
  ));

  register_sidebar( array(
    'name'          => __( 'Header Social Icons', 'philosophy' ),
    'id'            => 'header-social-icons',
    'description'   => __( 'Widgets in this area will be shown on Header Social Icons.', 'philosophy' ),
    'before_widget' => '<div class="s-footer__copyright">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
  ));
}
add_action( "widgets_init", "philosophy_widgets" );


/*
* Header Search Form
*/
function philosophy_search_form($form) {
  $homedir = home_url("/");
  $label = __('Search for:', 'philosophy');
  $button_label = __('Search', 'philosophy');
  $newform = <<<FORM
  <form role="search" method="get" class="header__search-form" action="{$homedir}">
    <label>
      <span class="hide-content">{$label}</span>
      <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="{$label}" autocomplete="off">
    </label>
    <input type="submit" class="search-submit" value="{$button_label}">
  </form>
  FORM;
  return $newform;
}
add_filter('get_search_form', 'philosophy_search_form');