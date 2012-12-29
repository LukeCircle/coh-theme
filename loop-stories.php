<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'stories', 'posts_per_page' => 100 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	<?php if($r_count%2 == 0){
		$r_class = 'last';
		}else{
		$r_class = '';
 		}
		$r_count++;
		?>
  <?php roots_post_before(); ?>
	<div class="accordionButton">
	<!--<a href="<?php the_permalink(); ?>" class="teamLink">-->
	<article class="twelve columns convictionsPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
	<h3 class="convictionsName"><?php the_title(); ?></h3>
	</article>
	<!--</a>-->
	</div><!--/.accordionButton -->
	<div class="accordionContent">
	<?php the_content(); ?>
	</div>
  <?php roots_post_after(); ?>
<?php endwhile;  ?>
