<?php
/*
Template Name: Compassion
*/
?>
<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader">Compassion Teams</h1>

      <?php //Get the Page text ?>
    	  <section class="twelve columns teamText">
          <?php /* Start loop */ ?>
			      <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile ?>
        </section>

      <?php //Go fetch the Loop for this page ?>
        <div class="row">
          <?php get_template_part('loop', 'compassion'); ?>
        </div><!-- /.row-->

    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
