<?php
/*************************
Loop for any category Page
**************************/
?>

<?php /* Start loop */ ?>
  <?php //Set our counter var ?>
  <?php $r_count = 1; ?>

  <?php while (have_posts()) : the_post(); ?>
 	  <?php if($r_count%3 == 0){
  		//Iterate through our counter and add class to every third item
      $r_class = 'last';
  		}else{
  		$r_class = '';
   		}
  		$r_count++;
  		?>
    <?php //Here's what to do if it's a Team Page Archive?>
      <?php if('team_page' === get_post_type() ) {?>
	      <a href="<?php the_permalink(); ?>" class="teamLink">
	        <article class="four columns teamPage <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
	          <?php the_post_thumbnail ('grid_image'); ?>
	          <h3 class="teamName"><?php the_title(); ?></h3>
	        </article>
	      </a>
    	<?php }
	     else {?>
  		<?php //For all other kinds of archive pages ?>
        <a href="<?php the_permalink(); ?>" class="teamLink">
	        <article class="four columns categoryPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
            <?php the_post_thumbnail ('grid_image'); ?>
            <header>
              <h2 class="entry-title"><?php the_title(); ?></h2>
            </header>
            <div class="entry-content">
              <?php the_news_excerpt(30, 'Read More', none); ?>
            </div>
          </article>
        </a>
      <?php }?>
  <?php endwhile;  ?>
