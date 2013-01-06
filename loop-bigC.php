<?php
/*****************************************************
The Loop for the Big C or "World Wide Connections Page"
*****************************************************/
?>
<?php // Start loop  ?>
  <?php //Iitiate count in order to add a class to ever fourth item in the loop ?>
    <?php $r_count = 1; ?>
  <?php //Go fetch the specific Link post type in the BigC taxonomy ?>
    <?php $args = array('post_type' => 'customLink', 'posts_per_page' => 50, 'linkCategories' => 'bigC' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php //Here we'll actually count posts as we loop through them ?>
       	  <?php if($r_count%4 == 0){
        		$r_class = 'three columns last';
        		}else{
        		$r_class = 'three columns';
         		}
        		$r_count++;
      		?>
       <?php // Printing out the markup for each item of the loop ?>
   	   <a href="<?php echo get_post_meta($post->ID, '_linkLink', true); ?>" class="<?php echo $r_class;?> lookAndListenLink" target="blank">
    	   <article  id="post-<?php the_ID(); ?>" class="lookAndListenPost">
        	<?php the_post_thumbnail ('grid_image'); ?>
      		<header>
        		<h3 class="entry-title"><?php the_title(); ?></h3>
        	</header>
      	</article>
    	</a>
  <?php endwhile;  ?>
<? //End the Loop ?>
