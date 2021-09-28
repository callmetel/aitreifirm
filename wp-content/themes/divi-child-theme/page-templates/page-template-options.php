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
										<span class="main-title"><?php the_field('title'); ?></span>
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
									<div class="align-center options-description"><?php the_field('intro_paragraph'); ?></div>
									<div id="options-grid">
										<?php 
										if( have_rows('options_grid') ):
			    						while( have_rows('options_grid') ): the_row(); 

		    								$title = ucwords(get_sub_field('option_title'));
		    								$description = get_sub_field('option_description');
		    						?>
									  <div class="options-grid-item">
									    <div class="flip-card-inner">
									      <div class="flip-card flip-card-front">
									        <h3 class="title"><?php echo $title; ?></h3>
									      </div>
									      <div class="flip-card flip-card-back">
									      	<div class="text_flip_card">
									      		<?php echo $description; ?>
									      	</div>
									      </div>
									    </div>
									  </div>
									  <?php 
											endwhile;
										endif; ?>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>

				<!-- Call To Action -->
				<?php 
					if( have_rows('call_to_action') ):
						while( have_rows('call_to_action') ): the_row(); 
							$main_text = get_sub_field('main_text');
							$button_link = get_sub_field('button_link');
							$button_text = get_sub_field('button_text');

							if( $main_text && $button_link && $button_text ):
				?>
								<div id="call-to-action" class="call-to-action-sctn et_pb_section et_section_regular">
									<div class="call-to-action-rw stndrd-rw et_pb_row et_pb_equal_columns">
										<div class="call-to-action-col et_pb_column et_pb_column_4_4">
											<div class="call-to-action et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
												<div class="et_pb_text_inner">
													<p class="call-to-action-text small-container"><?php echo $main_text; ?></p>
													<a href="<?php echo $button_link; ?>" class="call-to-action-btn btn btn-darkblue align-center"><?php echo $button_text; ?></a>
												</div>
											</div>
										</div>
									</div>
								</div>
				<?php 
							endif;
						endwhile;
					endif; 
				?>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>