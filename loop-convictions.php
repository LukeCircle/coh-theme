<?php /* Start loop */ ?>
<?php $args = array( 'post_type' => 'proverbs', 'posts_per_page' => 10,);
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<div class="twelve columns">
	<div class="accordionButton ">
	<!--<a href="<?php the_permalink(); ?>" class="teamLink">-->
	<article class="convictionsPost" id="post-<?php the_ID(); ?>">
	<h3 class="convictionsName"><?php the_title(); ?></h3>
	</article>
	<!--</a>-->
	</div><!--/.accordionButton -->
	<div class="accordionContent">
	<?php the_content(); ?>
	</div>
	</div>
<?php endwhile;  ?>
