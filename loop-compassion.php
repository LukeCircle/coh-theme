<?
//The Loop for the Compassion Teams Page
?>
<?php /* Start loop */ ?>
  <?php //Iitiate count in order to instatiate a new ".row" after ever third item in the loop ?>
    <?php $r_count = 1; ?>

  <?php //Go fetch the specific Team post type in the Compassion Team taxonomy ?>
    <?php $args = array( 'post_type' => 'team_page', 'posts_per_page' => 50, 'teams' => 'compassion-2' );
      $loop = new WP_Query( $args );
      while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <?php //Here we'll actually count posts as we loop through them ?>
     	<?php if($r_count%3 == 0){
    		$r_markup = '</div><div class="row">';
    		}else{
    		$r_markup = '';
     		}
    		$r_count++;
    	?>

    <?php // Printing out the markup for each item of the loop ?>
    <a href="<?php the_permalink(); ?>" class="teamLink">
  	  <article class="four columns teamPage " id="post-<?php the_ID(); ?>">
	      <?php the_post_thumbnail ('grid_image'); ?>
	      <h3 class="teamName"><?php the_title(); ?></h3>
      </article>
    </a>
    <?php echo $r_markup;?>
  <?php endwhile;  ?>
<? //End the Loop ?>

