<?php
/*
Template Name: Events
*/
?>

<?php get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="twelve columns" role="main">
        <div class="container">
          <h1>Events</h1>
    		<?php roots_loop_before(); ?>
		         <h2>Featured Events</h2>
		          <div class="row eventsRow">
		      		<?php
		     			$r_count = 1;

						global $post;
							$all_events = tribe_get_events(array(
							'eventDisplay'=>'upcoming',
							'posts_per_page'=>6
							));

						foreach($all_events as $post) {
						setup_postdata($post);

						 	 if($r_count%6 == 0){
								$r_class = 'last';
								}else{
								$r_class = '';
						 		}
								$r_count++;

					?>
					<section class="two columns <?php echo $r_class?> event">
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
				<p class="eventsMore"><a href="../featured-events">See all featured events</a></p>

          <?php roots_loop_after(); ?>

          <section class="twelve columns">
          <?php /* Start loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
    		<?php roots_loop_before(); ?>
          <?php the_content(); ?>
          <?php endwhile ?>
          <?php roots_loop_after(); ?>
          </section>
        </div>
      </div><!-- /#main -->
    <?php roots_main_after(); ?>
    <!--<?php roots_sidebar_before(); ?>
      <aside id="sidebar" class="<?php echo $roots_options['sidebar_class']; ?>" role="complementary">
      <?php roots_sidebar_inside_before(); ?>
        <div class="container">
          <?php get_sidebar(); ?>
        </div>
      <?php roots_sidebar_inside_after(); ?>
      </aside>
    <?php roots_sidebar_after(); ?> -->
    </div><!-- #content -->
  <?php roots_content_after(); ?>
<?php get_footer(); ?>
