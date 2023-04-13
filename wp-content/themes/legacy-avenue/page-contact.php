<?php
/**
 * Template Name: Contact template
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();

//Visible Page Title
$titleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_first_line') ? : '';
$titleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_second_line');

$companyHours       = carbon_get_theme_option('crb_operating_hours');
$companyPhone       = carbon_get_theme_option('crb_company_phone');
$companyAddress1    = carbon_get_theme_option('crb_address_address1');
$companyAddress2    = carbon_get_theme_option('crb_address_address2');
$companyCity        = carbon_get_theme_option('crb_address_city');
$companyState       = carbon_get_theme_option('crb_address_state');
$companyZipcode     = carbon_get_theme_option('crb_address_zipcode');

$timezone = getReadableTimezone(wp_timezone_string());


?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            // Start the loop.
            while ( have_posts() ) :
                the_post();

                // Include the page content template.
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-content">
                    <div class="contact-hero">
                        <div class="contact-hero-image-mobile mobile-only"><img class="alignnone size-full wp-image-261" src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_15-1-1.jpg" alt="" width="902" height="500" /></div>
                        <div class="contact-hero-text">
                            <div class="columns">
                                <div class="hero-column large-only">
                                    <div class="contact-hero-image-large"><img class="alignnone size-full wp-image-261" src="/wp-content/uploads/2022/12/mhollerLegacyAvenue2022_15-1-1.jpg" alt="" width="902" height="500" /></div>
									<div class="contact-content desktop-contact-content" style="padding-top: 60px;">
										<div id="location">
											<h2>Location</h2>
											<p><?php echo $companyAddress1; ?></p>
											<p><?php echo $companyAddress2; ?></p>
											<p><?php echo $companyCity . ', ' . $companyState . ' ' . $companyZipcode; ?></p>
										</div>

										<div id="phone">
											<h2>Phone</h2>
											<p><?php echo $companyPhone; ?></p>
										</div>

										<div id="hours">
											<h2>Hours</h2>
											<p><?php echo $companyHours . ' ' . $timezone; ?></p>
										</div>
									</div>
                                 </div>

                                <div class="hero-column" style="margin-bottom: 60px;">
                                    <div class="text">
										<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
                                        <?php the_content(); ?>
										<div class="contact-content mobile-contact-content mobile-only">
											<div id="location">
												<h2>Location</h2>
												<p><?php echo $companyAddress1; ?></p>
												<p><?php echo $companyAddress2; ?></p>
												<p><?php echo $companyCity . ', ' . $companyState . ' ' . $companyZipcode; ?></p>
											</div>

											<div id="phone">
												<h2>Phone</h2>
												<p><?php echo $companyPhone; ?></p>
											</div>

											<div id="hours">
												<h2>Hours</h2>
												<p><?php echo $companyHours . ' ' . $timezone; ?></p>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- .entry-content -->

            </article><!-- #post-<?php the_ID(); ?> -->
            <?php endwhile; ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>
