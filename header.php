<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <?php wp_head(  );?>

</head>

<body id="top" <?php body_class();?>>
<?php wp_body_open(); ?>
  <!-- pageheader
  ================================================== -->
  <section class="s-pageheader <?php if(is_home()) echo "s-pageheader--home";?>">
    <header class="header">
      <div class="header__content row">
        <div class="header__logo">
          <?php
            if (has_custom_logo()) {
              the_custom_logo();
            } else {
              echo "<h1>".get_bloginfo( "name" )."</h1>";
            }
            
          ?>
        </div> <!-- end header__logo -->
        <?php
          if (is_active_sidebar( "header-social-icons" )) {
            dynamic_sidebar( "header-social-icons" );
          }
        ?>

        <a class="header__search-trigger" href="#0"></a>

        <div class="header__search">
          <?php get_search_form();?>
          <a href="#0" title="Close Search" class="header__overlay-close">Close</a>
        </div>  <!-- end header__search -->

        <?php get_template_part( "template-parts/common/navigation" );?>
      </div> <!-- header-content -->
    </header> <!-- header -->

    <?php
      if (is_home()) {
        get_template_part( "template-parts/blog-home/featured" );
      }
    ?>
  </section> <!-- end s-pageheader -->