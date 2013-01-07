#Circle of Hope WordPress Theme#
This WordPress theme has been built specifically for the website http://circleofhope.net. It has been built using the Reverie theme framework, available [here](http://themefortress.com/reverie/ "Reverie"). Joel Smith lead the development of this theme which incorporated the designs put forward by Circle of Hope's Storytellers team in 2012.

##About This Theme's Architecture##
###Views and Loops###
Like most WP theme's, this theme directory contains all the files relating to the website's VIEW layer. These views are mainly contained within the clearly named PHP files.

The views on this website are built on a two step process: (1) the main view file which is requested through WP's URL logic and (2) the loop file which gets the appropriate information from the database. For instance, the page for the "Mission Teams" consists of two files: (1) missionTeams.php and (2) loop-mission.php. The first file (the view file) contains calls to all the normal WP items (header, footer, etc.) and establishes the general page markup for that page. This page will include a call to the loop that looks like the following: `get_template_part('loop', 'mission');`. This calls the information contained within the loop-mission.php file, which actually makes the looped called to the database. Glancing through this file in the above repository will give you a cursory understanding of this point. You can also read more about WordPress's loop [here](http://codex.wordpress.org/The_Loop).

###Custom Post Types###

This theme depends upon a custom plugin which is also available on [Github](https://github.com/jsumnersmith/coh-plugins). This plugin creates and augments the [Custom Post Types](http://codex.wordpress.org/Post_Types) available through WordPress. To understand the StoryTellers Team's logic of using custom post types, you can flip through this self explanatory [presentation](https://docs.google.com/presentation/d/1J1VvJ3GwIA7sZ6S9EFaWxqFF0IKBc7ozbLGI6i1KHLA/pub?start=false&loop=false&delayms=3000).

These custom post types are the MODELS for the data which is eventually sent to the VIEW layers of our theme. They establish what information is necessary or possible for each piece of content. Here's a basic list of the post types and where they are sent in the VIEW layer.

- **Congregations**: These display as part of the list VIEW in `publicMeetings.php/loop-publicMeetings.php` and as individual congregations/public meetings in the `single.php/loop-single.php` VIEW. The metadata for this post type include: (1) Address and (2) Map shortcode from the Mapit plugin.

- **Mission/Compassion Teams**: These display as part of the list VIEW in either `compassion.php/loop-compassion.php` or `mission.php/loop-mission.php` and as individual team pages in the `single.php/loop-single.php` VIEW. The metadata for this post type include: (1) Team Leader, (2) Team leader email, (3) Link to team website, and (4) Social Media accounts to create a "mini-stream" of their posts.

- **Stories**: (Specifically for the 100 Stories initiative). These display as part of the list VIEW in `stories.php/loop-stories.php` only. The metadata for this post type include: None.

- **Look/Listen**: This post type allows for either listing an audioblog or linking youtube videos to be embedded in a pop-out. These display as part of the list VIEW in `lookAndListen.php/loop-lookAndListenAudio.php/loop-lookAndListenVideo.php` only. The metadata for this post type include: EITHER (1) link for Audioblog or (2) embed code for YouTube video.

- **Expressions**:  (This data type includes Circle Thrift, Circle Counseling, etc.) These display as part of the list VIEW in `partners.php/loop-partners.php` only. The metadata for this post type include: (1) Link to Partner/"Expressions" website.

- **Staff Profiles**: These display as part of the list VIEW in `staff.php/loop-staff.php` and as a scrollable list at the foot of the `whoWeAre.php/loop-whoWeAre.php`. The metadata for this post type include: (1) Position Title and (2) Location.

- **Links**: (This data type includes "Big C" links and "Artist" links. They are differentiated through a "Category" checkbox on the edit page). These display as part of the list VIEW either in `bigC.php/loop-bigC.php` or as a scrollable (for the Artist category) at the bottom of the `lookAndListen.php` view  The metadata for this post type include: (1) Link to website.

- **Proverbs**: These display as part of the list VIEW in `convictions.php/loop-convictions.php` and as a random single view as part of the `front-page.php`. The metadata for this post type include: None.

N.B. There are other calls to loops throughout the theme files, especially on the Home/Who We Are/Connect/Deeper pages. The comments in the code should suffice to answer any specific questions about the moving parts. Some other loops are called through plugin API's (for instance The WordPress Events Calendar). Their respectice documentation has already been written, and there is no need to enumrate them here.
####Justification of VIEW/LOOP Architecture####
The basic reason for using this view/loop method arises out of the desire to separate the theme's code into smaller modules which can themselves be recalled in multiple VIEWS. For instance, the Audio Blog loop is called twice: (1) on the Look and Listen page and (2) on the Deeper page.

This architecture was first suggested by Ben Word, author of the Roots WP theme framework. It was adopted by the original author of the Reverie framework, and has been used as well for this specific theme.

###Plugins###
The following third-party plugins are a necessary part of the site's archictecture and should be included in any WP install that uses this theme:

- **Advanced Custom Fields**: This plugin provides a clean interface and implementation of the metaboxes for each of the custom post types.
- **Advanced Excerpt**: This plugin provides an easy way to truncate posts in certain views.
- **Google Calendar Events**: This plugin provides easy interaction with the Google Calendar API.
- **MapPress Easy Google Maps**: This plugin provides simple Google Maps via shortcodes for various pages on the site.
- **The Events Calendar**: This plugin provides a complete event management system and is used, on our website, for featured events.
- **Video Thumnails**: This generates thumbnails for any YouTube videos embedded on the Look and Listen page.

N.B. There are other plugins which have been used, and so unless you have a good reason to remove them, please don't.

##Contributing to This Code##
Feel free to pull down this repository and fiddle with the theme files. If you need a copy of the database for your local environment, please contact Brent Saner (send Joel an email if you don't have Brent's email).

The most important thing to know about the production server is that your code should never attempt to fiddle with the server's .htaccess file.
