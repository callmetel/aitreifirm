<?php 
  if( have_rows('testimonials','options') ):
    while( have_rows('testimonials','options') ): the_row(); 
      $title = get_sub_field('testimonials_title','options');
?>
    <div id="testimonials" class="prefooter-sctn et_pb_section et_section_regular">
      <div class="stndrd-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
        <div class="et_pb_column et_pb_column_4_4 et_pb_css_mix_blend_mode_passthrough">
          <h6 class="testimonials-ttl"><?php echo $title; ?></h6>
          <div id="testimonial-slider" class="splide">
            <div class="splide__track">
              <div class="splide__list">
                <?php 
                  if( have_rows('testimonials_slider','options') ):
                    while( have_rows('testimonials_slider','options') ): the_row(); 
                      $review_text = get_sub_field('review_text','options');
                      $client_name = get_sub_field('client_name','options');
                      $client_title = get_sub_field('client_job_title','options');

                      if( $review_text && $client_name && $client_title ):
                ?>
                        <div class="splide__slide">
                          <p class="review"><?php echo $review_text; ?></p>
                          <div class="info">
                            <p class="client"><?php echo $client_name; ?></p>
                            <p class="title"><?php echo $client_title; ?></p>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script type="text/javascript">
      document.addEventListener( 'DOMContentLoaded', function () {
        new Splide( '#testimonial-slider', {
          gap: '6.25vw',
          perPage: 2,
          perMove: 1,
          rewind : true,
          autoplay: true,
          pagination: false,
          breakpoints: {
            767: {
              perPage: 1,
            },
          },
        } ).mount();
      });
    </script>
<?php 
  endwhile;
endif; 
?>