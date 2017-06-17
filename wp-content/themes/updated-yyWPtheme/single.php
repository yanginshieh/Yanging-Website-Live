<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<table class="tbl-content">
			<thead>
			    <tr class="line">
					<th class="project-header">Project</th>
					<th class="category-header category-data">Category</th>
					<th class="year-header">Year</th>
			    </tr>
			</thead>
				<tr>
					<td class="project-header"><div class="indexThumbnail"><?php the_post_thumbnail('homepage-thumb'); ?></div><?php the_field('project_name'); ?></td>
					<td class="category-header"><?php the_field('project_category'); ?></td>
					<td class="year-header"><?php the_field('project_year'); ?></td>
				</tr>
			</table>
			<?php the_content(); // Dynamic Content ?>

		</article>
		<br clear="all">
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
