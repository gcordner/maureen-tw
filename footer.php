
</main>

<?php do_action( 'maureen_tw_content_end' ); ?>

</div>

<?php do_action( 'maureen_tw_content_after' ); ?>

<footer id="colophon" class="site-footer bg-gray-50 py-12" role="contentinfo">
	<?php do_action( 'maureen_tw_footer' ); ?>
	<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
		<div class="footer-widgets container mx-auto text-center text-gray-500">
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>
		</div>
	<?php endif; ?>


	<div class="container mx-auto text-center text-gray-500">
		&copy; <?php echo date_i18n( 'Y' ); ?> - <?php echo get_bloginfo( 'name' ); ?>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
