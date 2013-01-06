<?php
/**************************************
Loop for Public Meetings Page
**************************************/
?>
<?php /* Start loop */ ?>
  <?php //Initiate our counter var ?>
  <?php $r_count = 1; ?>

  <?php $args = array( 'post_type' => 'congregation', 'posts_per_page' => 4 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

   	<?php //Iterate through our counter and add appropriate classes
      if($r_count%3 == 0){
  		$r_class = 'three columns congregationPost last';
  		}else{
  		$r_class = 'three columns congregationPost';
   		}
  		$r_count++;
  	?>
	  <a href="<?php the_permalink(); ?>" class="congregationLink">
	    <article class="<?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
        <section class="innerBox">
          <?php the_post_thumbnail ('grid_image'); ?>
          <header>
            <h2 class="entry-title"><?php the_title(); ?></h2>
          </header>
        </section>
      </article>
    </a>
<?php endwhile;  ?>
