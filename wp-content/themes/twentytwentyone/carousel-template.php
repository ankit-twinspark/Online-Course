<?php

/*Template Name: carousel Template*/?>

<?php get_header();?>





 <style type="text/css">
  .carousel-item{

    height: 20rem;
    background-color: blue;
  }

</style>

<div id="example" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<?php
    $args = array(  
        'post_type' => 'carousel',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC'
    );
    $i = 1;
    global $post;
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post();
    ?>

  

  
    <div class="carousel-item<?php if($i==1){echo 'active';} ?>">
      <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'medium');?>

        <img src="<?php echo $url ?>" class="d-block w-100" alt="<?php the_title();?>"> <?php the_title();?></div>
     
      
  <?php 
  $i++;
    endwhile;
    wp_reset_postdata(); 
?>
  
    </div>
</div>
<?php get_footer();?>