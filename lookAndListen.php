<?php
/*
Template Name: Look and Listen
*/
?>

<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader">Look and Listen</h1>

        <?php //Get the audioblogs ?>
        <div class="row">
          <?php get_template_part('loop', 'lookAndListenAudio'); ?>
        </div><!-- /.row-->

      <section class="twelve columns lookAndListenText">
        <?php //Get the text for the page ?>
        <?php /* Start loop */ ?>
			  <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile ?>
      </section>

      <?php //Get any videos that have been uploaded ?>
      <div class="row">
        <?php get_template_part('loop', 'lookAndListenVideo'); ?>
      </div><!-- /.row-->

      <?php //Get a list of the artists that have been listed ?>
      <div class="row artists">
        <?php get_template_part('loop', 'links'); ?>
      </div><!-- /.row-->

      <?php // Get the text again? ?>
      <section class="twelve columns lookAndListenText">
        <?php /* Start loop */ ?>
			  <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile ?>
      </section>
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
