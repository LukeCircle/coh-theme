<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
    <?php roots_post_inside_before(); ?>


      <!--Special calls for Congregation Post Type-->

      <?php if('congregation' === get_post_type())
      { ?>
    	<header class="row congregation">
					<div class="twelve columns">
   				       <h1 class="congregationTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<div class="twelve columns last">
						<?php the_post_thumbnail ('congregation_image'); ?>
					</div>
		</header><!--end .row-->

		 <div class="congregation">
				<!--<div class="row">
					<nav id="floatingbar" class="congregationNav">
						<ul>
							<li><a href="#directions">Get Here</a></li>
							<li><a href="#events">Events</a></li>
							<li><a href="#about">About</a></li>
						</ul>
					</nav>
				</div><!--end .row-->
				<div class="entry-content">
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

						<div class="map four columns last">
							<?php echo do_shortcode(get_post_meta($post->ID, "_map", true)); ?>
						</div>
					</div>

					<!--
					<div id="events" class="row">
						<?php // echo do_shortcode('[google-calendar-events id="1" type="ajax" title="Events on" max="10"]'); ?>
					</div>-->


					<!--Events Feed-->
			      	<div class="row darker">
			      	<h2>Events at <?php the_title(); ?></h2>
			      		<?php
			     			$r_count = 1;

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

							 	 if($r_count%3 == 0){
									$r_class = 'last';
									}else{
									$r_class = '';
							 		}
									$r_count++;

						?>
						<section class="two columns <?php echo $r_class?> event">
							<div class="event-thumb">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
						</div>

							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
											<div class="event-excerpt">
								<?php echo tribe_get_start_date( $post->ID, false, 'D, M j' ); ?>

								</div>

						</section>
								<?php } //endforeach ?>
								<?php wp_reset_query(); ?>
					</div><!--end .row-->



					<!--Related Post Feed-->
					<div class="row">
					<h2>Related Blog Posts</h2>
						<!--<div id="about" class="about_congregation">
				        	<?php // the_content(); ?>
				        	<?php // comments_template(); ?>
						</div>-->
					<?php /* Start loop for Related Stories */ ?>
					<?php $z_count = 1; ?>

					<?php if (is_single( 'Broad and Dauphin' )) {
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

					<?php $relatedStories = array( 'category_name' => $category_related, 'posts_per_page' => 4 );
					 //echo $related_array
					$relatedLoop = new WP_Query( $relatedStories );
					while ( $relatedLoop->have_posts() ) : $relatedLoop->the_post(); ?>

					 	<?php if($z_count%4 == 0){
							$z_class = 'three columns last';
							}else{
							$z_class = 'three columns';
					 		}
							$z_count++;
							?>
					  <?php roots_post_before(); ?>
					 	   <a href="<?php the_permalink(); ?>" class="<?php echo $z_class;?>">
						   <article  id="post-<?php the_ID(); ?>" class="morePost">
						     	<?php roots_post_inside_before(); ?>
					        	<?php the_post_thumbnail ('grid_image'); ?>
					      		<header>
					        		<h3 class="entry-title"><?php the_title(); ?></h3>
					        	</header>
					      	</article>
					      	</a>
					      <?php roots_post_after(); ?>
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


	<!--Special call for Proverbs Post Type-->

	<?php } elseif('proverbs' === get_post_type() ) { ?>

	<header class="row team">
   			<a href="<?php the_permalink(); ?>" class="twelve columns headerLink"><h1>Proverb: <?php the_title(); ?></h1></a>
	</header><!--end .row-->

	<div class="entry-content twelve columns">
       	<?php the_content(); ?>
       	<?php comments_template(); ?>
    </div>


	<!--Regular Post Type w/ small variations-->

	<?php ;} else { ?>

	<div class="row single">
        <h1 class="entry-title single_title"><?php the_title(); ?></h1>
		<div class="sevencol post_left">
			<header>
	        	<?php roots_entry_meta(); ?>
	        </header>

	        <div class="entry-content">
	        	<?php the_content(); ?>
	        	<?php comments_template(); ?>
	        	<footer>
	        		<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>' )); ?>
	        	</footer>

			    <!--Single Post Sidebar-->
			    <?php is_single(); {?>
				     </div> <!--End of .entry-content-->
				</div> <!--End of .post_left-->

				<div class="five columns last singleSidebar">
					<?php the_post_thumbnail ('front_image'); }?>
					<p><?php the_tags(); ?></p>

		        <!--Stories Post Type Sidebar Fix-->
		        <?php if('stories' === get_post_type() ) {?>

		        	<h3 class="related">Other Stories</h3>
		        	<?php } else { ?>
		        	<h3 class="related">Related Stories</h3> <?php } ?>
		        	<?php
			        	global $post;
			        	$categories = get_the_category();
			        	$thiscat = $categories[0]->cat_ID;
			        	?>
			        	<?php if('stories' === get_post_type() ) {?>
				        	<?php query_posts('showposts=4&orderby=rand&post_type=stories'); ?>
				        <?php } else { ?>
				        	<?php query_posts('showposts=4&orderby=rand&cat=' . $thiscat); }?>
				        <?php $r_count = 1; ?>
				        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				        <?php if($r_count%2 == 0){
					        $r_class = 'last';
					        }else{
						        $r_class = '';
						        }
						        $r_count++;
						 ?>
						 <?php if( $post->ID == $do_not_duplicate ) continue;?>
		  				<a href="<?php the_permalink(); ?>">
		  			    <div class="morePost five columns <?php echo $r_class;?>">
		       				<?php
								if ( has_post_thumbnail() )
								{
		 							 the_post_thumbnail ('bottom_image');
								}
							?>
						<h2><?php the_title(); ?></h2>
						</div><!--/.morePost--></a>
						<?php endwhile; else : ?>
						<p>We couldn't find any related stories for you to read.</p>
						<?php endif; ?>
					<?php wp_reset_query(); ?>

      <?php roots_post_inside_after(); ?>

      				</div><!--/.singleSidebar-->
      		</div><!--/.single-->
  </article>
           <?php }?>
  <?php roots_post_after(); ?>
<?php endwhile; // End the loop ?>
