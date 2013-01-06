<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="content" class="twelve columns" role="main">
	
			<div class="searchPage">
				<h1><?php _e('Search Results for', 'reverie'); ?> "<?php echo get_search_query(); ?>"</h1>
				<?php get_template_part('loop', 'search'); ?>
			</div>

		</div><!-- End Content row -->
	</div>
		
<?php get_footer(); ?>