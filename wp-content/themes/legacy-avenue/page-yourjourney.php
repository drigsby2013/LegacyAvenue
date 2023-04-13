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
$timelineItemNumeral1  = carbon_get_post_meta( get_the_ID(), 'crb_timeline_item_numeral_1');
$timelineItemTitle1    = carbon_get_post_meta( get_the_ID(), 'crb_timeline_item_title_1');
$timelineItemBody1     = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_timeline_item_body_1' ) );
//...
$timelineDisclaimer = carbon_get_post_meta( get_the_ID(), 'crb_timeline_disclaimer');

//CTA
$timelineCTABody   = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_body');
$timelineCTAButtonText = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_button_text');
$timelineCTALink   = carbon_get_post_meta( get_the_ID(), 'crb_timeline_cta_link');
$displayCTA 	   = ($timelineCTABody && $timelineCTAButtonText && $timelineCTALink != '') ? true : false;

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
$offerGridTitleFirstLine1   = carbon_get_post_meta( get_the_ID(), 'crb_og_1_first_line') ? : '';
$offerGridTitleSecondLine1  = carbon_get_post_meta( get_the_ID(), 'crb_og_1_second_line');
$offerGridImage1 		    = carbon_get_post_meta( get_the_ID(), 'crb_og_1_image');
$displayOfferGridImage1 = ($offerGridImage1 != '') ? true : false;
$offerGridBody1 	 	    = apply_filters( 'the_content', carbon_get_the_post_meta( 'crb_og_1_body' ) );
$offerGridButtonText1 = carbon_get_post_meta( get_the_ID(), 'crb_og_1_button_text');
$offerGridLink1   = carbon_get_post_meta( get_the_ID(), 'crb_og_1_link');
$displayGridButton1   = ($offerGridButtonText1 && $offerGridLink1 != '') ? true : false;
//...

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
						<div class="timeline" id="process-timeline">
							<ol>
								<li>
									<div class="item-content">
										<h2><?php echo $timelineItemNumeral1; ?></h2>
										<h3><?php echo $timelineItemTitle1; ?></h3>
										<?php echo $timelineItemBody1; ?>
									</div>
								</li>
								<li>
									<div class="item-content">
										<h2>02</h2>
										<h3>Collection</h3>
										<p>Goals. Objectives. Facts. Data. Here we collect everything you’ve shared into one cohesive view, ready to be analyzed and evaluated.</p>
									</div>
								</li>
								<li>
									<div class="item-content">
										<h2>03</h2>
										<h3>Evaluation</h3>
										<p>Here’s where the magic happens. Once we have a complete 360 view of your story, we assess and develop a comprehensive, holistic plan that works toward your goals and objectives.</p>
									</div>
								</li>
								<li>
									<div class="item-content">
										<h2>04</h2>
										<h3>Discussion</h3>
										<p>Time for us to meet again! Here we review what we reviewed (we promise it’s not that confusing) and present our initial plan and strategies for accomplishing your goals.</p>
									</div>
								</li>
								<li>
									<div class="item-content">
										<h2>05</h2>
										<h3>Follow Through</h3>
										<p>Once we’re agreed on a plan, we’ll put it into play, but not without your help. While most firms offer options, they fall short in holding clients accountable. That’s where we differ. We’re partners now.</p>
									</div>
								</li>
								<li>
									<div class="item-content">
										<h2>06</h2>
										<h3>Onward</h3>
										<p>Being partners, we’ll continue to monitor your plan, make periodic updates and actively review everything that is happening with your assets, providing you with quarterly updates.</p>
									</div>
								</li>
							</ol>
							<div class="disclaimer-text">
								<p><?php echo $timelineDisclaimer; ?></p>
							</div>
						</div>
						<div class="journey-cta journey-cta-lines">
							<p><?php echo $timelineCTABody; ?></p>
							<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $timelineCTALink; ?>"><?php echo $timelineCTAButtonText; ?></a></div>
						</div>
						<div class="product-header-wrapper">
							<div class="image"><img src="<?php echo $secondImageHeadingImage; ?>" alt="" width="740" height="500" /></div>
							<div class="product-header">
								<div class="text">
									<h2><?php echo $secondImageHeadingTitleFirstLine; ?><br><?php echo $secondImageHeadingTitleSecondLine; ?></h2>
									<?php echo $secondImageHeadingBody; ?>
								</div>
							</div>
						</div>
						<div class="journey-quote">
							<div class="quote">
								<p><?php echo $quoteText; ?></p>
							</div>
							<div class="author">
								<p><?php echo $quoteAuthor; ?></p>
							</div>
						</div>
						<section id="offerings" class="product-gallery grid md-cols-2 lg-cols-3 gap-4">
							<div class="product">
							<?php if ($displayOfferGridImage1 != false) { ?>
								<div class="image"><img src="<?php echo $offerGridImage1; ?>" alt="" /></div>
							<?php }; ?>
								<div class="title">
									<h2><?php echo $offerGridTitleFirstLine1; ?><span class="product-subtitle"><?php echo $offerGridTitleSecondLine1; ?></span></h2> </div>
								<div class="text">
									<?php echo $offerGridBody1; ?>
								</div>
							<?php if ($displayGridButton1 != false) { ?>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo $offerGridLink1; ?>"><?php echo $offerGridButtonText1; ?></a></div>
							<?php }; ?>
							</div>
							<div class="product">
								<div class="image"><img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Briefcase.png" alt="" /></div>
								<div class="title">
									<h2>Business<span class="product-subtitle">PLANNING</span></h2> </div>
								<div class="text">
									<p>You’ve built a great business. Now what? We’ll help you prepare for longevity with creative solutions and thoughtful planning.</p>
								</div>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a></div>
							</div>
							<div class="product">
								<div class="image"><img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Time.png" alt="" /></div>
								<div class="title">
									<h2>Retirement<span class="product-subtitle">PLANNING</span></h2> </div>
								<div class="text">
									<p>Based on your lifestyle, we’ll help you determine how much you need to retire and how to sustain that lifestyle through custom planning.</p>
								</div>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a></div>
							</div>
							<div class="product">
								<div class="image"><img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Hand.png" alt="" /></div>
								<div class="title">
									<h2>Insurance<span class="product-subtitle">SOLUTIONS</span></h2> </div>
								<div class="text">
									<p>We’ll help you protect what matters most with inventive life insurance, disability insurance and long-term care solutions designed to fit your needs.</p>
								</div>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a></div>
							</div>
							<div class="product">
								<div class="image"><img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Graph.png" alt="" /></div>
								<div class="title">
									<h2>Investment<span class="product-subtitle">STRATEGIES</span></h2> </div>
								<div class="text">
									<p>A journey can take many paths. We’ll help manage your portfolio with your goals and risk tolerance in mind to navigate the road ahead.</p>
								</div>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a></div>
							</div>
							<div class="product">
								<div class="image"><img class="alignnone size-full wp-image-116" src="/wp-content/uploads/2022/12/Growth.png" alt="" /></div>
								<div class="title">
									<h2>Wealth<span class="product-subtitle">MANAGEMENT</span></h2> </div>
								<div class="text">
									<p>Leave the legacy you want. We’ll help you manage your assets and prepare your financial future for the greatest impact long-term.</p>
								</div>
								<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/contact-us">Learn More</a></div>
							</div>
						</section>
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