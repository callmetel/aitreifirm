<?php
/*
Template Name: Areas Served Page
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
										<span class="main-title">Where We Are</span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Subpage Content -->
				<div id="areas-served" class="areas-served-sctn et_pb_section sbpg-bnnr-sctn et_section_regular">
					<div class="sm-rw et_pb_row">
						<div class="areas-served-col et_pb_column et_pb_column_4_4">
							<div class="areas-served-wrapper">
								<div class="area area-sanfran">
									<div class="city-image area-content"><img src="<?php echo site_url('/wp-content/uploads/city-sanfran.jpg');?>" alt=""></div>
									<div class="city-info area-content">
										<h4 class="city-name">San Francisco Bay&nbsp;Area</h4>
										<p class="city-blurb">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
										<a href="/areas-served/san-francisco/" class="btn btn-sm city-link">Learn More</a>
									</div>
								</div>
								<div class="area area-houston">
									<div class="city-image area-content"><img src="<?php echo site_url('/wp-content/uploads/city-houston.jpg');?>" alt=""></div>
									<div class="city-info area-content">
										<h4 class="city-name">Greater Houston</h4>
										<p class="city-blurb">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
										<a href="/areas-served/houston/" class="btn btn-sm city-link">Learn More</a>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
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