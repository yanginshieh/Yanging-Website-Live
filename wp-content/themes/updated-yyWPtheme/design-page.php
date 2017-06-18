<?php
/*
  Template Name: design-Page
*/
get_header(); ?>


<main role="main">
    <button type="button" id="openAll">Expand All</button>
    <button type="button" id="closeButton">Collapse All</button>
    <section>
      <table class="tablesorter tbl-content" cellspacing="0" width="100%">
        <thead>
          <tr class="line">
            <th class="project-header tblHeaderText">Project</th>
            <th class="category-header category-data tblHeaderText">Category</th>
            <th class="year-header tblHeaderText">Year</th>
          </tr>
        </thead>
        <tbody>
			<?php query_posts('cat=2'); while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                <tr class="showHidden">
	                  <td class="project-header"><div class="indexThumbnail"><?php the_post_thumbnail('homepage-thumb'); ?></div> <div class="stay"><?php the_title(); ?></div></td>
	                  <td class="category-header"><?php the_field('project_category'); ?></td>
	                  <td class="year-header"><?php the_field('project_year'); ?></td>
	                </tr>
	                <tr class="hiddenData">
	                  <td colspan="3" class="contenttext"><?php the_content();?></td>
	                </tr>
	            </article>
			<?php endwhile; ?>
        </tbody>
      </table>
    </section>
</main>
