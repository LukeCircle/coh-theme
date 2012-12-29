<?php /* Start loop */ ?>
<?php $r_count = 1; ?>
<?php while (have_posts()) : the_post(); ?>
 	<?php if($r_count%3 == 0){
		$r_class = 'last';
		}else{
		$r_class = '';
 		}
		$r_count++;
		?>
   <?php if('team_page' === get_post_type() ) {
	?>
	<a href="<?php the_permalink(); ?>" class="teamLink">
	<article class="four columns teamPage <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
	<?php the_post_thumbnail ('grid_image'); ?>
	<h3 class="teamName"><?php the_title(); ?></h3>
	</article>
	</a>
	<?php }
	else {?>
  <?php roots_post_before(); ?>
  		<a href="<?php the_permalink(); ?>" class="teamLink">
	     <article class="four columns categoryPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">

        <?php roots_post_inside_before(); ?>
      <?php the_post_thumbnail ('grid_image'); ?>
      <header>
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <!--<?php roots_entry_meta(); ?>-->
      </header>
      <div class="entry-content">
        <?php the_news_excerpt(30, 'Read More', none); ?>
      </div>
    </article></a>
     <?php }?>
  <?php roots_post_after(); ?>
<?php endwhile;  ?>
