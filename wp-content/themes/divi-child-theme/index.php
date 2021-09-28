<?php get_header('alt_leadform'); ?>

<div id="main-content">
	<!-- Subpage Content -->
	<div id="blog-posts" class="sbpg-cntnt-sctn et_pb_section et_section_regular">
		<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
			<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							$post_format = et_pb_post_format(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
								<?php
									$thumb = '';

									$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );

									$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
									$classtext = 'et_pb_post_main_image';
									$titletext = get_the_title();
									$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
									$thumb = $thumbnail["thumb"];

									et_divi_post_format_content();

									if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) {
										if ( 'video' === $post_format && false !== ( $first_video = et_get_first_video() ) ) :
											printf(
												'<div class="et_main_video_container">
													%1$s
												</div>',
												$first_video
											);
										elseif ( ! in_array( $post_format, array( 'gallery' ) ) && 'on' === et_get_option( 'divi_thumbnails_index', 'on' ) && '' !== $thumb ) : ?>
											<a href="<?php the_permalink(); ?>">
												<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
											</a>
									<?php
										elseif ( 'gallery' === $post_format ) :
											et_pb_gallery_images();
										endif;
									} ?>

								<?php if ( ! in_array( $post_format, array( 'link', 'audio', 'quote' ) ) ) : ?>
									<?php if ( ! in_array( $post_format, array( 'link', 'audio' ) ) ) : ?>
										<h2 class="entry-title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<?php endif; ?>

									<div class="blog-content">
										<?php et_divi_post_meta(); ?>

										<p class="excerpt"><?php
											if ( 'on' !== et_get_option( 'divi_blog_style', 'false' ) || ( is_search() && ( 'on' === get_post_meta( get_the_ID(), '_et_pb_use_builder', true ) ) ) ) {
												truncate_post( 270 );
											} else {
												the_content();
											}
										?></p>
									</div>
								<?php endif; ?>
							</article> <!-- .et_pb_post -->
					<?php
							endwhile;

							if ( function_exists( 'wp_pagenavi' ) )
								wp_pagenavi();
							else
								get_template_part( 'includes/navigation', 'index' );
						else :
							get_template_part( 'includes/no-results', 'index' );
						endif;
					?>
			</div>
		</div>
	</div>
</div> <!-- #main-content -->

<?php get_footer(); ?>