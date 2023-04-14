<?php
/**
 * Template Name: Your Journey template
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

//Hero Section
$heroImage 		  = carbon_get_post_meta( get_the_ID(), 'crb_hero_image');
$heroBody 	 	  = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_hero_body' ) );
$heroButtonText	  = carbon_get_post_meta( get_the_ID(), 'crb_hero_button_text');
$heroButtonLink	  = carbon_get_post_meta( get_the_ID(), 'crb_hero_button_link');
$heroButtonDisplay = ($heroButtonText && $heroButtonLink != '') ? true : false;

//Timeline Items
$timelineArray      = carbon_get_post_meta( get_the_ID(), 'crb_timeline_item');
$timelineDisclaimer = carbon_get_post_meta( get_the_ID(), 'crb_timeline_disclaimer');

//CTA
$timelineCTABody   	   = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_body');
$timelineCTAButtonText = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_button_text');
$timelineCTALink       = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_link');
$displayCTA 	       = ($timelineCTABody && $timelineCTAButtonText && $timelineCTALink != '') ? true : false;

//Recommended Specialists
$specialistsTitleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_specialists_first_line') ? : '';
$specialistsTitleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_specialists_second_line');
$specialistsBody			 = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_specialists_body' ) );
$specialistsArray 			 = carbon_get_post_meta( get_the_ID(), 'crb_specialists');

//Second Image Heading
$secondImageHeadingTitleFirstLine   = carbon_get_post_meta( get_the_ID(), 'crb_second_heading_first_line') ? : '';
$secondImageHeadingTitleSecondLine  = carbon_get_post_meta( get_the_ID(), 'crb_second_heading_second_line');
$secondImageHeadingImage 		    = carbon_get_post_meta( get_the_ID(), 'crb_second_heading_hero_image');
$secondImageHeadingBody 	 	    = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_second_heading_body' ) );

//Quote
$quoteText    = carbon_get_post_meta( get_the_ID(), 'crb_quote_text');
$quoteAuthor  = carbon_get_post_meta( get_the_ID(), 'crb_quote_author');
$quoteDisplay = ($quoteText && $quoteAuthor != '') ? true : false;

//Offerings Grid
$offerArray = carbon_get_post_meta( get_the_ID(), 'crb_offer_grid');

//Bottom CTA
$bottomCTABody    = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_body');
$bottomCTAButtonText  = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_button_text');
$bottomCTALink    = carbon_get_post_meta( get_the_ID(), 'crb_bottom_cta_link');
$displayBottomCTA = ($bottomCTABody && $bottomCTAButtonText && $bottomCTALink != '') ? true : false;

?>
	<div id="primary" class="content-area">
		<main id="main" class="page-your-journey">
			<?php
				// Start the loop.
				while ( have_posts() ) :
					the_post();
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<div class="journey-hero">
							<div class="journey-hero-image-mobile mobile-only"><img src="<?php echo $heroImage; ?>" alt="" width="740" height="500" /></div>
							<div class="journey-hero-text">
								<div class="columns">
									<div class="hero-column large-only">
										<div class="journey-hero-image-large"><img src="<?php echo $heroImage; ?>" alt="" width="740" height="500" /></div>
									</div>
									<div class="hero-column">
										<h1><?php echo $titleFirstLine; ?><br><?php echo $titleSecondLine; ?></h1>
										<?php echo $heroBody; ?>
									</div>
								</div>
							</div>
						</div>
						<?php if(!empty($timelineArray)) {?>
							<div class="timeline" id="process-timeline">
								<ol>
									<?php foreach ($timelineArray as $item) {
										$number = $item['crb_timeline_item_numeral'];
										$title = $item['crb_timeline_item_title'];
										$body = $item['crb_timeline_item_body'];
										?>
										<li>
											<div class="item-content">
												<h2><?php echo $number; ?></h2>
												<h3><?php echo $title; ?></h3>
												<?php echo $body; ?>
											</div>
										</li>
									<?php }; ?>
								</ol>
								<div class="disclaimer-text">
									<p><?php echo $timelineDisclaimer; ?></p>
								</div>
							</div>
						<?php }; ?>
						<div class="journey-cta journey-cta-lines">
							<p><?php echo $timelineCTABody; ?></p>
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $timelineCTALink; ?>"><?php echo $timelineCTAButtonText; ?></a></div>
						</div>
						<?php if(!empty($specialistsArray)) {?>
							<div class="specialists">
								<div class="text">
									<h2><?php echo $specialistsTitleFirstLine; ?><br><?php echo $specialistsTitleSecondLine; ?></h2>
									<?php echo $specialistsBody; ?>
								</div>
								<div class="affiliate-info">
									<?php foreach ($specialistsArray as $item) {
										$image = $item['crb_affiliate_image'];
										$body = $item['crb_affiliate_body'];
										$buttonText = $item['crb_affiliate_button_text'];
										$buttonLink = $item['crb_affiliate_button_link'];
									?>
										<div class="affiliate">
											<img src="<?php echo $image; ?>" alt="">
											<p><?php echo $body; ?></p>
											<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $buttonLink; ?>"><?php echo $buttonText; ?></a></div>
										</div>
									<?php }; ?>
								</div>
							</div>
						<?php }; ?>
						
						<div class="product-header-wrapper">
							<div class="image"><img src="<?php echo $secondImageHeadingImage; ?>" alt="" width="740" height="500" /></div>
							<div class="product-header">
								<div class="text">
									<h2><?php echo $secondImageHeadingTitleFirstLine; ?><br><?php echo $secondImageHeadingTitleSecondLine; ?></h2>
									<?php echo $secondImageHeadingBody; ?>
								</div>
							</div>
						</div>
						<?php if($quoteText && $quoteAuthor != "") {?>
							<div class="journey-quote">
								<div class="quote">
									<p><?php echo $quoteText; ?></p>
								</div>
								<div class="author">
									<p><?php echo $quoteAuthor; ?></p>
								</div>
							</div>
						<?php }; ?>
						<?php if(!empty($offerArray)) {?>
							<section id="offerings" class="product-gallery grid md-cols-2 lg-cols-3 gap-4">
								<?php foreach ($offerArray as $item) {
									$image = $item['crb_og_image'];
									$title = $item['crb_og_first_line'];
									$subtitle = $item['crb_og_second_line'];
									$body = $item['crb_og_body'];
									$buttonText = $item['crb_og_button_text'];
									$buttonLink = $item['crb_og_link'];
								?>
								<div class="product">
									<?php if ($image != "") { ?>
										<div class="image"><img src="<?php echo $image; ?>" alt="" /></div>
									<?php };?>
									<div class="title">
										<h2><?php echo $title; ?><span class="product-subtitle"><?php echo $subtitle; ?></span></h2> </div>
									<div class="text">
										<p><?php echo $body; ?></p>
									</div>
									<?php if ($buttonText && $buttonLink != "") { ?>
										<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $buttonLink; ?>"><?php echo $buttonText; ?></a></div>
									<?php };?>
								</div>
								<?php }; ?>
							</section>
						<?php }; ?>
						<div class="journey-cta"> 
							<p><?php echo $bottomCTABody; ?></p>
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $bottomCTALink; ?>"><?php echo $bottomCTAButtonText; ?></a></div>
						</div>
						
						<?php //the_content(); ?>
					</div>
					<!-- .entry-content -->
				</article>
				<?php endwhile; ?>
		</main>
		<!-- .site-main -->
	</div>
	<!-- .content-area -->
	<?php get_footer(); ?>