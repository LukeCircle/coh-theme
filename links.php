<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>
  <div  class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader"><?php the_title();?></h1>

      <?php //Grab the text for this page ?>
        <section class="twelve columns linksText">
          <?php /* Start loop */ ?>
    			<?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile ?>
        </section>

        <? //Go fetch the loop for this page ?>
        <div class="row">
	        <?php get_template_part('loop', 'links'); ?>
        </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
