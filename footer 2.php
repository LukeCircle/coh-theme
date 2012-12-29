  <?php roots_footer_before(); ?>
    <footer id="content-info" class="<?php global $roots_options; echo $roots_options['container_class']; ?>" role="contentinfo">
      <?php roots_footer_inside(); ?>
      <div class="container">
      	<div class="row">
			<div class="three columns">
	        	<div class=" footerNav">
	        		<h4>Site Map</h4>
	        		<?php wp_nav_menu( $args ); ?>
	        	</div>
			</div>
			<div class="eight columns last">
	        		<h4 class="footerTitleRight">Connect with Circle of Hope</h4>
				<div id="lifestream"></div>
			</div>
      	</div>
       	<p class="copy row centered"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small></p>
      </div>
    </footer>
    <?php roots_footer_after(); ?>
  </div><!-- /#wrap -->

<?php wp_footer(); ?>
<?php roots_footer(); ?>

  <!--[if lt IE 7]>
    <script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

	    <script src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.0.6.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
		<script defer src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
		<script defer src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
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
			<script src="<?php echo get_template_directory_uri(); ?>/js/cells.js" type="text/javascript"></script>-->
			<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js" type="text/javascript"></script>
			<script type="text/javascript">
				$("article[rel]").overlay();
			</script>
			<script type="text/javascript">
				$(function() {
					  // initialize scrollable
					  $(".scrollable").scrollable({ next: '.next', prev: '.prev' });
					});
			</script>

			<script type="text/javascript">
			$(document).ready(function() {

			//ACCORDION BUTTON ACTION
			$('div.accordionButton').click(function() {

				if($(this).next().is(':visible')) {
					$('div.accordionContent').slideUp('normal');
				} else {
					$('div.accordionContent').slideUp('normal');
					$(this).next().slideDown('normal');
				}
			});
			//HIDE THE DIVS ON PAGE LOAD
			$("div.accordionContent").hide();

		});
		</script>
		<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.lifestream.js"></script>
		<script>
		  $("#lifestream").lifestream({
   		        limit: 10,
			    list:[
			      {
			        service: "facebook_page",
			        user: "101116740686"
			      },
			      {
			        service: "twitter",
			        user: "circleofhopenet"
			      }
			    ]
			  });
		   $("#lifestream2").lifestream({
   		        limit: 5,
			    list:[
			      {
			        service: "facebook_page",
			        user: "<?php echo get_post_meta($post->ID, "_teamfacebook", true); ?>"
			      },
			      {
			        service: "twitter",
			        user: "<?php echo get_post_meta($post->ID, "_teamtwitter", true); ?>"
			      }
			    ]
			  });
		</script>

</body>
</html>
