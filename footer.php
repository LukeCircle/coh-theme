		</div><!-- End Main row -->

		<footer id="content-info" role="contentinfo">
			<div class="row">
				<?php dynamic_sidebar("Footer"); ?>
			</div>
			<div class="row">
				<div class=" footerNav">
          <?php wp_nav_menu(); ?>
        </div>
        <div class="four columns">
					&copy; 2008-<?php echo date('Y'); ?> All rights reserved.
					<br>
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
