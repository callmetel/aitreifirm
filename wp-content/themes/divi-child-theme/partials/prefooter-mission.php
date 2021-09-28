<?php 
  if( have_rows('our_mission','options') ):
    while( have_rows('our_mission','options') ): the_row(); 
      $image = get_sub_field('image','options');
      $title = get_sub_field('section_title','options');
      $paragraph = get_sub_field('section_paragraph','options');
      $buttontext = get_sub_field('button_text','options');
      $buttonlink = get_sub_field('button_link','options');
?>
      <style>
        #our-mission .image-col .image {
          background-image: url('<?php echo $image; ?>');
        }
      </style>
      <div id="our-mission" class="prefooter-sctn et_pb_section et_section_regular">
        <div class="sm-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
          <div class="image-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough">
            <div class="image"></div>
          </div>
          <div class="text-col et_pb_column et_pb_column_1_2 et_pb_css_mix_blend_mode_passthrough et-last-child">
            <div class="text et_pb_text et_pb_module">
              <div class="et_pb_text_inner">
                <h3><?php echo $title; ?></h3>
                <div class="content">
                  <?php echo $paragraph; ?>
                  <a href="<?php echo $buttonlink; ?>" class="btn"><?php echo $buttontext; ?></a>  
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