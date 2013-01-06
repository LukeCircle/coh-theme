<?php
/*
Template Name: BLog
*/
?>
<?php get_header(); ?>
  <div class="twelve columns">
    <div class="container">
      <h1 class="archiveHeader"><?php the_title();?></h1>

      <?php //Go fetch the Loop for this page ?>
        <div class="row">
          <?php get_template_part('loop', 'list'); ?>
        </div><!-- /.row-->
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
