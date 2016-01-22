<?php
/**
 * Bike Monkey 2016 Functions File
 * Created by: Carlos Perez
 * 
 */


/* MENUS */
function register_main_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_main_menu' );


/* RESPONSIVE VIDEO EMBEDS */
function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}
add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 );


/* ACF LOADING */
define( 'ACF_LITE', true );
include_once('advanced-custom-fields/acf.php');

/* ACF FIELD DATA */
if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_general-page-settings',
    'title' => 'General Page Settings',
    'fields' => array (
      array (
        'key' => 'field_569ff301b88e9',
        'label' => 'Body Color',
        'name' => 'body_color',
        'type' => 'color_picker',
        'instructions' => 'The CSS color for the body\'s background on the front page. Exclude ;',
        'required' => 1,
        'default_value' => '#333333',
      ),
      array (
        'key' => 'field_56a0126cad66c',
        'label' => 'Font Color',
        'name' => 'font_color',
        'type' => 'color_picker',
        'default_value' => '#333333',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_main-slider',
    'title' => 'Main Slider',
    'fields' => array (
      array (
        'key' => 'field_569fd338b2302',
        'label' => 'Main Slider Slides',
        'name' => 'main_slider_slides',
        'type' => 'repeater',
        'sub_fields' => array (
          array (
            'key' => 'field_569fd3f5b2303',
            'label' => 'Slide Background Color',
            'name' => 'slide_background_color',
            'type' => 'color_picker',
            'instructions' => 'Pick a color to use if no image is present.',
            'required' => 1,
            'column_width' => '',
            'default_value' => '#000',
          ),
          array (
            'key' => 'field_569fd42ab2304',
            'label' => 'Slide Background Image',
            'name' => 'slide_background_image',
            'type' => 'image',
            'instructions' => 'Choose an image to place in the background of the slide.',
            'column_width' => '',
            'save_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array (
            'key' => 'field_569fd45db2305',
            'label' => 'Slide Background Image Position',
            'name' => 'slide_background_image_position',
            'type' => 'select',
            'instructions' => 'The position of the background image.',
            'column_width' => '',
            'choices' => array (
              'top' => 'top',
              'center' => 'center',
              'bottom' => 'bottom',
            ),
            'default_value' => 'center',
            'allow_null' => 0,
            'multiple' => 0,
          ),
          array (
            'key' => 'field_569fd4beb2306',
            'label' => 'Slide Title',
            'name' => 'slide_title',
            'type' => 'text',
            'instructions' => 'Choose the title for the slide',
            'column_width' => '',
            'default_value' => 'Title',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd526b2307',
            'label' => 'Slide Subtitle',
            'name' => 'slide_subtitle',
            'type' => 'text',
            'instructions' => 'The subtitle for the slide',
            'column_width' => '',
            'default_value' => 'Date',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd550b2308',
            'label' => 'Slide Content',
            'name' => 'slide_content',
            'type' => 'text',
            'instructions' => 'Content of the larger,dark text area of the slide.',
            'column_width' => '',
            'default_value' => 'Content goes here...',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd5a1b2309',
            'label' => 'Slide Button Text',
            'name' => 'slide_button_text',
            'type' => 'text',
            'instructions' => 'Text of the slide\'s button',
            'column_width' => '',
            'default_value' => 'Link',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd678b230a',
            'label' => 'Slide Button Link',
            'name' => 'slide_button_link',
            'type' => 'text',
            'instructions' => 'Slide button\'s link (relative URL)',
            'column_width' => '',
            'default_value' => 'Link',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'table',
        'button_label' => 'Add Slide',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_type',
          'operator' => '==',
          'value' => 'front_page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'acf_after_title',
      'layout' => 'no_box',
      'hide_on_screen' => array (
        0 => 'excerpt',
        1 => 'discussion',
        2 => 'comments',
        3 => 'send-trackbacks',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_page-sections',
    'title' => 'Page Sections',
    'fields' => array (
      array (
        'key' => 'field_569fd7ea08c3e',
        'label' => 'Sections',
        'name' => 'sections',
        'type' => 'repeater',
        'instructions' => 'Each section has various settings, but all flow vertically and allow you to break up your page\'s content. Sections override a page\'s default content.',
        'sub_fields' => array (
          array (
            'key' => 'field_56a013ce06cb9',
            'label' => 'Section Anchor',
            'name' => 'section_anchor',
            'type' => 'text',
            'instructions' => 'anchor tag name for linking',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd84308c3f',
            'label' => 'Section Background Color',
            'name' => 'section_background_color',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'CSS color value',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_56a013f706cba',
            'label' => 'Section Font Color',
            'name' => 'section_font_color',
            'type' => 'text',
            'column_width' => '',
            'default_value' => '',
            'placeholder' => 'CSS color value',
            'prepend' => '',
            'append' => '',
            'formatting' => 'html',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_569fd8a308c40',
            'label' => 'Section Container Width',
            'name' => 'section_container_width',
            'type' => 'select',
            'instructions' => 'Choose a container width setting. All containers are centered on the page.',
            'column_width' => '',
            'choices' => array (
              '50%' => '50%',
              '600px' => '600px',
              '940px' => '940px',
              '1100px' => '1100px',
              '100%' => '100%',
            ),
            'default_value' => '940px',
            'allow_null' => 0,
            'multiple' => 0,
          ),
          array (
            'key' => 'field_569fd95508c41',
            'label' => 'Section Container Custom CSS',
            'name' => 'section_container_custom_css',
            'type' => 'text',
            'instructions' => 'Optional custom css to apply to the section DIV.',
            'column_width' => '',
            'default_value' => 'padding:20px;',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'formatting' => 'none',
            'maxlength' => '',
          ),
          array (
            'key' => 'field_56a00e565f2a9',
            'label' => 'Section Content',
            'name' => 'section_content',
            'type' => 'wysiwyg',
            'column_width' => 100,
            'default_value' => '',
            'toolbar' => 'full',
            'media_upload' => 'yes',
          ),
        ),
        'row_min' => '',
        'row_limit' => '',
        'layout' => 'row',
        'button_label' => 'Add Section',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
        0 => 'the_content',
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_subpage-settings',
    'title' => 'Subpage Settings',
    'fields' => array (
      array (
        'key' => 'field_569fcbd5801a5',
        'label' => 'Header Background Color',
        'name' => 'header_background_color',
        'type' => 'color_picker',
        'instructions' => 'The background of the header if there is no image.',
        'required' => 1,
        'default_value' => '#333333',
      ),
      array (
        'key' => 'field_569fcc5f801a7',
        'label' => 'Header Background Image Position',
        'name' => 'header_background_image_position',
        'type' => 'select',
        'choices' => array (
          'top' => 'top',
          'center' => 'center',
          'bottom' => 'bottom',
        ),
        'default_value' => 'center',
        'allow_null' => 0,
        'multiple' => 0,
      ),
      array (
        'key' => 'field_569fcc9e801a8',
        'label' => 'Header Logo',
        'name' => 'header_logo',
        'type' => 'image',
        'instructions' => 'A small logo image in the header',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
      array (
        'key' => 'field_569fcdc8801a9',
        'label' => 'Page Title',
        'name' => 'page_title',
        'type' => 'text',
        'default_value' => 'Title',
        'placeholder' => 'The large text title for the page.',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_569fce2b801aa',
        'label' => 'Page Subtitle',
        'name' => 'page_subtitle',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => 'The smaller subtext for a page, like event date.',
        'prepend' => '',
        'append' => '',
        'formatting' => 'html',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_56a01afb9d564',
        'label' => 'Header Background Image',
        'name' => 'header_background_image',
        'type' => 'image',
        'save_format' => 'url',
        'preview_size' => 'thumbnail',
        'library' => 'all',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'page_type',
          'operator' => '!=',
          'value' => 'front_page',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'side',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'excerpt',
        1 => 'custom_fields',
        2 => 'discussion',
        3 => 'comments',
        4 => 'author',
        5 => 'send-trackbacks',
      ),
    ),
    'menu_order' => 0,
  ));
}

?>
