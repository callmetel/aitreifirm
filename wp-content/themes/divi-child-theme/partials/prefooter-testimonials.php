<div id="testimonials" class="prefooter-sctn et_pb_section et_section_regular">
  <div class="stndrd-rw et_pb_row et_pb_equal_columns et_pb_gutters4">
    <div class="et_pb_column et_pb_column_4_4 et_pb_css_mix_blend_mode_passthrough">
      <h6 class="testimonials-ttl">What People Say</h6>
      <div id="testimonial-slider" class="splide">
        <div class="splide__track">
          <div class="splide__list">
            <div class="splide__slide">
              <p class="review">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div class="info">
                <p class="client">Johnathon Smith</p>
                <p class="title">Vice President Information Technology</p>
              </div>
            </div>
            <div class="splide__slide">
              <p class="review">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
              <div class="info">
                <p class="client">Mary Smyth</p>
                <p class="title">Creative Director and Co-Founder</p>
              </div>
            </div>
            <div class="splide__slide">
              <p class="review">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <div class="info">
                <p class="client">Johnathon Smith</p>
                <p class="title">Vice President Information Technology</p>
              </div>
            </div>
            <div class="splide__slide">
              <p class="review">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
              <div class="info">
                <p class="client">Mary Smyth</p>
                <p class="title">Creative Director and Co-Founder</p>
              </div>
            </div>
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
