<?php
/****************************
Loop for Individual Posts
****************************/

/* Contents
(1) Congregation Post Types
(2) Team Post Pages
(3) Regular Blog Posts
*/
?>
<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
    <article class="twelve columns singleCongregation" id="post-<?php the_ID(); ?>">

      <!--Special calls for Congregation Post Type-->

      <?php if('congregation' === get_post_type()) //Checking to see if this specific post is a congregation page
      { ?>
    	<header class="row congregation">
			<!-- Grab the Title -->
			<div class="twelve columns">
				<h1 class="congregationTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			</div>
			
			<!-- Grab the Image for the Congregation -->
			<div class="twelve columns last">
				<?php the_post_thumbnail ('congregation_image'); ?>
			</div>
		
		</header><!--end .row-->

		 <div class="congregation">
			
			<div class="entry-content">
				
				<!-- Get the Directions to the specific Congregation -->
				<div id="directions" class="row">
					<div class="six columns">
						<h2>How to Get Here</h2>
							<ul>
								<li>Address</li>
								<li><?php echo get_post_meta($post->ID, "_address_line1", true); ?></li>
								<li><?php echo get_post_meta($post->ID, "_address_line2", true); ?></li>
							</ul>
							<ul>
								<li>Public Meeting Times</li>
								<li>Sunday, 5:00 P.M.</li>
								<li>Sunday, 7:00 P.M.</li>
							</ul>
					</div>

					<!-- Grab the map from the Mapit Plugin shortcode which was enetered in a metabox on the page. -->
					<div class="map four columns last">
						<?php echo do_shortcode(get_post_meta($post->ID, "_map", true)); ?>
					</div>
				</div>

				
				<!--Events Feed for Congregations that calls from The Events Calendar Plugin-->
		      	<div class="row darker">
		      	<h2>Events at <?php the_title(); ?></h2>
	      		<?php 
	     			$r_count = 1; //Let's set our counter variable

	     			//This is clunky, but we need to sift through the events and only grab the appropriate ones for each congregation
	     			if (is_single( 'Broad and Dauphin' )) {
						$category_event = "broad-and-dauphin";
							}
				  	elseif (is_single( 'broad-and-washington' )) {
						$category_event = "broad-and-washington";
					}
				  	elseif (is_single( 'frankford-and-norris' )) {
					$category_event = "frankford-and-norris";
					}
				  	elseif (is_single( 'marlton-and-crescent-7' )) {
					$category_event = "marlton-and-crescent";
					}

					//Let's go grab the appropriate posts via the plugin's API
					global $post;
						$all_events = tribe_get_events(array(
						'eventDisplay'=>'upcoming',
						'posts_per_page'=>3,
						'tax_query'=> array(
		                array(
		                    'taxonomy' => 'tribe_events_cat',
		                     'field' => 'slug',
		                    'terms' => $category_event
		                    ))

						));

					foreach($all_events as $post) {
					setup_postdata($post);

					 //Let's count through our counter variable and add appropriate classes to our markup
				 	 if($r_count%3 == 0){
						$r_class = 'last';
						}else{
						$r_class = '';
				 		}
						$r_count++;  ?>


					<!-- Printing out the markup for each event -->
					<section class="two columns <?php echo $r_class?> event">
						<!-- The Event Thumbnail -->
						<div class="event-thumb">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
						<!-- A link to the Event -->
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						
						<!-- The Date for the Event -->
						<div class="event-excerpt">
							<?php echo tribe_get_start_date( $post->ID, false, 'D, M j' ); ?>
						</div>

					</section>
				
					<?php } //endforeach ?>
					<?php wp_reset_query(); //Making sure we clear the flue for other loops?> 
				</div><!--end .row-->



				<!--Grab Any Related Blog Posts-->
				<div class="row">
				<h2>Related Blog Posts</h2>
					
				<?php /* Start loop for Related Stories */ ?>
				<?php $z_count = 1; //Creating our Counter Variable?>

				<?php //Sift through and match the post category to the blog post categories
					  if (is_single( 'Broad and Dauphin' )) {
						$category_related = "bandd";
							}
					  elseif (is_single( 'broad-and-washington' )) {
						$category_related = "bandw";
							}
					  elseif (is_single( 'frankford-and-norris' )) {
						$category_related = "fandn";
							}
					  elseif (is_single( 'marlton-and-crescent-7' )) {
						$category_related = "mandc";
							};
							?>
				<!-- Let's cycle through the posts  -->
				<?php $relatedStories = array( 'category_name' => $category_related, 'posts_per_page' => 4 );
				 //echo $related_array
				$relatedLoop = new WP_Query( $relatedStories );
				while ( $relatedLoop->have_posts() ) : $relatedLoop->the_post(); ?>

				 	<?php //Let's iterate through the counter and add appropriate classes where necessary. 
				 		if($z_count%4 == 0){
						$z_class = 'three columns last';
						}else{
						$z_class = 'three columns';
				 		}
						$z_count++;
						?>

				 	 <!--  Print out the markup for each related post -->
				 	   <a href="<?php the_permalink(); ?>" class="<?php echo $z_class;?>">
					   <article  id="post-<?php the_ID(); ?>" class="morePost">
				        	<?php the_post_thumbnail ('grid_image'); ?>
				      		<header>
				        		<h3 class="entry-title"><?php the_title(); ?></h3>
				        	</header>
				      	</article>
				      	</a>
					<?php endwhile;  ?>
				</div>
			</div>
		</div>




    	<!--Special calls for Team_Page Post Type-->

    	<?php } elseif('team_page' === get_post_type() ) { 	?>

		<header class="row team">
   			<a href="<?php the_permalink(); ?>" class="twelve columns headerLink"><h1><?php the_title(); ?></h1></a>
   			<h4 class="teamKind"><?php if (has_term ( 'compassion-2', 'teams' )) { echo "A Compassion Team"; } else { echo "A Mission Team" ;} ?> </h4>
	 	</header><!--end .row-->

		<div class="entry-content eight columns">
        	<?php the_content(); ?>
        	<?php comments_template(); ?>
     	</div>

     	<div class="four columns last">
	  		<?php the_post_thumbnail ('front_image'); ?>

	  		<?php
				$leader_link_value = get_post_meta($post->ID, '_email', true);
				// check if the custum field has a value
				if($leader_link_value != '') {
				  ?><h3>Team Leader</h3>
				  <a href="mailto:<?php echo $leader_link_value ?>"><?php echo get_post_meta($post->ID, '_leader', true); ?></a><?php
				}
				?>
			  		<?php $website_link_value = get_post_meta($post->ID, '_teamweb', true);
				// check if the custum field has a value
				if($website_link_value != '') {
				  ?><h3>Team Website</h3>
				  <a href="<?php echo $website_link_value ?>" target="blank"><?php echo $website_link_value ?></a><?php
				}
				?>
				<?php $social_link_value = get_post_meta($post->ID, '_teamfacebook', true);
				$other_social_link_value = get_post_meta($post->ID, '_teamtwitter', true);
				// check if the custum field has a value
				if($social_link_value||$other_social_link_value != '') {
				  ?><h3>Team Social Media</h3>
				  <div id="lifestream2"></div><?php
				}
			?>
	  	</div>
      </article>

	<!--Regular Post Type w/ small variations-->

	<?php ;} else { ?>

	<div class="row single">
        <h1 class="entry-title single_title"><?php the_title(); ?></h1>
		<div class="seven columns post_left">
			<header>
	        	<?php wp_meta(); ?>
	        </header>

	        <div class="entry-content">
	        	<?php the_content(); ?>
	        	<?php comments_template(); ?>
	        	<footer>
	        	</footer>

			    <!--Single Post Sidebar-->
			    <?php is_single(); {?>
			</div> <!--End of .entry-content-->
		</div> <!--End of .post_left-->

			<div class="five columns last singleSidebar">
				<?php the_post_thumbnail ('front_image'); }?>
				<p><?php the_tags(); ?></p>

	        <!--Stories Post Type Sidebar Fix | What the hell is this?-->
	        	
	        	<h3 class="related">Related Stories</h3>
	        	<div class="row">
		        	<?php
			        	global $post;
			        	$categories = get_the_category();
			        	$thiscat = $categories[0]->cat_ID;
			        	?>
			        	<?php if('stories' === get_post_type() ) {?>
				        	<?php query_posts('showposts=4&orderby=rand&post_type=stories'); ?>
				        <?php } else { ?>
				        	<?php query_posts('showposts=4&orderby=rand&cat=' . $thiscat); }?>
				        <?php $b_count = 1; ?>
				        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				        <?php if($b_count%2 == 0){
					        $b_class = 'last';
					        }else{
						        $b_class = '';
						        }
						        $b_count++;
						 ?>
						 <?php // if( $post->ID == $do_not_duplicate ) continue;?>
		  				<a href="<?php the_permalink(); ?>">
			  			    <div class="morePost six columns <?php echo $b_class;?>">
			       				<?php
									if ( has_post_thumbnail() )
									{
			 							 the_post_thumbnail ('bottom_image');
									} else { ?>
									<img src='<?php echo get_template_directory_uri(); ?>/images/morePosts.png'> 
									<?php }
								?>
								<h2><?php the_title(); ?></h2>
							</div><!--/.morePost-->
						</a>
				<?php endwhile; else : ?>
				<p>We couldn't find any related stories for you to read.</p>
				<?php endif; ?>
				<?php wp_reset_query(); ?>


  			</div><!--/.singleSidebar-->
      	</div><!--/.single-->
  </article>

<?php }?>
<?php endwhile; // End the loop ?>

</div>