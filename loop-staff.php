<?php
/**********************
Loop for the Staff Page
***********************/
?>
<?php /* Start loop */ ?>
	<?php $r_count = 1; //Instatiate our counter variable ?>
	<?php //Setup the loop for the Staff page
	$args = array( 'post_type' => 'staff', 'posts_per_page' => 20,);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	<?php if($r_count%2 == 0){ //Iterate through our counter variable.
		$r_class = 'last';
		}else{
		$r_class = '';
 		}
		$r_count++;
	?>
	<!-- Print out the Markup for each staff member -->
	<article class="twelve columns staffPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
		<div class="accordionButton row">
<!-- 			<div class="one columns"></div>
 -->			<!-- Display the image for the Staff Memeber -->
			<div class="four columns">
				<section class="imageBox">
					<?php the_post_thumbnail (); ?>
				</section>
			</div>
		
			<!-- Populate our Accordion Button with basic info about the Staff member -->
			<div class="staffTitle eight columns last">
				<h3><?php the_title(); ?></h3>
					<h4><?php echo get_post_meta($post->ID, "_staff_title", true); ?></h4>
					<h4>
						<?php
						echo get_the_term_list( $post->ID, 'staffLocation', '' );?>
					</h4>
				<p>Click to read bio</p>
			</div>
		</div><!--/.accordionButton -->
		<!-- Put the content of each staff member's bio in the accordion's content section -->
		<div class="accordionContent row">
			<div class="three columns"></div>
			<div class="eight columns">
			<?php the_content(); ?>
			</div>
		</div>
	</article>

<?php endwhile;  ?>
