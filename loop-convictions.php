<?php
/*************************
Loop for the Convictions Page
*************************/
?>
  <?php /* Start loop */ ?>
    <?php $args = array( 'post_type' => 'proverbs', 'posts_per_page' => 10,);
      $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); ?>
  	      <div class="twelve columns">
  	        <div class="accordionButton ">
  	          <article class="convictionsPost" id="post-<?php the_ID(); ?>">
  	            <h3 class="convictionsName"><?php the_title(); ?></h3>
  	          </article>
  	        </div><!--/.accordionButton -->

            <div class="accordionContent">
  	          <?php the_content(); ?>
  	        </div><!--/.accordionContent -->
  	      </div> <!-- /.twelve -->
        <?php endwhile;  ?>
