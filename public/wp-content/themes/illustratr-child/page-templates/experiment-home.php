<?php
/**
 * Template Name: Experimental Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen-child
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="title-page">
	<section id="title-section">
		<div class="still-background">
			<div class="title-box">
				<p id="title-box-name"> - nick janecki - </p>
				<p id="title-box-tagline">cgi artist and animator</p>
			</div>
		</div> <!-- still-background -->
	</section>
	<section id="stills-section">
		<div class="title-box">
			<p class="title-page-headline">featured stills</p>
		</div>
	</section>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

	<?php if ( ! get_theme_mod( 'illustratr_hide_portfolio_page_content' ) ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( '' != get_the_post_thumbnail() ) : ?>
				<div class="entry-thumbnail">
					<?php the_post_thumbnail( 'illustratr-featured-image' ); ?>
				</div><!-- .entry-thumbnail -->
			<?php endif; ?>

			<div class="page-content">
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'illustratr' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
			</div><!-- .page-content -->

			

		<?php endwhile; // end of the loop. ?>
	<?php endif; ?>

		<?php
			if ( get_query_var( 'paged' ) ) :
				$paged = get_query_var( 'paged' );
			elseif ( get_query_var( 'page' ) ) :
				$paged = get_query_var( 'page' );
			else :
				$paged = 1;
			endif;

			$posts_per_page = get_option( 'jetpack_portfolio_posts_per_page', '10' );
			$args = array(
				'post_type'      => 'jetpack-portfolio',
				'posts_per_page' => $posts_per_page,
				'paged'          => $paged,
			);
			$project_query = new WP_Query ( $args );
			if ( post_type_exists( 'jetpack-portfolio' ) && $project_query -> have_posts() ) :
		?>

			<div class="portfolio-wrapper">

				<?php /* Start the Loop */ ?>
				<?php while ( $project_query -> have_posts() ) : $project_query -> the_post(); ?>

					<?php get_template_part( 'content', 'portfolio' ); ?>

				<?php endwhile; ?>

			</div><!-- .portfolio-wrapper -->

			<?php
				illustratr_paging_nav( $project_query->max_num_pages );
				wp_reset_postdata();
			?>

		

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<section id="testimonials-section">
	<div class="title-box">
		<p class="title-page-headline">testimonials</p>
	</div>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
		<ol class="carousel-indicators">
		    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

	  <!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
		    <div class="item active">
			    "What an amazing talent Nick Janecki has. Nick is passionate about his work and want to see others succeed." - Brian Bullock, Founder of RETHINK Studios
		    </div>
		    <div class="item">
			    "Nick has proven himself in many situations taking on any task with tremendous enthusiasm and delivering fantastic results." - Benjamin Mazza, Creative Director at Suitable Technologies
		    </div>
		    <div class="item">
			    "Nick is a passionate artist, always ready and able to pick up new skills and excel in them." - Dori Azza, Cinematographer at SCEA
		    </div>
		</div>

	  <!-- Controls -->
	    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
	    </a>
	</div>
</section>

<?php get_footer(); ?>