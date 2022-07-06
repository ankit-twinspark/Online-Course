<?php

/*Template Name: Accordian Template*/?>

<?php get_header();?>
<div class="accordion" id="accordionExample">
<?php
    $args = array(  
        'post_type' => 'accordion',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC'
    );
    $i = 1;
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?php echo $i;?>">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="false" aria-controls="collapse<?php echo $i;?>">
        <?php the_title();?>
      </button>
    </h2>
    <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <?php the_content();?>
      </div>
    </div>
  </div>
  <?php 
  $i++;
    endwhile;
    wp_reset_postdata(); 
?>
  
</div>
<?php get_footer();?>