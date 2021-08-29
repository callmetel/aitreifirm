<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>

				<?php
					$et_pb_has_comments_module = has_shortcode( get_the_content(), 'et_pb_comments' );
					$additional_class = $et_pb_has_comments_module ? ' et_pb_no_comments_section' : '';
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' . $additional_class ); ?>>

				<div class="entry-content">

					<!-- Subpage Banner -->
					<?php 
						// Get Featured Image 

					    if ( has_post_thumbnail( $post->ID ) ) :
					        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					        $imageUrl = $imageInfo[0];
					    else:
					        $imageUrl = '/wp-content/uploads/banner-about.jpg';
					    endif;
					  ?>

					<div class="et_pb_section sbpg-bnnr-sctn et_section_regular" style="background-image: url('<?php echo $imageUrl; ?>'); background-size: cover;">
						<div class="sbpg-bnnr-rw et_pb_row">
							<div class="et_pb_column et_pb_column_4_4">
								<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_center sbpg-bnnr-title">
									<div class="et_pb_text_inner">
										<h1><?php the_title(); ?></h1>	
									</div>
								</div> <!-- .et_pb_text -->
							</div> <!-- .et_pb_column -->
						</div>
					</div> 
					<!-- End Subpage Banner -->

					<!-- Subpage Content -->
					<div class="et_pb_section sbpg-cntnt-sctn et_section_regular">
						<div class="sbpg-cntnt-rw et_pb_row et_pb_equal_columns">

							<!-- Subpage Left Content -->
							<div class="et_pb_column et_pb_column_2_3 sbpg-cntnt">
								<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
									<div class="et_pb_text_inner">
										<?php
											do_action( 'et_before_content' );

											the_content();

											wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
										?>
										<div class="et_post_meta_wrapper">
											<?php
											if ( et_get_option('divi_468_enable') == 'on' ){
												echo '<div class="et-single-post-ad">';
												if ( et_get_option('divi_468_adsense') <> '' ) echo( et_get_option('divi_468_adsense') );
												else { ?>
													<a href="<?php echo esc_url(et_get_option('divi_468_url')); ?>"><img src="<?php echo esc_attr(et_get_option('divi_468_image')); ?>" alt="468" class="foursixeight" /></a>
											<?php 	}
													echo '</div> <!-- .et-single-post-ad -->';
												}
											?>

											<?php if (et_get_option('divi_integration_single_bottom') <> '' && et_get_option('divi_integrate_singlebottom_enable') == 'on') echo(et_get_option('divi_integration_single_bottom')); ?>

											<?php
												if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) && ! $et_pb_has_comments_module ) {
													comments_template( '', true );
												}
											?>
										</div> <!-- .et_post_meta_wrapper -->
									</div>
								</div>
							</div> <!-- .et_pb_column -->

							<!-- Subpage Right Sidebar -->
							<div class="et_pb_column et_pb_column_1_3 sbpg-sdbr">
								<!-- Sidebar Divi Library Items -->
								<?php echo do_shortcode('[et_pb_section global_module="25232"][/et_pb_section]');?>
							</div> <!-- .et_pb_column -->
						</div> <!-- .et_pb_row -->
					</div>
				</div> <!-- .entry-content -->
				</article> <!-- .et_pb_post -->

			<?php endwhile; ?>
</div> <!-- #main-content -->

<?php get_footer(); ?>