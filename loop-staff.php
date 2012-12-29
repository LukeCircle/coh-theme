<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'staff', 'posts_per_page' => 20,);
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
	<article class="twelve columns staffPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
	<div class="accordionButton row">
	<!--<a href="<?php the_permalink(); ?>" class="teamLink">-->
	<div class="one columns"></div>
	<div class="two columns"><?php the_post_thumbnail (); ?></div>
	<div class="staffTitle eight columns last">
		<h3><?php the_title(); ?></h3>
		<h4><?php echo get_post_meta($post->ID, "_staff_title", true); ?></h4>
		<h4>
			<?php
			echo get_the_term_list( $post->ID, 'staffLocation', '' );
			?></h4>
		<p>Click to read bio</p>
	</div>
	<!--</a>-->
	</div><!--/.accordionButton -->
	<div class="accordionContent row">
		<div class="three columns"></div>
		<div class="eight columns">
		<?php the_content(); ?>
		</div>
	</div>
	</article>
  <?php roots_post_after(); ?>
<?php endwhile;  ?>
