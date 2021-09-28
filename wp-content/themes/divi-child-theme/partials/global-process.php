<?php 
if( have_rows('how_it_works','options') ):
  while( have_rows('how_it_works','options') ): the_row(); 
    $title = get_sub_field('title','options');
    $paragraph = get_sub_field('paragraph','options');
    $button_text = get_sub_field('button_text','options');
    $button_link = get_sub_field('button_link','options');
?>              
    <div id="our-process" class="prefooter-sctn et_pb_section et_section_regular">
      <div class="sm-rw et_pb_row et_pb_gutters4">
        <div class="text-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough">
          <div class="text et_pb_text et_pb_module">
            <div class="et_pb_text_inner">
              <h3><?php echo $title; ?></h3>
              <div class="content">
                <?php 
                  echo $paragraph; 
                  echo '<a href="'.$button_link.'" class="btn">'.$button_text.'</a>';
                ?>  
              </div>
            </div>
          </div>
        </div>
        <div class="steps-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough et-last-child">
          <div class="steps-wrapper et_pb_code et_pb_module">
            <div class="et_pb_code_inner">
              <div class="process-steps">
                <?php 
                if( have_rows('steps','options') ):
                  while( have_rows('steps','options') ): the_row(); 
                    $step_title = get_sub_field('step_title','options');
                    $step_desc = get_sub_field('step_description','options');

                    if($step_title && $step_desc):
                ?>
                      <div class="step">
                        <div class="inner">
                          <h6 class="step-title"><?php echo $step_title; ?></h6>
                          <p class="step-description"><?php echo $step_desc; ?></p>
                        </div>
                      </div>
                <?php 
                    endif;
                  endwhile;
                endif; 
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
  endwhile;
endif; 
?>