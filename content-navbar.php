
  <!-- BEGIN: NAV BAR -->
  <div data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" class="w-nav navbar-container">
    <div class="w-container navebar-container">

      <?php get_template_part('content', 'navlogo'); ?>

      <nav role="navigation" class="w-nav-menu navbar-menu">

        <!-- BEGIN: LOOP OVER MAIN MENU ITEMS -->
        <?php
          global $post;
          $top_menu_items = [];
          $menu_name = 'main-menu';
          $menu_list = '';

          if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items($menu->term_id);
            foreach ( (array) $menu_items as $key => $menu_item ) {
              if( $menu_item->menu_item_parent == 0 ){
                // Create a parent menu
                $top_menu_items[$menu_item->ID] = [
                  "menu_item" => $menu_item,
                  "sub_items" => []
                ];
              } else {
                // Attach the menu as a sub_item to its parent menu
                $top_menu_items[$menu_item->menu_item_parent]["sub_items"][$menu_item->ID] = $menu_item;
              }
            }

            foreach ( (array) $top_menu_items as $key => $top_menu_array ) {
              $menu_item = $top_menu_array["menu_item"];
              $childCount = count($top_menu_array["sub_items"]);
              if( $childCount == 0) {
                // This is an empty parent menu. Render it as just a clickable menu
                $currentPageClass = $post->ID == $menu_item->object_id ? ' w--current' : '';
                $menu_list .= '<a href="' . $menu_item->url . '" class="w-nav-link header-nav-link' . $currentPageClass . '">' . $menu_item->title . '</a>';
              } else {
                // There are submenu items, render a dropdown menu for the parent and then render its children
                // BEGIN: DROPDOWN MENU
                $menu_list .= "<div data-delay='0' class='w-dropdown dropdown-container'>";
                  $menu_list .= "<div class='w-dropdown-toggle header-nav-link bm-dropdown-menu'>";
                    $menu_list .= "<div>".$menu_item->title."</div>";
                    $menu_list .= "<div class='w-icon-dropdown-toggle'></div>";
                  $menu_list .= "</div>";
                  $menu_list .= "<nav class='w-dropdown-list dropdown-list'>";
                  foreach ( (array) $top_menu_array["sub_items"] as $key => $menu_item ) {
                    $currentPageClass = $post->ID == $menu_item->object_id ? ' w--current' : '';
                    $menu_list .= '<a href="' . $menu_item->url . '" class="w-dropdown-link dropdown-link' . $currentPageClass . '">' . $menu_item->title . '</a>';
                  }
                  $menu_list .= "</nav>";
                $menu_list .= "</div>";
                // END: DROPDOWN MENU
              }
            }
          }

          echo $menu_list;
        ?>
        <!-- END: LOOP OVER MAIN MENU ITEMS -->

        <?php get_template_part('content', 'socialnav'); ?>

      </nav>

      <!-- BEGIN: MENU BUTTON FOR SMALLER SCREENS -->
      <div class="w-nav-button menu-dropdown">
        <div class="w-icon-nav-menu"></div>
      </div>
      <!-- END: MENU BUTTON FOR SMALLER SCREENS -->
    </div>
  </div>
  <!-- END: NAV BAR -->
