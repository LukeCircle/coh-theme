<?php
/**********************
Loop for any archive page
************************/
?>
<?php /* Start loop */ ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php if('team_page' === get_post_type() ) { ?>
	    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	      <?php the_post_thumbnail ('bottom_image'); ?>
	      <h3 class="entry-title"><?php the_title(); ?></h3>
	    </article>
  	<?php endwhile; // End the loop ?>
  	<?php }
  	else {?>
      <article class="four columns" id="post-<?php the_ID(); ?>">
        <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>
      </article>
  <?php endwhile; // End the loop ?>
<?php };?>
