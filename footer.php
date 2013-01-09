		</div><!-- End Main row -->

		<footer id="content-info" role="contentinfo">
			<div class="row">
				<section class="footerNav eight columns">
					<?php wp_nav_menu(); ?>
				</section>
				<section class="footerSocial four columns">
					<a href="http://twitter.com/circleofhopenet" class="twitterLink six columns">Twitter</a>
					<a href="http://www.facebook.com/CircleofHopePhillyRegion?fref=ts" class="facebookLink six columns">Facebook</a>

				</section>
			</div>
			<div class="row">
        <div class="six columns">
					&copy; 1995-<?php echo date('Y'); ?> Circle of Hope
					<br>
				</div>
        <div class="three columns">
          <section class="bug-button">
            <a rel="#bug-reporter" class="button twelve columns">Report a Bug</a>
            <div class="simpleOverlay overlayFooter" id="bug-reporter">
              <form method="post" action="site-local_report.php">
                <em>Note: <strong>all fields</strong> are required.</em>
                <strong>Issue Summary:</strong>
                  <br><input name="summary" type="text" required="required" placeholder="Please provide a short description of the issue" size="55"><br>
                <br>
                <strong>Full description:</strong><br>
                <textarea name="description" required="required" rows="8" cols="53"></textarea><br>
                <br>
                <input type="submit" value="Submit" class="button">
                <input type="reset" value="Clear" class="button">
              </form>
            </div>
          </section>
        </div>
				<?php //wp_nav_menu(array('theme_location' => 'utility_navigation', 'container' => false, 'menu_class' => 'eight columns footer-nav')); ?>
			</div>
		</footer>

	</div><!-- Container End -->

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>
  <script>
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
