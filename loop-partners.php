<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'partners', 'posts_per_page' => 50);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	<?php if($r_count%3 == 0){
		$r_class = 'last';
		}else{
		$r_class = '';
 		}
		$r_count++;
		?>
  <?php roots_post_before(); ?>
	     <a href="<?php echo get_post_meta($post->ID, "_partner", true); ?>" class="teamLink" target="_blank">
	<article class="four columns partnerPage <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
	<?php the_post_thumbnail ('grid_image'); ?>
	<h2 class="partnerName"><?php the_title(); ?></h2>
	</article>
	</a>
  <?php roots_post_after(); ?>
<?php endwhile;  ?>
