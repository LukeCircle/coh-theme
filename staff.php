<?php
/*
Template Name: Staff
*/
?>

<?php get_header(); ?>
  <div id="main" class="twelve columns" role="main">
    <div class="container">
      <h1 class="archiveHeader">Staff</h1>

      <!-- Go fetch the text for this page -->
  	  <section class="twelve columns convictionsText">
        <?php /* Start loop */ ?>
	        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile ?>
      </section>

      <?php //Go fetch the Loop for this page ?>
        <div class="row">
          <?php get_template_part('loop', 'staff'); ?>
        </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>

