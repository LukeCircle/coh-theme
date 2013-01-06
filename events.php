<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>
  <div class="twelvecol">
    <div class="container">
      <h1>Events</h1>

      <h2>Featured Events</h2>
        <div class="row eventsRow">
          <?php
            //Initiate our counter var
            $r_count = 1;

            //Grab the post and set our loop arguments
            global $post;
              $all_events = tribe_get_events(array(
              'eventDisplay'=>'upcoming',
              'posts_per_page'=>6
              ));
            foreach($all_events as $post) {
            setup_postdata($post);

           //Let's count using our counter var and add a class to each sixth event
           if($r_count%6 == 0){
            $r_class = 'last';
            }else{
            $r_class = '';
            }
            $r_count++;
          ?>
          <? //Let's print out the markup for the featured events ?>
          <section class="twocol <?php echo $r_class?> event">
            <div class="event-thumb">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
            </div>
            <h2 class="event-date"><?php echo tribe_get_start_date( $post->ID, false, 'D, M j' ); ?></h2>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <?php if ( has_post_thumbnail() ) { ?>
              <div class="event-excerpt">
                <?php the_excerpt(); ?>
              </div>
              <?php } else { } ?>
              </section>
              <?php } //endforeach ?>
          <?php wp_reset_query(); ?>
        </div><!--end .row-->
        <!-- Set a link to see all featured events -->
        <p class="eventsMore"><a href="../featured-events">See all featured events</a></p>

      <section class="twelvecol">
        <?//Call to the Page's content where a shortcode is sitting for us to grab the google calendar ?>
          <?php /* Start loop */ ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile ?>
      </section>
    </div>
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->

<?php get_footer(); ?>
