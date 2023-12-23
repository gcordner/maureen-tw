<?php
/**
 * Single post partial template
 *
 * @package Maureen-tw
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$event_date   = get_field( 'event_date' );
$event_source = get_field( 'source' );
$source_url   = get_field( 'source_link' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header mb-4">
		<?php the_title( sprintf( '<h1 class="entry-title text-2xl lg:text-5xl font-extrabold leading-tight mb-1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
	</header>

	<div class="entry-content">
		<?php the_content(); ?>
		<div class="event-source">
		<p><b>Source:</b> 
		<?php
		if ( ! empty( $source_url ) ) :
			// Output anchor tag when $source_url is not empty.
			echo '<a href="' . esc_url( $source_url ) . '" target="_blank">' . esc_html( $event_source ) . '</a>';
	else :
		// Output $event_source without anchor tag when $source_url is empty.
		echo esc_html( $event_source );
	endif;
	?>

</p>
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
