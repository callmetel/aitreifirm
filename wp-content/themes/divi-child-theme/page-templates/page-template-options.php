<?php
/*
Template Name: Options Page
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( ! $is_page_builder_used ) : ?>

			
		<?php
			$thumb = '';

			$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

			$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
			$classtext = 'et_featured_image';
			$titletext = get_the_title();
			$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
			$thumb = $thumbnail["thumb"];

			if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
				print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
		?>

		<?php endif; ?>

			<div class="entry-content">

				<!-- Subpage Banner -->
				<div id="banner" class="banner banner-internal et_pb_section sbpg-bnnr-sctn et_section_regular">
					<div class="sbpg-bnnr-rw stndrd-rw et_pb_row">
						<div class="sbpg-bnnr-col et_pb_column et_pb_column_4_4">
							<div class="sbpg-bnnr et_pb_text et_pb_module et_pb_bg_layout_light">
								<div class="et_pb_text_inner">
									<h1 class="page-title">
										<span class="sub-title"><?php the_title(); ?></span>
										<span class="main-title">What We Offer</span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Subpage Content -->
				<div class="sbpg-cntnt-sctn et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw stndrd-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
							<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<p class="align-center options-description">We have multiple creative strategies & a referral system that fits every situation's shoe size. Whether you’d like to maintain ownership & take a break from your financial obligation to your asset using a Lease Option agreement or you're ready to cash it in & sell it to use Off Market. Together we will walk through a qualifying process to guide you to the right decision.</p>
									<div id="options-grid">
									  <div class="options-grid-item">
									    <div class="flip-card-inner">
									      <div class="flip-card flip-card-front">
									        <h3 class="title">Off Market</h3>
									      </div>
									      <div class="flip-card flip-card-back">
									      	<div class="text_flip_card">
									      		<p>Selling off market is ideal if you need to sell fast & your home needs a major repair or two that doesn’t fit into your budget. Whether it’s a home that you inherited or an Invest asset that has become a costly liability. We buy houses as is, rehab them to either hold & rent or sell to families looking to move in the neighborhood.</p>
									      		<p>Since we buy as is, there’s no need to clean, repair or stage, the only time you’ll have to show the house is with us for a general walk through.</p>
									      	</div>
									      </div>
									    </div>
									  </div>
									  <div class="options-grid-item">
									    <div class="flip-card-inner">
									      <div class="flip-card flip-card-front">
									        <h3 class="title">Lease Options</h3>
									      </div>
									      <div class="flip-card flip-card-back">
									        <div class="text_flip_card">
									      		<p>You may have obligations that call for more of your time & performing the task as a landlord is just too tedious. A property management company may not be the best fit & selling now isn’t what you want to do.</p>
									      		<p>Lease options still allows you to collect passive income with the option to sell in 3-5 years or in the agreed time frame. Continue building equity while not having to forfeit cash flow.</p>
									      	</div>
									      </div>
									    </div>
									  </div>
									  <div class="options-grid-item">
									    <div class="flip-card-inner">
									      <div class="flip-card flip-card-front">
									        <h3 class="title">Subject To</h3>
									      </div>
									      <div class="flip-card flip-card-back">
									      	<div class="text_flip_card">
									      		<p>Similar to a lease option, this option relieves homeowners that are still obligated to a mortgage. Just like a lease option, it’s all in the name. We’ll take over your pre-existing mortgage subject to it’s terms, let us know your desired exit strategy & we’ll structure an agreement that’s a mutual win.</p>
									      	</div>
									      </div>
									    </div>
									  </div>
									  <div class="options-grid-item">
									    <div class="flip-card-inner">
									      <div class="flip-card flip-card-front">
									        <h3 class="title">Buy Back Program</h3>
									      </div>
									      <div class="flip-card flip-card-back">
									        <div class="text_flip_card">
									      		<p>In order to save your credit score & regain financial stability, it may be in your best interest to sell your home that is not adding to your financial health. This is not mentally or emotionally easy departing with your home that is a good long term fit for your family. We’ll buy your home as is, rehab it while allowing you to catch your “financial second wind”.</p>
									      		<p>With an earnest money deposit & payments, after the agreed time frame, you’ll be able to purchase & move back into your old home that’s new & improved.</p>
									      	</div>
									      </div>
									    </div>
									  </div>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>

				<!-- Call To Action -->
				<div id="call-to-action" class="call-to-action-sctn et_pb_section et_section_regular">
					<div class="call-to-action-rw stndrd-rw et_pb_row et_pb_equal_columns">
						<div class="call-to-action-col et_pb_column et_pb_column_4_4">
							<div class="call-to-action et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<p class="call-to-action-text small-container">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
									<a href="#" class="call-to-action-btn btn btn-darkblue align-center">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>