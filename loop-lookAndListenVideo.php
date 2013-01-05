<?php
/*************************
Loop for the Videos
*************************/
?>
<h2>Videos</h2>
  <?php /* Start loop */ ?>

  <?php //Initiate our counter var ?>
  <?php $r_count = 1; ?>

  <?php //Set arguments for the loop ?>
  <?php $args = array( 'post_type' => 'lookAndListen', 'posts_per_page' => 12, 'type' => 'video' );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	    <?php //Iterate through the counter and add appropriate classes
       if($r_count%4 == 0){
		   $r_class = 'three columns lookAndListenPost last';
		   }else{
		   $r_class = 'three columns lookAndListenPost';
 		   }
		   $r_count++;
		  ?>

      <article class="<?php echo $r_class;?>" id="post-<?php the_ID(); ?> lookAndListenLink" rel="#video<?php the_ID(); ?>">
        <?php the_post_thumbnail ('grid_image'); ?>
      	<header>
        	<h3 class="entry-title"><?php the_title(); ?></h3>
        </header>
      </article>

      <div class="simpleOverlay" id="video<?php the_ID(); ?>">
	       <?php echo get_post_meta(get_the_ID(), '_video', true); ?>
     	</div>
    <?php endwhile;  ?>
