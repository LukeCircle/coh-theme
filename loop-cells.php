<?php
//Begin by getting the taxonomy 'cell-locations'
$terms = get_terms('cell-locations');
//Order the list of posts by this taxonomy
$argv = array('orderby' => 'by_term', 'hide_empty' => false);
 //Print out the list with a nested list of cells
 foreach ($terms as $term) {
    $wpq = array('taxonomy'=>'cell-locations','term'=>$term->slug);
    $myquery = new WP_Query ($wpq);
    $article_count = $myquery->post_count;

    //Print out the markup for each cell cell-locations
    echo '<div class="accordionButton">';
    echo "<h2 class=\"cellHeader\" id=\"".$term->slug."\">";
    echo $term->name;
    echo "</h2>";
    echo '</div>';
    echo '<div class="accordionContent">';

    //Print out the nested list of cells
    if ($article_count) {
       echo "<ul class='cell_list'>";
       while ($myquery->have_posts()) : $myquery->the_post();?>
          <li class="cell-item">
          	<ul class="cell-list">
	           	<li><?php $terms_as_text = get_the_term_list( $post->ID, 'cell-days', '', ', ', '' ) ;
		           	echo strip_tags($terms_as_text);
	           	?> </li>
	            <li> <? echo get_post_meta(get_the_ID(), '_cell_leader', true); ?> / <?php echo get_post_meta(get_the_ID(), '_cell_apprentice', true)?></li>
	            <li>Get in touch with <a href="mailto:<?php echo get_post_meta(get_the_ID(), '_cell_leader_email', true);?>"><?php echo get_post_meta(get_the_ID(), '_cell_leader', true);?></a></li>
          	</ul>
          </li>
       <?php endwhile;
       echo "</ul>";
    }
  echo '</div>';
}
?>
