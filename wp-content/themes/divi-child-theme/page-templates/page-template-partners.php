<?php
/*
Template Name: Partners Page
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
										<span class="main-title"><?php the_field('title'); ?></span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Impact Section -->
				<?php if( have_rows('impact') ): ?>
    		<?php while( have_rows('impact') ): the_row(); ?>
					<div id="impact" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
						<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
							<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
								<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
									<div class="et_pb_text_inner small-container">
										<h2 class="h3 section-title"><?php the_sub_field('section_title'); ?></h2>
										<div class="content"><?php the_sub_field('section_paragraphs'); ?></div>
									</div>
								</div>
							</div> <!-- .et_pb_column -->
						</div> <!-- .et_pb_row -->
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<!-- Partners Section -->
				<?php if( have_rows('partners') ): ?>
    		<?php while( have_rows('partners') ): the_row(); ?>
					<div id="partners" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
						<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
							<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
								<div class="image-title et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
									<div class="et_pb_text_inner">
										<img class="partners-image" src="<?php echo site_url('/wp-content/uploads/PreciousDreamsFoundationCollage-compressed.png');?>" alt="Precious Dreams Foundation" />
										<h2 class="h3 section-title"><?php the_sub_field('section_title'); ?></h2>
									</div>
								</div>
								<div class="content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
									<div class="et_pb_text_inner">
										<div class="blurb">
											<h4><?php the_sub_field('pull_quote'); ?></h4>
										</div>
										<div class="paragraph">
											<?php the_sub_field('section_paragraphs'); ?>
										</div>
									</div>
								</div>
							</div> <!-- .et_pb_column -->
						</div> <!-- .et_pb_row -->
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<!-- Green Initiative Section -->
				<?php if( have_rows('green_initiative') ): ?>
    		<?php while( have_rows('green_initiative') ): the_row(); ?>
					<div id="green-initiative" class="sbpg-cntnt-sctn et_pb_section et_section_regular">
						<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
							<div class="sbpg-cntnt-col et_pb_column et_pb_column_2_5">
								<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
									<div class="et_pb_text_inner">
										<h3 class="h3"><?php the_sub_field('section_title'); ?></h3>
										<div class="content">
											<?php the_sub_field('section_paragraphs'); ?>
										</div>
									</div>
								</div>
							</div> <!-- .et_pb_column -->
							<div class="sbpg-cntnt-col et_pb_column et_pb_column_3_5 et_pb_column_empty"></div>
						</div> <!-- .et_pb_row -->
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<!-- HOYYA Pledge Section -->
				<?php if( have_rows('hoyya_pledge') ): ?>
    		<?php while( have_rows('hoyya_pledge') ): the_row(); ?>
					<div id="hoyya-pledge" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
						<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
							<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
								<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_left">
									<div class="et_pb_text_inner">
										<h2 class="h3"><?php the_sub_field('section_title'); ?></h2>
										<div class="content">
											<?php the_sub_field('section_paragraphs'); ?>
										</div>
									</div>
								</div>
							</div> <!-- .et_pb_column -->
						</div> <!-- .et_pb_row -->
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>