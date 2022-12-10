<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

	</div>
	<!-- .site-content -->

	<footer class="site-footer-container wp-block-template-part">
		<div class="flex justify-left nowrap wp-block-group">
			<div class="is-nowrap is-layout-flex wp-block-group alignwide footer-group">
				<div class="is-layout-constrained wp-block-group logo-socials">

					<figure class="wp-block-image size-full is-resized">
						<img decoding="async" loading="lazy" src="index_files/Screen-Shot-2022-11-29-at-1.16.25-AM.png" alt="" class="wp-image-28" width="150" height="50">
					</figure>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
					<ul class="flex space-between wp-block-social-links has-icon-color is-style-logos-only">
						<?php $socialLinks = wp_get_menu_array('social'); ?>
						<?php foreach ($socialLinks as $link) : ?>
							<?php
								$icon = getSocialIcon($link['url']);
								if (!$icon) { continue; }
							?>
							<li>
								<a href="<?php echo $link['url']; ?>">
									<span class="fab <?php echo $icon; ?>"></span>
									<span class="screen-reader-text"><?php echo $link['title']; ?></span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>




				<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<?php $footerMenu = wp_get_menu_array('footer'); ?>

				<div class="flex space-between wp-block-group footer-menu">

					<?php foreach($footerMenu as $group) : ?>
					<?php if (!isset($group['title'])) { continue; } ?>
					<div class="is-layout-constrained wp-block-group">
						<h2><?php echo $group['title']; ?></h2>
						<ul>
							<?php foreach ($group['children'] as $link) : ?>
							<li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endforeach; ?>
				</div>

				<?php endif; ?>

			</div>
		</div>

		<p><?php legacyavenue_footer_copyright(); ?></p>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
