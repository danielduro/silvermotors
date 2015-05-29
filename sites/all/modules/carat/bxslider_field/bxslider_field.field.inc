<?php

/**
 * Implements hook_field_formatter_info()
 * @return array
 */
function bxslider_field_field_formatter_info() {
  return array(
    'bxslider_gallery' => array(
      'label' => t('BXslider Gallery'),
      'field types' => array('image'),
      'settings' => array(
        'mode' => 'horizontal',
        'speed' => 500,
        'pager_use_images' => TRUE,
        'pager' => TRUE,
        'controls' => TRUE,
        'image_style' => NULL,
        'image_pager_style' => NULL,
      ),
    )
  );
}

/**
 * Implements hook_field_formatter_settings_form()
 * @param $field
 * @param $instance
 * @param $view_mode
 * @param $form
 * @param $form_state
 * @return array
 */
function bxslider_field_field_formatter_settings_form($field, $instance, $view_mode, $form, &$form_state) {
  $display = $instance['display'][$view_mode];
  $settings = $display['settings'];

  $element = array();


  if ($display['type'] == 'bxslider_gallery') {

    $element['mode'] = array(
      '#type' => 'select',
      '#title' => t('Mode'),
      '#options' => array(
        'horizontal' => t('Horizontal'),
        'vertical' => t('Vertical'),
      ),
      '#default_value' => $settings['mode'],
    );

    $element['speed'] = array(
      '#type' => 'textfield',
      '#title' => t('Speed'),
      '#size' => 4,
      '#default_value' => $settings['speed'],
    );

    $element['pager'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use Pager'),
      '#default_value' => $settings['pager'],
    );

    $element['pager_use_images'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use images for pagers'),
      '#description' => t('If selected, basic pager will be replaced with image thumbnails'),
      '#default_value' => $settings['pager_use_images'],
    );

    $element['controls'] = array(
      '#type' => 'checkbox',
      '#title' => t('Use Controls'),
      '#default_value' => $settings['controls'],
    );

    $element['image_style'] = array(
      '#title' => t('Main Image Style'),
      '#type' => 'select',
      '#options' => image_style_options(),
      '#default_value' => $settings['image_style'],
    );

    $element['image_pager_style'] = array(
      '#title' => t('Image Pager Style'),
      '#type' => 'select',
      '#options' => image_style_options(),
      '#default_value' => $settings['image_pager_style'],
    );
  }

  return $element;
}

/**
 * Implements hook_field_formatter_settings_summary()
 * @param $field
 * @param $instance
 * @param $view_mode
 * @return string
 */
function bxslider_field_field_formatter_settings_summary($field, $instance, $view_mode) {
  $settings = $instance['display'][$view_mode]['settings'];

  $lines[] = t('bxSlider');

  return implode('<br />', $lines);
}

/**
 * Implements hook_field_formatter_view()
 * @param $entity_type
 * @param $entities
 * @param $field
 * @param $instances
 * @param $langcode
 * @param $items
 * @param $displays
 * @return mixed
 */
function bxslider_field_field_formatter_view($entity_type, $entities, $field, $instances, $langcode, &$items, $displays) {
  $build[0] = array(
    '#markup' => theme(
      'bxslider_field_gallery',
      array('items' => $items, 'settings' => $displays['settings'], 'entity_type' => $entity_type, 'entity' => $entities)
    ),
  );

  return $build;
}
