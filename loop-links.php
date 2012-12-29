
<div class="row">
<h2>Artists</h2>
<div style="margin:0 auto; width: 90%; height:300px;">
<!-- "previous page" action -->
<a class="prev browse left"></a>
 
<!-- root element for scrollable -->
<div class="scrollable" id="scrollable">
 
  <!-- root element for the items -->
  <div class="items">
 
  			<div>
						<?php /* Start loop */ ?>		
						<?php $r_count = 1; ?>
						<?php $args = array('post_type' => 'customLink', 'posts_per_page' => 50, 'linkcategories' => 'artists-2' );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							
						 	<?php if($r_count%4 == 0){
								$r_divs = '</div> <div>';
								}else{
								$r_divs = '';
						 		}
								$r_count++;
								?>
								 	   <a href="<?php echo get_post_meta(get_the_ID(), '_linkLink', true); ?>" class="linksLink" target="blank">
										   <article  id="post-<?php the_ID(); ?>" class="lookAndListenPost">
									        	<?php the_post_thumbnail (); ?>
									      		<header>
									        		<h3 class="entry-title"><?php the_title(); ?></h3>
									        	</header>
									      	</article>
								      	</a>
								 <?php echo $r_divs;?>
						<?php endwhile;  ?>
			</div>
 
<!-- "next page" action -->
</div>
</div>
<a class="next browse right"></a>
</div>
</div><!--end .row-->
