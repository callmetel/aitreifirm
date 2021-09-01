<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
			<?php 
				$classes = get_body_class();

				// Pre-Footer Divi Library Items
				// if (in_array('show-testimonials-prefooter',$classes)) {
			 	//   echo do_shortcode('[et_pb_section global_module="13"][/et_pb_section]');
				// };
			?>

			<div id="pre-footer">
				<?php
					get_template_part( 'partials/prefooter', 'lead_form' );
					get_template_part( 'partials/prefooter', 'testimonials' );
					get_template_part( 'partials/prefooter', 'mission' );
				?>
			</div>

			<footer id="main-footer" class="et_pb_section et_section_regular">
			  <div class="et_pb_row stndrd-rw partial-lead-form-rw">
			    <div class="et_pb_column et_pb_column_3_5 et_pb_css_mix_blend_mode_passthrough">
			      <div class="partial-lead-form-container et_pb_module et_pb_text et_pb_text_align_left et_pb_bg_layout_light">
			        <div class="et_pb_text_inner">
			          <h4 class="partial-lead-form-ttl">Get started today.</h4>
			          <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true" tabindex="2"]'); ?>
			        </div>
			      </div>
			    </div>
			    <div class="et_pb_column et_pb_column_2_5 et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et-last-child et_pb_column_empty"></div>
			  </div>
			  <div class="footer-info-rw et_pb_row stndrd-rw et_pb_row_1-2_1-4_1-4">
			    <div class="et_pb_column et_pb_column_1_2 et_pb_column_2 et_pb_css_mix_blend_mode_passthrough">
			      <div class="footer-logo et_pb_module et_pb_image">
			        <span class="et_pb_image_wrap">
			        	<img src="/wp-content/uploads/logo-inline-short.svg" alt="" title="logo-inline-short" />
			        </span>
			      </div>
			      <div class="social-icons">
			      	<a href="https://instagram.com" class="icon"><img src="/wp-content/uploads/icon_instagram.svg" alt=""></a>
			      	<a href="https://facebook.com" class="icon"><img src="/wp-content/uploads/icon_facebook.svg" alt=""></a>
			      	<a href="https://linkedin.com" class="icon"><img src="/wp-content/uploads/icon_linkedin.svg" alt=""></a>
			      	<a href="https://twitter.com" class="icon"><img src="/wp-content/uploads/icon_twitter.svg" alt=""></a>
			      	<a href="https://youtube.com" class="icon"><img src="/wp-content/uploads/icon_youtube.svg" alt=""></a>
			      </div>
			    </div>
			    <div class="et_pb_column et_pb_column_1_4 et_pb_column_3 et_pb_css_mix_blend_mode_passthrough">
			      <div class="footer-menu-wrap footer-info et_pb_module et_pb_code">
			      	<h4 class="footer-info-ttl">Links</h4>
			      	<?php echo do_shortcode('[menu name="Footer Menu" id="footer-menu"]'); ?>
			      </div>
			    </div>
			    <div class="et_pb_column et_pb_column_1_4 et_pb_column_4 et_pb_css_mix_blend_mode_passthrough et-last-child">
			      <div class="footer-info et_pb_module et_pb_code">
			      	<h4 class="footer-info-ttl">Contact</h4>
			      	<div class="address info">
			      		<span class="address-line1">P.O. Box 411665,</span>
			      		<span class="address-line1">San Francisco, CA 94141</span>
			      	</div>
			      	<div class="phone-number info">
			      		<a href="tel:+18888888888">(888) 888-8888</a>
			      	</div>
			      	<div class="email-address info">
			      		<a href="mailto:realtysolution@aitreifirm.com">realtysolution@aitreifirm.com</a>
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
