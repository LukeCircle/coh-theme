<?php
/*
Template Name: Congregations
*/
?>

<?php get_header(); ?>
  <div class="twelve columns" role="content">
    <div class="container">
      <h1 class="archiveHeader">Public Meetings</h1>
        <!-- List out all the congregations -->
        <div class="row">
          <?php get_template_part('loop', 'publicMeetings'); ?>
        </div>
        
        <!-- Go fetch the text for this page -->
        <section class="twelve columns congregationText">
          <?php /* Start loop */ ?>
			      <?php while (have_posts()) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile ?>
        </section>
    </div> <!-- /.container -->
  </div><!-- /.twelve -->
</div><!-- /.container[role="main"] -->
<?php get_footer(); ?>
