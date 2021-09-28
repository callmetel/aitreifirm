<?php
/*
Template Name: About Us Page
*/

get_header('alt_leadform');

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
										<span class="main-title"><?php the_field('title'); ?></span>
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
										<span class="founded">Founded in <?php the_field('founded_in'); ?></span>
										<h4><?php the_field('founded_pull_quote'); ?></h4>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_1_2">
							<div class="content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<div class="paragraph">
										<h5 class="sm-ttl">Our Story</h5>
										<?php the_field('our_story_content'); ?>
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
									<a href="#" data-embed-id="<?php the_field('youtube_video_id'); ?>" class="lightbox-trigger video-trigger">
										<span class="overlay"></span>
										<img src="<?php the_field('video_placeholder'); ?>" alt="" class="video-placeholder">
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