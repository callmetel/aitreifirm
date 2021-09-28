<?php 
if( have_rows('partners') ):
  while( have_rows('partners') ): the_row(); 
    $title = get_sub_field('title');
?>
    <div id="partner-logos" class="prefooter-sctn et_pb_section et_section_regular">
      <div class="stndrd-rw et_pb_row et_pb_gutters1">
        <div class="et_pb_column et_pb_column_1_4 et_pb_css_mix_blend_mode_passthrough">
          <div class="partner-logos-title-wrap et_pb_text et_pb_module et_pb_text_align_left">
            <div class="et_pb_text_inner">
            	<p class="partner-logos-title"><?php echo $title; ?></p>
            </div>
          </div>
        </div>
        <div class="et_pb_column et_pb_column_3_4 et_pb_css_mix_blend_mode_passthrough">
          <div class="partner-logos et_pb_code et_pb_module">
            <div class="et_pb_code_inner">
              <?php 
              if( have_rows('partner_logos') ):
                while( have_rows('partner_logos') ): the_row(); 
              ?>
            	    <div class="logo"><img src="<?php the_sub_field('logo'); ?>" alt=""></div>
              <?php 
                endwhile;
              endif; 
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
  endwhile;
endif; 
?>