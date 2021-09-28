<?php
/*
Template Name: Home Page
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
				<?php if( have_rows('banner') ): ?>
    		<?php while( have_rows('banner') ): the_row(); ?>
					<?php 
						// Banner Image 
						$imageUrl = site_url('/wp-content/uploads/home-bg.jpg');
				  ?>
					<style>
						@media only screen and (min-width: 981px) {
							.banner-home-img {
								background-image: url('<?php echo $imageUrl; ?>');
							}
						}
					</style>
					<div id="banner" class="banner banner-home banner-home-img et_pb_section hmpg-bnnr-sctn et_pb_with_background et_section_regular">
						<div class="hmpg-bnnr-rw stndrd-rw et_pb_row">
							<div class="hmpg-bnnr-col et_pb_column et_pb_column_1_2">
								<div class="hmpg-bnnr et_pb_text et_pb_module et_pb_bg_layout_light">
									<div class="et_pb_text_inner">
										<h1 class="page-title">
											<span class="main-title"><?php the_sub_field('title'); ?></span>
										</h1>	
										<p class="sub-title"><?php the_sub_field('subtitle'); ?></p>
										<a href="<?php the_sub_field('button_link'); ?>" class="btn"><?php the_sub_field('button_text'); ?></a>
									</div>
								</div> <!-- .et_pb_text -->
							</div> <!-- .et_pb_column -->
							<div class="sbpg-bnnr-col et_pb_column et_pb_column_1_2 et_pb_column_empty"></div>
						</div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
				<!-- End Subpage Banner -->
				<!-- Partners Logos Section -->
				<?php get_template_part( 'partials/global', 'partner_logos' ); ?>

				<!-- About Us Section -->
				<?php if( have_rows('about') ): ?>
    		<?php while( have_rows('about') ): the_row(); ?>
					<div id="about-us" class="sbpg-cntnt-sctn et_pb_section et_section_regular">
					  <div class="sm-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
					    <div class="image-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough">
					    	<style type="text/css">
					    		@media only screen and (min-width: 981px) {
						    		#about-us .image-col .image {
						    			background-image: url("<?php the_sub_field('image'); ?>");
						    		}
						    	}
					    	</style>
					      <div class="image"></div>
					    </div>
					    <div class="text-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough et-last-child">
					      <div class="text et_pb_text et_pb_module">
					        <div class="et_pb_text_inner">
					          <h3><?php the_sub_field('section_title'); ?></h3>
					          <?php the_sub_field('content'); ?>
					        </div>
					      </div>
					    </div>
					  </div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<!-- Our Process Section -->
				<?php get_template_part( 'partials/global', 'process' ); ?>

				<!-- Comparison Section -->
				<?php get_template_part( 'partials/global', 'comparison_chart' ); ?>
			</div> <!-- .entry-content -->

		<?php
			// if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
		?>

		</article> <!-- .et_pb_post -->

	<?php endwhile; ?>

</div> <!-- #main-content -->

<?php get_footer(); ?>