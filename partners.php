<?php
/*
Template Name: Partners
*/
?>

<?php get_header(); ?>
  <div class="twelve columns" role="content">
    <div class="container">
      <h1 class="archiveHeader"><?php the_title(); ?></h1>

       <?php //Get the Page text ?>

	    <section class="twelve columns teamText">
        <?php /* Start loop */ ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile ?>
      </section>

      <!-- Go fetch the links from the Partners Loop -->
      <div class="row"> 
        <?php get_template_part('loop', 'partners'); ?>
      </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
