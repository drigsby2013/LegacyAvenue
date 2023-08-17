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

						<div class="footer-logo">
							<img decoding="async" loading="lazy" src="/wp-content/uploads/2022/12/Wide_White.png" alt="Legacy Avenue" class="wp-image-28">
						</div>

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

				<div class="flex gap-2 wp-block-group footer-menu">

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

		<?php 
			if (carbon_get_theme_option('crb_footer_disclaimer')) :
		?>
			<div class="footer-disclaimer">

				<?php
					$footerDisclaimer = apply_filters( 'the_content', carbon_get_theme_option( 'crb_footer_disclaimer' ) );
					echo $footerDisclaimer;
				?>
			</div>
	
		<?php endif; ?>

		<?php 
			$finraURL = carbon_get_theme_option('crb_finra');
			if ($finraURL) :
		?>
			<p class="finra-link"><a href="<?php echo $finraURL; ?>">FINRA Broker Check</a></p>		
		<?php endif; ?>

		<p class="copyright"><?php legacyavenue_footer_copyright(); ?></p>
			
		<!-- Get the custom code info from the theme settings -->
		<?php 
			$customFooter = carbon_get_theme_option('crb_custom_html_footer'); 
			echo $customFooter;
		?>
	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
