<?php
/**
 * Single post partial template
 *
 * @package Maureen-tw
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$event_date   = get_field( 'event_date' );
$allowed_tags = array(
	'i'  => array(),
	'em' => array(),
);

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mb-4">
		<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<div class="event-source">
		<?php
		// Check if the flexible content field 'links_resources' exists.
		if ( have_rows( 'links_resources' ) ) :
			?>
<div class="resources">
		<h3>Resources</h3>
		<ol>
				<?php

				// Loop through the rows of data.
				while ( have_rows( 'links_resources' ) ) :
					the_row();

					// Get the layout name.
					$layout_name = get_row_layout();

					// Handle 'sources' layout.
					if ( 'sources' === $layout_name ) :

						// Get the link array from the 'source' subfield.
						$link_array = get_sub_field( 'source' );

						// Check if the link array is not empty and output the link.
						if ( $link_array ) :
							echo '<li><a href="' . esc_url( $link_array['url'] ) . '" target="_blank">' . esc_html( $link_array['title'] ) . '</a></li>';
					endif;

						// Handle 'footnote' layout.
					elseif ( 'footnote' === $layout_name ) :

						// Get the text from the 'footnote' subfield.
						$footnote_text = get_sub_field( 'footnote' );

						// Check if the footnote text is not empty and output it.
						if ( $footnote_text ) :
							echo '<li>' . wp_kses( $footnote_text, $allowed_tags ) . '</li>';
						endif;

					endif;

			endwhile;
				?>

</ol>
		</div>
				<?php
endif;

		?>

		</div>
		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				)
			);
			?>
	</div>

</article>
