<?php
/**
 * Template Name: Api Docs Index
 *
 * @package WordPress
 * @subpackage Sparkling
 * @since Sparkling
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			$args = array(
				'name'        => 'api-docs',
				'post_type'   => 'page',
			);
			query_posts($args);
			?>

			<?php if ( have_posts() ) {?>

				<h1><?php the_title();?></h1> <br>

				<ul class="list-apis">
					<?php while ( have_posts() ) : the_post();?>
						<li><?php the_content();?></li>
					<?php endwhile;?>
				</ul>

			<?php }; ?>

			<h2> Available APIs : </h2>

			<?php
			$args = array(
				'posts_per_page' => 100,
				'post_type' => 'API'
			);

			query_posts($args);
			?>


			<?php if ( have_posts() ) {?>

				<ul class="list-apis">
					<?php while ( have_posts() ) : the_post();?>
						<li><a href="<?php the_permalink()?>"> <?php the_title();?> </a> <br> <?php the_content();?></li>
					<?php endwhile;?>
				</ul>

			<?php }; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>