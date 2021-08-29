<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
			<?php 
				$classes = get_body_class();

				// Pre-Footer Divi Library Items
					if (in_array('show-testimonials-prefooter',$classes)) {
				    echo do_shortcode('[et_pb_section global_module="13"][/et_pb_section]');
					};

				// Main Footer Divi Library Item
					echo do_shortcode('[et_pb_section global_module="10"][/et_pb_section]');
			?>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
