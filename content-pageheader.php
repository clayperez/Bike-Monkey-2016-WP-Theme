<?php
  // ACF SUBPAGE SETTINGS
  $logo = get_field( "header_logo" );
  $title = get_field( "page_title" );
  $subtitle = get_field( "page_subtitle" );
  $bgcolor = get_field( "header_background_color" );
  $bgimg = get_field( "header_background_image" );
  $bgpos = get_field( "header_background_image_position" );
  $backgroundCSS = "background:$bgcolor url($bgimg) no-repeat center $bgpos/cover";
?>

  <div class="w-section-subpage event-header" style="<?php echo $backgroundCSS; ?>">
    <div class="w-container event-title-container">
      <img src="<?php echo $logo; ?>" class="event-logo">
      <h1 class="event-title"><?php echo $title; ?></h1>
      <h4 class="event-date"><?php echo $subtitle; ?></h4>
    </div>
  </div>
