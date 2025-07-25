<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12' ); ?>>
	<header class="entry-header mb-4">
		<h2 class="entry-title text-2xl md:text-3xl font-extrabold leading-tight mb-1">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		<time datetime="<?php echo get_the_date( 'c' ); ?>" class="text-sm text-gray-700">
			<?php echo get_the_date(); ?>
		</time>
	</header>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
</article>
