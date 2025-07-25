<?php
/**
 * Template for the People page.
 * Displays all posts tagged with any 'people' term.
 */
get_header();

// Get all slugs for terms in 'people'
$people_terms = get_terms( [
	'taxonomy'   => 'land',
	'fields'     => 'slugs',
	'hide_empty' => true,
] );

$paged = get_query_var( 'paged' ) ?: 1;

$query = new WP_Query( [
	'post_type' => 'event', // Or whatever your CPT is
	'tax_query' => [
		[
			'taxonomy' => 'land',
			'field'    => 'slug',
			'terms'    => $people_terms,
		],
	],
    'orderby' => 'date',
	'order'   => 'ASC', // oldest to newest.
	'posts_per_page' => 20,
	'paged' => $paged,
] );
?>

<div class="container mx-auto my-8">
	<h1>Places</h1>

	<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php get_template_part( 'template-parts/content-summary' ); ?>
		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>
		<p>No posts found.</p>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>
