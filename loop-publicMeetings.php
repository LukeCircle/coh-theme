<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php $args = array( 'post_type' => 'congregation', 'posts_per_page' => 4 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post(); ?>

 	<?php if($r_count%3 == 0){
		$r_class = 'three columns congregationPost last';
		}else{
		$r_class = 'three columns congregationPost';
 		}
		$r_count++;
		?>
  <?php roots_post_before(); ?>
	     <a href="<?php the_permalink(); ?>" class="congregationLink">
	     <article class="<?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
        <?php roots_post_inside_before(); ?>
      <?php the_post_thumbnail ('grid_image'); ?>
      <header>
        <h2 class="entry-title"><?php the_title(); ?></h2>
      </header>
    </article></a>
  <?php roots_post_after(); ?>
<?php endwhile;  ?>
