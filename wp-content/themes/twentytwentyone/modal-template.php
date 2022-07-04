<?php

/*Template Name: modal Template*/?>

<?php get_header();?>

<div class="modal" tabindex="-1">
<?php
    $args = array(  
        'post_type' => 'modal',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
        'order' => 'ASC'
    );
    global $post;
    
    $loop = new WP_Query( $args ); 
    while ( $loop->have_posts() ) : $loop->the_post(); ?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookModal<?php $post->ID;?>">
  <?php the_title();?></button>
  


  
  <div class="modal-dialog<?php $post->ID;?>">
    <div class="modal-content<?php $post->ID;?>">
      <div class="modal-header">
        <h5 class="modal-title<?php the_title();?>"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body<?php $post->ID;?>">
        <p><?php the_content();?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

         
  <?php 
  
    endwhile;
    wp_reset_postdata(); 
?>
  
</div>
<?php get_footer();?>