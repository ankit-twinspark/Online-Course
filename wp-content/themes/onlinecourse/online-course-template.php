<?php
/*
 * Template Name: online-course_home
 */
get_header();




?> <?php if(get_field('banner_slider')): ?>
<div class="container-fluid p-0 pb-5 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#header-carousel" data-slide-to="1"></li>
            <li data-target="#header-carousel" data-slide-to="2"></li>
        </ol>
        
        <div class="carousel-inner">
            <?php 
            $i = 0;
            while(the_repeater_field('banner_slider')): ?>
            <div class="carousel-item <?php if($i == 0){echo 'active';}?>" style="min-height: 300px;">
                <img class="position-relative w-100" src="<?php the_sub_field('banner_image',138);?>" style="min-height: 300px; object-fit: cover;">
                <div class="carousel-caption d-flex align-items-center justify-content-center">
                    <div class="p-5" style="width: 100%; max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-md-3"><?php the_sub_field('banner_title');?></h5>
                        <h1 class="display-3 text-white mb-md-4"><?php the_sub_field('banner_title');?></h1>
                        <a href="<?php the_sub_field('banner_link');?>" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                    </div>
                </div>
            </div>
            <?php 
            $i++;
            endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <?php
                global $post, $page_id;
              
                if (have_posts()):
                while (have_posts()) : the_post();
                    $url = wp_get_attachment_url( get_post_thumbnail_id($page_id=144), '' );
                    ?>

                <div class="col-lg-5">
                <img class="img-fluid rounded mb-4 mb-lg-0" src="<?php echo $url;?>" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"> Innovative Way To Learn</h5>
                        <p><?php $id=144; $post = get_page($id); echo $post->post_content;  ?><p>
                        
                    </div>
                    <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                </div>
   
    <?php
  endwhile;
else:
  echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
?>


                
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Category Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
                <h1>Explore Top Subjects</h1>
            </div>
            <div class="row">
                <?php
                        global $post;
                        $args = array('post_type' => 'subjects' );     
                              $the_query = new WP_Query( $args );
                            // The Loop
                              if ( $the_query->have_posts() ) {
                              
                              while ( $the_query->have_posts() ) {
                              $the_query->the_post();
                              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), '' ); 
                              ?>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="<?php echo $url;?>" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium"><?php the_title();?></h4>
                            <span>100 Courses</span>
                        </a>
                    </div>
                </div>
               <?php   } // endwhile
                    wp_reset_postdata(); // VERY VERY IMPORTANT
                }
                ?>
                
                 </div>
                 </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Category Start -->


    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                <h1>Our Popular Courses</h1>
            </div>
            <div class="row">
                <?php
                        global $post;
                        $args = array('post_type' => 'Courses' );     
                              $the_query = new WP_Query( $args );
                            // The Loop
                              if ( $the_query->have_posts() ) {
                              
                              while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), '' ); 
                              ?>
                                <div class="col-lg-4 col-md-6 mb-4">
                                <div class="rounded overflow-hidden mb-2">
                                <img class="img-fluid" src="<?php echo $url;?>" alt="">
                                 <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>25 Students</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>01h 30m</small>
                            </div>
                            <a class="h5" href="">Web design & development courses for beginner</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">$99</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php   } // endwhile
                    wp_reset_postdata(); // VERY VERY IMPORTANT
                }
                ?>

               
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Registration Start -->
    <?php
$sign_up_title= get_field('sign_up_title',138);
$sign_up_field= get_field('sign_up_field');
$sign_up_discription= get_field('sign_up_discription',138);
$sign_up_attribute_1= get_field('sign_up_attribute_1',138);
$sign_up_attribute_2= get_field('sign_up_attribute_1',138);
$sign_up_attribute_3= get_field('sign_up_attribute_1',138);

?>
    <div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"><?php echo $sign_up_title;?></h5>
                        <h1 class="text-white"><?php echo $sign_up_field;?></h1>
                    </div>
                    <p class="text-white"><?php echo $sign_up_discription;?></p>
                    <ul class="list-inline text-white m-0">
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i><?php echo $sign_up_attribute_1;?></li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i><?php echo $sign_up_attribute_2;?></li>
                        <li class="py-2"><i class="fa fa-check text-primary mr-3"></i><?php echo $sign_up_attribute_3;?></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-light text-center p-4">
                            <h1 class="m-0">sign up</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <div class="form-control border-0 p-8">
                                        <?php echo do_shortcode('[gravityform id="2" title="true" description="false" ajax="true"]');?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->


    <!-- Team Start -->
    <?php if(get_field('teacher')): ?>
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Teachers</h5>
                <h1>Meet Our Teachers</h1>
            </div>
            <div class="row">
               <?php while(the_repeater_field('teacher')): ?>
                <div class="col-md-6 col-lg-3 text-center team mb-4">
                    <div class="team-item rounded overflow-hidden mb-2">
                        <div class="team-img position-relative">
                            <img class="img-fluid" src="<?php the_sub_field('image');?>" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-square mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary p-4">
                            <h5><?php the_sub_field('image_field');?></h5>
                            <p class="m-0"><?php the_sub_field('image_title');?></p>
                        </div>
                    </div>
                </div>
               <?php endwhile;?> 
                
            </div>
        </div>
    </div>
<?php endif;?>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Testimonial</h5>
                <h1>What Say Our Students</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                            <?php
                        global $post;
                        $args = array('post_type' => 'Testimonial' );     
                              $the_query = new WP_Query( $args );
                            // The Loop
                              if ( $the_query->have_posts() ) {
                              
                              while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), '' ); 
                              ?>
                            <div class="text-center">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            
                            <h4 class="font-weight-normal mb-4"><?php the_content();?></h4>
                            <img class="img-fluid mx-auto mb-3" src="<?php echo $url;?>" alt="">
                            <h5 class="m-0">Client Name</h5>
                            <span>Profession</span>

                        </div>
                            <?php   } // endwhile
                            wp_reset_postdata(); // VERY VERY IMPORTANT
                           }
                ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Our Blog</h5>
                <h1>Latest From Our Blog</h1>
            </div>
            <div class="row pb-3">
                
                    <?php
                        global $post;
                        $args = array('post_type' => 'post' );     
                              $the_query = new WP_Query( $args );
                            // The Loop
                              if ( $the_query->have_posts() ) {
                              
                              while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                              $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), '' ); 
                              ?>
                    <div class="col-lg-4 mb-4">
                    <div class="blog-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="<?php echo $url;?>" alt="">
                        <a class="blog-overlay text-decoration-none" href="">
                            <h5 class="text-white mb-3"><?php the_content();?></h5>
                            <p class="text-primary m-0">Jan 01, 2050</p>
                        </a>
                    </div>
                    </div>
                     <?php   } // endwhile
                            wp_reset_postdata(); // VERY VERY IMPORTANT
                           }?>
                
            
        </div>
    </div>
</div>
    
    <?php get_footer(); ?>
