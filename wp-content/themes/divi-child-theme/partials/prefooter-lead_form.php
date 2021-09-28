<?php if( have_rows('lead_form','options') ): ?>
  <?php 
        while( have_rows('lead_form','options') ): the_row(); 
          $formid = get_sub_field('lead_form_id','options');
          $title = get_sub_field('lead_form_title','options');
          $alttitle = get_sub_field('lead_form_alt_title','options');
          $paragraph = get_sub_field('lead_form_main_paragraph','options');
  ?>
    <div id="lead-form" class="prefooter-sctn et_pb_section et_section_regular">
      <div class="sm-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
        <?php
        if(!is_page_template( 'page-templates/page-template-about.php' )):
        ?>
          <div class="text-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough">
            <div class="text et_pb_text et_pb_module">
              <div class="et_pb_text_inner">
                <h3 class="h2"><?php echo $title ?></h3>
                <div class="content"><?php echo $paragraph ?></div>
              </div>
            </div>
          </div>
        <?php
        endif;
        ?>
        <div class="form-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough et-last-child">
          <div class="form-wrapper et_pb_code et_pb_module">
            <div class="et_pb_code_inner">
              <h3 class="form-title"><?php echo $alttitle ?></h3>
              <p class="form-indicator">*Required Fields</p>
              <?php echo do_shortcode('[gravityform id="'.$formid.'" title="false" description="false" ajax="true" tabindex="1"]'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>