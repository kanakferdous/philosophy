<?php
  /**
   * Template Name: Contact Us
  */
  the_post();
  get_header();
?>
<!-- s-content
================================================== -->
<section class="s-content s-content--narrow">
  <div class="row">
    <div class="s-content__header col-full">
      <h1 class="s-content__header-title"><?php the_title();?></h1>
    </div> <!-- end s-content__header -->
    <div class="s-content__media col-full">
      <div id="map-wrap">
        <?php
          if (is_active_sidebar( "google-map" )) {
            dynamic_sidebar( "google-map" );
          }
        ?>
      </div>
    </div> <!-- end s-content__media -->
    <div class="col-full s-content__main">
      <?php the_content();?>
      <div class="row">
        <?php
          if (is_active_sidebar( "contact-us" )) {
            dynamic_sidebar( "contact-us" );
          }
        ?>
      </div> <!-- end row -->
      
      <h3><?php _e( "Say Hello.", "philosophy" );?></h3>
      <?php
        if (get_field("contact_form_shortcode")) {
          echo do_shortcode( get_field("contact_form_shortcode") );
        }
      ?>
    </div> <!-- end s-content__main -->
  </div> <!-- end row -->
</section> <!-- s-content -->
<?php get_footer();?>