<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <?php roots_post_inside_before(); ?>
      <?php if ( is_page('Who We Are')){
      }
      else {  ?>
      <h1><?php the_title(); ?></h1>
      <?php }; ?>
      <?php the_content(); ?>
       	<?php comments_template(); ?>
      <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>' )); ?>
    <?php roots_post_inside_after(); ?>
  <?php roots_post_after(); ?>
<?php endwhile; // End the loop ?>
