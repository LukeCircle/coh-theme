<?php
/*
Template Name: Convictions
*/
?>

<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader">Convictions</h1>

      <?php //Get the Page text ?>
     	  <section class="twelve columns convictionsText">
     	  	<div class="row">
            <?php /* Start loop */ ?>
  	     	  <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile ?>
      	 	</div>
        </section>

      <?php //Go fetch the Loop for this page ?>
        <div class="row">
          <?php get_template_part('loop', 'convictions'); ?>
        </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
