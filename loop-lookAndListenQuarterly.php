<h2>The Dialogue Quarterly</h2>
<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'lookAndListen', 'posts_per_page' => 4, 'type' => 'quarterly' );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	<?php if($r_count%4 == 0){
		$r_class = 'three columns last';
		}else{
		$r_class = 'three columns';
 		}
		$r_count++;
		?>
  <?php roots_post_before(); ?>
 	   <?php $quarterlyURL = get_post_meta(get_the_ID(), '_quarterly', true); ?>
 	   <a href="<?php echo $quarterlyURL['url']; ?>" class="<?php echo $r_class;?> lookAndListenLink" target="blank">
	    <article class="lookAndListenPost" id="post-<?php the_ID(); ?>">
	     	<?php roots_post_inside_before(); ?>
        	<?php the_post_thumbnail ('grid_image'); ?>
      		<header>
        		<h3 class="entry-title"><?php the_title(); ?></h3>
        	</header>
      	</article>
      	</a>

  <?php roots_post_after(); ?>
<?php endwhile;  ?>
