<?php if( have_rows('main_slider_slides') ): ?>
  <div data-animation="slide" data-duration="1000" data-infinite="1" data-delay="8000" data-autoplay="1" data-nav-spacing="4" class="w-slider opener">
    <div class="w-slider-mask">

      <?php while( have_rows('main_slider_slides') ): the_row(); 

        // ACF: SLIDE FIELDS
        $color = get_sub_field('slide_background_color');
        $bgurl = get_sub_field('slide_background_image');
        $bgpos = get_sub_field('slide_background_image_position');
        $title = get_sub_field('slide_title');
        $subtitle = get_sub_field('slide_subtitle');
        $content = get_sub_field('slide_content');
        $btntext = get_sub_field('slide_button_text');
        $btnlink = get_sub_field('slide_button_link');
      ?>

      <!-- BEGIN: SLIDE -->
      <div class="w-slide" style="<?php echo "background:$color url('$bgurl') no-repeat center $bgpos/cover;" ?>">
        <div class="w-container slide-content">
          <h1 class="slide-header"><?php echo $title; ?></h1>
          <h3 class="slider-date"><?php echo $subtitle; ?></h3>
          <h3 class="slide-subtitle"><?php echo $content; ?></h3>
          <a href="<?php echo $btnlink; ?>" class="w-button slider-button"><?php echo $btntext; ?></a>
        </div>
      </div>
      <!-- END: SLIDE -->

  <?php endwhile; ?>

    </div>
    <div class="w-slider-arrow-left">
      <div class="w-icon-slider-left left-arrow"></div>
    </div>
    <div class="w-slider-arrow-right">
      <div class="w-icon-slider-right right-arrow"></div>
    </div>
    <div class="w-slider-nav w-slider-nav-invert"></div>
  </div>

<?php endif; ?>