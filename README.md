#Circle of Hope WordPress Theme#
This WordPress theme has been built specifically for the website http://circleofhope.net. It has been built using the Reverie theme framework, available [here](http://themefortress.com/reverie/ "Reverie"). Joel Smith lead the development of this theme which incorporated the designs put forward by Circle of Hope's Storytellers team in 2012.

##About This Theme's Architecture##
Like most WP theme's, this theme directory contains all the files relating to the website's VIEW layer. These views are mainly contained within the clearly named PHP files.

The views on this website are built on a two step process: (1) the main view file which is requested through WP's URL logic and (2) the loop file which gets the appropriate information from the database. For instance, the page for the "Mission Teams" consists of two files: (1) missionTeams.php and (2) loop-mission.php. The first file (the view file) contains calls to all the normal WP items (header, footer, etc.) and establishes the general page markup for that page. This page will include a call to the loop that looks like the following: `get_template_part('loop', 'mission');`. This calls the information contained within the loop-mission.php file, which actually makes the looped called to the database. You can read more about WordPress's loop [here](http://codex.wordpress.org/The_Loop).
