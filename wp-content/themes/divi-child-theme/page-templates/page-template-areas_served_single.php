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
					// Get Featured Image 

				    if ( has_post_thumbnail( $post->ID ) ) :
				        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				        $imageUrl = $imageInfo[0];
				    endif;
				  ?>

				<div id="banner" class="banner banner-internal et_pb_section sbpg-bnnr-sctn et_pb_with_background et_section_regular" style="background-image: url('<?php echo $imageUrl; ?>'); background-size: cover;">
					<div class="sbpg-bnnr-rw stndrd-rw et_pb_row">
						<div class="sbpg-bnnr-col et_pb_column et_pb_column_4_4">
							<div class="sbpg-bnnr et_pb_text et_pb_module et_pb_bg_layout_light">
								<div class="et_pb_text_inner">
									<h1 class="page-title">
										<span class="main-title"><?php the_title(); ?></span>
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

						<!-- Subpage Left Content -->
						<div class="sbpg-cntnt-col sbpg-cntnt-col-1 et_pb_column et_pb_column_2_3">
							<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<?php the_content(); ?>
								</div>
							</div>
						</div> <!-- .et_pb_column -->

						<!-- Subpage Right Sidebar -->
						<div class="sbpg-cntnt-col sbpg-cntnt-col-1 et_pb_column et_pb_column_1_3">
							<!-- Sidebar Divi Library Items -->
							<?php echo do_shortcode('[et_pb_section global_module="25232"][/et_pb_section]');?>
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

<?php get_footer(); ?>