<?php
/**
 * Template Name: Contact Page Template
 *
 * @package illustratr-child
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( ! get_theme_mod( 'illustratr_hide_portfolio_page_content' ) ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( '' != get_the_post_thumbnail() ) : ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail( 'illustratr-featured-image' ); ?>
					</div><!-- .entry-thumbnail -->
				<?php endif; ?>

				<div class="title-box">
					<p class="title-page-headline">contact me</p>
				</div>

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

<?php get_footer(); ?>