<?php
/**
 * Template Name: Video Page
 *
 * @package WordPress
 * @subpackage Illustratr-child
 * @since Illustratr-child
 */

get_header(); ?>

<div class="title-box">
	<p class="title-page-headline">video</p>
</div>

<div class="container-fluid" id="video-page">
	<div id="video-box">
		<video width="800" height="650" controls autoplay="true">
			<source src="http://test2.dev/wp-content/uploads/videos/commercial.mp4" type="video/mp4">
		Your browser does not support the video tag.
		</video>
	</div>
</div>

<?php get_footer(); ?>

