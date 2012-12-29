<?php
/*
Template Name: Cells
*/
?>

<?php get_header(); ?>
  <div class="twelve columns" >
    <div class="container">
      <h1 class="archiveHeader">Cells</h1>

      <?php //Get the Page text ?>
    		<section class="cellText">
        	<?php // Start loop ?>
			      <?php while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile ?>
          <?php //End loop ?>
        </section>

      <?php //Go fetch the Loop for this page ?>
        <?php get_template_part('loop', 'cells'); ?>

    </div><!--/.container-->
  </div><!-- /.twelve -->
</div><!-- ./container[role="main"] -->

<?php get_footer(); ?>
