<?php
/**********************
Loop for the 100 Stories Page
***********************/
?>
<?php /* Start loop */ ?>
	<?php $r_count = 1; //Instatiate our counter variabl?>
	<?php //Setup  our WordPress loop for each "Story" Post
	$args = array( 'post_type' => 'stories', 'posts_per_page' => 100 );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	 	<?php if($r_count%2 == 0){ //Iterate through our counter variable
			$r_class = 'last';
			}else{
			$r_class = '';
	 		}
			$r_count++;
		?>
		
	<!-- Print out the markup for each Story -->
	<div class="accordionButton">
		<article class="twelve columns convictionsPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
			<h3 class="convictionsName"><?php the_title(); ?></h3>
		</article>
	</div><!--/.accordionButton -->
	
	<!-- Print out the content for each story in the Accordion Content area -->
	<div class="accordionContent">
		<?php the_content(); ?>
	</div>
<?php endwhile;  ?>
