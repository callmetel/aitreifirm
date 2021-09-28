<?php 
if( have_rows('comparing_ait','options') ):
  while( have_rows('comparing_ait','options') ): the_row(); 
    $title = get_sub_field('title','options');
    $paragraph = get_sub_field('paragraph','options');
?> 
    <div id="comparison-chart" class="prefooter-sctn et_pb_section et_section_regular">
      <div class="stndrd-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
        <div class="et_pb_column et_pb_column_4_4 et_pb_css_mix_blend_mode_passthrough">
          <div class="chart-heading et_pb_text et_pb_module et_pb_text_align_center">
            <div class="et_pb_text_inner">
              <h2 class="h3 chart-title"><?php echo $title; ?></h2>
              <?php
                if($paragraph):
                  echo '<p class="chart-subtitle">'.$paragraph.'</p>';
                endif;
              ?>
            </div>
          </div>
          <div class="comparison-chart-wrapper et_pb_code et_pb_module">
            <div class="et_pb_code_inner">
              <div class="comparison-chart">
                <div class="chart-legend">
                  <div class="inner">
                    <span class="key key-other">Listing Your Property</span>
                    <span class="key key-ait">Selling to AIT</span>
                  </div>
                </div>
                <div class="chart-cell title-cell title-cell-empty"></div>
                <div class="chart-cell title-cell title-cell-other">Listing Your Property</div>
                <div class="chart-cell title-cell title-cell-ait">Selling to AIT</div>
                <?php 
                if( have_rows('comparison_chart','options') ):
                  while( have_rows('comparison_chart','options') ): the_row(); 
                    $icon = get_sub_field('icon','options');
                    $subject = get_sub_field('subject','options');
                    $competitor = get_sub_field('competitor_val','options');
                    $ait = get_sub_field('ait_val','options');

                    if($icon && $subject && $competitor && $ait):
                ?>
                      <div class="chart-cell icon-cell">
                        <img class="chart-icon" src="<?php echo $icon; ?>" alt="">
                        <span class="name"><?php echo $subject; ?></span>
                      </div>
                      <div class="chart-cell chart-cell-other"><?php echo $competitor; ?></div>
                      <div class="chart-cell chart-cell-ait"><?php echo $ait; ?></div>
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