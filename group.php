<?php
/*
Template Name: Group
*/
?>
<?php get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="<?php echo $roots_options['main_class']; ?>" role="main">
        <div class="container">
          <?php roots_loop_before(); ?>
          <?php get_template_part('loop', 'page'); ?>
          <?php roots_loop_after(); ?>
        </div>
        <?php
			global $post;
			$cats=array();
			foreach(get_the_category() as $category) {
		    $cats[]=$category->cat_ID;
			}
			$showposts = 4; // -1 shows all posts
			$do_not_show_stickies = 1; // 0 to show stickies
			$args=array(
 		   'category__in' => $cats,
	       'showposts' => $showposts,
           'caller_get_posts' => $do_not_show_stickies
           );
           $my_query = new WP_Query($args);
?>
      <div id="more" class="twelve columns last">
	    <?php if( $my_query->have_posts() ) : ?>
		  <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
  			    <div class="morePost three columns">
       				<?php
						if ( has_post_thumbnail() )
						{
 							 the_post_thumbnail ('bottom_image');
						}
					?>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				</div><!--/.morePost-->
								<?php endwhile;  // End the loop ?>
				<?php wp_reset_query() ?>
          </div><!--/#more-->
      <?php else : ?>
    <?php endif; ?>

      </div><!-- /#main -->
    <?php roots_main_after(); ?>
    <?php roots_sidebar_before(); ?>
      <aside id="sidebar" class="<?php echo $roots_options['sidebar_class']; ?>" role="complementary">
      <?php roots_sidebar_inside_before(); ?>
        <div class="container">
          <?php get_sidebar(); ?>
        </div>
      <?php roots_sidebar_inside_after(); ?>
      </aside><!-- /#sidebar -->
    <?php roots_sidebar_after(); ?>
    </div><!-- /#content -->
  <?php roots_content_after(); ?>
<?php get_footer(); ?>
