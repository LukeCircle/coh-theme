<?php
/*
Template Name: Deeper
*/
?>

<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader"><?php echo get_the_title(); ?> </h1>
      <?php //Go Fetch the specific content for this page ?>
        <?php /* Start loop */ ?>
			    <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile ?>

	  </div><!--/.container-->
  </div><!-- /.twelve -->

<!-- Show the Audio Blogs -->
  <div class="row deeperDiv">
    <?php get_template_part('loop', 'lookAndListenAudio'); ?>
  </div><!-- /.row-->
</div> <!-- /.container[role="main"] -->

<!--Fetch an RSS sample of the Daily Prayer Blog-->
<div class="container deeperbg deeperLast">
 	<div class="row">
 		<h3>The Daily Prayer Blog</h3>
   		<div id="dailyprayer">
   		</div>
   		<a href="http://circleofhopedailyprayer<?php echo date('Y'); ?>.wordpress.com" target="blank" class="dailyPrayer">
   		  <p>Visit the blog</p>
	    </a>
    </div> <!-- /.row -->
  </div><!-- /.container -->
</div><!-- #content -->

<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.zrssfeed.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#dailyprayer').rssfeed('http://fulltextrssfeed.com/cohdailyprayer2012.wordpress.com/feed', {
 		   limit: 1,
 	   		header: false,
 	   		date: false,
 	   		linktarget: '_blank'
 			 });
 	 });
</script>
