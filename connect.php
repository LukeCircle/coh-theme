<?php
/*
Template Name: Connect With Us*/
?>

<?php get_header(); ?>

  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader"><?php echo get_the_title(); ?> </h1>

      <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile ?>

	  </div><!--/.container-->
  </div><!-- /.twelve -->
</div><!-- /.container-->
   </div><!-- /.row-->
 </div><!-- /.container-->




<!--Explain what Cells are and link to a list of them-->
<div class="container connectbg">
  <div class="row">
  	<?php $args = array( 'pagename' => 'cells-3', );
	   	$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
  				<article class="twelve columns teamExcerpt" id="post-<?php the_ID(); ?>">
    				<h2><?php the_title();?></h2>
              <p><?php the_advanced_excerpt(100); ?></p>
    				  <h3><a href="../cells">Find a Cell in your neighborhood</a></h3>
  				</article>
			<?php endwhile;  ?>
  </div><!-- /.row-->
</div><!--/.contatiner .connectbg-->



<!-- Show a Map of the Public Meetings and Explain what they are -->
<div class="row">
	<h2 class="connectTitle">Public Meetings</h2>
    <div class="map seven columns"><?php echo do_shortcode ('[mappress mapid="1"]'); ?></div>
    <div class="five columns last pmList">
      <h3>Our Public Meetings</h3>
      <section>
        <h4><a href="congregation/broad-and-washington/">Broad and Washington</a></h4>
        <h4>1125 S. Broad St - Philadelphia</h4>
        <h4>Sundays at 5pm & 7pm</h4>
        <a href="http://maps.google.com/maps?q=1125+South+Broad+Street,+Philadelphia,+PA&amp;hl=en&amp;sll=39.937068,-75.166818&amp;sspn=0.008391,0.018046&amp;oq=1125+S.+Broad+St,+&amp;hnear=1125+S+Broad+St,+Philadelphia,+Pennsylvania+19147&amp;t=m&amp;z=16">Get Directions</a>
      </section>

      <section>
        <h4><a href="congregation/frankford-and-norris/">Frankford and Norris</a></h4>
        <h4>2009 Frankford Ave - Philadelphia</h4>
        <h4>Sundays at 5pm & 7pm</h4>
        <a href="http://maps.google.com/maps?q=2009+Frankford+Ave,+Philadelphia,+PA+19125&amp;hl=en&amp;sll=39.937068,-75.166818&amp;sspn=0.008391,0.018046&amp;oq=2009+,+Philadelphia,+PA&amp;hnear=2009+Frankford+Ave,+Philadelphia,+Pennsylvania+19125&amp;t=m&amp;z=16">Get Directions</a>
      </section>

      <section>
        <h4><a href="congregation/marlton-and-crescent-7/">Marlton and Crescent</a></h4>
        <h4>3800 Marlton Pike - Pennsauken, NJ</h4>
        <h4>Sundays at 5pm & 7pm</h4>
        <a href="http://maps.google.com/maps?q=3800+Marlton+Pike,+Pennsauken+Township,+NJ+08110&amp;hl=en&amp;ll=39.938435,-75.078313&amp;spn=0.008391,0.018046&amp;sll=39.939718,-75.079021&amp;sspn=0.008391,0.018046&amp;hnear=3800+Marlton+Pike,+Pennsauken+Township,+New+Jersey+08110&amp;t=m&amp;z=16">Get Directions</a>
      </section>

      <section>
        <h4><a href="congregation/broad-and-dauphin/">Broad and Dauphin</a></h4>
        <h4>2309 N. Broad St - Philadelphia</h4>
        <h4>Sundays at 5pm & 7pm</h4>
        <a href="http://maps.google.com/maps?q=1901+Girard+Avenue,+Philadelphia,+PA&amp;hl=en&amp;sll=39.971562,-75.162492&amp;sspn=0.016773,0.036092&amp;hnear=1901+W+Girard+Ave,+Philadelphia,+Pennsylvania+19130&amp;t=m&amp;z=16">Get Directions</a>
      </section>
    </div>

    <!-- The text from the Public Meetings Page -->
	  <?php $args = array( 'pagename' => 'publicmeetings', );
		  $loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); ?>
			 	<article class="twelve columns teamExcerpt" id="post-<?php the_ID(); ?>">
					<p><?php the_advanced_excerpt(100); ?></p>
				</article>
			<?php endwhile;  ?>
</div>
</div><!-- #content -->


<?php get_footer(); ?>
