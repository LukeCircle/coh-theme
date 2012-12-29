<h2>Audioblogs</h2>
<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'lookAndListen', 'posts_per_page' => 4, 'type' => 'audioblogs' );
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
 	   <a href="<?php echo get_post_meta(get_the_ID(), '_mediaLink', true); ?>" class="<?php echo $r_class;?> lookAndListenLink" target="blank">
	   <article  id="post-<?php the_ID(); ?>" class="lookAndListenPost">
	     	<?php roots_post_inside_before(); ?>
        	<?php the_post_thumbnail ('grid_image'); ?>
      		<header>
        		<h3 class="entry-title"><?php the_title(); ?></h3>
        	</header>
      	</article>
      	</a>
      <?php roots_post_after(); ?>
<?php endwhile;  ?>
