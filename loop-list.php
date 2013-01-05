<?php
/*********************
Loop for the Blog Page
*********************/
?>
<?php /* Start loop */ ?>
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("posts_per_page=10&paged=$paged"); ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="row blogPost">
        <div class="four columns">
          <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail ('grid_image');
          }?>
		    </div>
        <div class="eight columns last ">
		      <?php /* Start loop */ ?>
  			    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   					  <header>
   					    <h2 class="blogTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      				</header>
  			      <div>
  			        <?php the_news_excerpt(100, 'Continue Reading','p','div')?>
  		        </div>
			      </article>
		    </div>
      </div>
    <?php endwhile; // End the loop ?>
  <?php wp_pagenavi();?>

