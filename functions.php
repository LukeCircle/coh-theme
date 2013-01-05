<?php
function reverie_setup() {
	// Add language supports. Please note that Reverie Framework does not include language files.
	load_theme_textdomain('reverie', get_template_directory() . '/lang');

	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	// set_post_thumbnail_size(150, 150, false);

	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'reverie'),
		'utility_navigation' => __('Utility Navigation', 'reverie')
	));
}
add_action('after_setup_theme', 'reverie_setup');

// Enqueue for header and footer, thanks to flickapix on Github.
// Enqueue css files
function reverie_css() {
  if ( !is_admin() ) {

     wp_register_style( 'foundation',get_template_directory_uri() . '/css/foundation.css', false );
     wp_enqueue_style( 'foundation' );

     wp_register_style( 'app',get_template_directory_uri() . '/css/app.css', false );
     wp_enqueue_style( 'app' );

     wp_register_style( 'reverie',get_template_directory_uri() . '/css/reverie.css', false );
     wp_enqueue_style( 'reverie' );


     // Load style.css to allow contents overwrite foundation & app css
     wp_register_style( 'style',get_template_directory_uri() . '/style.css', false );
     wp_enqueue_style( 'style' );

     wp_register_style( 'calendar',get_template_directory_uri() . '/css/calendar.css', false );
     wp_enqueue_style( 'calendar' );


     wp_register_style( 'google_font',"http://fonts.googleapis.com/css?family=Merriweather|Open+Sans+Condensed:700,300", false );
     wp_enqueue_style( 'google_font' );

  }
}
add_action( 'init', 'reverie_css' );

function reverie_ie_css () {
    echo '<!--[if lt IE 9]>';
    echo '<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">';
    echo '<![endif]-->';
}
add_action( 'wp_head', 'reverie_ie_css' );

