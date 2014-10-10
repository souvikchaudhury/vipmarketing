<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">

				<!--about  part-->
			<div class="wrapper">
				<div class="innerContent-top">
						
					<div class="container">
					<?php while ( have_posts() ) : the_post(); ?>
					<p><?php the_title(); ?></p>
					<p><?php the_content(); ?></p>
					<?php endwhile; // end of the loop. ?>
					</div>
				</div>
			</div>
	<!--about  part end-->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>