<?php
/*
Template Name: Deeper
*/
?>

<?php get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo $roots_options['container_class']; ?>">
    <?php roots_main_before(); ?>
      <div id="main" class="twelve columns" role="main">
        <div class="container">
          <h1 class="archiveHeader"><?php echo get_the_title(); ?> </h1>
          <?php /* Start loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
    		<?php roots_loop_before(); ?>
          <?php the_content(); ?>
          <?php endwhile ?>
          <?php roots_loop_after(); ?>

	    </div><!--/.container-->
      </div><!-- /#main -->



          <!-- Show 5 featured Events -->
          <div class="row deeperDiv">
          	<?php roots_loop_before(); ?>
	          <?php get_template_part('loop', 'lookAndListenAudio'); ?>
	          <?php roots_loop_after(); ?>
    </div><!-- /.container-->
   </div><!-- /.row-->

		</div><!--end .row-->
	 </div><!-- /.container-->

		<!--Fetch an RSS sample of the Daily Prayer Blog-->
        <div class="container deeperbg deeperLast">
        	<div class="row">
        		<h3>The Daily Prayer Blog</h3>
        		<div id="dailyprayer">
        		</div>
	        		<a href="http://cohdailyprayer2012.wordpress.com" target="blank" class="dailyPrayer">
	        		<p>Visit the blog</p>
	        		</a>
        	</div>
        </div>

    <?php roots_main_after(); ?>
    <!--<?php roots_sidebar_before(); ?>
      <aside id="sidebar" class="<?php echo $roots_options['sidebar_class']; ?>" role="complementary">
      <?php roots_sidebar_inside_before(); ?>
        <div class="container">
          <?php get_sidebar(); ?>
        </div>
      <?php roots_sidebar_inside_after(); ?>
      </aside>
    <?php roots_sidebar_after(); ?> -->
    </div><!-- #content -->
  <?php roots_content_after(); ?>
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
