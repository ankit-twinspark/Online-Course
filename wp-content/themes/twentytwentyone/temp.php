<?php
/*
 * Template Name: COURSE
 */
get_header();


?>
<style type="text/css">
    
    .swiper {
  width: 700px;
  height: 350px;
}
</style>

<link
  rel="stylesheet"
  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
/>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<!-- Slider main container -->
<?php 
global $post;
$main_args = ['post_type' => 'course'];
// execute the main query
$the_main_loop = new WP_Query($main_args);
// go main query
if($the_main_loop->have_posts()) {?>
<div class="swiper">
   <!-- Additional required wrapper -->
   <div class="swiper-wrapper">
      <!-- Slides -->
      <?php 
    while($the_main_loop->have_posts()) { 
    $the_main_loop->the_post(); 
?>
     <div class="swiper-slide">
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'large' ); ?>

        <img src="<?php echo $url ?>" alt="<?php the_title();?>"><?php the_title();?></div>
    <?php   } // endwhile
    wp_reset_postdata(); // VERY VERY IMPORTANT
    ?>
   </div>

   <!-- If we need pagination -->
   <div class="swiper-pagination"></div>
   <!-- If we need navigation buttons -->
   <div class="swiper-button-prev"></div>
   <div class="swiper-button-next"></div>
   <!-- If we need scrollbar -->
   <div class="swiper-scrollbar"></div>
</div>

<?php }?>
<script type="text/javascript">
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
</script>


<?php
$args = array('post_type' => 'course' );                                              
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
    echo '<ul>';
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        echo '<li>' . get_the_title() . '</li>';
    }
    echo '</ul>';
    /* Restore original Post Data */
    wp_reset_postdata();
} else {
    // no posts found
}
?>
<?php 
//get_sidebar();
?>

<?php
get_footer();
wp_footer();

?>