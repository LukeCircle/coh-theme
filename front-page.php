<?php get_header(); ?>
    <div class="content" >
      <div id="main" class="twelve columns last" role="main">
        <div class="container">
          <div class="row">
          <div id="featured" class="twelve columns last">
          <h4>The Next Generation of the Church</h4>
          <?php $my_query = new WP_Query('posts_per_page=1&cat=161');
 			 while ($my_query->have_posts()) : $my_query->the_post();
 		 	$do_not_duplicate = $post->ID; ?>
          <div id="featuredImage" class="six columns">
          <?php
			if ( has_post_thumbnail() )
			{
 			 the_post_thumbnail ('front_image');
			}
		   ?>
		   </div>
		 <div id="featuredPost" class="six columns last">
		   <?php /* Start loop */ ?>
  			  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   					   <header>
   					     <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      					</header>
			      <div class="entry-content">
    					<?php if (is_archive() || is_search()) : // Only display excerpts for archives and search ?>
				       <?php the_excerpt(	); ?>
    						<?php else : ?>
						      <?php the_excerpt()?>
    						<?php endif; ?>
		         </div>
      			<footer>
        			<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
      			</footer>
			    </article>
			<?php endwhile; // End the loop ?>
			</div><!--/#featuredPost-->
		   </div><!--/#featured-->
          </div>
          <div class="row">
          	<div id="more" class="twelve columns last">

          <!-- Loop Through for More "Featured Stories" -->
          <?php // Start loop  ?>
          	<?php query_posts( 'posts_per_page=6&cat=161' ); ?>
				      <?php while (have_posts()) : the_post();
 					      if( $post->ID == $do_not_duplicate ) continue;?>
    				      <?php //Make the whole block a link to the blog post ?>
                  <a href="<?php the_permalink(); ?>">
    			          <div class="morePost two columns">
                      <?php // Check to see if there's a thumbnail ?>
                      <?php if ( has_post_thumbnail() ) {
             							the_post_thumbnail ('bottom_image');
            					}?>
                      <?php //The Blog Post's title?>
    			            <h2><?php the_title(); ?></h2>
    			          </div><!--/.morePost-->
                  </a>
				      <?php endwhile;  // End the loop ?>

            <!-- Add a Permanent Link to the Blog Page -->
    				<a href="../blog">
              <div class="morePost two columns last">
    					 <h2 class="readMore">Read More Blog Posts</h2>
    				  </div>
            </a>
          </div><!--/#more-->
    			<h3 class="mobileMore"><a href="../phl/cells">Find a Cell</a></h3>
    			<h3 class="mobileMore"><a href="../phl/congregations">Visit a Public Meeting</a></h3>
          </div>
        </div>
      </div><!-- /#main -->
    </div><!-- /.container-->
   </div><!-- /.row-->


    <div class="container midbg" role="middle">
	    <div class="row">
	      	<h2 class="midTitle">A Glance at Our Community</h2>
        </div><!-- /.row-->

      	<!--Events Feed-->
      	<div class="row">
      		<div class="twelve columns">
      		<?php
     			$r_count = 1;

				global $post;

					$all_events = tribe_get_events(array(
					'eventDisplay'=>'upcoming',
					'posts_per_page'=>6
					));

				foreach($all_events as $post) {
				setup_postdata($post);

				 	 if($r_count%6 == 0){
						$r_class = 'last';
						}else{
						$r_class = '';
				 		}
						$r_count++;

			?>
			<section class="two columns <?php echo $r_class?> event">
				<a href="<?php the_permalink(); ?>">
				<div class="event-thumb">
						<?php the_post_thumbnail('thumbnail'); ?></a>
						</div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4>
								<div class="event-excerpt">
					<?php echo tribe_get_start_date( $post->ID, false, 'D, M j' ); ?>

					</div></a>

									</section>
					<?php } //endforeach ?>
					<?php wp_reset_query(); ?>
      		</div>
		</div><!--end .row-->

		      	<!--Twitter Feed
      	<div class="row NoMobile">
      		<div class="tweets">
      			<h3><a href="http://twitter.com/circleofhopenet" target="blank">@circleofhopenet</a></h3>
          		<?php /* echo do_shortcode('[twitter-feed username="circleofhopenet" mode="public" num="5" userintent="no" tweetintent="no" twitterJS="yes" userlinks="yes" ulclass="twelve columns tweetList" conditional="no" phptime="j F" followlink="no" liclass="two columns" img="no"]');*/ ?>
      		</div>
      	</div><!-- end .row-->

      	<!--Proverbs Feed-->
      	<div class="row NoMobile">
          	<div id="proverbs" class="twelve columns last">

          	<?php /* Start loop */ ?>
				<?php $args = array('post_type' => 'proverbs', 'posts_per_page' => 1, 'orderby' => 'rand' ); ?>
				<?php $proverbs = new WP_Query( $args );?>
				<?php while ($proverbs->have_posts()) : $proverbs->the_post();?>

  			    <div class="proverbsPost">
				<a href="/circle/convictions"><h2><?php the_title(); ?> <span class="fromProverbs">-from the Circle of Hope Proverbs</span></h2></a>
				</div><!--/.proverbsPost-->
				<?php endwhile;  // End the loop ?>

          	</div><!--/#proverbs-->


       	</div><!-- end .row-->

       	<div class="row ">
			<section class="eight columns dailyPrayerBox">
		       	<h3>The Daily Prayer Blog</h3>
		        	<div id="dailyprayer"></div>
			</section>
       	</div><!--/.row-->

       	<div class="row">
       		<h3 class="pmtitle">Public Meetings</h3>
       		<section class="three columns congregationList">
       		<h4>Broad and Washington</h4>
       		<p>1125 South Broad St. 2nd Floor <br />
       		Philadelphia, PA 19147<br />
       		Pastor | <a href="mailto:rod@circleofhope.net">Rod White</a>
       		</p>
       		</section>

       		<section class="three columns congregationList">
       		<h4>Frankford and Norris</h4>
       		<p>2009 Franford Ave. 1st Floor<br />
       		Philadelphia, PA 19125<br />
       		Pastor | <a href="mailto:joshua@circleofhope.net">Joshua Grace</a>
       		</p>
       		</section>

       		<section class="three columns congregationList">
       		<h4>Marlton and Crescent</h4>
       		<p>3800 Marlton Pike <br />
       		Pennsauken, NJ 08110<br />
       		Pastor | <a href="mailto:nate@circleofhope.net">Nate Hulfish</a>
       		</p>
       		</section>

       		<section class="three columns last congregationList">
       		<h4>Broad and Dauphin</h4>
       		<p>2309 N. Broad St.<br />
       		Philadelphia, PA 19122<br />
       		Pastor | <a href="mailto:jonny@circleofhope.net">Jonny Rashid</a>
       		</p>
       		</section>
       	</div><!--/.row-->
      </div>
  </div><!-- /.container[role="main]-->
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.zrssfeed.min.js" type="text/javascript"></script>
<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('#dailyprayer').rssfeed('http://fulltextrssfeed.com/cohdailyprayer2012.wordpress.com/feed', {
 		   limit: 1,
 	   		header: false,
 	   		date: false,
 	   		linktarget: '_blank'
 			 });
 	 });
</script>
