<?php
/*
Template Name: About Us Page
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
					// Get Featured Image 

				    if ( has_post_thumbnail( $post->ID ) ) :
				        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				        $imageUrl = $imageInfo[0];
				    endif;
				  ?>

				<div id="banner" class="banner banner-internal et_pb_section sbpg-bnnr-sctn et_section_regular">
					<div class="sbpg-bnnr-rw stndrd-rw et_pb_row">
						<div class="sbpg-bnnr-col et_pb_column et_pb_column_4_4">
							<div class="sbpg-bnnr et_pb_text et_pb_module et_pb_bg_layout_light">
								<div class="et_pb_text_inner">
									<h1 class="page-title">
										<span class="sub-title"><?php the_title(); ?></span>
										<span class="main-title">Who We Are</span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Subpage Content -->
				<div id="our-story" class="sbpg-cntnt-sctn blue-bg et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_1_2">
							<div class="content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<div class="blurb">
										<span class="founded">Founded in San Francisco, CA</span>
										<h4>AIT Real Estate Investment Firm provides the opportunity to&nbsp;win.</h4>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_1_2">
							<div class="content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<div class="paragraph">
										<h5 class="sm-ttl">Our Story</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo</p>
									</div>
								</div>
							</div>
						</div>
					</div> <!-- .et_pb_row -->
				</div>
				<div id="who-we-are" class="sbpg-cntnt-sctn blue-bg et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
							<div class="video-content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<div class="video-title">
										<h4 class="h2">Who <br>Are <br>These <br>Guys?</h4>
									</div>
									<a href="#" data-embed-id="cnB8Ryfz0wM" class="lightbox-trigger video-trigger">
										<span class="overlay"></span>
										<img src="<?php echo site_url('/wp-content/uploads/who_we_are_video.jpg'); ?>" alt="" class="video-placeholder">
									</a>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->
<?php get_template_part('partials/global','lightbox'); ?>
<?php get_footer(); ?>