<?php

namespace Xzito\TrinityHomePageV2;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_60c79377eb9b2',
  'title' => 'Home Page v2 – Showcase Fields',
  'fields' => array(
    array(
      'key' => 'field_60c79386d0d74',
      'label' => '',
      'name' => 'home_page_v2_showcase',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => 'field_60c793d9d0d75',
      'min' => 2,
      'max' => 2,
      'layout' => 'row',
      'button_label' => 'Add Row',
      'sub_fields' => array(
        array(
          'key' => 'field_60c79418d0d78',
          'label' => 'Image',
          'name' => 'image',
          'type' => 'image',
          'instructions' => 'At least 2560px × 1440px.',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'array',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => 'jpeg,jpg,gif,png',
        ),
        array(
          'key' => 'field_60c793d9d0d75',
          'label' => 'Heading',
          'name' => 'heading',
          'type' => 'text',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60c793e1d0d76',
          'label' => 'Subheading',
          'name' => 'subheading',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_60c79447d0d79',
          'label' => 'Link',
          'name' => 'link',
          'type' => 'link',
          'instructions' => '',
          'required' => 1,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'array',
        ),
      ),
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'page_template',
        'operator' => '==',
        'value' => Template::absolute_path(),
      ),
    ),
  ),
  'menu_order' => 1,
  'position' => 'acf_after_title',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));

endif;