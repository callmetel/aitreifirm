<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
			<div id="pre-footer">
				<?php
					get_template_part( 'partials/prefooter', 'lead_form' );
					if ( 
						!is_page_template( 'page-templates/page-template-about.php' )
					):
						get_template_part( 'partials/prefooter', 'testimonials' );
					endif;

					if ( 
						is_page_template( 'page-templates/page-template-home.php' ) ||
						is_page_template( 'page-templates/page-template-about.php' ) ||
						is_page_template( 'page-templates/page-template-areas_served_single.php' )
					):
						get_template_part( 'partials/prefooter', 'mission' );
					endif;
				?>
			</div>
			<?php 
			  $form_title = get_field('footer_form_title','options');
			  $logo = get_field('footer_logo','options');
			  $menu = get_field('footer_menu','options');
			  $phone = get_field('phone_number','options');
			  $phonelink = preg_replace("/[^0-9]/", "", $phone);
			  $email = get_field('email','options');
			  $copyright = get_field('copyright_text','options');
			?>
			<footer id="main-footer" class="et_pb_section et_section_regular">
			  <div class="et_pb_row stndrd-rw partial-lead-form-rw">
			    <div class="et_pb_column et_pb_column_3_5 et_pb_css_mix_blend_mode_passthrough">
			      <div class="partial-lead-form-container et_pb_module et_pb_text et_pb_text_align_left et_pb_bg_layout_light">
			        <div class="et_pb_text_inner">
			          <h4 class="partial-lead-form-ttl"><?php echo $form_title; ?></h4>
			          <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="2"]'); ?>
			        </div>
			      </div>
			    </div>
			    <div class="et_pb_column et_pb_column_2_5 et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty"></div>
			  </div>
			  <div class="footer-info-rw et_pb_row stndrd-rw et_pb_row_1-2_1-4_1-4">
			    <div class="footer-info-col footer-info-col-1 et_pb_column et_pb_column_1_2 et_pb_column_2 et_pb_css_mix_blend_mode_passthrough">
			      <div class="footer-logo et_pb_module et_pb_image">
			        <span class="et_pb_image_wrap">
			        	<img src="<?php echo $logo; ?>" alt="" title="logo-inline-short" />
			        </span>
			      </div>
			      <div class="social-icons">
			      	<?php 
							  if( have_rows('social_links','options') ):
							    while( have_rows('social_links','options') ): the_row(); 
							    	$instagram = get_sub_field('instagram_link');
							    	$facebook  = get_sub_field('facebook_link');
							    	$linkedin  = get_sub_field('linkedin_link');
							    	$twitter   = get_sub_field('twitter_link');
							    	$youtube   = get_sub_field('youtube_link');

								    if($instagram):
								    	echo '<a href="https://instagram.com/'.$instagram.'" class="icon"><img src="'.site_url("/wp-content/uploads/icon_instagram.svg").'" alt=""></a>';
								    endif;

								    if($facebook):
								    	echo '<a href="https://facebook.com/'.$facebook.'" class="icon"><img src="'.site_url("/wp-content/uploads/icon_facebook.svg").'" alt=""></a>';
								    endif;

								    if($linkedin):
								    	echo '<a href="https://linkedin.com/in/'.$linkedin.'" class="icon"><img src="'.site_url("/wp-content/uploads/icon_linkedin.svg").'" alt=""></a>';
								    endif;

								    if($youtube):
								    	echo '<a href="https://youtube.com/channel/'.$youtube.'" class="icon"><img src="'.site_url("/wp-content/uploads/icon_youtube.svg").'" alt=""></a>';
								    endif;
								  endwhile;
								endif;
						  ?>
			      </div>
			    </div>
			    <div class="footer-info-col footer-info-col-2 et_pb_column et_pb_column_1_4 et_pb_column_3 et_pb_css_mix_blend_mode_passthrough">
			      <div class="footer-menu-wrap footer-info et_pb_module et_pb_code">
			      	<h4 class="footer-info-ttl">Links</h4>
			      	<?php echo do_shortcode('[menu name="'.$menu.'" id="footer-menu"]'); ?>
			      </div>
			    </div>
			    <div class="footer-info-col footer-info-col-3 et_pb_column et_pb_column_1_4 et_pb_column_4 et_pb_css_mix_blend_mode_passthrough et-last-child">
			      <div class="footer-info et_pb_module et_pb_code">
			      	<h4 class="footer-info-ttl">Contact</h4>
			      	<?php 
							  if( have_rows('address','options') ):
							    while( have_rows('address','options') ): the_row();
							    	$addressline = get_sub_field('address_line_1');
							    	$city = get_sub_field('city');
							    	$state = get_sub_field('state');
							    	$zip = get_sub_field('zip');
							?>
						      	<div class="address info">
						      		<span class="address-line1"><?php echo $addressline.','; ?></span>
						      		<span class="address-line1"><?php echo $city.', '.$state.' '.$zip; ?></span>
						      	</div>
						  <?php 
							  	endwhile;
								endif; 
							?>

			      	<div class="phone-number info">
			      		<a href="tel:+1<?php echo $phonelink; ?>"><?php echo $phone; ?></a>
			      	</div>
			      	<div class="email-address info">
			      		<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
			      	</div>
			      </div>
			    </div>
			  </div>
			  <div class="credits-rw et_pb_row stndrd-rw">
			    <div class="et_pb_column et_pb_column_4_4 et_pb_css_mix_blend_mode_passthrough">
			      <div class="et_pb_module et_pb_text et_pb_text_1 et_pb_text_align_left et_pb_bg_layout_light">
			      	<p class="copyright">&copy;<?php echo do_shortcode('[year]');?> AIT Real Estate Investment Firm. All rights reserved.</p>
			      </div>
			    </div>
			  </div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->
<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
