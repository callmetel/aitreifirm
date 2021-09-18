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
										<span class="main-title">Why We Do It</span>
									</h1>	
								</div>
							</div> <!-- .et_pb_text -->
						</div> <!-- .et_pb_column -->
					</div>
				</div> 
				<!-- End Subpage Banner -->

				<!-- Subpage Content -->
				<div id="impact" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
							<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner small-container">
									<h2 class="h3 section-title">Impact</h2>
									<p>There’s more to us acquiring properties that could be in better shape & rehabbing them for a profit. Our line of work has mutual benefits. The communities get revitalized, enhanced & more curb appeal. People are relieved of financial burdens or worse losing everything.</p>
									<p>From saving credit scores, creating opportunities for families to begin the wealth building process & delivering adequate housing. From our lean team to associates, we’re committed to combating climate change, clients have the option to sign paper agreements but AIT’s preferred method of documentation, agreements & contracts are virtual, via DocuSign, When it comes to rehabs, we exercise energy efficient appliances & materials. Our true profit is environmental, community & social impact.</p>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>
				<div id="partners" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
							<div class="image-title et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<img class="partners-image" src="/wp-content/uploads/PreciousDreamsFoundationCollage-compressed.png" alt="Precious Dreams Foundation" />
									<h2 class="h3 section-title">Partners</h2>
								</div>
							</div>
							<div class="content et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_center">
								<div class="et_pb_text_inner">
									<div class="blurb">
										<h4>We are proudly partnered with the Precious Dreams Foundation.</h4>
									</div>
									<div class="paragraph">
										<p>Precious Dreams Foundation supports the wellbeing of children in foster care and homeless shelters by using bedtime comfort tools and positive reinforcement to empower children to self-comfort and focus on their dreams.  Precious Dreams is organized exclusively to provide bedtime comfort items and teach children in foster care and homeless shelters healthy coping mechanisms and paths to fostering their dreams.  Youth in foster care and youth experiencing homelessness are deserving of support that promotes non-destructive self-sufficiency in the present and future. Since 2012, the Precious Dreams Foundation has proven that healthy coping mechanisms lead to better outcomes. Thousands of youth have found solace in their unique programming that teaches the skills needed to self-comfort for a lifetime.</p>
									</div>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
					</div> <!-- .et_pb_row -->
				</div>
				<div id="green-initiative" class="sbpg-cntnt-sctn et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_2_5">
							<div class="et_pb_text et_pb_module et_pb_bg_layout_light et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<h3 class="h3">Green<br>Initiative</h3>
									<br>
									<p>From opting for paperless documents to refrain from plastic & energy efficient appliances, AIT and our contractors are committed to rehabbing homes that will decline a family's carbon footprint. We believe one time used biodegradable materials, water & electric conserving is one of many ways to combat the climate crisis that is threatening our planet's health and our global population's quality of life.</p>
								</div>
							</div>
						</div> <!-- .et_pb_column -->
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_3_5 et_pb_column_empty"></div>
					</div> <!-- .et_pb_row -->
				</div>
				<div id="hoyya-pledge" class="sbpg-cntnt-sctn tan-bg et_pb_section et_section_regular">
					<div class="sbpg-cntnt-rw sm-rw et_pb_row et_pb_equal_columns">
						<div class="sbpg-cntnt-col et_pb_column et_pb_column_4_4">
							<div class="et_pb_text et_pb_module et_pb_bg_layout_dark et_pb_text_align_left">
								<div class="et_pb_text_inner">
									<h2 class="h3">H.O.Y.Y.A Pledge</h2>
									<br>
									<p>The city of San Francisco spent $363,000,000+ on services for homelessness in 2020. HUD estimates there are north of 8,000 homeless people within the city alone. Other sources estimate more than double, according to the definition used.</p>
									<p>Over in the East Bay, Children & their Families represent more than 40% of Alameda County’s homeless population, with Kids alone shaping above 25% of a homeless population well above 7,900.</p>
									<p>Our H.O.Y.Y.A Pledge means we’re committed to donating 3% of our proceeds to Organizations like Precious Dreams Foundation. This amount is included in our operating expense so it will not be reimbursed in tax write offs to ensure the intended amount gets to those in need.</p>
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

<?php get_footer(); ?>