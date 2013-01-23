<?php
/*
Template Name: Who We Are
*/
?>

<?php get_header(); ?>
      <div class="twelve columns" role="content">
        <div class="container">
          <h1 class="archiveHeader"><?php echo get_the_title(); ?> </h1>
	          <section class="twelve columns whoWeAre">
		          	<div class="row">
						<div class="aboutSection twelve columns">
							<div class="six columns">
								<h3>We are</h3>
								<p>A circle of hope in Jesus Christ</p>
								<p>A network of cells forming congregations</p>
								<p>A people called to reconciliation</p>
								<p>An opportunity to explore and express God's love</p>
							</div>

							<div class="six columns last">
								<h3>What we do</h3>
								<p class="overflow">We create an environment where people can connect with God and act for redemption, responding in love to our thirsty region and fractured society</p>
								<p class="overflow">We are birthing a new generation of the church to resist and restore with those moved by the Holy Spirit</p>
							</div>
						</div><!-- /.aboutSection -->
		        	</div><!--/.row-->
	          	</section><!--/.twelve-->
	    </div><!--/.container-->
    </div><!-- /.twelve -->
</div><!-- /.container[role="main"]-->

<div class="container whoWeArebg">
 <!-- The Network Image -->
<div class="row">
<h2>Our Network</h2>
  <img src="<?php echo get_template_directory_uri(); ?>/images/Network-image-white.png" style="display: block; margin: 0 auto">
</div>
</div><!--/.contatiner .whoWeArebg-->

<!--List our Convictions and link to Convitions Page-->
 <div class="row">
		<a href="../convictions">
			<h2 style="text-align:center">Our Convictions</h2>
		</a>

		<?php /* Start loop */ ?>
		<?php $r_count = 1; ?>
		<?php $args = array( 'post_type' => 'proverbs', 'posts_per_page' => 10,);
		$loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); ?>

		 	<?php if($r_count%2 == 0){
				$r_class = 'last';
				}else{
				$r_class = '';
		 		}
				$r_count++;
				?>
			<article class="six columns convictionsPost <?php echo $r_class;?>" id="post-<?php the_ID(); ?>">
			<p class="convictionsName"><?php the_title(); ?></p>
			</article>
		<?php endwhile;  ?>

  </div><!-- /.row-->

<!--Make a scrollable list of Staff members see http://jquerytools.org/demos/scrollable/index.html-->
<div class="container whoWeArebg lastwhoWeAre">
  	<div class="row">
  		<h2>Staff</h2>
			<div style="margin:0 auto; width: 90%; height:300px;">
			<!-- "previous page" action -->
			<a class="prev browse left"></a>

				<!-- root element for scrollable -->
				<div class="scrollable" id="scrollable">

				  <!-- root element for the items -->
				  <div class="items">
				  	<div>
						<?php /* Start loop */ ?>
						<?php $r_count = 1; //Initiate our counter variable?>
						<?php $args1 = array( 'post_type' => 'staff', 'posts_per_page' => 50 );
							$loop = new WP_Query( $args1 );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>

						 	<?php if($r_count%4 == 0){ //Iterate through our counter in order to add appropriate classes
								$r_divs = '</div> <div>';
								}else{
								$r_divs = '';
						 		}
								$r_count++;
								?>

							<!-- Print out the markup for the Staff list -->
						 	   <a href="../staff/" class="linksLink">
								   <article  id="post-<?php the_ID(); ?>" class="lookAndListenPost">
							        	<?php the_post_thumbnail (); ?>
							      		<header>
							        		<h3 class="entry-title"><?php the_title(); ?></h3>
							        			<h4><?php echo get_post_meta($post->ID, "_staff_title", true); ?></h4>
							        	</header>
							      	</article>
						      	</a>
								 <?php echo $r_divs;?>
							<?php endwhile;  ?>
						</div>
						<!-- "next page" action -->
					</div>
				</div>
			<a class="next browse right"></a>
		</div> <!-- Styled div-->
	</div><!-- /.row -->
</div><!--/.container .whoWeArebg-->
<?php get_footer(); ?>
