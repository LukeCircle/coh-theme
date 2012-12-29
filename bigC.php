<?php
/*
Template Name: Big C Church
*/
?>
<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader"><?php the_title();?></h1>

      <?php //Get the Page text ?>
        <section class="twelve columns bigCText">
          <?php /* Start loop */ ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile ?>
        </section>

      <?php //Go fetch the Loop for this page ?>
        <div class="row">
          <?php get_template_part('loop', 'bigC'); ?>
        </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
