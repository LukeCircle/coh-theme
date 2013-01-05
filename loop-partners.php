<?php
/**************************************
Loop for "Expressions" or Partners Page
**************************************/
?>
  <?php /* Start loop */ ?>
  <? //Set our Counter var ?>
  <?php $r_count = 1; ?>

  <?php $args = array( 'post_type' => 'partners', 'posts_per_page' => 50);
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	  <?php //Iteratre through our counter and add appropriate classes
      if($r_count%3 == 0){
  		$r_class = 'last';
  		}else{
  		$r_class = '';
   		}
  		$r_count++;
  	?>
	    <a href="<?php echo get_post_meta($post->ID, "_partner", true); ?>" class="teamLink" target="_blank">
        <article class="four columns partnerPage <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
          <?php the_post_thumbnail ('grid_image'); ?>
          <h2 class="partnerName"><?php the_title(); ?></h2>
	      </article>
	    </a>
  <?php endwhile;  ?>
