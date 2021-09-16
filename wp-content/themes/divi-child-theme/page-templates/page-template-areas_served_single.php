<?php
/*
Template Name: Areas Served City Page
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
				<?php 
					// Banner Image 
					$imageUrl = '/wp-content/uploads/sanfran-city-cropped.jpg';
			  ?>
				<style>
					@media only screen and (min-width: 981px) {
						.banner-internal-img {
							background-image: url('<?php echo $imageUrl; ?>');
						}
					}
				</style>

				<div id="banner" class="banner banner-internal banner-internal-img et_pb_section sbpg-bnnr-sctn et_pb_with_background et_section_regular">
					<div class="sbpg-bnnr-rw stndrd-rw et_pb_row">
						<div class="sbpg-bnnr-col et_pb_column et_pb_column_1_2">
							<div class="sbpg-bnnr et_pb_text et_pb_module et_pb_bg_layout_light">
								<div class="et_pb_text_inner">
									<h1 class="page-title">
										<span class="main-title"><?php the_title(); ?></span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
						<div class="sbpg-bnnr-col et_pb_column et_pb_column_1_2 et_pb_column_empty"></div>
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Subpage Content -->
				<div class="sbpg-cntnt-sctn et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw stndrd-rw et_pb_row et_pb_equal_columns et_pb_gutters1">

						<!-- Subpage Left Content -->
						<div class="sbpg-cntnt-col sbpg-cntnt-col-1 et_pb_column et_pb_column_1_2">
							<div class="sbpg-cntnt et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<h2 class="sbpg-cntnt-ttl">Lorem Ipsum</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque </p>
								</div>
							</div>
						</div> <!-- .et_pb_column -->

						<!-- Subpage Right Content -->
						<div class="sbpg-cntnt-col sbpg-cntnt-col-2 et_pb_column et_pb_column_1_2">
							<div class="sbpg-form et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<h5 class="form-title">Get Started Today</h5>
									<p class="form-indicator">*Required Fields</p>
									<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="1"]'); ?>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>

				<!-- Comparison Section -->
				<?php get_template_part( 'partials/global', 'comparison_chart' ); ?>

				<!-- Our Process Section -->
				<?php get_template_part( 'partials/global', 'process' ); ?>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>