// Enqueue js files
function reverie_scripts() {

global $is_IE;

  if ( !is_admin() ) {

  // Enqueue to header
     wp_deregister_script( 'jquery' );
     wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js' );
     wp_enqueue_script( 'jquery' );

     wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.foundation.js', array( 'jquery' ) );
     wp_enqueue_script( 'modernizr' );

  // Enqueue to footer
     // wp_register_script( 'reveal', get_template_directory_uri() . '/js/jquery.reveal.js', array( 'jquery' ), false, true );
     // wp_enqueue_script( 'reveal' );

     // wp_register_script( 'orbit', get_template_directory_uri() . '/js/jquery.orbit-1.4.0.js', array( 'jquery' ), false, true );
     // wp_enqueue_script( 'orbit' );

     wp_register_script( 'custom_forms', get_template_directory_uri() . '/js/jquery.customforms.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'custom_forms' );

     wp_register_script( 'placeholder', get_template_directory_uri() . '/js/jquery.placeholder.min.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'placeholder' );

     wp_register_script( 'tooltips', get_template_directory_uri() . '/js/jquery.tooltips.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'tooltips' );

     wp_register_script( 'zrssfeed', get_template_directory_uri() . '/js/jquery.zrssfeed.min.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'zrssfeed' );

     wp_register_script( 'lifestream', get_template_directory_uri() . '/js/jquery.lifestream.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'lifestream' );

     wp_register_script( 'tools', get_template_directory_uri() . '/js/jquery.tools.min.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'tools' );

     wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'app' );


     if ($is_IE) {
        wp_register_script ( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js" , false, true);
        wp_enqueue_script ( 'html5shiv' );
     }

     // Enable threaded comments
     if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
		wp_enqueue_script('comment-reply');
  }
}
add_action( 'init', 'reverie_scripts' );

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="four columns widget %2$s"><div class="footer-section">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
	echo '<p class="byline author vcard">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}

// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);

// Customize output for menu
class reverie_walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<a href=\"#\" class=\"flyout-toggle\"><span> </span></a><ul class=\"flyout\">\n";
  }
}

// Add Foundation 'active' class for the current menu item
function reverie_active_nav_class( $classes, $item )
{
    if($item->current == 1)
    {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'reverie_active_nav_class', 10, 2 );

// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );

// Pagination
function reverie_pagination() {
	global $wp_query;

	$big = 999999999; // This needs to be an unlikely integer

	// For more options and info view the docs for paginate_links()
	// http://codex.wordpress.org/Function_Reference/paginate_links
	$paginate_links = paginate_links( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'mid_size' => 5,
		'prev_next' => True,
	    'prev_text' => __('&laquo;'),
	    'next_text' => __('&raquo;'),
		'type' => 'list'
	) );

	// Display the pagination if more than one page is found
	if ( $paginate_links ) {
		echo '<div class="reverie-pagination">';
		echo $paginate_links;
		echo '</div><!--// end .pagination -->';
	}
}

// Presstrends
function presstrends() {

// Add your PressTrends and Theme API Keys
$api_key = 'xc11x4vpf17icuwver0bhgbzz4uewlu5ql38';
$auth = 'kw1f8yr8eo1op9c859qcqkm2jjseuj7zp';

// NO NEED TO EDIT BELOW
$data = get_transient( 'presstrends_data' );
if (!$data || $data == ''){
$api_base = 'http://api.presstrends.io/index.php/api/sites/add/auth/';
$url = $api_base . $auth . '/api/' . $api_key . '/';
$data = array();
$count_posts = wp_count_posts();
$count_pages = wp_count_posts('page');
$comments_count = wp_count_comments();
$theme_data = wp_get_theme();
$plugin_count = count(get_option('active_plugins'));
$all_plugins = get_plugins();
foreach($all_plugins as $plugin_file => $plugin_data) {
  $plugin_name .= $plugin_data['Name'];
  $plugin_name .= '&';
}
$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
$data['posts'] = $count_posts->publish;
$data['pages'] = $count_pages->publish;
$data['comments'] = $comments_count->total_comments;
$data['approved'] = $comments_count->approved;
$data['spam'] = $comments_count->spam;
$data['theme_version'] = $theme_data['Version'];
$data['theme_name'] = urlencode($theme_data['Name']);
$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
$data['plugins'] = $plugin_count;
$data['plugin'] = urlencode($plugin_name);
$data['wpversion'] = get_bloginfo('version');
foreach ( $data as $k => $v ) {
$url .= $k . '/' . $v . '/';
}
$response = wp_remote_get( $url );
set_transient('presstrends_data', $data, 60*60*24);
}}
add_action('admin_init', 'presstrends');

//The News Excerpt
function the_news_excerpt($words = 40, $link_text = 'Read More &#187;', $allowed_tags = 'all', $container = 'div', $smileys = 'no' )
{
global $post;

  if ( $allowed_tags == 'all' ) $allowed_tags = '<a>,<b>,<strong>,<ul>,<ol>,<li>,<span>,<blockquote>,<img>';

  $text = preg_replace('/\[.*\]/', '', strip_tags($post->post_content, $allowed_tags));
  $text = explode(' ', $text);
  $tot = count($text);
  $i = "";
  $output ="";

  for ( $i=0; $i<$words; $i++ ) : $output .= $text[$i] . ' '; endfor;

  if ( $smileys == "yes" ) $output = convert_smilies($output);

  ?><p><?php echo force_balance_tags($output) ?><?php if ( $i < $tot ) : ?> ...<?php else : ?></p><?php endif; ?>
  <?php if ( $i < $tot ) :
    if ( $container == 'p' || $container == 'div' ) : ?></p><?php endif;
    if ( $container != 'plain' ) : ?><<?php echo $container; ?> class="more"><?php if ( $container == 'div' ) : ?><p><?php endif; endif; ?>

  <a href="<?php the_permalink(); ?>" class="more" title="<?php echo $link_text; ?>"><?php echo $link_text; ?></a><?php

  if ( $container == 'div' ) : ?></p><?php endif; if ( $container != 'plain' ) : ?></<?php echo $container; ?>><?php endif;

  if ( $container == 'plain' || $container == 'span' ) : ?></p>
  <?php endif;
  endif;}

// Add Circle of Hope logos in appropriate places
add_action('admin_head', 'custom_admin_links');

function custom_admin_links() {
    echo '
      <img src="'.get_bloginfo('template_directory').'/images/logo.png" style=" height: 60px; float: left; margin: 5px 0 0 15px ; width: auto;">
      <section class="headerLinks" style="width: 100%; height: 50px; margin:0; padding: 10px; background: #eee; border-bottom: 1px solid #ddd;">
        <h2 style="position: absolute; float: left; top: 20px; left: 100px; font-family: HelveticaNeue-Light, Helvetica ,sans-serif; font-weight: 300;">Before using this site</h2>
          <p style=" position: absolute; float: left; clear: left; top: 40px;  left: 100px;">Please take some time to read the following documentation as it applies to your role. <br /><strong>All users must read at least the style guide and the basic user guide.</strong></p>
          <ul style="display: absolute; float: right; margin-right: 20px;">
            <li style="display: inline; margin: 0px 10px 10px"><a class="button medium" href="https://docs.google.com/document/d/1q_-0ETpcTWpU5jLFUxGeyCrv5snKur1sN_KiMjSKKKc/edit" target="blank">Style Guide</a></li>
            <li style="display: inline; margin: 0px 10px 10px"><a class="button medium" href="https://docs.google.com/document/d/1KxqxyAE4jRQZOsNHCKSw8eSlK3d0yY-FOlzIdDFf0cI/edit" target="blank">Basic User Guide</a></li>
            <li style="display: inline; margin: 0px 10px 10px"><a class="button medium" href="https://docs.google.com/document/d/1c7ZdYLDT_xyMrmUmtU77LY0ItkO7w2mpB-Xleb5SSzo/edit" target="blank">Admin User Guide</a></li>
            <li style="display: inline; margin: 0px 10px 10px"><a class="button medium">Developer Guide</a></li>
          </ul>
      </section>';
}

function my_custom_login_logo()
{
    echo '
      <style  type="text/css">
        h1 a {
          background-image:url('.get_bloginfo('template_directory').'/images/logo.png)  !important;
          background-size: 100px 80px !important;}
          </style>';
}
add_action('login_head',  'my_custom_login_logo');

//Image Resizing Script
add_filter( 'image_downsize', 'myprefix_image_downsize', 1, 3 );
function myprefix_image_downsize( $value = false, $id, $size ) {
    if ( !wp_attachment_is_image($id) )
        return false;

    $img_url = wp_get_attachment_url($id);
    $is_intermediate = false;
    $img_url_basename = wp_basename($img_url);

    // try for a new style intermediate size
    if ( $intermediate = image_get_intermediate_size($id, $size) ) {
        $img_url = str_replace($img_url_basename, $intermediate['file'], $img_url);
        $is_intermediate = true;
    }
    elseif ( $size == 'thumbnail' ) {
        // Fall back to the old thumbnail
        if ( ($thumb_file = wp_get_attachment_thumb_file($id)) && $info = getimagesize($thumb_file) ) {
            $img_url = str_replace($img_url_basename, wp_basename($thumb_file), $img_url);
            $is_intermediate = true;
        }
    }

    // We have the actual image size, but might need to further constrain it if content_width is narrower
    if ( $img_url) {
        return array( $img_url, 0, 0, $is_intermediate );
    }
    return false;
    }
?>
